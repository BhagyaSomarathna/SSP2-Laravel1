<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;
use App\Http\Resources\customerResource;
use Illuminate\Support\Facades\Hash;


class customerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $customers = customer::all();
        return customerResource::collection($customers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'customer_name'  => 'required|string|max:255',
            'address'        => 'required|string',
            'email_address'  => 'required|email|unique:customers,email_address',
            'contact_number' => 'required|string|max:20',
            'password'       => 'required|string|min:6',
        ]);

        $customer = customer::create([
            'customer_name'  => $validated['customer_name'],
            'address'        => $validated['address'],
            'email_address'  => $validated['email_address'],
            'contact_number' => $validated['contact_number'],
            'password'       => Hash::make($validated['password']),
        ]);

        return new customerResource($customer);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $customer = customer::with('orders')->findOrFail($id);
        return new customerResource($customer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $customer = customer::findOrFail($id);

        $validated = $request->validate([
            'customer_name'  => 'sometimes|string|max:255',
            'address'        => 'sometimes|string',
            'email_address'  => 'sometimes|email|unique:customers,email_address,' . $customer->id,
            'contact_number' => 'sometimes|string|max:20',
            'password'       => 'sometimes|string|min:6',
        ]);

        if (isset($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        }

        $customer->update($validated);

        return new customerResource($customer);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $customer = customer::findOrFail($id);
        $customer->delete();

        return response()->json([
            'message' => 'Customer deleted successfully'
        ]);
    }
}
