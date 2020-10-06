<?php

namespace App\Http\Controllers;

use App\User;
use App\Transaction;
use App\PaymentDeposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BillPaymentController extends Controller
{
    // public function advcash(Request $request)
    // {
    //     if (!in_array($_SERVER['REMOTE_ADDR'], array(' 50.7.115.5', '51.255.40.139'))) return;
        
    //     $request_data = $request->all();
    //     $key = hash('sha256', $request['ac_transfer'].':'.
    //     $request['ac_start_date'].':'.
    //     $request['ac_sci_name'].':'.
    //     $request['ac_src_wallet'].':'.
    //     $request['ac_dest_wallet'].':'.
    //     $request['ac_order_id'].':'.
    //     $request['ac_amount'].':'.
    //     $request['ac_merchant_currency'].':'.
    //     'reTroStyle123');

    //     if ( $key != $request['ac_hash'] ){
    //         exit('Ошибка платежа');
    //     }
    //     if ($request['ac_transaction_status'] == 'COMPLETED'){
    //         $desctiption = 'Заявка на пополнение через платежную систему "Advanced Cash" на сумму '.$request_data['ac_amount'].'$.';
    //         $order_info =  PaymentDeposit::select(
    //                 'payment_deposits.id as order_id',
    //                 'users.name as user_name',
    //                 'users.id as user_id',
    //                 'users.balance'
    //             )
    //             ->leftjoin('users', 'users.id', '=', 'payment_deposits.user_id')
    //             ->where(['payment_deposits.id' => $request['ac_order_id']])
    //             ->first();
            
    //         User::where(['id' => $order_info->user_id])
    //             ->update([
    //                 'balance' => $order_info->balance + $request['ac_amount']
    //             ])
    //         $transaction = Transaction::create([
    //                 'user_id' => $order_info->user_id,
    //                 'description' => $desctiption,
    //                 'cost' => $request['ac_amount'],
    //                 'amount_up' => $order_info->balance,
    //                 'amount_after' => $order_info->balance + $request['ac_amount']
    //             ]);
    //         PaymentDeposit::where(['id' => $request['ac_order_id']])
    //             ->update([
    //                 'transaction_id' => $transaction->id,
    //                 'status' => 2
    //             ]);
    //     } else if($request['ac_transaction_status'] == 'CANCELED'){
    //         PaymentDeposit::where(['id' => $request['ac_order_id']])
    //             ->update([
    //                 'status' => 4
    //             ]);
    //     }

    // }

    // public function payeer(Request $request)
    // {
    //     if (!in_array($_SERVER['REMOTE_ADDR'], array('185.71.65.92', '185.71.65.189', '149.202.17.210'))) return;
    // }

    public function perfectmoney(Request $request)
    {
        $secret = strtoupper( md5('UU4X4697wqfypsTSkfeMZwiHJ') );

        $request_data = $request->all();

        $hash = $request_data['PAYMENT_ID'].':'.
        $request_data['PAYEE_ACCOUNT'].':'.
        $request_data['PAYMENT_AMOUNT'].':'.
        $request_data['PAYMENT_UNITS'].':'.
        $request_data['PAYMENT_BATCH_NUM'].':'.
        $request_data['PAYER_ACCOUNT'].':'.
        $secret.':'.
        $request_data['TIMESTAMPGMT'];

        $hash = strtoupper( md5($hash) );

        if ( $hash != $request_data['V2_HASH'] ) exit('error');

        $str = '';
        foreach ($request_data as $key => $value) {
            $str .= $key.': '.$value.'; ';
        }
        // ЗДЕСЬ ЗАПИСЬ В БД ИЛИ ФАЙЛ
        file_put_contents('pay_'.$request_data['ORDER_NUM'].'.txt', $str);

        $order_info = PaymentDeposit::where(['payment_deposits.id' => $request_data['ORDER_NUM']])
            ->first();
        if($order_info->status == 1){
            if($request_data['PAYMENT_BATCH_NUM'] == '680'){
                $desctiption = 'Заявка на пополнение через платежную систему "Perfect Money" на сумму '.$request_data['PAYMENT_AMOUNT'].'$.';

                User::where(['id' => $order_info->user_id])
                    ->update([
                        'balance' => $order_info->balance + $request_data['PAYMENT_AMOUNT']
                    ]);
                $transaction = Transaction::create([
                        'user_id' => $order_info->user_id,
                        'description' => $desctiption,
                        'cost' => $request['PAYMENT_AMOUNT'],
                        'amount_up' => $order_info->balance,
                        'amount_after' => $order_info->balance + $request['PAYMENT_AMOUNT']
                    ]);
                PaymentDeposit::where(['payment_deposits.id' => $request_data['ORDER_NUM'], 'user_id' => Auth::user()->id])
                    ->update([
                        'transaction_id' => $transaction->id,
                        'status' => 2
                    ]);
            }else{
                PaymentDeposit::where(['payment_deposits.id' => $request_data['ORDER_NUM'], 'user_id' => Auth::user()->id])
                ->update([
                    'status' => 3
                ]);
            }            
        }
    }

    public function noPerfectmoney(Request $request)
    {
        $request_data = $request->all();

        if($request_data['PAYMENT_ID'] == Auth::user()->name){
            $order_info = PaymentDeposit::where(['payment_deposits.id' => $request_data['ORDER_NUM']])->first();
            if($order_info->status == 1){
                PaymentDeposit::where(['payment_deposits.id' => $request_data['ORDER_NUM'], 'user_id' => Auth::user()->id])
                    ->update([
                        'status' => 4
                    ]);
            }
        }

        $str = '';
        foreach ($request_data as $key => $value) {
            $str .= $key.': '.$value.'; ';
        }
        // ЗДЕСЬ ЗАПИСЬ В БД ИЛИ ФАЙЛ
        file_put_contents('no_pay_'.$request_data['ORDER_NUM'].'.txt', $str);

        return redirect(route('balance-deposit'));
    }

}
