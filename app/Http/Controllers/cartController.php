<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    // Show cart
    public function index()
    {
        $cart = session('cart', []);
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['qty'];
        }
        return view('cart', compact('cart', 'total'));
    }

    // Add product to cart
    public function add(Request $request)
    {
        $item = $request->only(['id', 'name', 'price', 'img']);
        $item['qty'] = 1;

        $cart = session('cart', []);
        $found = false;

        foreach ($cart as &$cartItem) {
            if ($cartItem['id'] == $item['id']) {
                $cartItem['qty']++;
                $found = true;
                break;
            }
        }

        if (!$found) {
            $cart[] = $item;
        }

        session(['cart' => $cart]);

        return redirect()->route('cart.index')->with('success', "{$item['name']} added to cart!");
    }

    // Remove single item
    public function remove($id)
    {
        $cart = session('cart', []);
        $cart = array_values(array_filter($cart, fn($cartItem) => $cartItem['id'] != $id));
        session(['cart' => $cart]);
        return redirect()->route('cart.index');
    }

    // Clear cart
    public function clear()
    {
        session()->forget('cart');
        return redirect()->route('cart.index');
    }
}
