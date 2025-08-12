<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index(){
        $userData = Stock::get();
        return view('backend.stock.stock',compact('userData'));
    }
    public function addstock(){
        // $userData = stock::get();
        return view('backend.stock.addstock');
    }



    public function savestock(Request $request){
        // dd($request->all());

        $request->validate([
            'stock'=> 'required',
            'quantity'=> 'required',
            'price'=>'required',

        ]);

        
        $stock = Stock::create([
            'stock' => $request->stock,
            'quantity' => $request->quantity,
            'price' => $request->price,
            
            

        ]);

            // dd($request->all());
        $stock->save();
        return redirect()->back()->with('status','stock Added Succesfully');
    }

    // get edit user ID
       public function editstock($id){
        $stockid = Stock::where('id','=' ,$id)->first();
        return
        view('backend.stock.editstock',compact('stockid'));  
    }

    public function updatestock(Request $request){
        $id = $request->id;

        $request->validate([
            'stock'=> 'required',
            'quantity'=> 'required',
            'price'=>'required',
            
        ]);

        stock::where('id','=',$id)->update([
            
            'stock'=>$request->stock,
            'quantity' => $request->quantity,
            'price'=>$request->price,
            
        ]);
        return redirect()->back()->with('status','stock Edit Successfully');
    }

    public function deletestock($id){
        Stock::where('id','=',$id)->delete();
        return redirect()->back()->with('status','stock Deleted Successfully');
    }

}
