<?php

namespace App\Http\Controllers\Cabinet;

use DB;
use App\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ActiveTicketsController extends Controller
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
        $tickets = Ticket::where([
            'author_id' => Auth::user()->id,
            'state' => TRUE
            ])->paginate(20);
        $components = [
            'tickets' => $tickets,
        ];
        return  view('cabinet.activetickets', $components);
    }

    public function closedTicked(Request $request)
    {
        $request_data = $request->All();
        $ticket = Ticket::where('id', $request_data['ticket'])->first(); 
        if($ticket->author_id === Auth::user()->id){
            DB::table('tickets')
                ->where('id',$request_data['ticket'])
                ->update([
                    'state' => FALSE,
                    'updated_at' => Carbon::now()->toDateTimeString(),
                ]);
            return response()->json(array('success' => __('controller_cabinet.active_tickets_success')), 200);
        }else{
            return response()->json(array('error' => [__('controller_cabinet.standard_error')]), 400);
        }
    }
}
