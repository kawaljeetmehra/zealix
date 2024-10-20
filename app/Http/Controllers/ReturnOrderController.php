<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReturnOrderController extends Controller
{
    public function index()
    {
        // Fetch orders with 'return' in 'order_adjustment' and join with the distributors table
        $orders = DB::table('orders')
                    ->join('distributors', 'orders.distributor_name', '=', 'distributors.id')
                    ->select('orders.*', 'distributors.name as distributor_name')
                    ->where('orders.order_adjustment', 'return')
                    ->get();

        // Pass the fetched orders to the view
        return view('OrderStatus.returnOrderStatus', compact('orders'));
    }
}
