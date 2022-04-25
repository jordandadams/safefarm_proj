
class Register {

    errorMessage() {
        alert('An unknown error has occured!');
        location.reload();
    }

    register() {
        this.errorMessage();
        var firstName = $('fname').val().trim();
        var lastName = $('lname').val().trim();
        var email = $('email').val().trim();
        var password = $('rpassword').val().trim();
        if (firstName == "" || lastName == "" || email == "" || password == "") {
            return;
        }
        var self = this;
        var request = {
            request: 'register'
        };
        request['first_name'] = firstName;
        request['last_name'] = lastName;
        request['email'] = email;
        request['password'] = password;
        $.ajax({
            type: "POST",
            url: "../routes/register.php",
            data: request,
            success: function (result) {
                console.log(result);
                var result = JSON.parse(result);
                console.log(result);
                if (typeof result === 'object' && result !== null) {
                    if (result == '1') {
                        location.reload();
                    }
                    else {
                        self.errorMessage();
                    }
                }
            }
        });
    }



}