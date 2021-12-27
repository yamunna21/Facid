<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class DashBoardController extends Controller
{
    // Prevent guest from going to dashboard
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        return view('dashboard');
    }
}
