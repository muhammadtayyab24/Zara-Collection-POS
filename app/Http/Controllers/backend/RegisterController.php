<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use illuminate\support\Facades\Auth;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        return view('backend.register');
    }
    public function signup(Request $request){
        // dd($request->all());

        $id = $request->id;

        $request->validate([
            'name'=> 'required',
            'email'=>'required|unique:users,email,'.$id,
            'password'=>'required',
            'username'=>'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'username'=>$request->username,

        ]);


        if(Auth::attempt($request->only('email','password'))){
            //    for display dependinf page for mentor or for student (seperate pages condition)
                // if(Auth::user()->category =='Mentor')
                // {
                    return redirect('admin/dashboard');
                // }
                // else
                // {
                //     return redirect('catstudent')->with('message','Welcome as a student');
                // }
            
            }
            return redirect('register')->with('status','error');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
     }
}

