<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Distributor;
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
 
}
