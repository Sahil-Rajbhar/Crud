<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class editProfileController extends Controller
{
    //
    public function edit(){
        $user = auth()->user();
        return view('edit_profile',compact('user') );        
    }
    
    public function update(Request $request){        
        $data = $request->all();
        $user = User::find($request->id);
        // $this->validate($request,[
        //     'name'=> 'required',
        //     'email'=>'required|unique:user,email.'.$request->id

        // ]);     
        if ($user->update($data)){
            // return redirect('employees')->with([
            //     'status'=>'Updating employee data',
            //     'message'=>'user  updated successfully',
            // ]);
        } else{
            
            echo "not updated";
        }
    }


}