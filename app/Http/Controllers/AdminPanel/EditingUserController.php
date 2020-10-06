<?php

namespace App\Http\Controllers\AdminPanel;

use App;
use App\User;
use Validator;
use App\UserGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckAdminGroup;

class EditingUserController extends Controller
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
    public function index($id)
    {
        $user = User::where(['id' => $id])->first();
        $user_groups = UserGroup::get();
        $components = [
            'user' => $user,
            'user_groups' => $user_groups
        ];
        return view('adminpanel.editinguser', $components);
    }

    public function user_verification_data(array $data)
    {
        $messages = [
            'name.required' => __('controller_adminpanel.editing_user_name'),
            'email.required' => __('controller_adminpanel.editing_user_email'),
            'user_id.required' => __('controller_adminpanel.editing_user_user_id')
        ];

        $validator = Validator::make($data, [
            'name' => 'required|alpha_dash|max:100',
            'firstname' => 'nullable|max:150',
            'lastname' => 'nullable|max:150',
            'address' => 'nullable|max:255',
            'city' => 'nullable|max:150',
            'country' => 'nullable|max:150',
            'postcode' => 'nullable|integer',
            'aboutme' => 'nullable|max:500',
            'email' => 'sometimes|required|email|max:150|unique:users,email,'.$data['user_id'],  
            'rating' => 'between:0.00,5.00',
            
        ], $messages);

        return $validator;
    }  

    public function userEdit(Request $request)
    {
        $request_data = $request->All();
        $validator = $this->user_verification_data($request_data);
        if($validator->fails())
        {
            return response()->json(array('error' => $validator->getMessageBag()->toArray()), 400);
        } else {
            User::where(['id' => $request_data['user_id']])
                ->update([
                    'name' => $request_data['name'], 
                    'firstname' => htmlspecialchars($request_data['firstname']), 
                    'lastname' => htmlspecialchars($request_data['lastname']), 
                    'address' => htmlspecialchars($request_data['address']),
                    'city' => htmlspecialchars($request_data['city']),
                    'country' => htmlspecialchars($request_data['country']),
                    'postcode' => $request_data['postcode'],
                    'aboutme' => htmlspecialchars($request_data['aboutme']),
                    'email' => $request_data['email'],
                    'rating' => $request_data['rating'],
                    'group' => $request_data['group'],
                ]);
            if (App::isLocale('en')) {
                $success = 'User data "'.$request_data['name'].'" successfully changed.';
            } else {
                $success = 'Данные пользователя "'.$request_data['name'].'" успешно изменены.';
            }
            return response()->json(array('success' => $success), 200);
        }
    }
}
