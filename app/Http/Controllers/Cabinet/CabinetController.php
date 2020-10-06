<?php

namespace App\Http\Controllers\Cabinet;

use DB;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CabinetController extends Controller
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
        return view('cabinet.cabinet');
    }

    public function user_verification_data(array $data)
    {
        $messages = [
            'name.required' => __('controller_cabinet.cabinet_name'),
            'email.required' => __('controller_cabinet.cabinet_email'),
        ];

        $validator = Validator::make($data, [
            'name' => 'required|alpha_dash|max:100',
            'firstname' => 'nullable|alpha_dash|max:150',
            'lastname' => 'nullable|alpha_dash|max:150',
            'address' => 'nullable|max:255',
            'city' => 'nullable|alpha_dash|max:150',
            'country' => 'nullable|alpha_dash|max:150',
            'postcode' => 'nullable|integer',
            'aboutme' => 'nullable|max:500',
            'email' => 'sometimes|required|email|max:150|unique:users,email,'.Auth::user()->id,  
            
        ], $messages);

        return $validator;
    }  

    public function editProfile(Request $request)
    {
        $request_data = $request->All();
        $validator = $this->user_verification_data($request_data);
        if($validator->fails())
        {
            return response()->json(array('error' => $validator->getMessageBag()->toArray()), 400);
        } else {
            $request->user()->fill([
                'name' => $request_data['name'], 
                'firstname' => $request_data['firstname'], 
                'lastname' => $request_data['lastname'], 
                'address' => htmlspecialchars($request_data['address']),
                'city' => $request_data['city'],
                'country' => $request_data['country'],
                'postcode' => $request_data['postcode'],
                'aboutme' => htmlspecialchars($request_data['aboutme']),
                'email' => $request_data['email'], 
            ])->save();
            return response()->json(array('success' => [__('controller_cabinet.cabinet_success')]), 200);
        }
    }

    public function uploadAvatar(Request $request)
    {
        if($request->file('avatar')){  
            $validator = Validator::make($request->all(), [
                'avatar' => 'required|image|mimes:jpg,jpeg,png|max:5000',
            ]);
        
            if ($validator->fails()) {
                return $validator->errors()->all();
            }else {
                $avatar = $request->file('avatar')->store('uploads/avatars', 'public');
                $request->user()->fill([
                    'avatar' => $avatar
                ])->save();
                    // return redirect('cabinet');
                return response()->json(array('success' => 'Новый аватар загружен.'), 200);
            }
        }else {
            return response()->json(array('error' => ['Для загрузки выберете подходящую картинку']), 400);
        }

    }
}
