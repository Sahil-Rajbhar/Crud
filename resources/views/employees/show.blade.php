<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Employe Details</title>
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
                            <center><h1 class="show-title">Employe Details</h1></center>
                            <hr>
                            <br>
                            <table class="show-table">
                                <tr class="show-heading">
                                    <td>Employee Name</td>
                                    <td>Employee Email</td>
                                    <td>Edit</td>
                                </tr>
                                @foreach ($infomation as $employee)
                                    <tr>
                                        <td>{{ $employee->name }}</td>
                                        <td>{{ $employee->email }}</td>
                                        <td><a href="{{ route('employees.edit', $employee->id) }}">Edit</a></td>
                                    </tr>
                                @endforeach
                            </table>                             
                        </div>
                    </div>
                </div>
            </div>                                  
        </x-app-layout>
    </body>
</html>