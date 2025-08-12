<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Flavour;
use Illuminate\Http\Request;

class FlavourController extends Controller
{
    
    public function index(){
        $userData = Flavour::get();
        return view('backend.flavour.flavour',compact('userData'));
    }
    public function addflavour(){
        return view('backend.flavour.addflavour');
    }



    public function saveflavour(Request $request){
        // dd($request->all());
        $request->validate([
            'flavour_name'=> 'required',
        ]);
        $flavour = Flavour::create([
            'flavour_name' => $request->flavour_name,        
        ]);
            // dd($request->all());
        $flavour->save();
        return redirect()->back()->with('status','flavour Added Succesfully');
    }

    // get edit user ID
       public function editflavour($id){
        $flavourid = Flavour::where('id','=' ,$id)->first();
        return
        view('backend.flavour.editflavour',compact('flavourid'));  
    }

    public function updateflavour(Request $request){
        $id = $request->id;

        $request->validate([
            'flavour_name'=> 'required',

        ]);

        Flavour::where('id','=',$id)->update([
            
            'flavour_name' => $request->flavour_name,
            
        ]);
        return redirect()->back()->with('status','flavour Profile Edit Successfully');
    }

    public function deleteflavour($id){
        Flavour::where('id','=',$id)->delete();
        return redirect()->back()->with('status','flavour Profile Deleted Successfully');
    }
}
