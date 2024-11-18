<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Create a new product
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'images' => 'nullable|string',
            'size' => 'nullable|string',
            'price' => 'required|numeric',
            'coupon' => 'nullable|string',
            'discount_price' => 'nullable|numeric',
            'status' => 'required|string',
            'product_code' => 'required|string',
        ]);

        $product = Product::create($validated);

        return response()->json($product, 201);
    }

    // Retrieve all products
    public function index()
    {
        return response()->json(Product::all());
    }

    // Retrieve a specific product
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }

    // Update a product
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'images' => 'nullable|string',
            'size' => 'nullable|string',
            'price' => 'nullable|numeric',
            'coupon' => 'nullable|string',
            'discount_price' => 'nullable|numeric',
            'status' => 'nullable|boolean',
            'product_code' => 'nullable|sting',
        ]);

        $product->update($validated);
        return response()->json($product);
    }

    // Delete a product
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json(['message' => 'Product deleted successfully']);
    }
}
