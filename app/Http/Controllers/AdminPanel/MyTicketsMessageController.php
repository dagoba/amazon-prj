<?php

namespace App\Http\Controllers\AdminPanel;

use DB;
use Validator;
use App\Ticket;
use Carbon\Carbon;
use App\TicketMessage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\CheckAdminGroup;

class MyTicketsMessageController extends Controller
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
        $ticket = Ticket::where(['id' => $id, 'state' => TRUE])->first();   
        if($ticket->author_id != Auth::user()->id){ 
            $messages = TicketMessage::select(
                    'ticket_messages.id as message_id',
                    'users.id',
                    'users.name',
                    'ticket_messages.message', 
                    'ticket_messages.created_at'
                )
                ->join('users', 'users.id', '=', 'author_id')
                ->orderBy('created_at','desc')
                ->where(['ticket_id' => $id])
                ->get();
            $components = [
                'ticket' => $ticket,
                'messages' => $messages,
            ];
            return view('adminpanel.myticketsmessage', $components);
        }else {
            return abort(404);
        }
    }

    public function message_validator_data(array $data)
    {
        $message = [
            'message.required' => __('controller_adminpanel.my_tickets_message_message'),
        ];
        $validator = Validator::make($data, [
            'message' => 'required',
        ], $message);
        
        return $validator;
    }

    public function addMessage(Request $request)
    {
        $request_data = $request->All();
        $validator = $this->message_validator_data($request_data);
        $ticket = Ticket::where('id', $request_data['ticket'])->first(); 
        if ($validator->fails()) {
            return response()->json(array('error' => $validator->getMessageBag()->toArray()), 400);
        }else {
            TicketMessage::create([
                'ticket_id' => $request_data['ticket'],
                'author_id' => Auth::user()->id,
                'message' => $request_data['message'],
            ]);
            DB::table('tickets')
                ->where('id',$request_data['ticket'])
                ->update([
                    'status' => 2,
                    'updated_at' => Carbon::now()->toDateTimeString(),
                ]);
            // return "Message sent. Wait for a response from the support service.";

            $last_message = TicketMessage::where([
                    'id' => $request_data['last_message'],
                ])
                ->limit(1)
                ->first();
            $ticket_messages = TicketMessage::select(
                    'ticket_messages.id as ticket_id',
                    'users.id as author_id',
                    'users.name',
                    'ticket_messages.message',
                    'ticket_messages.created_at'                    
                )
                ->where([
                    ['ticket_messages.id','>',$last_message->id],
                    ['ticket_id', '=', $request_data['ticket']]
                ])
                ->join('users', 'users.id', '=', 'author_id')
                ->orderBy('ticket_messages.created_at','asc')
                ->get();
            return response()->json(array(
                'success' => __('controller_adminpanel.my_tickets_message_success'), 
                'ticket_messages' => $ticket_messages,
                'auth_user' => Auth::user()->id,
            ), 200);
        }
    }
}
