<?php

namespace App\Http\Controllers\AdminPanel;

use DB;
use App;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckAdminGroup;

class AllUsersController extends Controller
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
        $users = User::select(
                'users.id as id', 
                'users.name as name', 
                'users.email as email',
                'users.balance as balance',
                'users.created_at as created_at',
                'user_groups.name_ru as group_ru',
                'user_groups.name_en as group_en',
                'user_groups.id as group_id'
            )
            ->where([
                'verified' => TRUE
            ])
            ->leftjoin('user_groups','user_groups.id','=','users.group')
            ->groupby('users.id')
            ->paginate(20);
        $components = [
            'users' => $users,
        ];
        return view('adminpanel.allusers', $components);
    }

    public function closedUser(Request $request)
    {
        $request_data = $request->All();
        $user = User::where('id',$request_data['user'])->first();
        if($user['verified'] === 0){
            return response()->json(array('error' => [__('controller_adminpanel.all_users_error')]), 400);
        }else if($user['verified'] === 1 && $user['group'] != 1) {
            User::where('id',$request_data['user'])
                ->update([
                    'verified' => 0,
                    'updated_at' => Carbon::now()->toDateTimeString(),
                ]);
            if (App::isLocale('en')) {
                $success = 'You have blocked a user "'.$user->name.'".';
            } else {
                $success = 'Вы заблокировали пользователя "'.$user->name.'".';
            }
            return response()->json(array('success' => $success), 200);
        }else {
            return response()->json(array('error' => [__('controller_adminpanel.standard_error')]), 400);
        }
    }
}
