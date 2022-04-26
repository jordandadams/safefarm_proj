
class Login {

    //Login Ajax Request
    login() {
        if ($('#login-form')[0].checkValidity()) {

            $('#login-btn').val('Please Wait...');
            $.ajax({
                url: '../controllers/loginPage.class.php',
                method: 'POST',
                data: $('#login-form').serialize() + '&action=login',
                success: function(result) {
                    $('#login-btn').val('Sign In');
                    if (result === 'login') {
                        window.location = 'home.php';
                    } else {
                        $('#loginAlert').html(result);
                    }
                }
            })
        }
    }



}