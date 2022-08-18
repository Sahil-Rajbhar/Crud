<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Employe Details</title>
        <style>
                table{
                    text-align: center;
                    background-color:#0004;
                    margin-left:500px;
                }
                td{
                    padding-right:100px;
                    padding-left:100px;
                    padding-top:30px;
                    padding-bottom:30px;
                    background-color:#0001;
                }
                .heading{
                    background-color:#0004;  
                }
        </style>
    </head>
    <body>
        <center><h1>Employe Details</h1></center>
        <hr>
        <table >
            <tr class = "heading">
                <td>Employee Name</td>
                <td>Employee Email</td>
                <td>Edit</td>
            </tr>
            @foreach ( $infomation as $employee )
                <tr>
                    <td>{{ $employee->employee_name }}</td>
                    <td>{{ $employee->employee_email }}</td>
                    <td><a href=" {{  route('employees.edit' , $employee->id)  }} ">Edit</a></td>
                </tr>
            @endforeach
        </table>  
    </body>
</html>