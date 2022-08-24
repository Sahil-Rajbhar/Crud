<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;

use Illuminate\Http\Request;

use App\Models\Employee;

use App\Http\Controllers\EmployeeController;

use Illuminate\Database\Eloquent\Model;

use App\Http\Requests\StoreEmployeeRequest;


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

    public function index(Request $request)
    {
        return view('employees.index', [
            'employees' => $request->user()->employees()->paginate(5)
        ]);
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
    public function store(StoreEmployeeRequest $request)
    {       

        $employee = $request->user()->employees()->create([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect('employees')->with([
            'status'=>'Adding employee data',
            'message'=>'Employee added successfully'
        ]);
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
     * Update the specified resource in storage
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEmployeeRequest $request, Employee $employee)
    {    
 
        $employee->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        
        return redirect('employees')->with([
            'status'=>'Updating employee data',
            'message'=>'Employee updated successfully',
            ]);
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
        return redirect('employees')->with([
            'status'=>'Deleting employee data',
            'message'=>'Employee deleted successfully',]);    
    }

    
}