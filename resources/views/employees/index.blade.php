
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
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
            <table class="employe-table" id="tabel">  
                <br>
                <br>      
                <tr class="listing-table-heading">
                    <td>Employee Name</td>
                    <td>Employee Email</td>
                    <td>Edit</td>
                    <td>View</td>
                    <td>Delete</td>                                                                               
                </tr>                                    
                @foreach ($employees as $employee)  
                    <tr>
                        <td>{{ $employee->name }}</td>
                        <td><a href="mailto: {{ $employee->email }}">{{ $employee->email }}</a></td>
                        <td><a href=" {{ route('employees.edit', $employee->id) }} "class="bg-white hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Edit</a></td>
                        <td><a href="{{ route('employees.show', $employee->id) }} "class="bg-white hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">View</a></td>
                        <td>              
                            <form action="{{ route('employees.destroy',$employee->id) }}" method="POST" >
                                @csrf
                                @method('DELETE')
                                <button class="bg-blue-500 hover:bg-white text-white hover:text-blue-500 font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-y hover:border-blue-500 rounded delete-button">
                                    Delete
                                </button>                                  
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tr><th colspan="2">{{ $employees->links() }}</th></tr>                      
            </table>
            <br>            
        </div>
        {{-- {{ $employees->links() }} --}}
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
 
    <script>
        $('.delete-button').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure ?`,
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
          });
      });
     </script>
    
       

@endcomponent
