<?php

namespace App\Http\Controllers\Cabinet;

use Validator;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class ChangepasswordController extends Controller
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
        return view('cabinet.changepassword');
    }

    public function password_verification_data(array $data)
    {
        $messages = [
            'current-password.required' => __('controller_cabinet.change_password_current'),
            'password.required' => __('controller_cabinet.change_password_password'),
        ];

        $validator = Validator::make($data, [
            'current-password' => 'required',
            'password' => 'required|same:password',
            'password_confirmation' => 'required|same:password',     
        ], $messages);

        return $validator;
    }  
    public function postCredentials(Request $request)
    {
        
            $request_data = $request->All();
            $validator = $this->password_verification_data($request_data);
            if($validator->fails())
            {
                return response()->json(array('error' => $validator->getMessageBag()->toArray()), 400);
            }
            else
            {  
                $current_password = Auth::User()->password;           
                if(Hash::check($request_data['current-password'], $current_password))
                {           
                    $user_id = Auth::User()->id;                       
                    $obj_user = User::find($user_id);
                    $obj_user->password = Hash::make($request_data['password']);
                    $obj_user->save(); 
                    return response()->json(array('success' => [__('controller_cabinet.change_password_success')]), 200);
                }
                else
                {           
                    $error = array('current-password' => __('controller_cabinet.change_password_correct_current'));
                    return response()->json(array('error' => $error), 400);   
                }
            }        
 
    }

}
