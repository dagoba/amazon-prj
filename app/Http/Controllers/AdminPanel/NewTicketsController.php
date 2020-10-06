<?php

namespace App\Http\Controllers\AdminPanel;

use DB;
use App;
use App\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckAdminGroup;

class NewTicketsController extends Controller
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
        $tickets = Ticket::select(
            'tickets.support_id',
            'tickets.state',
            'tickets.id',
            'tickets.theme',
            'tickets.created_at',
            'tickets.updated_at',
            'tickets.author_id',
            'tickets.status',
            'users.name')
            ->where([
                'tickets.support_id' => NULL,
                'tickets.state' => TRUE
            ])
            ->where('tickets.author_id','!=',Auth::user()->id)
            ->leftjoin('users', 'users.id', '=', 'author_id')
            ->orderBy('tickets.created_at', 'desc')
            ->paginate(20);
        $components = [
            'tickets' => $tickets,
        ];
        return view('adminpanel.newtickets',$components);
    }

    public function toDirect(Request $request)
    {
        $request_data = $request->All();
        $ticket = Ticket::where('id',$request_data['theme'])->first();
        if($request_data['action'] === 'remove'){
            if($ticket['state'] === 0){
                return response()->json(array('error' => [__('controller_adminpanel.new_tickets_error')]), 400);
            }elseif($ticket['state'] === 1) {
                DB::table('tickets')
                    ->where('id',$request_data['theme'])
                    ->update([
                        'state' => 0,
                        'updated_at' => Carbon::now()->toDateTimeString(),
                    ]);
                if (App::isLocale('en')) {
                    $success = 'You closed the ticket "'.$ticket->theme.'".';
                } else {
                    $success = 'Вы закрыли билет "'.$ticket->theme.'".';
                }
                return response()->json(array('success' => $success), 200);
            }else {
                return response()->json(array('error' => [__('controller_adminpanel.edit_shops_success')]), 400);
            }            
        }elseif($request_data['action'] === 'add'){
            if($ticket['state'] === 0){
                return response()->json(array('error' => [__('controller_adminpanel.new_tickets_error')]), 400);
            }elseif($ticket['support_id'] === NULL && $ticket['author_id'] != Auth::user()->id) {
                DB::table('tickets')
                    ->where('id',$request_data['theme'])
                    ->update([
                        'support_id' => Auth::user()->id,
                        'updated_at' => Carbon::now()->toDateTimeString(),
                    ]);
                if (App::isLocale('en')) {
                    $success = 'You took the ticket "'.$ticket->theme.'".';
                } else {
                    $success = 'Вы взяли билет "'.$ticket->theme.'".';
                }
                return response()->json(array('success' => $success), 200);
            }else {
                return response()->json(array('error' => [__('controller_adminpanel.edit_shops_success')]), 400);
            } 
        }else {
            return response()->json(array('error' => [__('controller_adminpanel.edit_shops_success')]), 400);
        }
    }
}
