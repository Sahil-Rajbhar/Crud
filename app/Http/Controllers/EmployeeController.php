<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;

use Illuminate\Http\Request;

use App\Http\Controllers\EmployeeController;

use DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    { 
        $this->middleware('UserMiddleware')->only(['index']);
    }

    public function index()
    {       
        $user = auth()->user();    
        $loggedId = $user->id;   
        $data = DB::select('select * from employees where user_id = ?', [$loggedId]);    
        return view('employees.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       
        $user = auth()->user();
        $admin = $user->id;
        $name = $request->input('Employee_Name');
        $email = $request->input('Employee_Email');
        $this->validate($request, [
            'Employee_Name' => 'required|String',
            'Employee_Email' => 'required|email|unique:employees,email',
        ]);
        DB::insert('insert into employees (name,email,user_id)values(?, ?, ?)',[$name, $email, $admin]);
        return redirect('employees')->with('addMessage', 'Employe added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employeeData = DB::table('employees')->select('user_id')->where('id', $id)->first();
        if (Gate::allows('employe-edit', $employeeData)) {
            $infomation = DB::select('select * from employees where id = ?', [$id]);       
            return view('employees.show',  ['infomation' => $infomation]);
        }
        else {
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {  
        $employeeData = DB::table('employees')->select('user_id')->where('id', $id)->first();
        if (Gate::allows('employe-edit', $employeeData)) {
            $retrievedData = DB::select('select * from employees where id = ?', [$id]);  
            return view('employees.edit',  ['retrievedData' => $retrievedData]);           
        }
        else {
            abort(404);
        }  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {    
        $name = $request->input('employee_name');
        $email = $request->input('employee_email');       
        $this->validate($request,[           
            'employee_name' => 'required',
            'employee_email' => 'required|email|unique:employees,email,'.$id,           
        ]);       
        DB::update('update employees set name = ?, email = ? where id = ?',[$name, $email, $id]);   
        return redirect('employees')->with('updateMessage', 'Employe updated Successfully');       
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  
        DB::delete('delete from employees where id = ?', [$id]);       
        return redirect('employees')->with('message', 'Employe Deleted Successfully');          
    }
}