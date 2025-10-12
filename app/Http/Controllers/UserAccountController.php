<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class UserAccountController extends Controller
{
    // Renders the register form
    public function create()
    {
        return inertia('UserAccount/Create');
    }

    public function store(Request $request)
    {
        $user = User::make($request->validate([
           'name' => 'required',
           'email' => 'required|email|unique:users',
           'password' => 'required|min:8|confirmed'
        ]));
        $user->save();
        Auth::login($user);


        return redirect()->route('listing.index')
            ->with('success', 'Account created');
    }
}
