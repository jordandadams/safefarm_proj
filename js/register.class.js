
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
                            location.reload();
                        } else {
                            //$('#regAlert').html(result);
                            console.log(result);
                        }
                    }
                })
            }
        }
    }

    /*registerNewUser() {
        var fName = $('#fName').val();
        var lName = $('#lName').val();
        var email = $('#email').val();
        var password = $("#cpassword").val();

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
                    data: {
                        fName : fName,
                        lName : lName,
                        email : email,
                        password : password
                    },
                    success: function (result) {
                        $('#register-btn2').val('Sign Up');
                        console.log(result);
                    }
                })
            }
        }
    }*/



}