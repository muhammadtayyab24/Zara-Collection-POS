<?php

namespace App\Http\Controllers\backend\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        $userData = Order::get();
        return view('backend.customer.customer',compact('userData'));
    }
    public function addcustomer(){
        return view('backend.customer.addcustomer');
    }



    public function savecustomer(Request $request){
        // dd($request->all());

        $request->validate([
            'name'=> 'required',
            'phone_no'=>'required|max:13',
            'address'=>'required',

        ]);

        $customer = Order::create([
            'name' => $request->name,
            'phone_no' => $request->phone_no,
            
            'address' => $request->address,
        
            

        ]);

            // dd($request->all());
        $customer->save();
        return redirect()->back()->with('status','customer Added Succesfully');
    }

    // get edit user ID
       public function editcustomer($id){
        $customerid = Order::where('id','=' ,$id)->first();
        return
        view('backend.customer.editcustomer',compact('customerid'));  
    }

    public function updatecustomer(Request $request){
        $id = $request->id;

        $request->validate([
            'name'=> 'required',
            'phone_no'=>'required|max:13',
            'address'=>'required',

        ]);

        Order::where('id','=',$id)->update([
            
            'name' => $request->name,
            'phone_no' => $request->phone_no,
            'address' => $request->address,
            
        ]);
        return redirect()->back()->with('status','Customer Profile Edit Successfully');
    }

    public function deletecustomer($id){
        Order::where('id','=',$id)->delete();
        return redirect()->back()->with('status','Customer Profile Deleted Successfully');
    }
}
