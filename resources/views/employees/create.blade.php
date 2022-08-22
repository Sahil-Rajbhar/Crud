<link rel="stylesheet" href="{{ asset('css/Style.css') }}">
@component('layouts.app')
    <center><h1 class="heading">Adding new Employee</h1></center>
    <hr>
    <div class="create-container">
        <form method="post" action="{{ route('employees.store') }}">  
            @csrf               
            <div class="form-group">      
                <label for="first_name">Employee Name:</label> &nbsp; 
                <input type="text" class="form-control" name="name" value="{{ old('name') }}"><br/><br/> 
                @if ($errors->has('name'))
                    <ul>
                        <li><span>{{ $errors->first('name') }}</span></li>
                    </ul>
                @endif
                <br> 
            </div>  
            <div class="form-group">      
                <label for="first_name">Employee Email:</label> &nbsp; 
                <input type="text" class="form-control" name="email" value="{{ old('email') }}"><br/><br/>  
                @if ($errors->has('email'))
                    <ul>
                        <li><span>{{ $errors->first('email') }}</span></li>
                    </ul>
                @endif
                <br/> 
            </div>   
            <br/>  
            <a href="/employees" class="create-link">Cancel</a> &nbsp;
            <button type="submit" class="create-add" >Add</button>  
        </form>  
    </div>     
@endcomponent