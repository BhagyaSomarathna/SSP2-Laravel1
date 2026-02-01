<?php

namespace App\Http\Controllers;

use App\Models\item;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index($category)
{
    $items = item::where('category_name', $category)->get();

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



    // Display all products
public function manage()
{
    $products = item::orderBy('id', 'desc')->get();
    return view('admin.product.manage', compact('products'));
}

// Show edit form
public function edit($id)
{
   $product = item::findOrFail($id);
    return view('admin.product.edit', compact('product')); // edit form blade
}

// Update product
public function update(Request $request, $id)
{
   $product = item::findOrFail($id);

    $request->validate([
        'item_name' => 'required|string|max:255',
        'category_name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'img' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $data = $request->only(['item_name','category_name','description','price']);

    if ($request->hasFile('img')) {
        $imageName = time().'_'.$request->img->getClientOriginalName();
        $request->img->move(public_path('images'), $imageName);
        $data['img'] = $imageName;
    }

    $product->update($data);

    return redirect()->route('admin.products')->with('success', 'Product updated successfully');
}

// Delete product
public function destroy($id)
{
    item::findOrFail($id)->delete();
    return redirect()->route('admin.products')->with('success', 'Product deleted');
}


}

