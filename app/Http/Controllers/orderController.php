<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\item;
use Illuminate\Http\Request;
use App\Http\Resources\orderResource;

class orderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $orders = Order::with(['customer', 'items'])->get();
        return orderResource::collection($orders);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
         $validated = $request->validate([
            'order_date'    => 'required|date',
            'delivery_date' => 'nullable|date',
            'amount'        => 'required|numeric|min:0',
            'customer_ID'   => 'required|exists:customers,id',
            'items'         => 'required|array',
            'items.*.item_id'  => 'required|exists:items,id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        // Create order
        $order = Order::create([
            'order_date'    => $validated['order_date'],
            'delivery_date' => $validated['delivery_date'] ?? null,
            'amount'        => $validated['amount'],
            'customer_ID'   => $validated['customer_ID'],
        ]);

        // Attach items with quantity (pivot table)
        foreach ($validated['items'] as $item) {
            $order->items()->attach($item['item_id'], [
                'quantity' => $item['quantity']
            ]);
        }

        return new orderResource(
            $order->load(['customer', 'items'])
        );

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $order = Order::with(['customer', 'items'])->findOrFail($id);
        return new orderResource($order);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
         $order = order::findOrFail($id);

        $validated = $request->validate([
            'order_date'    => 'sometimes|date',
            'delivery_date' => 'nullable|date',
            'amount'        => 'sometimes|numeric|min:0',
        ]);

        $order->update($validated);

        return new orderResource(
            $order->load(['customer', 'items'])
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $order = order::findOrFail($id);

        // Remove pivot records
        $order->items()->detach();

        $order->delete();

        return response()->json([
            'message' => 'Order deleted successfully'
        ]);
    }
}
