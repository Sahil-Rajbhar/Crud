<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;

use Illuminate\Http\Request;

use App\Models\Employee;

use App\Http\Controllers\EmployeeController;

use Illuminate\Database\Eloquent\Model;


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
        $employees = Employee::where('user_id', '=', $loggedId)->get();   
        return view('employees.index', ['employees' => $employees]);
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
        $this->validate($request, [
            'name' => 'required|String',
            'email' => 'required|email|unique:employees,email',
        ]);
        $employee = new Employee();
        $employee->name = $request->name;
        $employee->email = $request->email;
        $user = auth()->user();
        $admin = $user->id;
        $employee->user_id = $admin;        
        if($employee->save()){
            return redirect('employees')->with('addMessage', 'employe added successfully');
        }         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {

        if (Gate::allows('employe-edit', $employee)) {          
            return view('employees.show', compact('employee'));
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
    public function edit(Employee $employee)
    {  
        if (Gate::allows('employe-edit', $employee)) { 
            return view('employees.edit', compact('employee'));           
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
        $employee = Employee::find($id);
        $employee->name = $name;
        $employee->email = $email;
        $employee->save();
        return redirect('employees')->with('updateMessage','employe updated successfully'); 

    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {  
        $employee->delete();
        return redirect('employees')->with('message','employee has been deleted successfully');
    }

}