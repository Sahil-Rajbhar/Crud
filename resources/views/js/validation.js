// <script type="text/javascript"> 
$(function () {
    $('#email').on('keyup', function () {
        let data = {
            email: $(this).val(),
            _token: "{{ csrf_token() }}"
        }
        $.post("{{ route('email.validate') }}", data)
            .then(function () {
                $('.email-error').empty()
            })
            .fail(function (error) {
                $('.email-error').text(error.responseJSON.message)
                $('#error_email').empty()
            })
    })
});
//  </script> 