<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        // Auth::user() will return the currently logged-in customer
        $customer = Auth::check() ? Auth::user() : null;

        return view('profile', compact('customer'));
    }
}
