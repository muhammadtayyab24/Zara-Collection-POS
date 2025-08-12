<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\EmpAbsense;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EmpabsenseController extends Controller
{
    public function index(Request $request){
        $employee = Employee::all();
        $data = EmpAbsense::with('employee')->get();
        if ($request->year != null) {
            $data = EmpAbsense::whereDate('created_at', "=", $request->date)->get();
        }
        return view('backend.employeeAbsense.employee_absense',compact('employee','data'));
    }
     public function saveempAbsense(Request $request){
        $request->validate([
            'employee_id'=> 'required',
            'absense'=>'required',  
            
            
    
        ]);
        $date = Carbon::now();
        $accempAbsense = EmpAbsense::create([
            'employee_id' => $request->employee_id,
            'absense' => $request->absense,
            'date' =>  Carbon::now(),
    
        ]);
    
            // dd($request->all());
        $accempAbsense->save();
        return redirect()->back()->with('status','empAbsense Added Succesfully');
    }
    
       // get edit user ID
       public function editempAbsense($id){
        $empAbsenseid = EmpAbsense::where('id','=' ,$id)->first();
        return
        view('backend.employeeAbsense.editemployee_absense',compact('empAbsenseid'));  
    }
    
    public function updateempAbsense(Request $request){
        $id = $request->id;
    
        $request->validate([
            'payment_system'=> 'required',
            'sender'=>'required',
            'receiver'=>'required',
            'amount'=>'required',
    
            
    
        ]);
    
        EmpAbsense::where('id','=',$id)->update([
            'payment_system' => $request->payment_system,
            'sender' => $request->sender,   
            'receiver' => $request->receiver,
            'amount' => $request->amount,
    
        ]);
        return redirect()->back()->with('status','empAbsense Edit Successfully');
    }
    
    public function deleteempAbsense($id){
        EmpAbsense::where('id','=',$id)->delete();
        return redirect()->back()->with('status','empAbsense Deleted Successfully');
    }
}
