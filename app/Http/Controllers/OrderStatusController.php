<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Distributor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
class OrderStatusController extends Controller
{
    //
    public function index()
    {
           $orders=Order::all();

        return view('OrderStatus.index',compact('orders'));
    }
    public function edit($id)
    {
        // Join orders with distributors and get order details
        $order = Order::select(
                'orders.id',
                'orders.order_date',
                'orders.order_id',
                'orders.order_by',
                'orders.total_cost',
                'orders.location',
                'orders.contact',
                'orders.email',
                'orders.order_status',
                'orders.delivery_status',
                'orders.order_adjustment',
                'distributors.name as distributor_name'
            )
            ->leftJoin('distributors', 'orders.distributor_name', '=', 'distributors.id')
            ->where('orders.id', $id)
            ->firstOrFail(); // Fetch order data or fail

        // Fetch order details related to the order
        $orderDetails = OrderDetail::where('order_id', $id)->get();

        // Return the view with order and order details
        return view('OrderStatus.edit', compact('order', 'orderDetails'));
    }
    public function update(Request $request,String $id)
    {  
      
    
        // Fetch the order
        $order = Order::findOrFail($id);
    
        // Update order fields
        $order->delivery_status = $request->delivery_status;
        $order->order_adjustment = $request->order_adjustment;
        
        // Save the order
        $order->save();
    
        // Return a success response
           return response()->json(['message' => 'Order status updated successfully.']);
    }


    public function orderReturn(){
        return view('OrderStatus.orderReturn');
    }

    public function orderEditReturn(){
        return view('OrderStatus.orderEditReturn');
    }


//for shipping

public function shippingDetails()
{
    $shippingorders = Order::all(); // Fetches all shipping orders
    return view('ShippingOrder.index', compact('shippingorders'));
}



    public function show($id)
{
  
   $order = DB::table('orders')->where('id', $id)->first();

   
   if (!$order) {
       abort(404); 
   }

   
   $orderDetails = DB::table('order_details')
       ->where('order_id', $id)
       ->get();

  
   return view('ShippingOrder.show', compact('order', 'orderDetails'));
}

public function shippingupdate(Request $request, $id)
{
    // Validate the request with custom error messages
    $validator = \Validator::make($request->all(), [
        'shipping_address' => 'required',
    ], [
        'shipping_address.required' => 'Please fill in the Shipping Address.',
    ]);

    // Check if the validation fails
    if ($validator->fails()) {
        // Return a JSON response with the validation errors
        return response()->json(['errors' => $validator->errors()], 422);
    }

    try {
        // Fetch the order by id
        $order = Order::where('id', $id)->firstOrFail();

        // Update the shipping address
        $order->shipping_address = $request->input('shipping_address');
        $order->save();

        // Return a success response
        return response()->json(['message' => 'Shipping Address updated successfully!']);

    } catch (\Exception $e) {
        // Log the error and return a 500 response
        \Log::error('Error updating shipping address: ' . $e->getMessage());
        return response()->json(['message' => 'An error occurred while updating the shipping address.'], 500);
    }
}




 
}
