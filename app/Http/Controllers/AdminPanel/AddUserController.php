<?php

namespace App\Http\Controllers\AdminPanel;

use App;
use App\User;
use Validator;
use App\UserGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckAdminGroup;

class AddUserController extends Controller
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
        $user_groups = UserGroup::get();
        $components = [
            'user_groups' => $user_groups
        ];
        return view('adminpanel.adduser',$components);
    }

    public function user_verification_data(array $data)
    {
        $messages = [
            'name.required' => __('controller_adminpanel.add_user_name'),
            'email.required' => __('controller_adminpanel.add_user_email'),
            'password.required' => __('controller_adminpanel.add_user_password'),
            'password_confirmation.required' => __('controller_adminpanel.add_user_password_confirmation')
        ];

        $validator = Validator::make($data, [
            'name' => 'required|alpha_dash|max:100',
            'role' => 'required|integer',
            'email' => 'sometimes|required|email|max:150|unique:users',
            'password' => 'required|same:password',
            'password_confirmation' => 'required|same:password',     
        ], $messages);

        return $validator;
    }  

    public function addUser(Request $request)
    {
        $request_data = $request->All();
        $validator = $this->user_verification_data($request_data);
        if($validator->fails())
        {
            return response()->json(array('error' => $validator->getMessageBag()->toArray()), 400);
        } else {
            User::create([
                'name' => $request_data['name'],
                'email' => $request_data['email'],
                'group' => $request_data['role'],
                'verified' => TRUE,
                'password' => bcrypt($request_data['password']),
                'affiliate_id' => str_random(10),
            ]);
            if (App::isLocale('en')) {
                $success = 'User "'.$request_data['name'].'" created successfully.';
            }else {
                $success = 'Пользователь "'.$request_data['name'].'" успешно создан.';
            }
            return response()->json(array('success' => [$success]), 200);
        }
    }
}
