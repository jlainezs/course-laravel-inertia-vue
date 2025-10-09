<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // receives any form
    public function create()
    {
        return inertia('Auth/Login');
    }

    // create the session
    public function store(Request $request)
    {
        if (!Auth::attempt($request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]), true)) {
            throw ValidationException::withMessages([
                'email' => 'Authentication failed',
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended();
    }

    // logout
    public function destroy()
    {

    }
}
