<?php

namespace App\Http\Controllers\Cabinet;

use DB;
use Validator;
use App\Ticket;
use Carbon\Carbon;
use App\TicketMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ActiveTicketMessagesController extends Controller
{
    public function index($id)
    {
        $ticket = Ticket::where(['id' => $id, 'state' => TRUE])->first();     
        if($ticket['author_id'] == Auth::user()->id){
            $messages = TicketMessage::select(
                    'ticket_messages.id as message_id',
                    'users.id',
                    'users.name',
                    'ticket_messages.message', 
                    'ticket_messages.created_at'
                )
                ->join('users', 'users.id', '=', 'author_id')
                ->where(['ticket_id' => $id])
                ->orderBy('created_at','desc')
                ->get();
            $components = [
                'ticket' => $ticket,
                'messages' => $messages,
            ];
            return view('cabinet.activeticketmessage', $components);
        }else {
            return abort(404);
        }
    }

    public function message_validator_data(array $data)
    {
        $message = [
            'message.required' => __('controller_cabinet.active_ticket_messages_message'),
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
            if($ticket->author_id === Auth::user()->id){
                TicketMessage::create([
                    'ticket_id' => $request_data['ticket'],
                    'author_id' => Auth::user()->id,
                    'message' => $request_data['message'],
                ]);
                DB::table('tickets')
                    ->where('id',$request_data['ticket'])
                    ->update([
                        'status' => 1,
                        'updated_at' => Carbon::now()->toDateTimeString(),
                    ]);

                $last_message = TicketMessage::where([
                        'id' => $request_data['last_message'],
                    ])
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
                    'success' => __('controller_cabinet.active_ticket_messages_success'), 
                    'ticket_messages' => $ticket_messages,
                    'auth_user' => Auth::user()->id,
                ), 200);
            }else {
                return response()->json(array('error' => [__('controller_cabinet.standard_error')]), 400);
            }
        }
    }
    public function addNewMessage(Request $request)
    {
        $request_data = $request->All();
        $last_message = TicketMessage::where([
                'id' => $request_data['message'],
            ])
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
                ['ticket_id', '=', $last_message->ticket_id]
            ])
            ->join('users', 'users.id', '=', 'author_id')
            ->orderBy('ticket_messages.created_at','asc')
            ->get();
        return response()->json(array(            
            'ticket_messages' =>  $ticket_messages,
            'auth_user' => Auth::user()->id
        ), 200);
    }
    
}
