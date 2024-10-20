<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Order;
use App\Models\TaskReport;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Show the dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // You might want to fetch data to show on the dashboard here
        // For example: statistics, recent activities, etc.
        if (Auth::user()->role_id == 2) {
            $latestStockData = DB::table('stock_distributors')
            ->where('distributor_id',Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();
        }else {
            // If the role_id is not 2 (e.g., 3), don't fetch the stock data or provide a default value
            $latestStockData = collect(); // Empty collection for role_id == 3
        }
        // Placeholder data for demonstration
        $latestStocks = Product::orderBy('created_at', 'desc')->take(3)->get();
        $statusCounts = Order::selectRaw('delivery_status, COUNT(*) as count')
        ->groupBy('delivery_status')
        ->pluck('count', 'delivery_status')
        ->toArray();

        $totalRevenue = Order::sum('total_cost');
        $totalSales = Order::count();



        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
    
        $attendanceStats = DB::table('attendance')
            ->selectRaw('status, COUNT(*) as count')
            ->whereMonth('day', $currentMonth)
            ->whereYear('day', $currentYear)
            ->groupBy('status')
            ->pluck('count', 'status')
            ->toArray();
    
        $presentCount = $attendanceStats['P'] ?? 0; // Present
        $onLeaveCount = $attendanceStats['L'] ?? 0; // On Leave
        $absentCount = $attendanceStats['A'] ?? 0; // Absent

        

        return view('Dashboard',compact('latestStocks','statusCounts','totalRevenue','totalSales','presentCount', 'onLeaveCount', 'absentCount','latestStockData'));
    }
    public function salesmandashboard(){
        if (Auth::user()->role_id == 2) {
            $latestStockData = DB::table('stock_distributors')
            ->where('distributor_id',Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();
        }else {
            // If the role_id is not 2 (e.g., 3), don't fetch the stock data or provide a default value
            $latestStockData = collect(); // Empty collection for role_id == 3
        }
        // Placeholder data for demonstration
        $latestStocks = Product::orderBy('created_at', 'desc')->take(3)->get();
        $statusCounts = Order::selectRaw('delivery_status, COUNT(*) as count')
        ->groupBy('delivery_status')
        ->pluck('count', 'delivery_status')
        ->toArray();

        $totalRevenue = Order::sum('total_cost');
        $totalSales = Order::count();



        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
        $salesmanId = Auth::user()->salesman_id;
        $attendanceStats = DB::table('attendance')
            ->selectRaw('status, COUNT(*) as count')
            ->where('salesman_id', $salesmanId)
            ->whereMonth('day', $currentMonth)
            ->whereYear('day', $currentYear)
            
            ->groupBy('status')
            ->pluck('count', 'status')
            ->toArray();
    
        $presentCount = $attendanceStats['P'] ?? 0; // Present
        $onLeaveCount = $attendanceStats['L'] ?? 0; // On Leave
        $absentCount = $attendanceStats['A'] ?? 0; // Absent

        

        // Fetch task reports matching the salesman_id
        $taskReports = TaskReport::where('Salesman_id', $salesmanId)->get();

        return view('DashboradSaleman',compact('latestStocks','statusCounts','totalRevenue','totalSales','presentCount', 'onLeaveCount', 'absentCount','latestStockData','taskReports'));
    }
}
