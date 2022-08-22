<link rel="stylesheet" href="{{ asset('css/Style.css') }}">
@component('layouts.app')
    <center><h1 class="title">updating employee data</h1></center>
    <hr>
    <br>                  
    <div class="edit-container">
        <form action="{{ route('employees.update',$employee->id) }}" method="post">
            @csrf
            @method('PUT')
            <table>
                <tr>
                    <td>Employee Name</td>
                    <td> <input type="text" name="employee_name" id="" value={{ old('employee_name', $employee->name) }}> <br><br>
                        @if ($errors->has('employee_name'))
                            <ul>
                                <li><span>{{ $errors->first('employee_name') }}</span></li>
                            </ul>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Employee Email</td>
                    <td><input type="text" name="employee_email" id="" value={{ old('employee_email', $employee->email) }}> <br><br>
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
    </div>
@endcomponent