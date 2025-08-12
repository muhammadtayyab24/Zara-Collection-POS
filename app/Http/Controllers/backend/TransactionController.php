<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $orderDetails = Transaction::with('user')->get();
       
        $trans = Transaction::all();
       
        return view('backend.transaction',compact('trans','orderDetails'));
    }
}
