<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        if (Auth::check()) {


            $role = Auth::user()->role;

            if ($role === 'Admin' || $role === 'Staff' || $role === 'Finance') {
                $this->middleware('Staff')->except('logout');
            } elseif ($role === 'Content Creator') {
                $this->middleware('Content Creator')->except('logout');
            }
        }


        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::check()) {
            return redirect()->intended('dashboard'); // or any other route
        }

        return view('auth.login'); // Return the login view

    }
}
