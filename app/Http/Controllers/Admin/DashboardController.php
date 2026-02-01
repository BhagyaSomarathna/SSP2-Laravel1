<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; // must import
use Illuminate\Http\Request;
use App\Models\order;
use App\Models\customer;
use App\Models\product;

class DashboardController extends Controller
{
   

    public function index()
    {
        $totalOrders = order::count();
        $totalCustomers = customer::count();
        $totalProducts = product::count();

        return view('admin.dashboard', compact('totalOrders','totalCustomers','totalProducts'));
    }

    public function report()
    {
        $orders = order::all();
        return view('admin.report', compact('orders'));
    }

    public function orders()
    {
        $orders = order::latest()->get();
        return view('admin.orderList', compact('orders'));
    }

    public function customers()
{
    $customers = customer::all();
    return view('admin.customerList', compact('customers'));
}

}
