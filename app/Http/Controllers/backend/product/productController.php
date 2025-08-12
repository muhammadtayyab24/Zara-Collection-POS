<?php

namespace App\Http\Controllers\backend\product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class productController extends Controller
{
    public function index(){
        $userData = Product::get();
        return view('backend.product.product',compact('userData'));
    }
    public function addproduct(){
        // $userData = Product::get();
        return view('backend.product.addproduct');
    }



    public function saveproduct(Request $request){
        // dd($request->all());

        $request->validate([
            'product'=> 'required',
            'price'=>'required',
            'quantity'=>'required',
            

        ]);

        
        $product = Product::create([
            'product_name' => $request->product,
            'price' => $request->price,
            'quantity' => $request->quantity,
            
            

        ]);

            // dd($request->all());
        $product->save();
        return redirect()->back()->with('status','Product Added Succesfully');
    }

    // get edit user ID
       public function editproduct($id){
        $productid = Product::where('id','=' ,$id)->first();
        return
        view('backend.product.editproduct',compact('productid'));  
    }

    public function updateproduct(Request $request){
        $id = $request->id;

        $request->validate([
            'product'=> 'required',
            'price'=>'required',
            'quantity'=>'required',

            

        ]);

        Product::where('id','=',$id)->update([
            
            'product_name'=>$request->product,
            'price'=>$request->price,
            'quantity'=>$request->quantity,

            
        ]);
        return redirect()->back()->with('status','product Edit Successfully');
    }

    public function deleteproduct($id){
        Product::where('id','=',$id)->delete();
        return redirect()->back()->with('status','product Deleted Successfully');
    }

}
