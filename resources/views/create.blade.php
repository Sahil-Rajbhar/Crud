<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Adding new employe</title>
     <style></style>
</head>
<body>
<center><h1>Adding new Employe</h1></center>
<hr>

<form method="post" action="{{ route('employe.store') }} ">  
    @csrf   
            <center><h1>Applicatin Form</h1></center>
            
            
            {{-- error if data is not valid --}}
                     
                       @if ($errors->any())
                         <div>
                              <ul>
                                    @foreach ($errors->all() as $error)
                                           <li>{{ $error }}</li>
                                    @endforeach
                             </ul>
                         </div>
                       @endif

           <div class="form-group">      
               <label for="first_name">Employe Name:</label><br/><br/>  
               <input type="text" class="form-control" name="Employe_Name"/><br/><br/>  
           </div>  
 <div class="form-group">      
 <label for="first_name">Employe Email:</label><br/><br/>  
               <input type="text" class="form-control" name="Employe_Email"/><br/><br/>  
           </div>  
 
 <br/>  
 <button type="submit" class="btn-btn" >Add</button>  
 </form>  




    
</body>
</html>