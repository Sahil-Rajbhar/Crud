<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class EmployeeEmailValidationController extends Controller
{
    public function index(Request $request){
        
        return $request->validate([ 'email' => 'unique:employees,email'. $request->id ?? null ]);

    }

}