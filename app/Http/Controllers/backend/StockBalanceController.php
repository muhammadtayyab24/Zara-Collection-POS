<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\AccBalance;
use Illuminate\Http\Request;

class StockBalanceController extends Controller
{
 public function index(){
    $data = AccBalance::get();
    return view('backend.Stock-balance',compact('data'));

 }
 public function savebalance(Request $request){
    $request->validate([
        'stock_name'=> 'required',
        'dealer_name'=>'required',
        'total_amount'=>'required',
        'sent'=>'required',
        'pending'=>'required',

        
        

    ]);
    $accBalance = AccBalance::create([
        'stock_name' => $request->stock_name,
        'dealer_name' => $request->dealer_name,
        'total_amount' => $request->total_amount,
        'clear_amount' => $request->sent,
        'pending' => $request->pending,

    ]);

        // dd($request->all());
    $accBalance->save();
    return redirect()->back()->with('status','Balance Added Succesfully');
}

   // get edit user ID
   public function editbalance($id){
    $balanceid = AccBalance::where('id','=' ,$id)->first();
    return
    view('backend.stock-balance.editStock-balance',compact('balanceid'));  
}

public function updatebalance(Request $request){
    $id = $request->id;

    $request->validate([
        'stock_name'=> 'required',
        'dealer_name'=>'required',
        'total_amount'=>'required',
        'sent'=>'required',
        'pending'=>'required',

        

    ]);

    AccBalance::where('id','=',$id)->update([
        'stock_name' => $request->stock_name,
        'dealer_name' => $request->dealer_name,
        'total_amount' => $request->total_amount,
        'clear_amount' => $request->sent,
        'pending' => $request->pending,

        
    ]);
    return redirect()->back()->with('status','Balance Edit Successfully');
}

public function deletebalance($id){
    AccBalance::where('id','=',$id)->delete();
    return redirect()->back()->with('status','Balance Deleted Successfully');
}

}


