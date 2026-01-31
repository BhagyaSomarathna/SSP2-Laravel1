<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\order;
use App\Models\customer;
use App\Models\product;

class DashboardController extends Controller
{
    // Ensure only authenticated admins access
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Admin Dashboard Home
    public function index()
    {
        $totalOrders = order::count();
        $totalCustomers = customer::count();
        $totalProducts = product::count();

        return view('dashboard', compact('totalOrders', 'totalCustomers', 'totalProducts'));
    }

    // Sales Report
    public function report()
    {
        // Example: get all orders
        $orders = order::with('customer', 'products')->get();
        return view('report', compact('orders'));
    }

    // Orders List
    public function orders()
    {
        $orders = order::with('customer', 'products')->latest()->get();
        return view('orderList', compact('orders'));
    }

    // Customers List
    public function customers()
    {
        $customers = customer::all();
        return view('customerList', compact('customers'));
    }
}
