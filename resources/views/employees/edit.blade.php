@component('layouts.app')
    <center><h1 class="edit-title">Updating Employee Data</h1></center>
    <div class="edit-container">
        {{ Form::model($employee, ['route' => ['employees.update', $employee->id], 'method' => 'put']), array('class' => 'bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4') }}
            @include('employees._fields', $employee)
            {{Form::hidden('id', $employee->id)}}
        {{ Form::close() }}
    </div>
    <script type="text/javascript">
        $(function() {
            $('#email').on('keyup', function(){
                let data = {
                    email: $(this).val(),
                    _token: "{{ csrf_token() }}"
                }
                $.post("{{ route('email.validate' , $employee->id ) }}", data)
                    .then(function(){
                        $('.email-error').empty()
                    })
                    .fail(function(error){
                        $('.email-error').text(error.responseJSON.message)
                        $('#error_email').empty()
                    })
            })
        });
    </script>

@endcomponent