<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Distributor; // Assuming you have a Distributor model

class StockReturnController extends Controller
{
    // Display the orders marked for return for a specific distributor
    public function index()
    {
        // Fetch orders with `order_adjustment` set to 'return'
        $orders = Order::where('order_adjustment', 'return')
                        ->with('distributor') // Eager load distributor relationship
                        ->orderBy('id', 'DESC')
                        ->get();

        // Fetch related order details
        $orderDetails = OrderDetail::whereIn('order_id', $orders->pluck('id'))
                                    ->get();

        return view('StockManagement.stockReturnDistributor', compact('orders', 'orderDetails'));
    }
}
