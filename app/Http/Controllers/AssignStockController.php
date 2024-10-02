<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\AssignStock;
use Illuminate\Support\Facades\DB;
use App\Models\Distributors;
class AssignStockController extends Controller
{
    //

    public function index(){
            $products=Product::all();
            $distributors=Distributors::all();
        return view('AssignStock.assign_stock',compact('products','distributors'));
    }


    public function assignStock(Request $request)
    {
        $distributor_id = $request->input('distributor_id');
        $product_ids = $request->input('product_ids');
        
        // Initialize messages array
        $messages = [];
    
        foreach ($product_ids as $product_id) {
            // Check if the record already exists
            $exists = DB::table('assign_stock')
                ->where('distributor_id', $distributor_id)
                ->where('product_id', $product_id)
                ->exists();
    
            if (!$exists) {
                // Insert only if it doesn't exist
                DB::table('assign_stock')->insert([
                    'distributor_id' => $distributor_id,
                    'product_id' => $product_id,
                    'created_at' => now(), 
                    'updated_at' => now()
                ]);
                $messages[] = "Stock assigned successfully.";
            } else {
                // Add message for already assigned stock
                $messages[] = "Stock already assigned to distributor";
            }
        }
    
        // Return all messages in the response
        return response()->json(['messages' => $messages]);
    }
    
    
}
