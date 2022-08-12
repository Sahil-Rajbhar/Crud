<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>editing employe details</title>
</head>
<body>
    <center><h1>updating employe data</h1></center>
    <hr>


    <form action = " {{route('employe.update' , <?php echo $ret[0]->id; ?> )}} " method = "post">


      
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">

{{-- error if data is not valid --}}
                     
                  {{-- @if ($errors->any())
                      <div>
                          <ul>
                           @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                            @endforeach
                           </ul>
                      </div>
                  @endif --}}

     
        <table>
           <tr>
              <td>Employe_Name</td>
              <td>
                 <input type = 'text' name = 'Emp_name' 
                    value = '<?php echo $ret[0]->Emp_Name; ?>'/>
              </td>
           </tr>
          


           <tr>
            <td>Employe_Email</td>
            <td>
               <input type = 'text' name = 'Emp_email' 
                  value = '<?php echo $ret[0]->Emp_Email; ?>'/>
            </td>
         </tr>






           <tr>
              <td colspan = '2'>
                 <input type = 'submit' value = "Update Employe_Name" />
              </td>
           </tr>
        </table>
     </form>
    
</body>
</html>