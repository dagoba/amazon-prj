<?php

namespace App\Http\Controllers\BillPayment;

use App\User;
use App\Transaction;
use App\PaymentDeposit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BtcController extends Controller
{

    public function btcCurs()
    {
        $exchange_query_result = file_get_contents('https://blockchain.info/ru/ticker');
        $exchange_data_obj = json_decode($exchange_query_result);
        if (isset($exchange_data_obj->USD)) {
            return $exchange_data_obj->USD->last;
        }
        else
            return 12332;
    }

    public function status(Request $request)
    {
        $request_data = $request->all();

        $str = '';
        foreach ($request_data as $key => $value) {
            $str .= $key.': '.$value.'; ';
        }
        // ЗДЕСЬ ЗАПИСЬ В БД ИЛИ ФАЙЛ
        file_put_contents('pay_btc'.'.txt', $str);

        $real_secret = 'CfA5EcG6jZzsMLGKe162';
        $invoice_id = $request_data['invoice_id']; //invoice_id is passed back to the callback URL
        $transaction_hash = $request_data['transaction_hash'];
        $value_in_satoshi = $request_data['value'];
        $value_in_btc = $value_in_satoshi / 100000000;
        $curs = $this->btcCurs();
        $amount = round($curs*$value_in_btc, 2);

        if ($request_data['confirmations'] >= 3) {
            echo '*ok*';
            $order_info = PaymentDeposit::select(
                'payment_deposits.id as order_id',
                'users.name as user_name',
                'users.id as user_id',
                'users.balance',
                'payment_deposits.status as status'
            )
                ->leftjoin('users', 'users.id', '=', 'payment_deposits.user_id')
                ->where(['payment_deposits.id' => $invoice_id])
                ->first();

            if($order_info->status == 1){
                PaymentDeposit::where(['payment_deposits.id' => $invoice_id])
                    ->update([
                        'status' => 5,
                        'amount' => $amount
                    ]);
            }

        } else {
            //Insert into pending payments
            //Don't print *ok* so the notification resent again on next confirmation
        }





    }
}
