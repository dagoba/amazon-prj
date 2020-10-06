<?php

namespace App\Http\Controllers\BillPayment;

use App\User;
use App\Transaction;
use App\PaymentDeposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class PayPalController extends Controller
{
    public function success(Request $request)
    {
        $request_data = $request->all();
        ////////////////
        $str = '';
        foreach ($request_data as $key => $value) {
            $str .= $key.': '.$value.'; ';
        }
        file_put_contents('success_'.date('H-i-s_d-m-Y').'.txt', $str);
        /////////////////
        // $paypalemail = "AMZ-Corporate-facilitator@yandex.ru";
        // $currency    = "USD";

        // $postdata=""; 
        // foreach ($request_data as $key=>$value) $postdata.=$key."=".urlencode($value)."&"; 
        // $postdata .= "cmd=_notify-validate"; 
        // $curl = curl_init("https://www.paypal.com/cgi-bin/webscr"); 
        // curl_setopt ($curl, CURLOPT_HEADER, 0); 
        // curl_setopt ($curl, CURLOPT_POST, 1); 
        // curl_setopt ($curl, CURLOPT_POSTFIELDS, $postdata); 
        // curl_setopt ($curl, CURLOPT_SSL_VERIFYPEER, 0); 
        // curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1); 
        // curl_setopt ($curl, CURLOPT_SSL_VERIFYHOST, 1); 
        // $response = curl_exec ($curl); 
        // curl_close ($curl); 
        // if ($response != "VERIFIED") return redirect(route('balance-deposit'));

        // if ($_POST['receiver_email'] != $paypalemail || $_POST["txn_type"] != "web_accept") return redirect(route('balance-deposit')); 

        // $order_info = PaymentDeposit::select(
        //         'payment_deposits.id as order_id',
        //         'users.name as user_name',
        //         'users.id as user_id',
        //         'users.balance',
        //         'payment_deposits.status as status'
        //     )
        //     ->leftjoin('users', 'users.id', '=', 'payment_deposits.user_id')
        //     ->where(['payment_deposits.id' => $request_data['item_number']])
        //     ->first();
        // if($order_info->status == 1){
        //     if($request_data['INTERFACE_LANGUAGE'] == 'en'){
        //         $desctiption = 'Replenishment through the payment system "PayPal" in the amount of '.$request_data['mc_gross'].'$.';
        //     }else{
        //         $desctiption = 'Пополнение через платежную систему "PayPal" на сумму '.$request_data['mc_gross'].'$.';
        //     }
        //     User::where(['id' => $order_info->user_id])
        //         ->update([
        //             'balance' => $order_info->balance + $request_data['mc_gross']
        //         ]);
        //     $transaction = Transaction::create([
        //             'user_id' => $order_info->user_id,
        //             'description' => $desctiption,
        //             'cost' => $request['mc_gross'],
        //             'amount_up' => $order_info->balance,
        //             'amount_after' => $order_info->balance + $request['mc_gross']
        //         ]);
        //     PaymentDeposit::where(['payment_deposits.id' => $request_data['item_number'], 'user_id' => Auth::user()->id])
        //         ->update([
        //             'transaction_id' => $transaction->id,
        //             'status' => 5
        //         ]);
        // }
        // return redirect(route('balance-deposit'));

    }
    public function error(Request $request)
    {
        $request_data = $request->all();

        ////////////////
        $str = '';
        foreach ($request_data as $key => $value) {
            $str .= $key.': '.$value.'; ';
        }
        file_put_contents('error_'.date('H-i-s_d-m-Y').'.txt', $str);
        /////////////////

        // if($request_data['username'] == Auth::user()){
        //     $order_info = PaymentDeposit::where(['payment_deposits.id' => $request_data['item_number']])->first();
        //     if($order_info->status == 1){
        //         PaymentDeposit::where(['payment_deposits.id' => $request_data['item_number'], 'user_id' => Auth::user()->id])
        //             ->update([
        //                 'status' => 4
        //             ]);
        //     }
        // }
        // return redirect(route('balance-deposit'));

    }



    public function successGet(Request $request)
    {
        $request_data = $request->all();
        ////////////////
        $str = '';
        foreach ($request_data as $key => $value) {
            $str .= $key.': '.$value.'; ';
        }
        file_put_contents('successGet_'.date('H-i-s_d-m-Y').'txt', $str);
        /////////////////
    }
    public function errorGet(Request $request)
    {
        $request_data = $request->all();
        ////////////////
        $str = '';
        foreach ($request_data as $key => $value) {
            $str .= $key.': '.$value.'; ';
        }
        file_put_contents('errorGet_'.date('H-i-s_d-m-Y').'.txt', $str);
        /////////////////
    }

    public function status(Request $request)
    {
        $request_data = $request->all();
        ////////////////
        $str = '';
        foreach ($request_data as $key => $value) {
            $str .= $key.': '.$value.'; ';
        }
        file_put_contents('status_'.date('H-i-s_d-m-Y').'.txt', $str);
        /////////////////
    }
    public function statusGet(Request $request)
    {
        $request_data = $request->all();
        ////////////////
        $str = '';
        foreach ($request_data as $key => $value) {
            $str .= $key.': '.$value.'; ';
        }
        file_put_contents('statusGet_'.date('H-i-s_d-m-Y').'.txt', $str);
        /////////////////
    }
}
