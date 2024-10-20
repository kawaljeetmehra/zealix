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
        $products = $request->input('products'); // Array of product details
    
        // Initialize messages array
        $messages = [];
    
        foreach ($products as $product) {
            // Extract product details from the request
            $product_id = $product['product_id'];
            $batch_number = $product['batch_number'];
            $product_category = $product['product_category'];
            $product_name = $product['product_name'];
            $mrp = $product['mrp'];
            $packaging = $product['packaging'];
            $quantity = $product['quantity'];
            $stock_count = $product['stock_count'];
    
            // Fetch the current product's stock count from the products table
            $currentProduct = DB::table('products')->where('id', $product_id)->first();
    
            // Check if the requested quantity or stock_count is valid
            if ($currentProduct) {
                // Check if the requested quantity or stock_count is more than the available stock
                if ($quantity > $currentProduct->quantity) {
                    $messages[] = "Error: Requested quantity for product '{$product_name}' exceeds the available stock.";
                    continue; // Skip this product and move to the next one
                }
                if ($stock_count > $currentProduct->stock_count) {
                    $messages[] = "Error: Requested stock count for product '{$product_name}' exceeds the available stock.";
                    continue; // Skip this product and move to the next one
                }
            } else {
                $messages[] = "Error: Product '{$product_name}' not found in the products table.";
                continue; // Skip this product and move to the next one
            }
    
            // Check if the record already exists in `assign_stock`
            $exists = DB::table('assign_stock')
                ->where('distributor_id', $distributor_id)
                ->where('product_id', $product_id)
                ->exists();
    
            if (!$exists) {
                // Insert into `assign_stock` table
                DB::table('assign_stock')->insert([
                    'distributor_id' => $distributor_id,
                    'product_id' => $product_id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
    
                // Insert into `stock_distributors` table
                DB::table('stock_distributors')->insert([
                    'product_id' => $product_id,
                    'distributor_id' => $distributor_id,
                    'batch_number' => $batch_number,
                    'product_category' => $product_category,
                    'product_name' => $product_name,
                    'mrp' => $mrp,
                    'package' => $packaging,
                    'quantity' => $quantity,
                    'stock_count' => $stock_count,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
    
                if ($quantity > 0) {
                    DB::table('products')
                        ->where('id', $product_id)
                        
                        ->decrement('quantity', $quantity);
                }
        
                if ($stock_count > 0) {
                    DB::table('products')
                        ->where('id', $product_id)
                        ->decrement('stock_count', $stock_count);
                } // Decrement quantity by the requested quantity
    
                $messages[] = "Stock for product '{$product_name}' assigned successfully.";
            } else {
                // If already assigned, update both stock count and quantity in `stock_distributors`
                DB::table('stock_distributors')
                    ->where('product_id', $product_id)
                    ->where('distributor_id', $distributor_id) 
                    ->increment('stock_count', $stock_count); // Increment by the new stock count
            
                DB::table('stock_distributors')
                    ->where('product_id', $product_id)
                    ->where('distributor_id', $distributor_id) 
                    ->increment('quantity', $quantity); // Increment by the new quantity
            
                // Update the `updated_at` column once for both increments
                DB::table('stock_distributors')
                    ->where('product_id', $product_id)
                    ->where('distributor_id', $distributor_id) 
                    ->update(['updated_at' => now()]);
            
                // Decrement `quantity` and `stock_count` in `products`
                if ($quantity > 0) {
                    DB::table('products')
                        ->where('id', $product_id)
                        ->decrement('quantity', $quantity);
                }
            
                if ($stock_count > 0) {
                    DB::table('products')
                        ->where('id', $product_id)
                        ->decrement('stock_count', $stock_count);
                }
            
                $messages[] = "Stock for product '{$product_name}' is already assigned to this distributor, stock count and quantity updated.";
            }
            
        }
    
        // Return all messages in the response
        return response()->json(['messages' => $messages]);
    }
    
    
    
}
