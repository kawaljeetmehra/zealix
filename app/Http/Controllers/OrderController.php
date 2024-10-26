<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Distributors;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // List all orders
    public function index()
    {
        $orders = Order::join('distributors', 'orders.distributor_name', '=', 'distributors.id', 'left') // Left join to include null distributor_name
        ->select('orders.*', 
                 DB::raw("COALESCE(distributors.name, 'Admin') as distributor_name")) // Use 'Admin' if distributor_name is null
        ->get();
    
        return view('orders.index', compact('orders'));
    }
    public function getProducts()
    {
        $products = Product::all(); // Adjust this to your query as needed
        return response()->json(['products' => $products]);
    }
    public function getDistributorProducts(Request $request)
{
    // Get distributor ID from the request
    $distributorId = $request->input('distributor_id');
    
    // Fetch products from distributors_stock table based on the distributor_id
    $products = DB::table('stock_distributors')
        ->where('distributor_id', $distributorId)
        ->get();

    // Return the products in JSON format
    return response()->json(['products' => $products]);
}

    
    // Show form to create new order
    public function create()
    {    $distributors=Distributors::all();
        return view('orders.create',compact('distributors'));
    }

    // Store new order in the database
    public function store(Request $request)
{   //dd($request->all());
    // Validate the incoming request
    $request->validate([
        'name' => 'required',  // Use 'name' for 'order_by'
        'location' => 'required',
        'contact' => 'required',
        'email' => 'required|email',
        'total_stock' => 'required|numeric',
       
        'total_cost' => 'required|numeric',
    ]);

    // Generate random order ID
    $randomOrderId = 'ORD-' . strtoupper(uniqid());
$userId=Auth::user()->id;

    // Create a new order record
   $order= Order::create([
        'order_by' => $request->input('name'),
        'created_by'=> $userId,// Use 'name' as 'order_by'
        'order_id' => $randomOrderId,         // Random generated order_id
        'location' => $request->input('location'),
        'contact' => $request->input('contact'),
        'distributor_name'=>$request->input('distributor_id'),
        'email' => $request->input('email'),
        'total_stock' => $request->input('total_stock'),
        'total_cost' => $request->input('total_cost'),
        'order_date' => now(),                // Use the current date as 'order_date'
    ]);
    foreach ($request->input('products') as $productId => $productData) {
        DB::table('order_details')->insert([
            'order_id' => $order->id, // This would come from your order, if applicable
            'batch_number' => $productData['batch_number'],
            'category' => $productData['category'],
            'name' => $productData['name'],
            'stock_count' => $productData['stock_count'],
            'mrp' => $productData['mrp'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    if ($request->input('distributor_id')) {
        // Decrease stock_count from distributors_stock table
        DB::table('stock_distributors')
            ->where('distributor_id', $request->input('distributor_id'))
          
            ->decrement('stock_count', $productData['stock_count']);
    } else {
        // Decrease stock_count from products table
        DB::table('products')
            ->where('id', $productId) // Assuming the product ID matches the products table ID
            ->decrement('stock_count', $productData['stock_count']);
    }

    // Redirect after successful order creation
    return redirect()->route('orders.index')->with('success', 'Order created successfully.');
}


public function show($id)
{
    // Fetch the order by ID, along with the distributor name using a join
    $order = Order::join('distributors', 'orders.distributor_name', '=', 'distributors.id')
        ->join('order_details', 'orders.id', '=', 'order_details.order_id') // Join with order_products
        ->select(
            'orders.*', 
            'distributors.name as distributor_name',
            'order_details.batch_number',
            'order_details.category',
            'order_details.name as product_name',
            'order_details.stock_count',
            'order_details.mrp'
        )
        ->where('orders.id', $id)
        ->get();
        

    return view('orders.view', compact('order'));
}





public function edit($id)
{
    // Fetch the order and associated products using left join
    $order = Order::leftJoin('distributors', 'orders.distributor_name', '=', 'distributors.id')
        ->leftJoin('order_details', 'orders.id', '=', 'order_details.order_id')
        ->select(
            'orders.*', 
            DB::raw("COALESCE(distributors.name, 'Admin') as distributor_name"), // Default to 'Admin' if distributor is null
            'order_details.id as order_detail_id',
            'order_details.batch_number',
            'order_details.category',
            'order_details.name as product_name',
            'order_details.stock_count',
            'order_details.mrp'
        )
        ->where('orders.id', $id)
        ->first(); // Use first() to get a single order

    // Fetch all distributors for the dropdown
    $distributors = Distributors::all();

    // Pass the order and distributors to the edit view
    return view('orders.edit', compact('order', 'distributors'));
}


    // Update existing order in the database
    public function update(Request $request, $id)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required',  // Use 'name' for 'order_by'
            'location' => 'required',
            'contact' => 'required',
            'email' => 'required|email',
            'total_stock' => 'required|numeric',
            'total_cost' => 'required|numeric',
            'products' => 'required|array', // Ensure products is an array
            'products.*.batch_number' => 'required|string',
            'products.*.category' => 'required|string',
            'products.*.name' => 'required|string',
            'products.*.stock_count' => 'required|integer',
            'products.*.mrp' => 'required|numeric',
        ]);
    
        // Find the existing order record by ID
        $order = Order::findOrFail($id);
    
        // Update the order record
        $order->update([
            'order_by' => $request->input('name'),
            'location' => $request->input('location'),
            'contact' => $request->input('contact'),
            'distributor_name' => $request->input('distributor_id'),
            'email' => $request->input('email'),
            'total_stock' => $request->input('total_stock'),
            'total_cost' => $request->input('total_cost'),
            'order_date' => now(),  // Update to current date if needed
        ]);
    
        // Loop through the products and update order details
        foreach ($request->input('products') as $productId => $productData) {
            // Check if the order detail already exists
            $orderDetail = OrderDetail::where('order_id', $id)
                ->where('batch_number', $productData['batch_number']) // Assuming batch_number is unique in this context
                ->first();
    
            if ($orderDetail) {
                // Update existing order detail
                $orderDetail->update([
                    'category' => $productData['category'],
                    'name' => $productData['name'],
                    'stock_count' => $productData['stock_count'],
                    'mrp' => $productData['mrp'],
                    'updated_at' => now(),
                ]);
            } else {
                // Insert new order detail if it doesn't exist
                DB::table('order_details')->insert([
                    'order_id' => $id, // Use the current order ID
                    'batch_number' => $productData['batch_number'],
                    'category' => $productData['category'],
                    'name' => $productData['name'],
                    'stock_count' => $productData['stock_count'],
                    'mrp' => $productData['mrp'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
    
            // Decrease stock_count from appropriate stock table
            if ($request->input('distributor_id')) {
                // Decrease stock_count from distributors_stock table
                DB::table('stock_distributors')
                    ->where('distributor_id', $request->input('distributor_id'))
                    ->decrement('stock_count', $productData['stock_count']);
            } else {
                // Decrease stock_count from products table
                DB::table('products')
                    ->where('id', $productId) // Assuming the product ID matches the products table ID
                    ->decrement('stock_count', $productData['stock_count']);
            }
        }
    
        // Redirect after successful order update
        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }
    
    
    
    

    // Delete an order
    public function destroy($id)
    {
        // Find the order by ID
        $order = Order::findOrFail($id);
    
        // Delete the associated products from order_details
        DB::table('order_details')
            ->where('order_id', $id)
            ->delete();
    
        // Delete the order
        $order->delete();
    
        // Redirect after successful deletion
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
    

    // Update order status via AJAX
    public function updateStatus(Request $request)
    {    
        $order = Order::find($request->order_id);
        if ($order) {
            $order->order_status = $request->status;
            $order->save();
            return response()->json(['message' => 'Order status updated successfully']);
        }
        return response()->json(['message' => 'Order not found'], 404);
    }
}
