<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\CrudEmpController;

use DB;









class CrudEmpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

      
    $user = auth()->user();
     
    $own = $user->id;
    
    $data = DB::select('select * from EmpData where owner = ?' , [$own]);
     
   
                     return view( 'dashboard' , ['data' => $data] );
  
        //   $data = Empdata::all();

        // return view('employe.index', ["data" => $data]);





    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //


        


          
    $user = auth()->user();
    $own = $user->id;
    $name = $request->input('Employe_Name');
    $email = $request->input('Employe_Email');

    $this->validate($request, [
        'Employe_Name' => 'required|String',
        'Employe_Email' => 'required|email|unique:EmpData,Emp_Email',
    ]);

    
    DB::insert('insert into EmpData (Emp_Name,Emp_Email,owner) values(? , ? , ?)',[ $name , $email , $own] );
 
    // echo " <script>alert('Record inserted successfully.')</script><br/>";
    
    // echo '<a href = "dashboard">Click Here</a> to go back.';

    return redirect('employe')->with('msg', 'Employe added Successfully');







    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
           

        $ret = DB::select('select * from EmpData where id = ?' , [$id]);
        
        return view( 'edit_form' ,  ['ret' => $ret]);



        
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
        //

        $name = $request->input('Emp_name');

        $email = $request->input('Emp_email');
        
        $this->validate($request, [
    
            
            'Emp_name' => 'required',
            'Emp_email' => 'required|email|unique:EmpData,Emp_Email,'.$id,
            
        ]);
        
    
    
        DB::update('update EmpData set Emp_Name = ? , Emp_Email = ? where id = ?',[$name , $email , $id]);
    
        // echo " <script>alert('Record updated successfully.')</script><br/>";
    
        // echo '<a href = "/dashboard">Click Here</a> to go back.';
    
        return redirect( 'dashboard'  )->with('updatemsg', 'Employe updated Successfully');




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        DB::delete('delete from EmpData where id = ?' , [$id] );

        //    echo " <script> alert('Record deleted successfully.')</script><br>";
    
        //   echo '<a href = "/dashboard" >click here to go back </a> to go back.';
    
          return redirect( 'employe' )->with('message', 'Employe Deleted Successfully');



    }
}