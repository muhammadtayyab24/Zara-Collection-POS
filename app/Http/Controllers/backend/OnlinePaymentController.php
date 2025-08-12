<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\AccBalance;
use App\Models\OnlinePayment;
use Illuminate\Http\Request;

class OnlinePaymentController extends Controller
{
    public function index(Request $request){
        $data = OnlinePayment::get();
        if ($request->year != null) {
            $data = OnlinePayment::whereDate('created_at', "=", $request->date)->get();
        }
        return view('backend.Online-payment.online-payment',compact('data'));
    
     }
     public function saveonlinePayment(Request $request){
        $request->validate([
            'payment_system'=> 'required',
            'sender'=>'required',
            'receiver'=>'required',
            'amount'=>'required',    
            
            
    
        ]);
        $acconlinePayment = OnlinePayment::create([
            'payment_system' => $request->payment_system,
            'sender' => $request->sender,
            'receiver' => $request->receiver,
            'amount' => $request->amount,
    
        ]);
    
            // dd($request->all());
        $acconlinePayment->save();
        return redirect()->back()->with('status','onlinePayment Added Succesfully');
    }
    
       // get edit user ID
       public function editonlinePayment($id){
        $onlinePaymentid = OnlinePayment::where('id','=' ,$id)->first();
        return
        view('backend.Online-payment.editOnlinePayment',compact('onlinePaymentid'));  
    }
    
    public function updateonlinePayment(Request $request){
        $id = $request->id;
    
        $request->validate([
            'payment_system'=> 'required',
            'sender'=>'required',
            'receiver'=>'required',
            'amount'=>'required',
    
            
    
        ]);
    
        OnlinePayment::where('id','=',$id)->update([
            'payment_system' => $request->payment_system,
            'sender' => $request->sender,   
            'receiver' => $request->receiver,
            'amount' => $request->amount,
    
        ]);
        return redirect()->back()->with('status','onlinePayment Edit Successfully');
    }
    
    public function deleteonlinePayment($id){
        OnlinePayment::where('id','=',$id)->delete();
        return redirect()->back()->with('status','onlinePayment Deleted Successfully');
    }
    
}
