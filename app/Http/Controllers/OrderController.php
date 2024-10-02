<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Distributors;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // List all orders
    public function index()
    {
        $orders = Order::join('distributors', 'orders.distributor_name', '=', 'distributors.id')
        ->select('orders.*', 'distributors.name as distributor_name')
        ->get();
    
        return view('orders.index', compact('orders'));
    }
    public function getProducts()
    {
        $products = Product::all(); // Adjust this to your query as needed
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
        'distributor_id'=>'required',
        'total_cost' => 'required|numeric',
    ]);

    // Generate random order ID
    $randomOrderId = 'ORD-' . strtoupper(uniqid());

    // Create a new order record
   $order= Order::create([
        'order_by' => $request->input('name'), // Use 'name' as 'order_by'
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





    // Show order edit form
    public function edit($id)
    {
        // Fetch the order and associated products
        $order = Order::join('distributors', 'orders.distributor_name', '=', 'distributors.id')
            ->join('order_details', 'orders.id', '=', 'order_details.order_id') // Join with order_details
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
            ->get(); // Use get() to retrieve multiple rows
      $distributors=Distributors::all();
    
        return view('orders.edit', compact('order','distributors'));
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
            'distributor_id' => 'required',
            'total_cost' => 'required|numeric',
            'products' => 'required|array', // Ensure products are provided
        ]);
    
        // Find the existing order
        $order = Order::findOrFail($id);
    
        // Update the order details
        $order->update([
            'order_by' => $request->input('name'),
            'location' => $request->input('location'),
            'contact' => $request->input('contact'),
            'distributor_name' => $request->input('distributor_id'),
            'email' => $request->input('email'),
            'total_stock' => $request->input('total_stock'),
            'total_cost' => $request->input('total_cost'),
            'order_date' => now(), // You might want to keep this unchanged
        ]);
    
        // Update the order products
        foreach ($request->input('products') as $productId => $productData) {
            DB::table('order_details')
                ->where('order_id', $id) // Assuming each product has a unique order_id
                ->where('name', $productData['name']) // Assuming the product name is unique per order
                ->update([
                    'batch_number' => $productData['batch_number'],
                    'category' => $productData['category'],
                    'stock_count' => $productData['stock_count'],
                    'mrp' => $productData['mrp'],
                    'updated_at' => now(),
                ]);
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
