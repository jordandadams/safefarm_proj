<!-- Register Form Start -->
<div class="container">

<div class="row justify-content-center wrapper" id="register-box">
    <div class="col-lg-10 my-auto">
        <div class="card-group">
            <div class="card rounded-left p-4" style="flex-grow:1.4;">
                <img src="../public/SFlogo.png" class="imglogo">
                <h1 class="text-center font-weight-bold text-dark">Create an Account</h1>
                <hr class="my-3">
                <form action="#" method="post" class="px-3" id="register-form">
                 <!-- Name Input -->
                    <div class="input-group input-group-lg form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text rounded-0">
                                <i class="fas fa-user-alt fa-lg"></i> <!-- User Icon -->
                            </span>
                        </div>
                        <input type="name" name="name" id="name" class="form-control rounded-0" placeholder="Type your First & Last Name..." required>
                    </div>
                <!-- Email Input -->
                    <div class="input-group input-group-lg form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text rounded-0">
                                <i class="far fa-envelope fa-lg"></i> <!-- Envelope Icon -->
                            </span>
                        </div>
                        <input type="email" name="email" id="remail" class="form-control rounded-0" placeholder="Type your e-mail..." required>
                    </div>
                    <!-- Password Input -->
                    <div class="input-group input-group-lg form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text rounded-0">
                                <i class="fas fa-key fa-lg"></i> <!-- Password Icon -->
                            </span>
                        </div>
                        <input type="password" name="password" id="rpassword" class="form-control rounded-0" placeholder="Type your password..." required minlength="10">
                    </div>
                    <!-- Confirm Password Input -->
                    <div class="input-group input-group-lg form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text rounded-0">
                                <i class="fas fa-key fa-lg"></i> <!-- Password Icon -->
                            </span>
                        </div>
                        <input type="password" name="password" id="cpassword" class="form-control rounded-0" placeholder="Confirm password..." required minlength="10">
                    </div>
                    <div class="form-group col text-center">
                        <!-- Buttons -->
                        <input type="submit" value="Create" id="register-btn2" class="btn btn-primary">
                    </div>
                    <div class="forgot float-right">
                        <a href="#" id="haveacc-link">Already have an account? Click here to Sign In!</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Register Form End -->