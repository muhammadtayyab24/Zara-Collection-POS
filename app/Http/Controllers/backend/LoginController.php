<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use illuminate\support\Facades\Auth;


class LoginController extends Controller
{
    public function index(){
        return view('backend.login');
    }

    public function login(Request $request){
        // dd($request->all());
        // validation code
        $request->validate([
            'username'=> 'required',
            'password'=> 'required',
        ]);

        // login code

        if(Auth::attempt($request->only('username','password'))){
            return redirect('admin/dashboard');
        }
        return redirect('/')->with('status','email or password is invalid');
     }
}
