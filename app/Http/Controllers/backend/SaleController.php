<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index(Request $request){
        $trans = Transaction::all();
        
        if ($request->year != null) {
            $trans = Transaction::whereDate('created_at', "=", $request->date)->get();
        }
        return view('backend.sale',compact('trans'));
    }
    public function deletesale($id){
        Transaction::where('id','=',$id)->delete();
        return redirect()->back()->with('status','Balance Deleted Successfully');
    }
}
