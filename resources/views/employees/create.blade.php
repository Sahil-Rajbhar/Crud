@component('layouts.app')
    <center><h1 class="edit-title">Adding New Employee</h1></center>
    <div class="edit-container">
        {{ Form::open(['route' => 'employees.store'], array('class' => 'bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4')) }}
            @include('employees._fields')
        {{ Form::close() }}
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $('#email').on('keyup', function(){
                let data = {
                    email: $(this).val(),
                    _token: "{{ csrf_token() }}"
                }

                $.post("{{ route('email.validate') }}", data)
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