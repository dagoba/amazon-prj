<?php

namespace App\Http\Controllers\Cabinet;

use App;
use Validator;
use App\User;
use App\Transaction;
use App\PaymentStatuse;
use App\PaymentSystem;
use App\PaymentWithdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class BalanceWithdrawalController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payment_withdrewals = PaymentWithdrawal::select(
                'payment_withdrawals.id',
                'payment_withdrawals.description',
                'payment_withdrawals.amount',
                'payment_withdrawals.requisites',
                'payment_systems.title as system_title',
                'payment_statuses.title_ru as status_ru',
                'payment_statuses.title_en as status_en',
                'payment_withdrawals.status',
                'payment_withdrawals.created_at',
                'payment_withdrawals.operator_comment'
            )
            ->leftjoin('payment_systems','payment_systems.id','=','payment_withdrawals.payment_id')
            ->leftjoin('payment_statuses','payment_statuses.id','=','payment_withdrawals.status')
            ->orderBy('payment_withdrawals.created_at', 'desc')
            ->where('user_id','=', Auth::user()->id)
            ->paginate(10);
        $payment_systems = PaymentSystem::where('stat','=',TRUE)->get();
        if (App::isLocale('en')) {
            $statuse = PaymentStatuse::select('id','title_en as title')->whereIn('id',[1,2,3])->get();
        }else {
            $statuse = PaymentStatuse::select('id','title_ru as title')->whereIn('id',[1,2,3])->get();
        }
        $components = [
            'payment_systems' => $payment_systems,
            'payment_withdrewals' => $payment_withdrewals,
            'statuse' => $statuse,
        ];
        return view('cabinet.balancewithdrawal',$components);
    }

    public function withdrawa_verification_data(array $data)
    {
        $message = [
            // 'payment_system.required' => '',
            // 'amount.required' => 'amount',
            // 'requisites.required' => 'requisites',
        ];
        $validator = Validator::make($data, [
            'payment_system' => 'required|max:250',
            'amount' => 'required|between:0.00,9999999.00',
            'requisites' => 'required|max:255',
            'user_comment' => 'nullable|max:255',
        ], $message);

        return $validator;
    }

    public function withdrawalBalance(Request $request)
    {
        $request_data = $request->All();
        $validator = $this->withdrawa_verification_data($request_data);
        if($validator->fails())
        {
            return response()->json(array('error' => $validator->getMessageBag()->toArray()), 400);
        } else {
            if ($request_data['amount'] >= 1) {
                if(Auth::user()->balance >= $request_data['amount']) {
                    $payment_systems = PaymentSystem::where('id','=',$request_data['payment_system'])->first();
                    if(App::isLocale('en')){
                        $desctiption = 'Application for withdrawal of funds through the payment system "'.$payment_systems->title.'" for the amount of '.$request_data['amount'].'$.';
                    }else {
                        $desctiption = 'Заявка на вывод средств через платежную систему "'.$payment_systems->title.'" на сумму '.$request_data['amount'].'$.';
                    }
                    
                    PaymentWithdrawal::create([
                        'user_id' => Auth::user()->id,
                        'amount' => $request_data['amount'],
                        'description' => $desctiption,
                        'user_comment' => htmlspecialchars($request_data['comment']),
                        'requisites' => htmlspecialchars($request_data['requisites']),
                        'payment_id' => $request_data['payment_system'],
                        'status' => 1
                    ]);

                    $user = User::where(['id' => Auth::user()->id])
                        ->update([
                            'balance' => Auth::user()->balance - $request_data['amount']
                        ]);

                    
                    Transaction::create([
                        'user_id' => Auth::user()->id,
                        'cost' => $request_data['amount'],
                        'description' => $desctiption,
                        'amount_up' => Auth::user()->balance,
                        'amount_after' => Auth::user()->balance - $request_data['amount']
                    ]);

                    return response()->json(array('success' => __('controller_cabinet.balance_withdrawal_success'), 'balance' => Auth::user()->balance - $request_data['amount']), 200);
                } else {
                    return response()->json(array('error' => [__('controller_cabinet.balance_withdrawal_no_money')]), 400);
                }
            }else {
                return response()->json(array('error' => [__('controller_cabinet.balance_withdrawal_min_sum')]), 400);
            }
        }
    }
}
