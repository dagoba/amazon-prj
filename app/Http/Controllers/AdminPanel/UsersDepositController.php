<?php

namespace App\Http\Controllers\AdminPanel;

use App;
use App\User;
use App\Transaction;
use App\PaymentStatuse;
use App\PaymentDeposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckAdminGroup;

class UsersDepositController extends Controller
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
    public function index()
    {
        $payment_deposits = PaymentDeposit::select(
            'payment_deposits.id',
            'payment_deposits.description',
            'user.name as user_name',
            'user.id as user_id',
            'operator.name as operator_name',
            'payment_deposits.amount',
            'payment_systems.title as system_title',
            'payment_statuses.title_ru as status_ru',
            'payment_statuses.title_en as status_en',
            'payment_deposits.status',
            'payment_deposits.created_at'
        )
            ->leftjoin('payment_systems','payment_systems.id','=','payment_deposits.payment_id')
            ->leftjoin('payment_statuses','payment_statuses.id','=','payment_deposits.status')
            ->leftjoin('users as user', 'user.id', '=', 'user_id')
            ->leftjoin('users as operator', 'operator.id', '=', 'operator_id')
            ->orderBy('payment_deposits.created_at', 'desc')
            ->paginate(20);
        if (App::isLocale('en')) {
            $statuse = PaymentStatuse::select('id','title_en as title')->get();
        }else {
            $statuse = PaymentStatuse::select('id','title_ru as title')->get();
        }
        $components = [
            'payment_deposits' => $payment_deposits,
            'statuse' => $statuse,
        ];
        return view('adminpanel.usersdeposit', $components);
    }

    public function depositBalance(Request $request)
    {
        $request_data = $request->all();
        $payment_deposit = PaymentDeposit::select(
            'payment_deposits.id as order_id',
            'users.name as user_name',
            'users.id as user_id',
            'users.balance',
            'payment_systems.title as system_title',
            'payment_deposits.status',
            'payment_deposits.amount'
        )
        ->leftjoin('users', 'users.id', '=', 'payment_deposits.user_id')
        ->leftjoin('payment_systems', 'payment_systems.id', '=', 'payment_deposits.payment_id')
        ->where(['payment_deposits.id' => $request_data['deposit_id']])
        ->first();
        if (!in_array($payment_deposit->status, [2,3,4])) {
            if($request_data['operation'] == 'closed'){

                PaymentDeposit::where(['payment_deposits.id' => $request_data['deposit_id']])
                    ->update([
                        'operator_id' => Auth::user()->id,
                        'status' => 3
                    ]);

                $status_data = PaymentStatuse::where('id','=',3)->first();
                if (App::isLocale('en')) {
                    $status = $status_data->title_en;
                    
                }else{
                    $status = $status_data->title_ru;
                }
                $success = __('controller_adminpanel.user_balance_mes_stat_4');
                    $data_json = [
                        'success' => $success,
                        'status' => $status,
                        'status_id' => $status_data->id,
                        'deposit_id' => $request_data['deposit_id'],
                        'operator' => Auth::user()->name
                    ];
                return response()->json($data_json, 200);

            }else if($request_data['operation'] == 'confirm'){

                $status_data = PaymentStatuse::where('id','=',2)->first();
                if (App::isLocale('en')) {
                    $status = $status_data->title_en;
                    $desctiption = 'Replenishment through the payment system "'.$payment_deposit->system_title.'" in the amount of '.$payment_deposit->amount.'$.';
                }else{
                    $status = $status_data->title_ru;
                    $desctiption = 'Пополнение через платежную систему "'.$payment_deposit->system_title.'" на сумму '.$payment_deposit->amount.'$.';
                }
                User::where(['id' => $payment_deposit->user_id])
                    ->update([
                        'balance' => $payment_deposit->balance + $payment_deposit->amount
                    ]);
                $transaction = Transaction::create([
                        'user_id' => $payment_deposit->user_id,
                        'description' => $desctiption,
                        'cost' => $payment_deposit->amount,
                        'amount_up' => $payment_deposit->balance,
                        'amount_after' => $payment_deposit->balance + $payment_deposit->amount
                    ]);
                PaymentDeposit::where(['payment_deposits.id' => $request_data['deposit_id']])
                    ->update([
                        'transaction_id' => $transaction->id,
                        'operator_id' => Auth::user()->id,
                        'status' => 2
                    ]);
                    
                    $success = __('controller_adminpanel.user_balance_mes_stat_2');
                    $data_json = [
                        'success' => $success,
                        'status' => $status,
                        'status_id' => $status_data->id,
                        'deposit_id' => $request_data['deposit_id'],
                        'operator' => Auth::user()->name
                    ];
                    return response()->json($data_json, 200);
            }else {
                return response()->json(array('error' => [__('controller_adminpanel.standard_error')]), 400);
            }
        }else {
            return response()->json(array('error' => [__('controller_adminpanel.standard_error')]), 400);
        }
    }

}
