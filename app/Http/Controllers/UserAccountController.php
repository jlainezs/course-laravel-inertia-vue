<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAccountController extends Controller
{
    // Renders the register form
    public function create()
    {
        return inertia('UserAccount/Create');
    }
}
