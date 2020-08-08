<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
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
        $relations = [
            'clients' => \App\Client::all(),
            'doctors' => \App\Employee::all(),
            'appointments' => \App\Appointment::where('start_time', '>=', 'NOW()')->get(), 
        ];
        return view('home', $relations);
    }
}
