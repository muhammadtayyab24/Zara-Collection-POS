<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class FormsController extends Controller
{
    public function index(){
        return view('backend.forms');
    }

    public function saveuser(Request $request){
        // dd($request->all());

        $request->validate([
            'name'=> 'required',
            'email'=>'required',
            'password'=>'required',
            'username'=>'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'username'=>$request->username,

        ]);

            // dd($request->all());
        $user->save();
        return redirect()->back()->with('status','blog added succesfully');
    }
}
