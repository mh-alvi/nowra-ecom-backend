<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    // Create a new stock entry
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'stock_quantity' => 'required|integer',
            'damage' => 'nullable|integer',
            'return_product' => 'nullable|integer',
        ]);

        $stock = Stock::create($validated);

        return response()->json($stock, 201);
    }

    // Retrieve all stock entries
    public function index()
    {
        return response()->json(Stock::all());
    }

    // Retrieve a specific stock entry
    public function show($id)
    {
        $stock = Stock::findOrFail($id);
        return response()->json($stock);
    }

    // Update a stock entry
    public function update(Request $request, $id)
    {
        $stock = Stock::findOrFail($id);

        $validated = $request->validate([
            'product_id' => 'nullable|integer|exists:products,id',
            'quantity' => 'nullable|integer',
            'damage' => 'nullable|integer',
            'return' => 'nullable|integer',
        ]);

        $stock->update($validated);
        return response()->json($stock);
    }

    // Delete a stock entry
    public function destroy($id)
    {
        $stock = Stock::findOrFail($id);
        $stock->delete();

        return response()->json(['message' => 'Stock deleted successfully']);
    }
}
