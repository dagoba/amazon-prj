<?php

namespace App\Http\Controllers\BillPayment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdvCashController extends Controller
{
    public function status(Request $request)
    {
        if (!in_array($_SERVER['REMOTE_ADDR'], array(' 50.7.115.5', '51.255.40.139'))) return;
        
        $request_data = $request->all();
        $key = hash('sha256', $request['ac_transfer'].':'.
        $request['ac_start_date'].':'.
        $request['ac_sci_name'].':'.
        $request['ac_src_wallet'].':'.
        $request['ac_dest_wallet'].':'.
        $request['ac_order_id'].':'.
        $request['ac_amount'].':'.
        $request['ac_merchant_currency'].':'.
        'vjczrjn1');

        if ( $key != $request['ac_hash'] ){
            exit('Ошибка платежа');
        }
        if ($request['ac_transaction_status'] == 'COMPLETED'){            
            PaymentDeposit::where(['id' => $request['ac_order_id']])
                ->update([
                    'status' => 5
                ]);
        } else if($request['ac_transaction_status'] == 'CANCELED'){
            PaymentDeposit::where(['id' => $request['ac_order_id']])
                ->update([
                    'status' => 4
                ]);
        }

    }
}
