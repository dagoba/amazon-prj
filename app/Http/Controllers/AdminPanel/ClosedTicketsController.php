<?php

namespace App\Http\Controllers\AdminPanel;

use DB;
use App\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckAdminGroup;

class ClosedTicketsController extends Controller
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
            'support.name as support_name',
            'support.id as support_id',
            'user.name as user_name',
            'user.id as user_id',
            'tickets.id',
            'tickets.theme',
            'tickets.created_at',
            'tickets.updated_at',
            'tickets.state')
            ->where([
                'state' => FALSE
            ])
            ->leftjoin('users as user', 'user.id', '=', 'author_id')
            ->leftjoin('users as support', 'support.id', '=', 'support_id')
            ->paginate(10);
        $components = [
            'tickets' => $tickets,
        ];
        return view('adminpanel.closedtickets',$components);
    }
}
