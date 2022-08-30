@component('layouts.app')
    <center><h1 class="edit-title">Updating User Data</h1></center>
    <div class="edit-container">
        <div class="msg"></div>
        {{ Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'post']), array('class' => 'bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4' , 'id' => 'form') }}
            @include('employees._fields', $user)
            {{Form::hidden('id', $user->id)}}
        {{ Form::close() }}
    </div>
    {{-- @include('employees._email-validate', ['employeeId' => $employee->id]) --}}
@endcomponent
<script type="text/javascript">
    $(document).ready(function(){
        $(document).on("click", "#submit-button", function() { 
           
            var url = "{{URL('update/'.$user->id)}}";
            // var id= 
            $.ajax({
                url: url,
                type: "post",
                cache: false,
                data:{
                    _token:'{{ csrf_token() }}',
                    // type: 3,
                    name: $('#name').val(),
                    email: $('#email').val()                   
                },
                success: function(dataResult){
                    dataResult = JSON.parse(dataResult);
                    $('.msg').text("updated")
                    // console.log(dataResult);
                 if(dataResult.statusCode)
                 {
                    window.location = "/userData";
                 }
                 else{
                    alert("Internal Server Error");
                 }

                }
            });
            // event.preventDefault();
        }); 
});

</script>
