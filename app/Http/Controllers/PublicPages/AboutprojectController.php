<?php

namespace App\Http\Controllers\PublicPages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutprojectController extends Controller
{
    public function index()
    {
        return view('publicpages.aboutproject');
    }
}
