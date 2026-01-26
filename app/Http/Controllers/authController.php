<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;
use App\Models\Customer;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validate input
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        $email = trim($request->email);
        $password = trim($request->password);

        /* ---------------- ADMIN LOGIN ---------------- */
        $admin = Admin::where('admin_email', $email)->first();

        if ($admin) {
            if (
                $password === $admin->admin_password ||
                Hash::check($password, $admin->admin_password)
            ) {
                session([
                    'admin_email' => $admin->admin_email
                ]);

                return redirect()->route('admin.dashboard');
            }
        }

        /* ---------------- CUSTOMER LOGIN ---------------- */
        $customer = Customer::where('email_address', $email)->first();

        if ($customer) {
            if (
                $password === $customer->password ||
                Hash::check($password, $customer->password)
            ) {
                session([
                    'customer_ID'    => $customer->customer_ID,
                    'customer_email' => $customer->email_address,
                    'customer_name'  => $customer->customer_name,
                ]);

                return redirect()->route('home');
            }
        }

        /* ---------------- LOGIN FAILED ---------------- */
        return back()->withErrors([
            'email' => 'Invalid email or password'
        ]);
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('login.form');
    }
}
