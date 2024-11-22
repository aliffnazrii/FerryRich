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
                $this->middleware('Staff');
            } elseif ($role === 'Content Creator') {
                $this->middleware('Content Creator');
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
        if (Auth::check() && Auth::user()->role === 'Content Creator') {

            return redirect()->route('CCDashboard'); // or any other route

        } elseif (Auth::check() && (Auth::user()->role === 'Staff' || Auth::user()->role === 'Admin' || Auth::user()->role === 'Finance')) {

            return redirect()->route('staffDashboard'); // or any other route

        } else {

            return view('auth.login'); // Return the login view
        }

        return view('auth.login'); // Return the login view



    }
}
