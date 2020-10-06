<?php

namespace App\Http\Controllers\BillPayment;

use App\User;
use App\Transaction;
use App\PaymentDeposit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PayeerController extends Controller
{
    public function status(Request $request)
    {
        $request_data = $request->all();
        $str = '';
        foreach ($request_data as $key => $value) {
            $str .= $key.': '.$value.'; ';
        }
        file_put_contents('Payeer_'.date('H-i-s_d-m-Y').'.txt', $str);

        if (!in_array($_SERVER['REMOTE_ADDR'], array('185.71.65.92', '185.71.65.189', '149.202.17.210'))) return;

        if (isset($request_data['m_operation_id']) && isset($request_data['m_sign']))
        {
            $m_key = 'W8rYFtLEyxIFQXSH';

            $arHash = array(
                $request_data['m_operation_id'],
                $request_data['m_operation_ps'],
                $request_data['m_operation_date'],
                $request_data['m_operation_pay_date'],
                $request_data['m_shop'],
                $request_data['m_orderid'],
                $request_data['m_amount'],
                $request_data['m_curr'],
                $request_data['m_desc'],
                $request_data['m_status']
            );

            if (isset($request_data['m_params']))
            {
                $arHash[] = $request_data['m_params'];
            }

            $arHash[] = $m_key;

            $sign_hash = strtoupper(hash('sha256', implode(':', $arHash)));

            if ($request_data['m_sign'] == $sign_hash && $request_data['m_status'] == 'success')
            {
                $order_info = PaymentDeposit::select(
                        'payment_deposits.id as order_id',
                        'users.name as user_name',
                        'users.id as user_id',
                        'users.balance',
                        'payment_deposits.status as status'
                    )
                    ->leftjoin('users', 'users.id', '=', 'payment_deposits.user_id')
                    ->where(['payment_deposits.id' => $request_data['m_orderid']])
                    ->first();
                if($order_info->status == 1){                    
                    PaymentDeposit::where(['payment_deposits.id' => $request_data['m_orderid']])
                        ->update([
                            'status' => 5
                        ]);
                }
            }else{
                $order_info = PaymentDeposit::where(['payment_deposits.id' => $request_data['m_orderid']])->first();
                if($order_info->status == 1){
                    PaymentDeposit::where(['payment_deposits.id' => $request_data['m_orderid']])
                        ->update([
                            'status' => 4
                        ]);
                }
            }

        }
    }
}
