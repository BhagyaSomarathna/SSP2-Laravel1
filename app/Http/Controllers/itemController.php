<?php

namespace App\Http\Controllers;

use App\Models\item;
use Illuminate\Http\Request;
use App\Http\Resources\itemResource;

class itemController extends Controller
{
    public function index()
    {
        $items = item::all();
        return itemResource::collection($items);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

    $validated = $request->validate([
            'item_name'     => 'required|string|max:255',
            'category_name' => 'required|string|max:255',
            'price'         => 'required|numeric|min:0',
            'description'   => 'nullable|string',
            'img'           => 'nullable|string',
        ]);

        $item = item::create($validated);

        return new itemResource($item);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $item = Item::findOrFail($id);
        return new itemResource($item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
         $item = Item::findOrFail($id);

        $validated = $request->validate([
            'item_name'     => 'sometimes|string|max:255',
            'category_name' => 'sometimes|string|max:255',
            'price'         => 'sometimes|numeric|min:0',
            'description'   => 'nullable|string',
            'img'           => 'nullable|string',
        ]);

        $item->update($validated);

        return new itemResource($item);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
         $item = item::findOrFail($id);
        $item->delete();

        return response()->json([
            'message' => 'Item deleted successfully'
        ]);
    }
}
