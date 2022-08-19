<link rel="stylesheet" href="{{ asset('css/Style.css') }}">
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
                    @if(session()->has('addMessage')) 
                        <div class="status-message">
                            {{ session()->get('addMessage') }}
                        </div>
                    @endif
                    @if(session()->has('message')) 
                        <div class="status-message">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    @if(session()->has('updateMessage')) 
                        <div class="status-message">
                            {{ session()->get('updateMessage') }}
                        </div>
                    @endif
                    <table class="employe-table">  
                        <a href="{{ route('employees.create') }}" class="add-Button">Add new employe</a>
                        <br>
                        <br>      
                        <tr class="listing-table-heading">
                            <td>Employee Name</td>
                            <td>Employee Email</td>
                            <td>Edit</td>
                            <td>view</td>
                            <td>Delete</td>                                                                               
                        </tr>                                    
                        @foreach ($data as $employee)  
                            <tr>
                                <td>{{ $employee->name }}</td>
                                <td>{{ $employee->email }}</td>
                                <td><a href=" {{ route('employees.edit', $employee->id) }} "class="index-buttons">Edit</a></td>
                                <td><a href="{{ route('employees.show', $employee->id) }} "class="index-buttons">View</a></td>
                                <td>              
                                    <form action="{{ route('employees.destroy',$employee->id) }}" method="POST" onsubmit="return confirm('are you sure ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-primary">delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach                        
                    </table>
                    <br>                                           
                </div>
            </div>
        </div>
    </div>                                     
</x-app-layout>
