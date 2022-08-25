<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class EmployeeEmailValidationController extends Controller
{
    public function index(Request $request){

        $request->validate([ 'email' => 'unique:employees' ]);
    }

}