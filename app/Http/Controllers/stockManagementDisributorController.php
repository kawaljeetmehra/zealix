<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\AssignStock;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class stockManagementDisributorController extends Controller
{
    //
    public function index()
    {
        // Fetch the currently authenticated user
        $user = Auth::user(); // Get the authenticated user object
        $userId = $user->id;// Get the authenticated user's ID
        $isAdmin = $user->role_id == 1;
        $isSalesman=$user->role_id==3;
        // Fetch the distributor_id by joining users and distributors tables
        if ($isAdmin || $isSalesman) {
            // Admin can view all distributors and products
            $distributors = DB::table('distributors')->get(); // Get all distributors
    
            // Get the selected distributor from the request, or default to the first one
            $selectedDistributorId = request('distributor_id', $distributors->first()->id ?? null);
    
            // Fetch product IDs assigned to the selected distributor
            $assignedProductIds = DB::table('assign_stock')
                ->where('distributor_id', $selectedDistributorId)
                ->pluck('product_id');
    
            // Fetch products based on assigned product IDs
            $products = DB::table('stock_distributors')
                ->whereIn('product_id', $assignedProductIds)
                ->get();
    
            $message = null;
    
            // Return the view with products, distributors, and selected distributor
            return view('stockManagement.stockListDistributor', compact('products', 'distributors', 'selectedDistributorId', 'message'));
    
        } else {
            // Fetch distributor_id for the logged-in user
            $distributor_id = DB::table('users')
                ->join('distributors', 'users.distributor_id', '=', 'distributors.id')
                ->where('users.id', $userId)
                ->value('distributor_id'); // Fetch distributor_id for the logged-in user
    
            // Fetch product IDs that are assigned to the distributor
            $assignedProductIds = DB::table('assign_stock')
                ->where('distributor_id', $distributor_id)
                ->pluck('product_id');
    
            // Fetch products based on assigned product IDs
            $products = DB::table('stock_distributors')
                ->whereIn('product_id', $assignedProductIds)
                ->get();
    
            // Check if products are assigned
            if ($products->isEmpty()) {
                $message = "No products assigned to distributor with ID {$distributor_id}.";
            } else {
                $message = null; // No message if products are found
            }
    
            // Return the view with products and message
            return view('stockManagement.stockListDistributor', compact('products', 'message'));
        }
    }

     public function updateStock(Request $request)
 {
    $product = DB::table('stock_distributors')->where('id', $request->id)->first();

    if ($product) {
        // Update the stock_count field
        DB::table('stock_distributors')
            ->where('id', $request->id)
            ->update(['stock_count' => $request->stock_count]);
    
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
