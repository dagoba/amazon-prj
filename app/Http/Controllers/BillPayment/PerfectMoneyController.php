<?php

namespace App\Http\Controllers\BillPayment;

use App\User;
use App\Transaction;
use App\PaymentDeposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class PerfectMoneyController extends Controller
{
    public function success(Request $request)
    {
        // $request_data = $request->all();

        // $secret = strtoupper( md5('UU4X4697wqfypsTSkfeMZwiHJ') );
        // $hash = $request_data['PAYMENT_ID'].':'.
        // $request_data['PAYEE_ACCOUNT'].':'.
        // $request_data['PAYMENT_AMOUNT'].':'.
        // $request_data['PAYMENT_UNITS'].':'.
        // $request_data['PAYMENT_BATCH_NUM'].':'.
        // $request_data['PAYER_ACCOUNT'].':'.
        // $secret.':'.
        // $request_data['TIMESTAMPGMT'];
        // $hash = strtoupper( md5($hash) );

        // if ( $hash != $request_data['V2_HASH'] && $request_data['PAYMENT_ID'] != Auth::user()->id) return redirect(route('balance-deposit'));

        // $order_info = PaymentDeposit::select(
        //         'payment_deposits.id as order_id',
        //         'users.name as user_name',
        //         'users.id as user_id',
        //         'users.balance',
        //         'payment_deposits.status as status'
        //     )
        //     ->leftjoin('users', 'users.id', '=', 'payment_deposits.user_id')
        //     ->where(['payment_deposits.id' => $request_data['ORDER_NUM']])
        //     ->first();
        // if($order_info->status == 1){
        //     if($request_data['INTERFACE_LANGUAGE'] == 'en'){
        //         $desctiption = 'Replenishment through the payment system "Perfect Money" in the amount of '.$request_data['PAYMENT_AMOUNT'].'$.';
        //     }else{
        //         $desctiption = 'Пополнение через платежную систему "Perfect Money" на сумму '.$request_data['PAYMENT_AMOUNT'].'$.';
        //     }
        //     User::where(['id' => $order_info->user_id])
        //         ->update([
        //             'balance' => $order_info->balance + $request_data['PAYMENT_AMOUNT']
        //         ]);
        //     $transaction = Transaction::create([
        //             'user_id' => $order_info->user_id,
        //             'description' => $desctiption,
        //             'cost' => $request['PAYMENT_AMOUNT'],
        //             'amount_up' => $order_info->balance,
        //             'amount_after' => $order_info->balance + $request['PAYMENT_AMOUNT']
        //         ]);
        //     PaymentDeposit::where(['payment_deposits.id' => $request_data['ORDER_NUM'], 'user_id' => Auth::user()->id])
        //         ->update([
        //             'transaction_id' => $transaction->id,
        //             'status' => 5
        //         ]);
        // }
        return redirect(route('balance-deposit'));
    }
    public function error(Request $request)
    {
        $request_data = $request->all();

        if($request_data['PAYMENT_ID'] == Auth::user()->id){
            $order_info = PaymentDeposit::where(['payment_deposits.id' => $request_data['ORDER_NUM']])->first();
            if($order_info->status == 1){
                PaymentDeposit::where(['payment_deposits.id' => $request_data['ORDER_NUM'], 'user_id' => Auth::user()->id])
                    ->update([
                        'status' => 4
                    ]);
            }
        }
        return redirect(route('balance-deposit'));
    }
    public function status(Request $request)
    {
        $request_data = $request->all();

        $secret = strtoupper( md5('UU4X4697wqfypsTSkfeMZwiHJ') );
        $hash = $request_data['PAYMENT_ID'].':'.
        $request_data['PAYEE_ACCOUNT'].':'.
        $request_data['PAYMENT_AMOUNT'].':'.
        $request_data['PAYMENT_UNITS'].':'.
        $request_data['PAYMENT_BATCH_NUM'].':'.
        $request_data['PAYER_ACCOUNT'].':'.
        $secret.':'.
        $request_data['TIMESTAMPGMT'];
        $hash = strtoupper( md5($hash) );

        if ( $hash != $request_data['V2_HASH']) return abort(404);

        $order_info = PaymentDeposit::select(
                'payment_deposits.id as order_id',
                'users.name as user_name',
                'users.id as user_id',
                'users.balance',
                'payment_deposits.status as status'
            )
            ->leftjoin('users', 'users.id', '=', 'payment_deposits.user_id')
            ->where(['payment_deposits.id' => $request_data['ORDER_NUM']])
            ->first();
        if($order_info->status == 1){            
            PaymentDeposit::where(['payment_deposits.id' => $request_data['ORDER_NUM']])
                ->update([
                    'status' => 5
                ]);
        }
    }
}
