<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\AccBalance;
use App\Models\DailyRecord;
use App\Models\Expense;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DailyRecordController extends Controller
{
    public function index(Request $request){
        $selectedDate = $request->input('date');
    
        // Perform a query to fetch data based on the selected date
        // Modify this query to match your data structure and filtering logic
        $filteredData = DailyRecord::whereDate('created_at', $selectedDate)->get();

// Fetch total expenses grouped by date
$totalExpenses = DB::table('expense_total')
    ->select(DB::raw('DATE(expense_date) as date'), DB::raw('SUM(total_amount) as total_expense'))
    ->groupBy(DB::raw('DATE(expense_date)'))
    ->get();

// Fetch total profits grouped by date
$totalProfits = DB::table('daily_record')
    ->select(DB::raw('DATE(date) as date'), DB::raw('SUM(profit_amount) as total_profit'))
    ->groupBy(DB::raw('DATE(date)'))
    ->get();

    $combinedData = [];

foreach ($totalExpenses as $expense) {
    $combinedData[$expense->date]['total_expense'] = $expense->total_expense;
    $combinedData[$expense->date]['total_profit'] = 0; // Initialize profit to 0
}

foreach ($totalProfits as $profit) {
    if (isset($combinedData[$profit->date])) {
        $combinedData[$profit->date]['total_profit'] = $profit->total_profit;
    } else {
        $combinedData[$profit->date]['total_profit'] = $profit->total_profit;
        $combinedData[$profit->date]['total_expense'] = 0; // Initialize expense to 0
    }
}

foreach ($combinedData as &$data) {
    $data['net_profit'] = $data['total_profit'] - $data['total_expense'];
}
        return view('backend.dailyRecord.dailyRecord',['combinedData' => $combinedData, 'filteredData' => $filteredData]);
    }
   
}
