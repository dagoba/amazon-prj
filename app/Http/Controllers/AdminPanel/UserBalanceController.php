<?php

namespace App\Http\Controllers\AdminPanel;

use DB;
use App;
use App\Shop;
use App\User;
use Validator;
use App\UserRate;
use App\Transaction;
use App\ReferralProfit;
use App\InvestmentProfit;
use Illuminate\Http\Request;
use App\ArbitraryBalanceChange;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckAdminGroup;

class UserBalanceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(CheckAdminGroup::class);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user = User::where(['id' => $id])->first();
        /**
         * User rates and profits
         */
        $investment_profits = UserRate::select(DB::raw(
                'user_rates.id,'.
                'user_rates.user_id as referral_id,'.
                'user_rates.cost,'.
                'user_rates.created_at,'.
                'shops.id as shop_id,'.
                'shops.title as shop_title,'.
                "(SELECT cost FROM `investment_profits` where investment_profits.rate_id = user_rates.id ORDER BY investment_profits.created_at DESC LIMIT 1) as last_profit_cost,".
                "(SELECT created_at FROM `investment_profits` where investment_profits.rate_id = user_rates.id ORDER BY investment_profits.created_at DESC LIMIT 1) as last_profit_created_at"
            ))
            ->leftjoin('shops','shops.id','=','user_rates.shop_id')
            ->where(['user_rates.user_id' => $id])
            ->paginate(10, ['*'], 'investment_profits');

        /**
         * Referral rates and profits user
         */
        $referral_profits = UserRate::select(DB::raw(
                'user_rates.id,'.
                'user_rates.user_id as referral_id,'.
                'users.name as referral_name,'.
                'users.email as referral_email,'.
                'user_rates.cost,'.
                'user_rates.created_at,'.
                'shops.id as shop_id,'.
                'shops.title as shop_title,'.
                "(SELECT cost FROM `referral_profits` where referral_profits.rate_id = user_rates.id ORDER BY referral_profits.created_at DESC LIMIT 1) as last_profit_cost,".
                "(SELECT created_at FROM `referral_profits` where referral_profits.rate_id = user_rates.id ORDER BY referral_profits.created_at DESC LIMIT 1) as last_profit_created_at"
            ))
            ->leftjoin('users', 'users.id', '=', 'user_rates.user_id')
            ->leftjoin('shops', 'shops.id', '=', 'user_rates.shop_id')
            ->where([
                'users.referred_by'=>$user->affiliate_id
            ])
            ->paginate(10, ['*'], 'referral_profits');

        $components = [
            'user' => $user,
            'referral_profits' => $referral_profits,
            'investment_profits' => $investment_profits
        ];
        return view('adminpanel.userbalance', $components);
    }

    public function balance_verification_data(array $data)
    {
        $message = [
            'rate.required' => __('controller_adminpanel.user_balance_rate'),
        ];
        $validator = Validator::make($data, [
            'rate' => 'required|between:0.00,9999999.00',
        ], $message);

        return $validator;
    }

    public function changeBalance(Request $request)
    {
        $request_data = $request->All();
        $rate_info = UserRate::select(
                'shops.title',
                'users.name',
                'users.referred_by',
                'user_rates.user_id'
            )
            ->where([
                'user_rates.id' => $request_data['rate_id']
            ])
            ->leftjoin('shops', 'shops.id', '=', 'user_rates.shop_id')
            ->leftjoin('users', 'users.id', '=', 'user_rates.user_id')
            ->first();
        $validator = $this->balance_verification_data($request_data);
        if($validator->fails()){
            return response()->json(array('error' => $validator->getMessageBag()->toArray()), 400);
        }else {
            if($request_data['type_operation'] === 'investment_profit'){
                $user = User::where(['id' => $rate_info['user_id']])->first();
                if (App::isLocale('en')) {
                    $description = 'Charge for investment "'.$rate_info->title.'".';
                    $success = 'User account "'.$user->name.'" successfully replenished.';
                } else {
                    $description = 'Начисление за вложение у "'.$rate_info->title.'".';
                    $success = 'Счёт пользователя "'.$user->name.'" успешно пополнен.';
                }
                
                $transaction = Transaction::create([
                    'user_id' => $user->id,
                    'description' => $description,
                    'cost' => $request_data['rate'],
                    'amount_up' => $user->balance,
                    'amount_after' => $user->balance + $request_data['rate'],
                    'created_at' => $request_data['created_at'],
                ]);
                $investment_profit = InvestmentProfit::create([
                    'user_id' => $user->id,
                    'operator_id' => Auth::user()->id,
                    'transaction_id' => $transaction->id,
                    'rate_id' => $request_data['rate_id'],
                    'cost' => $request_data['rate'],
                    'created_at' => $request_data['created_at'],
                ]);
                User::where(['id' => $user->id])
                    ->update([
                        'balance' => $user->balance + $request_data['rate']
                    ]);
                return response()->json(array('success' => $success,'profit' => $investment_profit), 200);
            } else if($request_data['type_operation'] === 'referral_profit'){                
                $user = User::where(['affiliate_id' => $rate_info['referred_by']])->first();  
                if (App::isLocale('en')) {
                    $description = "Accrual for the investment of your referral \"".$rate_info->name."\" в \"".$rate_info->title."\".";
                    $success = 'User account "'.$user->name.'" successfully replenished.';
                } else {
                    $description = "Начисление за вложение Вашего реферала \"".$rate_info->name."\" в \"".$rate_info->title."\".";
                    $success = 'Счёт пользователя "'.$user->name.'" успешно пополнен.';
                }      
                
                $transaction = Transaction::create([
                    'user_id' => $user->id,
                    'description' => $description,
                    'cost' => $request_data['rate'],
                    'amount_up' => $user->balance,
                    'amount_after' => $user->balance + $request_data['rate'],
                    'created_at' => $request_data['created_at'],
                ]);
                
                $referral_profit = ReferralProfit::create([
                    'user_id' => $user->id,
                    'referral_id' => $rate_info->user_id,
                    'operator_id' => Auth::user()->id,
                    'transaction_id' => $transaction->id,
                    'rate_id' => $request_data['rate_id'],
                    'cost' => $request_data['rate'],
                    'created_at' => $request_data['created_at'],
                ]);
                User::where(['id' => $user->id])
                    ->update([
                        'balance' => $user->balance + $request_data['rate']
                    ]);
                return response()->json(array('success' => $success,'profit' => $referral_profit), 200);
            }else {
                return response()->json(array('error' => [__('controller_adminpanel.standard_error')]), 400);
            }
        }
    }

    public function arbitrary_сhange_verification_data(array $data)
    {
        $message = [
            'amount.required' => __('controller_adminpanel.user_balance_amount'),
            'comment.required' => __('controller_adminpanel.user_balance_comment'),
        ];
        $validator = Validator::make($data, [
            'amount' => 'required|between:0.00,9999999.00',
            'comment' => 'required'
        ], $message);

        return $validator;
    }

    public function arbitraryBalanceChange(Request $request)
    {
        $request_data = $request->all();

        $validator = $this->arbitrary_сhange_verification_data($request_data);
        if ($validator->fails()) {
            return response()->json(array('error' => $validator->getMessageBag()->toArray()), 400);
        } else {
            $user = User::where(['id' => $request_data['user']])->first();

            if ($request_data['operation'] == 1) {// начисление
                $new_balance = $user->balance + $request_data['amount'];
                if (App::isLocale('en')) {
                    $success = 'User account "'.$user->name.'" successfully replenished by '.$request_data['amount'].'$.';
                } else {
                    $success = 'Счёт пользователя "'.$user->name.'" успешно пополнен на '.$request_data['amount'].'$.';
                }    
            } else if ($request_data['operation'] == 2) {// списание
                $new_balance = $user->balance - $request_data['amount'];
                if (App::isLocale('en')) {
                    $success = 'By user "'.$user->name.'" written off successfully '.$request_data['amount'].'$.';
                } else {
                    $success = 'У пользователя "'.$user->name.'" успешно списано со счета '.$request_data['amount'].'$.';
                } 
            } else {
                return response()->json(array('error' => [__('controller_adminpanel.standard_error')]), 400);
            }
            $transaction = Transaction::create([
                'user_id' => $user->id,
                'description' => $request_data['comment'],
                'cost' => $request_data['amount'],
                'amount_up' => $user->balance,
                'amount_after' => $new_balance,
                'created_at' => $request_data['created_at'],
            ]);
            ArbitraryBalanceChange::create([
                'transaction_id' => $transaction->id,
                'user_id' => $request_data['user'],
                'operator_id' => Auth::user()->id,
                'operation' => $request_data['operation'],
                'amount' => $new_balance,
                'description' => $request_data['comment'],
                'created_at' => $request_data['created_at'],
            ]);
            User::where(['id' => $request_data['user']])
                ->update([
                    'balance' => $new_balance
                ]);
            return response()->json(array('success' => $success), 200);
        }
    }
}
