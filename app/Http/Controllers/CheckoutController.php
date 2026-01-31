<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;  
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    // Show checkout page
    public function index()
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')
                ->with('error', 'Your cart is empty');
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['qty'];
        }

        return view('checkout.index', compact('cart', 'total'));
    }

    // Handle checkout form submission
   public function placeOrder(Request $request)
{
    $request->validate([
        'customer_name' => 'required|string|max:255',
    ]);

    $cart = session('cart', []);
    if (empty($cart)) {
        return redirect()->route('cart.index')->with('error', 'Your cart is empty');
    }

    $total = 0;
    foreach ($cart as $item) {
        $total += $item['price'] * $item['qty'];
    }

    $order = order::create([
        'order_date'    => now(),
        'delivery_date' => now()->addDays(3),
        'amount'        => $total,
        'customer_name' => $request->customer_name,
    ]);

    Session::forget('cart');

    return redirect()->route('order.confirmation', ['id' => $order->id])
                     ->with('success', 'Order placed successfully!');
}


    // Show order confirmation page
    public function orderConfirmation($id)
    {
        $order = order::findOrFail($id);
        return view('checkout.confirmation', compact('order'));
    }
}
