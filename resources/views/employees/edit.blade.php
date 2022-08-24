@component('layouts.app')
    <center><h1 class="edit-title">Updating Employee Data</h1></center>
    <div class="edit-container">
        @include('forms.employee_form', $employee)
    </div>
@endcomponent