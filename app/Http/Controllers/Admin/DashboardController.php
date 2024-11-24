<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $todayDate = Carbon::now()->format('d-m-Y');
        $thisMonth = Carbon::now()->format('m');
        $thisYear = Carbon::now()->format('Y');

        $total_product = Product::count();
        $total_category = Category::count();
        $total_order = Order::count();
        $total_alluser = User::count();
        $total_user = User::where('is_admin', 0)->count();
        $total_admin = User::where('is_admin', 1)->count();
        $today_orders = Order::whereDate('created_at', $todayDate)->count();
        $thisMonthOrders = Order::whereMonth('created_at', $thisMonth)->count();
        $thisYearOrders = Order::whereYear('created_at', $thisYear)->count();


        return view('admin.dashboard', [
            'total_product' => $total_product,
            'total_category' => $total_category,
            'total_order' => $total_order,
            'total_alluser' => $total_alluser,
            'total_user' => $total_user,
            'total_admin' => $total_admin,
            'today_orders' => $today_orders,
            'thisMonthOrders' => $thisMonthOrders,
            'thisYearOrders' => $thisYearOrders
        ]);
    }
}
