@component('layouts.app')
    <div class="add-Button">
        <a href="{{ route('employees.create') }}" class="hover:bg-blue-400 group flex items-center rounded-md bg-blue-500 text-white text-sm font-medium pl-2 pr-3 py-2 shadow-sm w-32"> 
            New employee +
        </a>
    </div>
    <div class="outer-container">  
        <div class="status-message">
            {{ session()->get('message') }}
        </div>                     
        <div class="index-container">                             
            <table class="employe-table">  
                <br>
                <br>      
                <tr class="listing-table-heading">
                    <td>Employee Name</td>
                    <td>Employee Email</td>
                    <td>Edit</td>
                    <td>view</td>
                    <td>Delete</td>                                                                               
                </tr>                                    
                @foreach ($employees as $employee)  
                    <tr>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td><a href=" {{ route('employees.edit', $employee->id) }} "class="index-buttons">Edit</a></td>
                        <td><a href="{{ route('employees.show', $employee->id) }} "class="index-buttons">View</a></td>
                        <td>              
                            <form action="{{ route('employees.destroy',$employee->id) }}" method="POST" onsubmit="return confirm('are you sure ?')">
                                @csrf
                                @method('DELETE')
                                {{-- <button type="submit" class="btn btn-primary">delete</button> --}}
                                <button class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                                    Delete
                                </button>
                                  
                            </form>
                        </td>
                    </tr>
                @endforeach                        
            </table>
            <br>
        </div>
    </div> 
@endcomponent