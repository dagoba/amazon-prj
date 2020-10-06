<?php

namespace App\Http\Controllers\Cabinet;

use App;
use Validator;
use App\PaymentSystem;
use App\PaymentStatuse;
use App\PaymentDeposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class BalanceDepositController extends Controller
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
        $payment_deposits = PaymentDeposit::select(
            'payment_deposits.id',
            'payment_deposits.description',
            'payment_deposits.amount',
            'payment_systems.title as system_title',
            'payment_statuses.title_ru as status_ru',
            'payment_statuses.title_en as status_en',
            'payment_deposits.created_at',
            'payment_deposits.status'
        )
            ->leftjoin('payment_systems','payment_systems.id','=','payment_deposits.payment_id')
            ->leftjoin('payment_statuses','payment_statuses.id','=','payment_deposits.status')
            ->orderBy('payment_deposits.created_at', 'desc')
            ->where('user_id', '=', Auth::user()->id)
            ->paginate(10);
        $payment_systems = PaymentSystem::where('stat','=',TRUE)->get();
        if (App::isLocale('en')) {
            $statuse = PaymentStatuse::select('id','title_en as title')->get();
        }else {
            $statuse = PaymentStatuse::select('id','title_ru as title')->get();
        }
        $components = [
            'payment_systems' => $payment_systems,
            'payment_deposits' => $payment_deposits,
            'statuse' => $statuse
        ];
        return view('cabinet.balancedeposits',$components);
    }

    public function deposit_verification_data(array $data)
    {
        $message = [

        ];
        $validator = Validator::make($data, [
            'payment_system' => 'required|max:250',
            'amount' => 'required|between:0.00,9999999.00'
        ], $message);

        return $validator;
    }

    public function depositBalance(Request $request)
    {
        $request_data = $request->all();

        $validator = $this->deposit_verification_data($request_data);
        if($validator->fails())
        {
            return response()->json(array('error' => $validator->getMessageBag()->toArray()), 400);
        } else {
            if ($request_data['amount'] >= 0.01) {
                $payment_systems = PaymentSystem::where('key','=',$request_data['payment_system'])->first();
                if (App::isLocale('en')) {
                    $desctiption = 'Application for replenishment through the payment system "'.$payment_systems->title.'" for the amount of '.$request_data['amount'].'$.';
                    $lang = 'en';
                } else {
                    $desctiption = 'Заявка на пополнение через платежную систему "'.$payment_systems->title.'" на сумму '.$request_data['amount'].'$.';
                    $lang = 'ru';
                }
                
                $payment_info = PaymentDeposit::create([
                    'user_id' => Auth::user()->id,
                    'amount' => $request_data['amount'],
                    'description' => $desctiption,
                    'payment_id' => $payment_systems->id,
                    'status' => 1
                ]);

                if($request_data['payment_system'] == 'advcash'){
                    $ac_account_email = 'amzincorporation@gmail.com';
                    $ac_sci_name = 'amz-corp.com';
                    $ac_currency = 'USD';
                    $secret = 'vjczrjn1';
                    $ac_sign = hash('sha256', $ac_account_email.':'.$ac_sci_name.':'.$payment_info->amount.':'.$ac_currency.':'.$secret.':'.$payment_info->id);
                    $payment_data = [
                        'ac_account_email'=> $ac_account_email,
                        'ac_sci_name'=> $ac_sci_name,
                        'ac_amount'=> $payment_info->amount,
                        'ac_currency'=> $ac_currency,
                        'ac_order_id'=> $payment_info->id,
                        'ac_sign'=> $ac_sign
                    ];
                }else if($request_data['payment_system'] == 'perfectmoney'){
                    $payment_data = [
                        'PAYEE_ACCOUNT' => 'U20938296',
                        'PAYEE_NAME' => $desctiption,
                        'PAYMENT_UNITS' => 'USD',
                        'STATUS_URL' => route('pm-status'),
                        'PAYMENT_URL' => route('pm-success'),
                        'NOPAYMENT_URL' => route('pm-error'),
                        'PAYMENT_ID' => Auth::user()->id,
                        'PAYMENT_AMOUNT' => $payment_info->amount,
                        'BAGGAGE_FIELDS' => 'ORDER_NUM INTERFACE_LANGUAGE',
                        'ORDER_NUM' => $payment_info->id,
                        'TIMESTAMPGMT' => gmdate($payment_info->created_at),
                        'INTERFACE_LANGUAGE' => $lang
                    ];
                }else if($request_data['payment_system'] == 'paypal'){
                    $payment_data = [
                        'cmd' => '_xclick',
                        'business' => 'amz-corporate@yandex.ru',//AMZ-Corporate-facilitator@yandex.ru
                        'item_name' => $desctiption,
                        'item_number' => $payment_info->id,
                        'currency_code' => 'USD',
                        'amount' => $payment_info->amount,
                        'userid' => Auth::user()->id,
                        'cancel_return' => route('balance-deposit'),
                        'return' => route('balance-deposit'),
                        'notify_url' => route('balance-deposit'),
                    ];
                }else if($request_data['payment_system'] == 'btc'){
                    $secret = 'CfA5EcG6jZzsMLGKe162';

                    $gap_limit = 200;

                    $my_xpub = 'xpub6CLRGfYjodEikn4hHLcQwU3HG5EBuXY2K2nyVoBd7hPbH8QpGVnEFXw72VD6dfN8JiQTp71cgyMHBhyWQuw7jxiZMd87aLjGMmUU36sLPex';
                    $my_api_key = '2e8bc286-50f9-4241-9afc-4aa4e3718134';

                    $my_callback_url = 'https://amz-corp.com?invoice_id='.$payment_info->id.'&secret='.$secret;

                    $root_url = 'https://api.blockchain.info/v2/receive';

                    $parameters = 'xpub=' .$my_xpub. '&callback=' .urlencode($my_callback_url). '&key=' .$my_api_key. '&gap_limit=' . $gap_limit;

                   $response = file_get_contents($root_url . '?' . $parameters);

                   $object = json_decode($response);

                    if (App::isLocale('en')) {
                        $desctiption = '<h4 class="card-title">Transfer funds to the specified address:</h4>>';
                    } else {
                        $desctiption = '<h4 class="card-title">Перевести средства на указанный адрес:</h4>';
                    }

                    $payment_data = [
                        'description' => $desctiption,
                        'address' => $object->address
                    ];
                }else if($request_data['payment_system'] == 'payeer'){
                    $m_shop = '813204832';
                    $m_orderid = $payment_info->id;
                    $m_amount = number_format($payment_info->amount, 2, '.', '');
                    $m_curr = 'USD';
                    $m_desc = base64_encode($desctiption);
                    $m_key = 'W8rYFtLEyxIFQXSH';
                    $arHash = array(
                        $m_shop,
                        $m_orderid,
                        $m_amount,
                        $m_curr,
                        $m_desc
                    );
                    $arHash[] = $m_key;
                    $sign = strtoupper(hash('sha256', implode(':', $arHash)));

                    $payment_data = [
                        'm_shop' => $m_shop,
                        'm_orderid' => $m_orderid,
                        'm_amount' => $m_amount,
                        'm_curr' => $m_curr,
                        'm_desc' => $m_desc,
                        'm_sign' => $sign,
                        // 'm_process' => 'send',
                    ];
                }else {
                    return response()->json(array('error' => [__('controller_cabinet.standard_error')]), 400);
                }
                return response()->json(array('success' => __('controller_cabinet.balance_deposit_success'), 'payment_system' => $request_data['payment_system'], 'payment_data' => $payment_data), 200);
            }else {
                return response()->json(array('error' => ['amount' => __('controller_cabinet.balance_deposit_min_sum')]), 400);
            }
        }
    }
}
