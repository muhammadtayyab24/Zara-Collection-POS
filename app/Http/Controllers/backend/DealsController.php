<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Deal;
use App\Models\Deals;
use App\Models\Product;
use Illuminate\Http\Request;

class DealsController extends Controller
{
    // public function index(){
    //     $DealData = Deals::get(); 

        
    // //     $productIds = json_decode($DealData->product_id, true);
    // // $quantities = json_decode($DealData->quantity, true);
    // $productIdsArray = [];
    // $quantitiesArray = [];

    // foreach ($DealData as $dealData) {
    //     $productIds = json_decode($dealData->product_id, true);
    //     $quantities = json_decode($dealData->quantity, true);
    //     $productNames = Product::whereIn('id', $productIds)->pluck('product_name');
        
    //     $productIdsArray[] = $productNames;
    //     $quantitiesArray[] = $quantities;
    // }
    //     return view('backend.deals.deals',compact('DealData', 'productIdsArray', 'quantitiesArray'));
    // }
    // public function addDeal(){
    //     return view('backend.deals.adddeal');
    // }

    // public function storedeal(Request $request){
    //     // return $request->all();

    //         $deal = new Deals();
    //         $deal->name = $request->name;
    //         $deal->product_id = json_encode($request->product_id);
    //         $deal->quantity = json_encode($request->quantity);
    //         $deal->price = $request->price;
    //         $deal->save();

    //         return redirect()->back()->with('status','Deal Created SuccessFully');
    // }
    //  // get edit user ID
    // public function editdeal($id){
    //     $dealid = Deals::where('id','=' ,$id)->first();
    //     return
    //     view('backend.deals.editdeal',compact('dealid'));  
    // }

    // public function updatedeal(Request $request){
    //     $id = $request->id;

    //     $request->validate([
    //         'name'=> 'required',
    //         // 'phone_no'=>'required|max:13',
    //         'price'=>'required',

    //     ]);

    //     Deals::where('id','=',$id)->update([
            
    //         'name' => $request->name,
    //         // '' => $request->phone_no,
    //         'price' => $request->price,
            
    //     ]);
    //     return redirect()->back()->with('status','deal Edit Successfully');
    // }

    // public function deletedeal($id){
    //     Deals::where('id','=',$id)->delete();
    //     return redirect()->back()->with('status','deal Deleted Successfully');
    // }

}
