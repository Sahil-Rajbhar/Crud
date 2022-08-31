<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Model;

use App\Models\User;

use Illuminate\Support\Facades\Validator;

class editProfileController extends Controller
{
    //
    public function edit()
    {
        $user = auth()->user();
        return view('edit_profile',compact('user') );        
    }
    
    public function update(Request $request, User $user)
    {     
         
        $data = $request->all();
        $user = User::find($request->id);
        
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$request->id,
        ]);     
        //  $user->update($data);
        $user->update([
            'name' => $request->name,
            'class' => $request->email,
        ]);         
           
    }


}