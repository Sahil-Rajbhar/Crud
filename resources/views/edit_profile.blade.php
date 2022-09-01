@component('layouts.app')
    <center><h1 class="edit-title">Updating User Data</h1></center>
    <div class="edit-container">
        <div class="msg"></div>
        <div class="error-message"></div>
        {{ Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'post']), array('class' => 'bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4' , 'id' => 'form') }}
            @include('employees._fields', $user)
            {{Form::hidden('id', $user->id)}}
        {{ Form::close() }}
    </div>
    {{-- @include('employees._email-validate', ['employeeId' => $user->id]) --}}

    @push('js')
        <script type="text/javascript">
            $(function(){
            
                let $submitBtn = $("#submit-button"); 
                let $email = $('#email');   

                $submitBtn.on("click", submitForm); 
                $email.on("keyup", validateEmail); 
            
                function submitForm(e){ 
                    e.preventDefault();                       
                    let data = {
                        name:$('#name').val(),
                        email:$('#email').val(),
                        _token:'{{ csrf_token() }}'
                    }

                    $.post("{{ route('user.update',$user->id)}}" , data)
                        .then(function(){                      
                            $('.msg').text('user updated');
                        })
                        .fail(function(error){        
                            console.log(error)                                                              
                            $('.error-message').text(error.responseJSON.message);                        
                        })
                }
            
                function validateEmail(e){             
                    let data = {
                        email: $(this).val(),
                        _token:"{{csrf_token()}}"
                    }

                    $.post("{{route('user.validate', $user->id)}}", data)
                        .then(function(){
                            $('.error-message').empty()                        
                        })
                        .fail(function(error){                        
                            $('.error-message').text(error.responseJSON.message)                                                
                        })
                }       
            });
        
        </script>
    @endpush

@endcomponent
