
class Register {

    registerNewUser() {
        if ($('#register-form')[0].checkValidity()) {
            $('#register-btn2').val('Please Wait...');
            if($('#rpassword').val() != $('#cpassword').val()) {
                $('#passError').text('The passwords do not match!');
                $('#register-btn2').val('Sign Up');
            } else {
                $('#passError').text('');
                $.ajax({
                    url: '../controllers/registerPage.class.php',
                    method: 'POST',
                    data: $("#register-form").serialize() + '&action=register',
                    success: function (result) {
                        $('#register-btn2').val('Sign Up');
                        if (result === 'register') {
                            $('#regAlert').html('<div class="alert alert-success" role="alert">User has been created! Please refresh page to add another user.</div>');
                        } else {
                            $('#regAlert').html(result);
                        }
                    }
                })
            }
        }
    }

}