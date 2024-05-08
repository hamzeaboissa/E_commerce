<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        //model
        $totalproduct = product::count();
        $totalCategory = Category::count();
        $totalBrand = Brand::count();

        //user
        $totalAllusers = User::count();
        $totaluser = User::where('role_as', '0')->count();
        $totalAdmin = User::where('role_as', '1')->count();

        //order
        $todaydate = Carbon::now()->format('Y-m-d');
        $thisMonth = Carbon::now()->format('m');
        $thisyear = Carbon::now()->format('Y');

        $totalorder = Order::count();
        $todayorder = Order::whereDate('created_at', $todaydate)->count();
        $thisMonthOrder = Order::whereMonth('created_at', $thisMonth)->count();
        $thisyearOrder = Order::whereYear('created_at', $thisyear)->count();

        return view('admin.dashboard', compact(
            'totalproduct',
            'totalCategory',
            'totalBrand',
            'totalAllusers',
            'totaluser',
            'totalAdmin',
            'totalorder',
            'todayorder',
            'thisMonthOrder',
            'thisyearOrder',
        ));
    }
}
