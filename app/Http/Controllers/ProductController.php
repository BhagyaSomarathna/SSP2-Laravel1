<?php

namespace App\Http\Controllers;

use App\Models\item;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index($category)
{
    $items = Item::where('category_name', $category)->get();

    return view('products', [
        'items' => $items,
        'category' => $category
    ]);
}

// Show upload form (admin)
    public function uploadForm()
    {
        return view('upload'); // resources/views/upload.blade.php
    }

    // Handle upload POST (admin)
    public function upload(Request $request)
{
    $request->validate([
        'item_name'     => 'required|string|max:255',
        'category_name' => 'required|string|max:255',
        'description'   => 'nullable|string',
        'price'         => 'required|numeric|min:0',
        'img'           => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
    ]);

    // Handle image upload
    if ($request->hasFile('img')) {
        $image    = $request->file('img');
        $fileName = time() . '_' . $image->getClientOriginalName(); // keep original name
        $image->move(public_path('images'), $fileName);
    } else {
        $fileName = null;
    }

    // Create new product
    item::create([
        'item_name'     => $request->item_name,
        'category_name' => $request->category_name,
        'description'   => $request->description,
        'price'         => $request->price,
        'img'           => $fileName,
    ]);

    return redirect()->route('admin.dashboard')->with('success', 'Product uploaded successfully!');
}
}

