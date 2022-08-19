<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>editing employe details</title>
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
                            <center><h1 class="title">updating employee data</h1></center>
                            <hr>
                            <br>                  
                            <div class="edit-container">
                                @foreach ($retrievedData as $employee)
                                    <form action="{{ route('employees.update',$employee->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <table>
                                            <tr>
                                                <td>Employee Name</td>
                                                <td> <input type="text" name="employee_name" id="" value = {{ old('employee_name', $employee->name) }}> <br><br>
                                                    @if ($errors->has('employee_name'))
                                                        <ul>
                                                            <li><span>{{ $errors->first('employee_name') }}</span></li>
                                                        </ul>
                                                   @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Employee Email</td>
                                                <td><input type="text" name="employee_email" id="" value = {{ old('employee_email', $employee->email) }}> <br><br>
                                                    @if ($errors->has('employee_email'))
                                                        <ul>
                                                            <li><span class="text-danger">{{ $errors->first('employee_email') }}</span></li>
                                                        </ul>
                                                   @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><a href="/employees" class="cancel-edit">Cancel</a></td>
                                                <td><button type="submit" class="edit-update">update</button></td>
                                            </tr>
                                        </table>                  
                                    </form>    
                                @endforeach
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
       
        </x-app-layout>          
    </body>
</html>