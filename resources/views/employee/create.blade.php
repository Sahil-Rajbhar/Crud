<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Adding new employe</title>
     <style>
         .container{
             border:2px solid black;
             text-align:center;
             height: 15cm;
             padding-top:30px;
             width:500px;
             margin:0 auto;
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
<center><h1 class = "heading">Adding new Employee</h1></center>
<hr>
<div class="container">
<form method="post" action="{{ route('employees.store') }} ">  
    @csrf   
            <center><h1>Enter Employee Details</h1></center>
           <div class="form-group">      
               <label for="first_name">Employee Name:</label><br/><br/>  
               <input type="text" class="form-control" name="Employe_Name" value = "{{ old('Employe_Name') }}"><br/><br/>  
               @if ($errors->has('Employe_Name'))
               <ul>
                   <li><span>{{ $errors->first('Employe_Name') }}</span></li>
               </ul>
              @endif
           </div>  
 <div class="form-group">      
 <label for="first_name">Employee Email:</label><br/><br/>  
               <input type="text" class="form-control" name="Employe_Email" value = "{{ old('Employe_Email') }}"><br/><br/>  
               @if ($errors->has('Employe_Email'))
               <ul>
                   <li><span>{{ $errors->first('Employe_Email') }}</span></li>
               </ul>
              @endif
           </div>   
 <br/>  
 <a href="/employees" class = "link">Cancel</a>
 <button type="submit" class="btn-btn" >Add</button>  
 </form>  
</div>   
</body>
</html>