<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;

use Illuminate\Http\Request;

// use App\Http\Controllers\CrudEmpController;
use App\Http\Controllers\EmployeeController;

use DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct(){

      $this->middleware('UserMiddleware')->only(['index']);


     }
    public function index()
    {       
        $user = auth()->user();    
        $own = $user->id;   
        $data = DB::select('select * from employee_details where owner = ?' , [$own]);    
        return view( 'employee.index' , ['data' => $data] );
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('employee.create');
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
    $own = $user->id;
    $name = $request->input('Employe_Name');
    $email = $request->input('Employe_Email');
    $this->validate($request, [
        'Employe_Name' => 'required|String',
        'Employe_Email' => 'required|email|unique:employee_details,employee_email',
    ]);
     DB::insert('insert into employee_details (employee_name,employee_email,owner) values(? , ? , ?)',[ $name , $email , $own] );
     return redirect('employees')->with('msg', 'Employe added Successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $EmpData = DB::table('employee_details')->select('owner')->where('id' , $id)->first();
        if (Gate::allows('employe-edit',$EmpData)) {
        $info = DB::select('select * from employee_details where id = ?' , [$id]);       
        return view( 'employee.show' ,  ['info' => $info]);
        }else{
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
        $EmpData = DB::table('employee_details')->select('owner')->where('id' , $id)->first();
        if (Gate::allows('employe-edit',$EmpData)) {
            $ret = DB::select('select * from employee_details where id = ?' , [$id]);  
            return view( 'employee.edit' ,  ['ret' => $ret]);           
        } else {
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
         $name = $request->input('emp_name');
        $email = $request->input('emp_email');       
        $this->validate($request, [           
            'emp_name' => 'required',
            'emp_email' => 'required|email|unique:employee_details,employee_email,'.$id,           
        ]);       
        DB::update('update employee_details set employee_name = ? , employee_email = ? where id = ?',[$name , $email , $id]);   
         return redirect('employees')->with('updatemsg', 'Employe updated Successfully');
     }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  
           DB::delete('delete from employee_details where id = ?' , [$id] );       
          return redirect('employees')->with('message', 'Employe Deleted Successfully');  
    }
}