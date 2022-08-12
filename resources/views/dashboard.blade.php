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
         margin-left:375px;
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

                                {{--   employe table showing data    --}}



                                {{-- sucessfull message after adding new employe --}}
                                


                                @if(session()->has('msg'))
                                <div class="sucess">
                                {{ session()->get('msg') }}
                                </div>
@endif


                                {{-- successfull message after deleting employe --}}

                         
                         @if(session()->has('message'))
                                    <div class="sucess">
                                    {{ session()->get('message') }}
                                    </div>
                         @endif

                                          {{-- update message --}}


                        @if(session()->has('updatemsg'))
                                    <div class="sucess">
                                     {{ session()->get('updatemsg') }}
                                    </div>
                        @endif











                <table>
                                        {{-- first row (heading of the table)  --}}
                    <tr class="heading">
                        
                            <td>Employe Name</td>
                            <td>Employe Email</td>
                            <td>Edit</td>
                            <td>Delete</td>
                                                       
                        
                    </tr>
                                    {{-- rows containing the data of the employies. --}}

                   @foreach ($data as $emp)
                    <tr>
                            <td>{{ $emp->Emp_Name }}</td>
                            <td>{{ $emp->Emp_Email }}</td>
                            <td><a href = " {{  route('employe.edit' , $emp->id)  }} " >Edit</a></td>



                            <td><a href=" {{  route('employe.destroy' , $emp->id)  }} "  class="btn btn-danger" onclick="return confirm('are you sure ?')" >Delete</a></td>
                    </tr>
                    @endforeach
                        
                        
                </table>
                        
                        
                             <a href="   {{ route('employe.create') }}  " class = "link">Add employe</a>
                        




















</x-app-layout>
