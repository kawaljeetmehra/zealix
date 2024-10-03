<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class StockListAdminController extends Controller
{
    //
    public function index(){
        $products = Product::all();
        return view('stockManagement.stocklistAdmin',compact('products'));
    }

    public function updateStock(Request $request)
{
    $product = Product::find($request->id);
    
    if ($product) {
        $product->stock_count = $request->stock_count;
        $product->save();

        return response()->json(['success' => true]);
    }

    return response()->json(['success' => false]);
}

public function stockExipre(){
    // Get current date
    $currentDate = now();

    // Fetch products where expiration date has passed
    $expiredProducts = Product::where('expiry_date', '<', $currentDate)->get();
    return view('stockManagement.stockExpireAdmin', compact('expiredProducts'));
}
}
