<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Adding new employe</title>
        <link rel="stylesheet" href="{{ asset('css/Style.css') }}">
    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Dashboard') }}
                </h2>
            </x-slot>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">                           
                            <center><h1 class="heading">Adding new Employee</h1></center>
                            <hr>
                            <div class="create-container">
                                <form method="post" action="{{ route('employees.store') }}">  
                                    @csrf   
                                    {{-- <center><h1>Enter Employee Details</h1></center> --}}
                                    <div class="form-group">      
                                        <label for="first_name">Employee Name:</label> &nbsp; 
                                        <input type="text" class="form-control" name="Employee_Name" value="{{ old('Employee_Name') }}"><br/><br/> 
                                        @if ($errors->has('Employee_Name'))
                                            <ul>
                                                <li><span>{{ $errors->first('Employee_Name') }}</span></li>
                                            </ul>
                                        @endif
                                        <br> 
                                    </div>  
                                    <div class="form-group">      
                                        <label for="first_name">Employee Email:</label> &nbsp; 
                                        <input type="text" class="form-control" name="Employee_Email" value="{{ old('Employee_Email') }}"><br/><br/>  
                                        @if ($errors->has('Employee_Email'))
                                            <ul>
                                                <li><span>{{ $errors->first('Employee_Email') }}</span></li>
                                            </ul>
                                        @endif
                                        <br/> 
                                    </div>   
                                    <br/>  
                                    <a href="/employees" class="create-link">Cancel</a> &nbsp;
                                    <button type="submit" class="create-add" >Add</button>  
                                </form>  
                            </div>  
                        </div>
                    </div>
                </div>
            </div>  
        </x-app-layout>    
    </body>
</html>