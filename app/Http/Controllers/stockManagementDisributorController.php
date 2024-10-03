<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\AssignStock;
use Illuminate\Support\Facades\DB;
class stockManagementDisributorController extends Controller
{
    //
    public function index()
{
    // Set distributor_id to 1
    $distributor_id = 18;

    // Fetch product IDs that are assigned to the specified distributor
    $assignedProductIds = DB::table('assign_stock')
        ->where('distributor_id', $distributor_id)
        ->pluck('product_id');

    // Fetch only those products that are assigned to distributor_id = 1
    $products = Product::whereIn('id', $assignedProductIds)->get();

    // Check if any products were found
    if ($products->isEmpty()) {
        $message = "No products assigned to distributor with ID 1.";
    } else {
        $message = null; // No message if products are found
    }
    

    return view('stockManagement.stockListDistributor', compact('products', 'message'));
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
    // Get current date
    $currentDate = now();

    // Set distributor_id to 1
    $distributor_id = 1;

    // Fetch expired products assigned to the specified distributor
    $expiredProducts = Product::where('expiry_date', '<', $currentDate)
        ->whereIn('id', function($query) use ($distributor_id) {
            $query->select('product_id')
                ->from('assign_stock')
                ->where('distributor_id', $distributor_id);
        })
        ->get();

    // Check if any expired products were found
    if ($expiredProducts->isEmpty()) {
        $message = "No expired products found for distributor with ID $distributor_id.";
    } else {
        $message = null; // No message if expired products are found
    }

    // Return the view with expired products and a message if applicable
    return view('stockManagement.stockExpireDistributor', compact('expiredProducts', 'message'));
}

}
