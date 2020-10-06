<?php

namespace App\Http\Controllers\Cabinet;

use App;
use App\Shop;
use App\User;
use Validator;
use App\UserRate;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AllshopsController extends Controller
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
        $shops = Shop::where([
                ['state','=', TRUE],
                // ['minimum_balance', '<=', Auth::user()->balance]
            ])
            ->paginate(10);
        $components = [
            'shops' => $shops,
        ];
        return view('cabinet.allshops', $components);
    }

    public function rate_verification_data(array $data)
    {
        $message = [
            'rate.required' => __('controller_cabinet.all_shops_rate'),
        ];
        $validator = Validator::make($data, [
            'rate' => 'required|between:0.00,9999999.00',
        ], $message);

        return $validator;
    }

    public function pleaceABet(Request $request)
    {
        $request_data = $request->All();
        $validator = $this->rate_verification_data($request_data);
        $pleace_a_bet_shop = Shop::where([
            'id' => $request_data['shop'],
            'state' => TRUE
            ])->first();
        if($validator->fails()){
            return response()->json(array('error' => $validator->getMessageBag()->toArray()), 400);
        }else {
            if ($pleace_a_bet_shop['minimum_balance'] <= Auth::user()->balance) {
                if($pleace_a_bet_shop['minimum_bet'] <= $request_data['rate']){
                    if ($request_data['rate'] <= Auth::user()->balance) {
                        if (App::isLocale('en')) {
                            $description = "You made an investment in \"".$pleace_a_bet_shop['title']."\".";
                            $success = "Congratulations, you have made an attachment to \"".$pleace_a_bet_shop['title']."\".";
                        }else {
                            $description = "Вы сделали вложение в \"".$pleace_a_bet_shop['title']."\".";
                            $success = "Поздравляем, Вы сделали вложение на \"".$pleace_a_bet_shop['title']."\".";
                        }
                        $transaction = Transaction::create([
                            'user_id' => Auth::user()->id,
                            'description' => $description,
                            'cost' => $request_data['rate'],
                            'amount_up' => Auth::user()->balance,
                            'amount_after' => Auth::user()->balance - $request_data['rate'],
                        ]);
                        UserRate::create([
                            'transaction_id' => $transaction->id,
                            'user_id' => Auth::user()->id,
                            'shop_id' => $request_data['shop'],
                            'cost' => $request_data['rate']
                        ]);
                        $user = User::where(['id' => Auth::user()->id])
                            ->update([
                                'balance' => Auth::user()->balance - $request_data['rate']
                            ]);

                        return response()->json(array(
                            'success' => $success,
                            'balance' => Auth::user()->balance - $request_data['rate']
                        ), 200);

                    }else {
                        return response()->json(array('error' => [__('controller_cabinet.all_shops_no_money')]), 400);
                    }
                }else {
                    return response()->json(array('error' => [__('controller_cabinet.all_shops_min_sum').' "'.$pleace_a_bet_shop['minimum_bet'].'".']), 400);
                }
            }else {
                return response()->json(array('error' => [__('controller_cabinet.standard_error')]), 400);
            }
        }
    }
}
  