
class Login {

    //Login Ajax Request
    userLogin() {
        var email = $('#email').val();
        var password = $('#password').val();
        var request = {
            request: 'get_login'
        }

        if ($.trim(email).length > 0 && $.trim(password).length > 0) {
            $.ajax({
                url:
            })
        }
    }



}