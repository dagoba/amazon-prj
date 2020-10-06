<?php

namespace App\Http\Controllers\AdminPanel;

use App;
use App\User;
use App\Transaction;
use App\PaymentWithdrawal;
use App\PaymentStatuse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckAdminGroup;

class UsersWithdrawalController extends Controller
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
        $payment_withdrawals = PaymentWithdrawal::select(
            'payment_withdrawals.id',
            'payment_withdrawals.description',
            'user.name as user_name',
            'user.id as user_id',
            'operator.name as operator_name',
            'payment_withdrawals.amount',
            'payment_systems.title as system_title',
            'payment_withdrawals.requisites',
            'payment_withdrawals.status as status',
            'payment_statuses.title_ru as status_ru',
            'payment_statuses.title_en as status_en',
            'payment_withdrawals.created_at',
            'payment_withdrawals.user_comment'
        )
            ->leftjoin('payment_systems','payment_systems.id','=','payment_withdrawals.payment_id')
            ->leftjoin('payment_statuses','payment_statuses.id','=','payment_withdrawals.status')
            ->leftjoin('users as user', 'user.id', '=', 'user_id')
            ->leftjoin('users as operator', 'operator.id', '=', 'operator_id')
            ->orderBy('payment_withdrawals.created_at', 'desc')
            ->paginate(20);
        if (App::isLocale('en')) {
            $statuse = PaymentStatuse::select('id','title_en as title')->whereIn('id',[1,2,3])->get();
        }else {
            $statuse = PaymentStatuse::select('id','title_ru as title')->whereIn('id',[1,2,3])->get();
        }
        $components = [
            'payment_withdrawals' => $payment_withdrawals,
            'statuse' => $statuse,
        ];
        return view('adminpanel.userswithdrawal', $components);
    }

    public function withdrawalBalance(Request $request)
    {
        $request_data = $request->all();
        $withdrawal = PaymentWithdrawal::where('id','=',$request_data['withdrawa_id'])->first();
        if (!in_array($withdrawal->status, [2,3,4])) {
            if ($request_data['withdrawa_operation'] == 'confirm') {                
                PaymentWithdrawal::where(['id' => $request_data['withdrawa_id']])
                    ->update([
                        'operator_id' => Auth::user()->id,
                        'operator_comment' => $request_data['comment'],
                        'status' => 2
                    ]);
                $status_data = PaymentStatuse::where('id','=',2)->first();
                if (App::isLocale('en')) {
                    $status = $status_data->title_en;
                }else {
                    $status = $status_data->title_ru;
                }
                $success = __('controller_adminpanel.withdrawal_done');
                $data_json = [
                    'success' => $success,
                    'status' => $status,
                    'status_id' => $status_data->id,
                    'withdrawa_id' => $request_data['withdrawa_id'],
                    'operator' => Auth::user()->name
                ];
                return response()->json($data_json, 200);
            } else if ($request_data['withdrawa_operation'] == 'closed') {

                $status_data = PaymentStatuse::where('id','=',3)->first();
                if (App::isLocale('en')) {
                    $status = $status_data->title_en;
                }else {
                    $status = $status_data->title_ru;
                }                
                $success = __('controller_adminpanel.withdrawal_reject_1');
                $desctiption = __('controller_adminpanel.withdrawal_reject_2').', ID "'.$withdrawal->id.'".';
                $user = User::where(['id' => $withdrawal->user_id])->first();
                User::where(['id' => $withdrawal->user_id])
                    ->update([
                        'balance' => $user->balance + $withdrawal->amount
                    ]);
                Transaction::create([
                    'user_id' => $user->id,
                    'cost' => $withdrawal->amount,
                    'description' => $desctiption,
                    'amount_up' => $user->balance,
                    'amount_after' => $user->balance + $withdrawal->amount
                ]);
                PaymentWithdrawal::where(['id' => $request_data['withdrawa_id']])
                    ->update([
                        'operator_id' => Auth::user()->id,
                        'operator_comment' => $request_data['comment'],
                        'status' => 4
                    ]);
                
                $data_json = [
                    'success' => $success,
                    'status' => $status,
                    'status_id' => $status_data->id,
                    'withdrawa_id' => $request_data['withdrawa_id'],
                    'operator' => Auth::user()->name
                ];
                    return response()->json($data_json, 200);         
            } else {
                return response()->json(array('error' => [__('controller_adminpanel.standard_error')]), 400);
            }
        }else {
            return response()->json(array('error' => [__('controller_adminpanel.standard_error')]), 400);
        }
    }
}
