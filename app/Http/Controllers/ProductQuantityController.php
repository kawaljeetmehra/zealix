<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\ProductQuantity;
use Illuminate\Http\Request;

class ProductQuantityController extends Controller
{
    public function index()
    {
        $quantities = ProductQuantity::all();
        return response()->json($quantities);
    }

    public function store(Request $request)
    {
        Log::info('New quantity saved.', ['quantity' => $request->toArray()]);

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Create a new ProductQuantity instance
        $quantity = new ProductQuantity();
        $quantity->quantity = $request->input('name'); // Set the quantity field
        $quantity->save();

        return response()->json([
            'success' => true,
            'quantity' => [
                'id' => $quantity->id,          // Return the quantity ID
                'quantity' => $quantity->quantity, // Return the quantity name
            ],
        ]);
    }

    public function update(Request $request, $id)
    { Log::info('New quantity saved.', ['quantity' => $request->toArray()]);
        $request->validate([
            'name' => 'required|string|max:100',
        ]);

        $quantity = ProductQuantity::findOrFail($id);
        $quantity->update([
            'quantity' => $request->input('name')
        ]);
        return response()->json([
            'success' => true,
            'quantity' => [
                'id' => $quantity->id,          // Return the quantity ID
                'quantity' => $quantity->quantity, // Return the quantity name
            ],
        ]);
    }

    public function destroy($id)
    {
        $quantity = ProductQuantity::findOrFail($id);
        $quantity->delete();

        return response()->json(['success' => true]);
    }
}
