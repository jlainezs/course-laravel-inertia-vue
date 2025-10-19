<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReaaltorListingController extends Controller
{
    public function index()
    {
        return inertia('Realtor/Index');
    }
}
