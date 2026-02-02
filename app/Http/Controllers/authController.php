<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\admin;
use App\Models\customer;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email_address' => 'required|email',
            'password'      => 'required'
        ]);

        $email_address = $request->email_address;
        $password      = $request->password;

        /* -------- ADMIN LOGIN -------- */
        $admin = admin::where('admin_email', $email_address)->first();

        if ($admin && Hash::check($password, $admin->admin_password)) {

            // If API login → JSON
            if ($request->route()->getPrefix() === 'api') {
                return response()->json([
                    'message' => 'Admin login successful',
                    'role'    => 'admin',
                    'admin'   => $admin
                ], 200);
            }

            // Web login
            session([
                'admin_id'    => $admin->id,
                'admin_name'  => $admin->admin_name,
                'admin_email' => $admin->admin_email,
                'role'        => 'admin'
            ]);

            return redirect()->route('admin.dashboard');
        }

        /* -------- CUSTOMER LOGIN -------- */
        $customer = customer::where('email_address', $email_address)->first();

        if ($customer && Hash::check($password, $customer->password)) {

            // ✅ API LOGIN → ALWAYS RETURN TOKEN
            if ($request->route()->getPrefix() === 'api') {
                $token = $customer->createToken('API Token')->plainTextToken;

                return response()->json([
                    'message'  => 'Customer login successful',
                    'role'     => 'customer',
                    'customer' => $customer,
                    'token'    => $token
                ], 200);
            }

            // Web login
            session([
                'customer_ID'    => $customer->id,
                'customer_name'  => $customer->customer_name,
                'email_address'  => $customer->email_address,
                'role'           => 'customer'
            ]);

            return redirect('/');
        }

        // Invalid credentials
        if ($request->route()->getPrefix() === 'api') {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        return back()->withErrors([
            'email_address' => 'These credentials do not match our records'
        ])->withInput();
    }

    public function logout(Request $request)
    {
        $request->session()->flush();

        if ($request->user()) {
            $request->user()->currentAccessToken()?->delete();
        }

        if ($request->route()->getPrefix() === 'api') {
            return response()->json(['message' => 'Logged out successfully'], 200);
        }

        return redirect()->route('login');
    }
}
