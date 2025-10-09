<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // receives any form
    public function create()
    {
        return inertia('Auth/Login');
    }

    // create the session
    public function store()
    {

    }

    // logout
    public function destroy()
    {

    }
}
