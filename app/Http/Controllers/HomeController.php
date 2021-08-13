<?php

namespace App\Http\Controllers;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->profile === "reviewer") {
            return view('reviewer.dashboard-reviewer');
        } else if(auth()->user()->profile === "business") {
            return view('business.dashboard-business');
        } else if(auth()->user()->profile === "admin") {
            return view('admin.dashboard-admin');
        }
    }
}
