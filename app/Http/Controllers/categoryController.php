<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Resources\categoryResource;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
         $categories = category::all();
        return categoryResource::collection($categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'category_name' => 'required|string|max:255|unique:categories,category_name',
        ]);

        $category = category::create($validated);

        return new categoryResource($category);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
         $category = category::with('items')->findOrFail($id);
        return new categoryResource($category);
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
         $category = category::findOrFail($id);

        $validated = $request->validate([
            'category_name' => 'sometimes|string|max:255|unique:categories,category_name,' . $category->id,
        ]);

        $category->update($validated);

        return new categoryResource($category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
         $category = category::findOrFail($id);
        $category->delete();

        return response()->json([
            'message' => 'Category deleted successfully'
        ]);
    
    }
}
