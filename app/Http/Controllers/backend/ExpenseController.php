<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\DailyExpenseTotal;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ExpenseController extends Controller
{
  
    public function index(Request $request) {
        $date = $request->input('date');
    
        if (!empty($date)) {
            // If a date is provided, filter by date
            $expenses = DailyExpenseTotal::with('expenses')
                ->whereDate('created_at', '=', $date)
                ->groupBy('expense_date')
                ->selectRaw('expense_date, SUM(total_amount) as total_amount')
                ->get();
        } else {
            // If no date is provided, fetch all expenses
            $expenses = DailyExpenseTotal::with('expenses')
                ->groupBy('expense_date')
                ->selectRaw('expense_date, SUM(total_amount) as total_amount')
                ->get();
        }
        
        $expense = DailyExpenseTotal::all();
        
        return view('backend.Expense.expense', compact('expenses', 'expense'));
    }
    
    
    public function addexpense(){
        return view('backend.Expense.expense');
    }

    public function saveexpense(Request $request) {
        // Add the new expense to the 'expenses' table
        $expense = new Expense();
        $expense->item_name = $request->item_name;
        $expense->price = $request->price;
        $expense->expense_date = Carbon::now(); 
        $expense->save();
    
        // Find or create daily total record for the expense date
        $dailyTotal = DailyExpenseTotal::firstOrNew(['expense_date' => date('Y-m-d')]);
        $dailyTotal->total_amount += $request->price;
        $dailyTotal->save();
    
        return redirect()->back()->with('status', 'Expense added successfully');
    }

    
}
