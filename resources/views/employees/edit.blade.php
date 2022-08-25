@component('layouts.app')
    <center><h1 class="edit-title">Updating Employee Data</h1></center>
    <div class="edit-container">
        {{ Form::model($employee, ['route' => ['employees.update', $employee->id], 'method' => 'put']), array('class' => 'bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4') }}
            @include('employees._fields', $employee)
            {{Form::hidden('id', $employee->id)}}
        {{ Form::close() }}
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
           $(document).ready(function() {
        var startTimer;
        $('#email').on('keyup', function () {
            clearTimeout(startTimer);
            let email = $(this).val();
            startTimer = setTimeout(checkEmail, 500, email);
        });

        $('#email').on('keydown', function () {
            clearTimeout(startTimer);
        });

        function checkEmail(email) {
            $('#email-error').remove();
            if (email.length > 1) {
                $.ajax({
                    type: 'put',
                    url: "{{ route('employees.update', $employee->id) }}",
                    data: {
                        email: email,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        if (data.success == false) {
                            $('#email').after('<div id="email-error" class="text-danger" <strong>'+data.message[0]+'<strong></div>');
                            // $('#submit-button').attr('disabled',true);
                        } else {
                            
                            $('#email').after('<div id="email-error" class="text-success" <strong>'+data.message+'<strong></div>');

                        }

                    }
                });
            } else {
                $('#email').after('<div id="email-error" class="text-danger" <strong>Email address can not be empty.<strong></div>');
                    // $('#submit-button').attr('disabled',true);
            }
        }
    });
    </script>
    {{-- <script>
        $(document).ready(function(){
            $('#email').blur(function(){
                var error_email = '';
                var email =$('#email').val();
                var _token = $('input['name'="_token"]').val();
                var filter = /^([a-zA-Z0-9_\.\-])+@(([a-zA-z0-Z9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if(!filter.test(email)) {
                    $('#error').addclass('has-error');
                    $('#error_email').html('<label class ="text-danger">invalid email</label>');
                } else {
                    $.ajax({
                        url:"{{ route('employees.update', $employee->id)}}",
                        method:"put",
                        data:{ email:email, token:_token },
                        success:function(result)
                        {
                            if(result == 'unique')
                            {
                                $('#error_email').html('<label>email available</label>');
                                $('#email').removeClass('has-error');
                                
                            }
                            else {
                                $('#error_email').html('<label>email not available</label>');
                                $('#email').addClass('has-error');
                            }
                        }
                            
                            
                    })
                }
            });
        });
    </script> --}}
@endcomponent