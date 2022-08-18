<style>
    td{
        padding-right:100px;
        padding-left:100px;
        padding-top:30px;
        padding-bottom:30px;
        background-color:#0002; 
    }
    table{
        align-items: center;
        border:5px solid black;
        text-align: center;
        margin-left:250px;
    }
    .heading{
        background-color:#0004;
    }
    a{
        align-items: center;   
    }
    .link{
        width:200px;
        align-items: center;
        background-color:#0004;       
        margin-left:900px;
    }
    .sucess{
        text-align:center;
        color:green;
    }
</style>
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
                    You're logged in!
                </div>
            </div>
        </div>
    </div>                                  
    @if(session()->has('addMessage')) 
        <div class="sucess">
            {{ session()->get('addMessage') }}
        </div>
    @endif
    @if(session()->has('message')) 
        <div class="sucess">
            {{ session()->get('message') }}
        </div>
    @endif
    @if(session()->has('updateMessage')) 
        <div class="sucess">
            {{ session()->get('updateMessage') }}
        </div>
    @endif
    <table>        
        <tr class="heading">
            <td>Employee Name</td>
            <td>Employee Email</td>
            <td>Edit</td>
            <td>view</td>
            <td>Delete</td>                                                                               
        </tr>                                    
        @foreach ($data as $emp)  
            <tr>
                <td>{{ $emp->employee_name }}</td>
                <td>{{ $emp->employee_email }}</td>
                <td><a href = " {{  route('employees.edit', $emp->id)  }} " >Edit</a></td>
                <td> <a href="{{  route('employees.show', $emp->id)  }} ">View</a></td>
                <td>
                {{-- delete section  --}}
                    <form action="{{ route('employees.destroy',$emp->id) }}" method="POST" onsubmit="return confirm('are you sure ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-primary">delete</button>
                    </form>
                </td>
            </tr>
        @endforeach                        
    </table>                        
    <a href="   {{ route('employees.create') }}  " class = "link">Add new employe</a>
</x-app-layout>
