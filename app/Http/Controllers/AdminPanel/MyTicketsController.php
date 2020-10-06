<?php

namespace App\Http\Controllers\AdminPanel;

use DB;
use App\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckAdminGroup;

class MyTicketsController extends Controller
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
                'support_id' => Auth::user()->id,
                'state' => TRUE
            ])
            ->join('users', 'users.id', '=', 'author_id')
            ->orderBy('tickets.created_at', 'desc')
            ->paginate(8);
        $components = [
            'tickets' => $tickets,
        ];
        return view('adminpanel.mytickets',$components);
    }
}
