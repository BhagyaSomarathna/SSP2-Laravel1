<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\admin;
use App\Models\customer;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        $email = trim($request->email);
        $password = $request->password;

        /* -------- ADMIN LOGIN -------- */
        $admin = admin::where('admin_email', $email)->first();

        if ($admin && Hash::check($password, $admin->admin_password)) {

            session([
                'admin_id'    => $admin->id,
                'admin_email' => $admin->admin_email,
                'admin_name'  => $admin->admin_name,
                'role'        => 'admin',
            ]);

            return redirect()->route('admin.dashboard');
        }

        /* -------- CUSTOMER LOGIN -------- */
        $customer = customer::where('email_address', $email)->first();

        if ($customer && Hash::check($password, $customer->password)) {

            session([
                'customer_ID'    => $customer->customer_ID,
                'customer_email' => $customer->email_address,
                'customer_name'  => $customer->customer_name,
                'role'           => 'customer',
            ]);

            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'These credentials do not match our records'
        ]);
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('login');
    }
}
