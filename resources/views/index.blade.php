<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>employies details</title>
    <style>
        table{

           margin-left:500px;

        }
    </style>
</head>
<body>


    <h1>employies data</h1>

     <table>


        {{-- first row (heading row) --}}
     <tr>
             <td>Employe_name</td>
             <td>Employe_email</td>
             <td>Edit</td>
             <td>Delete</td>
     </tr>

     @foreach ($data as $emp)
     <tr>
             <td>{{ $emp->Emp_Name }}</td>
             <td>{{ $emp->Emp_Email }}</td>
             <td><a href = 'edit/{{ $emp->id }}' >Edit</a></td>
             <td><a href='delete/{{ $emp->id}}'   class="btn btn-danger" onclick="return confirm('are you sure ?')" >Delete</a></td>
     </tr>
     @endforeach
      
            



     </table>





    
</body>
</html>