<?php

namespace App\Http\Controllers;

use App\Models\item;

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

}

