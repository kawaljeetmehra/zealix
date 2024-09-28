<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // List all orders
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    // Show form to create new order
    public function create()
    {
        return view('orders.create');
    }

    // Store new order in the database
    public function store(Request $request)
    {
        $request->validate([
            'order_date' => 'required',
            'order_id' => 'required|unique:orders',
            'total_cost' => 'required|numeric',
            'location' => 'required',
            'distributor_name' => 'required',
            'order_by' => 'required',
        ]);

        Order::create($request->all());

        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    }

    // Show order edit form
    public function edit($id)
    {
        $order = Order::find($id);
        return view('orders.edit', compact('order'));
    }

    // Update existing order in the database
    public function update(Request $request, $id)
    {
        $request->validate([
            'order_date' => 'required',
            'order_id' => 'required|unique:orders,order_id,' . $id,
            'total_cost' => 'required|numeric',
            'location' => 'required',
            'distributor_name' => 'required',
            'order_by' => 'required',
        ]);

        $order = Order::find($id);
        $order->update($request->all());

        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }

    // Delete an order
    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();

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
