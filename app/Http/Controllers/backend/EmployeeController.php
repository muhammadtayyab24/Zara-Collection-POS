<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    
    public function index(){    
        $userData = Employee::get();
        // Calculate weekly sales totals
        $weeklySales = $this->calculateWeeklySales();

        return view('backend.employee.employees',compact('userData','weeklySales'));
    }
    private function calculateWeeklySales()
    {
        // Get the current week's start and end dates
        $currentDate = Carbon::now();
        $daysUntilThursday = $currentDate->dayOfWeek === Carbon::THURSDAY ? 0 : (7 + Carbon::THURSDAY - $currentDate->dayOfWeek) % 7;
        $startOfWeek = $currentDate->subDays($daysUntilThursday)->startOfDay();
        $endOfWeek = $startOfWeek->copy()->endOfWeek();

        // Query the transactions table to calculate weekly sales totals
        $weeklySales = Transaction::select('seller_id', DB::raw('SUM(trans_amount) as total_sales'))
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->groupBy('seller_id')
            ->get();

        // Map employee IDs to employee names
        $weeklySales = $weeklySales->map(function ($sale) {
            $employee = Employee::find($sale->seller_id);
            $sale->employee_name = $employee ? $employee->employee_name : 'Admin/Owner';
            $sale->commission = $employee ? $employee->commission : 0; 
            return $sale;
        });

        return $weeklySales;
        // dd($weeklySales);
    }

    // private function calculateWeeklySales()
    // {
    //     // Get the current week's start and end dates
    //     $currentDate = Carbon::now();
    //     $daysUntilThursday = $currentDate->dayOfWeek === Carbon::THURSDAY ? 0 : (7 + Carbon::THURSDAY - $currentDate->dayOfWeek) % 7;
    //     $startOfWeek = $currentDate->subDays($daysUntilThursday)->startOfDay();
    //     $endOfWeek = $startOfWeek->copy()->endOfWeek();
    
    //     // Query the transactions table to calculate daily sales totals by seller
    //     $dailySales = Transaction::select('seller_id', DB::raw('DATE(created_at) as sale_date'), DB::raw('SUM(trans_amount) as total_sales'))
    //         ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
    //         ->groupBy('seller_id', 'sale_date')
    //         ->get();
    
    //     // Map employee IDs to employee names
    //     $dailySales = $dailySales->map(function ($sale) {
    //         $employee = Employee::find($sale->seller_id);
    //         $sale->employee_name = $employee ? $employee->employee_name : 'Admin/Owner';
    //         $sale->commission = $employee ? $employee->commission : 0; 
    //         return $sale;
    //     });
    
    //     return $dailySales;
    // }
    

    public function addemployee(){
        // $userData = employee::get();
        return view('backend.employee.addEmployee');
    }
    public function saveemployee(Request $request){
        // dd($request->all());
        $request->validate([
            'employee'=> 'required',
            'phone_no'=> 'required',
            'commission'=>'required',
            'salary'=>'required',
        ]);
        $employee = Employee::create([
            'employee_name' => $request->employee,
            'phone_no' => $request->phone_no,
            'commission' => $request->commission,
            'salary' => $request->salary,
        ]);
            // dd($request->all());
        $employee->save();
        return redirect()->back()->with('status','Employee Added Succesfully');
    }

    // get edit user ID
       public function editemployee($id){
        $employeeid = Employee::where('id','=' ,$id)->first();
        return
        view('backend.employee.editEmployee',compact('employeeid'));  
    }

    public function updateemployee(Request $request){
        $id = $request->id;

        $request->validate([
            'employee'=> 'required',
            'phone_no'=> 'required',
            'commission'=>'required',
            'salary'=>'required',

            
        ]);

        Employee::where('id','=',$id)->update([
            'employee_name' => $request->employee,
            'phone_no' => $request->phone_no,
            'commission' => $request->commission,
            'salary' => $request->salary,
            
        ]);
        return redirect()->back()->with('status','Employee Edit Successfully');
    }

    public function deleteemployee($id){
        Employee::where('id','=',$id)->delete();
        return redirect()->back()->with('status','Employee Deleted Successfully');
    }
}
