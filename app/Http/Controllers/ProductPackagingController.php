<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\ProductPackaging;
use Illuminate\Http\Request;

class ProductPackagingController extends Controller
{
    public function index()
    {
        $packaging = ProductPackaging::all();
        return response()->json($packaging);
    }

    public function store(Request $request)
    {
        $request->validate([
            'packaging' => 'required|string|max:255',
        ]);

        // Create a new ProductPackaging instance
        $packaging = new ProductPackaging();
        $packaging->packaging_name = $request->input('packaging'); // Set the packaging_name field
        $packaging->save();

        Log::info('New packaging saved.', ['packaging' => $packaging]);

        return response()->json([
            'success' => true,
            'packaging' => [
                'id' => $packaging->id,             // Return the packaging ID
                'packaging_name' => $packaging->packaging_name, // Return the packaging name
            ],
        ]);
    }

    public function update(Request $request, $id)
    {Log::info('New packaging saved.', ['packaging111111' => $request->toArray()]);
        $request->validate([
            'packaging' => 'required|string|max:100',
        ]);

        $packaging = ProductPackaging::findOrFail($id);
        $packaging->update([
            'packaging_name' => $request->input('packaging')
        ]);

         return response()->json([
            'success' => true,
            'packaging' => [
                'id' => $packaging->id,                  // Return the packaging ID
                'packaging_name' => $packaging->packaging_name, // Return the packaging name
            ],
        ]);
    }

    public function destroy($id)
    {
        $packaging = ProductPackaging::findOrFail($id);
        $packaging->delete();

        return response()->json(['success' => true]);
    }
}
    