@component('layouts.app')
    <center><h1 class="show-title">Employe Details</h1></center>
    <hr>
    <br>
    <table class="show-table">
        <tr class="show-heading">
            <td>Employee Name</td>
            <td>Employee Email</td>
            <td>Edit</td>
        </tr>
        <tr>
            <td>{{ $employee->name }}</td>
            <td><a href="mailto: {{ $employee->email }} ">{{ $employee->email }}</a></td>
            <td><a href="{{ route('employees.edit', $employee->id) }}">Edit</a></td>
        </tr>                               
    </table>               
@endcomponent