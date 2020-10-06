<?php

namespace App\Http\Controllers\Cabinet;

use Validator;
use App\Ticket;
use App\TicketMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AddTicketsController extends Controller
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
        return view('cabinet.addtickets');
    }

    public function ticked_verification_data(array $data)
    {
        $message = [
            'theme.required' => __('controller_cabinet.add_tickets_theme'),
            'message.required' => __('controller_cabinet.add_tickets_message'),
        ];
        $validator = Validator::make($data, [
            'theme' => 'required|max:250',
            'message' => 'required',
        ], $message);

        return $validator;
    }

    public function addTicket(Request $request)
    {
        $request_data = $request->All();
        $validator = $this->ticked_verification_data($request_data);
        if($validator->fails()){
            return response()->json(array('error' => $validator->getMessageBag()->toArray()), 400);
        }else {
            $new_ticket = Ticket::create([
                'theme' => $request_data['theme'],
                'author_id' => Auth::user()->id,
                'status' => 1,
            ]);
            TicketMessage::create([
                'ticket_id' => $new_ticket->id,
                'author_id' => Auth::user()->id,
                'message' => $request_data['message'],
            ]);
            return response()->json(array('success' => __('controller_cabinet.add_tickets_success')), 200);
        }
    }
}
