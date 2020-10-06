<?php

namespace App\Http\Controllers\Cabinet;

use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ClosedTicketsController extends Controller
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
        $tickets = Ticket::select(
            'tickets.id', 
            'tickets.theme', 
            'users.name as support', 
            'tickets.updated_at',
            'tickets.created_at')
            ->where([
                'author_id' => Auth::user()->id,
                'state' => FALSE
            ])
            ->leftjoin('users', 'users.id','=','tickets.support_id')
            ->paginate(20);
        $components = [
            'tickets' => $tickets,
        ];
        return view('cabinet.closedtickets', $components);
    }
}
