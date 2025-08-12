<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    public function index(){
        $users = auth()->user();
        return view('backend.users-profile',compact('users'));
    }
    public function edituser($id){
        $userid = User::where('id','=' ,$id)->first();
        return
        view('backend.users-profile',compact('userid'));  
    }

    public function updateUser(Request $request){
        $id = $request->id;

        $request->validate([
            'name'=> 'required',
            'email'=>'required|unique:users,email,'.$id,
            'username'=>'required',
        ]);

        User::where('id','=',$id)->update([
            'email'=>$request->email,
            'name'=>$request->name,
            'username'=>$request->username,
            

        ]);
        return redirect()->back()->with('status','User Profile Edit Successfully');

        // $user = User::where('id','=',$id);
        // $user->name = $name;
        // $user->username = $username;
        // $user->email = $email;
        // $user->password = $password;
        // // $user->save(); 
        // return redirect()->back()->with('status','user Edit succesfully');
    }







    // update password /change password
    public function updatePassword(Request $request){
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);
        
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("status", "Password changed successfully!");
     }
}
