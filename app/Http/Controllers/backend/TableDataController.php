<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class TableDataController extends Controller
{
    public function index(){
        $userData = User::get();
        return view('backend.tables-data',compact('userData'));
    }

    // get edit user ID
    public function edituser($id){
        $userid = User::where('id','=' ,$id)->first();
        return
        view('backend.user.editUser',compact('userid'));  
    }

    public function updateuser(Request $request){
        $id = $request->id;

        $request->validate([
            'name'=> 'required',
            'email'=>'required|unique:users,email,'.$id,
            // 'password'=>'required',
            'username'=>'required',
        ]);

        User::where('id','=',$id)->update([
            
            'email'=>$request->email,
            'name'=>$request->name,
            'username'=>$request->username,
            

        ]);
        return redirect()->back()->with('success','Post Edit Successfully');

        // $user = User::where('id','=',$id);
        // $user->name = $name;
        // $user->username = $username;
        // $user->email = $email;
        // $user->password = $password;
        // // $user->save(); 
        // return redirect()->back()->with('status','user Edit succesfully');
    }

    public function deleteuser($id){
        User::where('id','=',$id)->delete();
        return redirect()->back()->with('status','user Deleted Successfully');
    }


    
    
}
