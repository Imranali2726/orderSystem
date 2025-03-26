<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return Product::orderBy('id','DESC')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        // Create the product
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
        ]);

        return response()->json(['message' => 'Product created successfully.'], 201);
    }
}
