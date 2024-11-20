<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {

        $id = Auth::user()->id;

        if (Auth::user()->role == 'Content Creator') {
            $user = User::where('role', 'Content Creator')->findOrFail($id);
            return view('cc.profile-cc', compact('user'));
        } else {
            $users = User::where('role', 'Content Creator')->get();
            return view('staff.list-cc', compact('users'));
        }
    }


    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email', // Check for unique email
            'password' => 'required|string|min:8|confirmed', // Require confirmation
            'phone' => 'nullable|string|max:20', // Allow phone to be optional
            'role' => 'required|string|in:admin,user', // Ensure role is valid
        ]);

        User::create($request->all());
        return redirect()->route('users.index')->with('success', 'User  created successfully.');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        if (Auth::user()->role == 'Staff' || Auth::user()->role == 'Admin') {
            return view('staff.profile', compact('user'));
        } else {
            return view('cc.profile-cc', compact('user'));
        }
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'nullable|string|max:20',
        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect()->back()->with('success', 'Information  updated successfully.');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('users.index')->with('success', 'User  deleted successfully.');
    }


    #ADDITIONAL FUNCTION 




}
