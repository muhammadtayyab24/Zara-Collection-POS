<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Order_Detail;
use App\Models\Product;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Closure;

class IndexController extends Controller
{
    public function index(){
        // total customers
        $customer = count(Order::all());
         // total products
         $products = count(Product::all());
        // total Sale
        $trans = count(Transaction::all());
        // sale Per day
        $totalSale = count(Transaction::whereDate('created_at', today())->get());



        // total Amount Per day
        $totalAmount = Transaction::whereDate('trans_date', today())->sum('trans_amount');
        

// // Get the current time
// $currentTime = Carbon::now();

// if ($currentTime->hour >= 17) {
//     // If the current time is 5 PM or later, calculate from 5 PM to 4 AM the next day
//     $startDateTime = $currentTime->copy()->setHour(17)->setMinute(0)->setSecond(0);
//     $endDateTime = $currentTime->copy()->addDay()->setHour(4)->setMinute(0)->setSecond(0);
// } else {
//     // If the current time is before 5 PM, calculate from 5 PM the previous day to 4 AM
//     $startDateTime = $currentTime->copy()->subDay()->setHour(17)->setMinute(0)->setSecond(0);
//     $endDateTime = $currentTime->copy()->setHour(4)->setMinute(0)->setSecond(0);
// }

// $totalAmount = Transaction::whereBetween('trans_date', [$startDateTime, $endDateTime])->sum('trans_amount');

        // total Amount Per month
        $currentMonth = Carbon::now()->format('Y-m');
        $totalAmounts = Transaction::whereRaw('DATE_FORMAT(created_at, "%Y-%m") = ?', [$currentMonth])->sum('trans_amount');

        // recent Orders
        $recentOrders = Transaction::latest()->limit(10)->get();
        // top selling
        // $topSellingProducts = Order_Detail::withCount('product_id')->orderByDesc('orders_count')->limit(10)->get();
        $topSellingProducts = Order_Detail::select('product_id', DB::raw('SUM(quantity) as total_sold'))
            ->groupBy('product_id')
            ->orderByDesc('total_sold')
            ->limit(10)
            ->get();

        $productIds = $topSellingProducts->pluck('product_id'); // Get the product IDs from the result

        // Fetch product names using the collected product IDs
        $productNames = Product::whereIn('id', $productIds)->pluck('product_name', 'id','image');

// profit per day
        $dailyProfits = DB::table('daily_record')
    ->select(DB::raw('DATE(date) as date'), DB::raw('SUM(profit_amount) as total_profit'))
    ->groupBy(DB::raw('DATE(date)'))
    ->get();
        if(Auth::check()){
            return view('backend.index',compact('customer','totalSale','totalAmount','recentOrders','productNames','topSellingProducts','products','dailyProfits'));
        }
        else
        return view('backend.login');
    }   


}
