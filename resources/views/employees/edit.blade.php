@component('layouts.app')
    <center><h1 class="edit-title">Updating Employee Data</h1></center>
    <div class="edit-container">
        {{ Form::model($employee, ['route' => ['employees.update', $employee->id], 'method' => 'put']), array('class' => 'bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4') }}
            @include('employees._fields', $employee)
            {{Form::hidden('id', $employee->id)}}
        {{ Form::close() }}
    </div>
@endcomponent