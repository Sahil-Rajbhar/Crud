@component('layouts.app')
    <center><h1 class="edit-title">Adding New Employee</h1></center>
    <div class="edit-container">
        {{ Form::open(['route' => 'employees.store'], array('class' => 'bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4')) }}
            @include('employees._fields')
        {{ Form::close() }}
    </div>
@endcomponent