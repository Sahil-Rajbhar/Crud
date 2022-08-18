<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>editing employe details</title>
        <style>
           .container{
               width:500px;
               margin:0 auto;
               border:2px solid black;
               text-align:center;
               height: 10cm;
               padding:50px;
            }
           td{
               padding:20px;
            }
           span{
               color:red;
            }
           .link{
                width:200px;
                align-items: center;
                background-color:white;
                border:1px solid black;
                color:black;
                padding:10px 10px; 
                text-decoration: none;        
            }
            button{
                background-color:white;
                color:black;
                border:1px solid black;
                padding:10px 10px;
            }      
        </style>
    </head>
    <body>
        <center><h1>updating employee data</h1></center>
        <hr>                  
        <div class="container">
            @foreach ($retrievedData as $employee)
                <form action="{{ route('employees.update',$employee->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <table>
                        <tr>
                            <td>Employee Name</td>
                            <td> <input type="text" name="employee_name" id="" value = {{ old('employee_name', $employee->employee_name) }}> <br><br>
                                @if ($errors->has('employee_name'))
                                    <ul>
                                        <li><span>{{ $errors->first('employee_name') }}</span></li>
                                    </ul>
                               @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Employee Email</td>
                            <td><input type="text" name="employee_email" id="" value = {{ old('employee_email', $employee->employee_email) }}> <br><br>
                                @if ($errors->has('employee_email'))
                                    <ul>
                                        <li><span class="text-danger">{{ $errors->first('employee_email') }}</span></li>
                                    </ul>
                               @endif
                            </td>
                        </tr>
                        <tr>
                            <td><a href="/employees" class = "link">Cancel</a></td>
                            <td><button type="submit" value="update">update</button></td>
                        </tr>
                    </table>                  
                </form>    
            @endforeach
        </div>           
    </body>
</html>