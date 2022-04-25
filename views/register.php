<!-- Register Form Start -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SafeFarm Insurance Employee Login</title>
    <!-- CSS Stylesheet -->
    <link rel="stylesheet" href="../public/style.css">
     <!-- Latest compiled and minified CSS | BS4 -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.4/datatables.min.css"/>
    <!-- jQuery library & Latest compiled JavaScript | BS4 -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <!-- Datatables -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.4/datatables.min.js"></script>
    <!-- Sweet Alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Include JS File -->
    <script src="../js/register.class.js?v<?php  echo filemtime('../js/register.class.js'); ?>"></script>
    <script type="text/javascript">

        //jQuery stuff
        $(document).ready(function(){

            $("#haveacc-link").click(function(){
                window.location.href='login.php';
            });

        });

        //insert js class
        const register = new Register();

    </script>

</head>
<body>

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
                            <input type="name" name="fname" id="fname" class="form-control rounded-0" placeholder="Type your First Name..." required>
                        </div>
                        <div class="input-group input-group-lg form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-0">
                                    <i class="fas fa-user-alt fa-lg"></i> <!-- User Icon -->
                                </span>
                            </div>
                            <input type="name" name="lname" id="lname" class="form-control rounded-0" placeholder="Type your Last Name..." required>
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
                            <input type="password" name="password" id="rpassword" class="form-control rounded-0" placeholder="Type your password..." required minlength="5">
                        </div>
                        <!-- Confirm Password Input -->
                        <!--<div class="input-group input-group-lg form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-0">
                                    <i class="fas fa-check fa-lg"></i>
                                </span>
                            </div>
                            <input type="password" name="password" id="cpassword" class="form-control rounded-0" placeholder="Confirm password..." required minlength="10">
                        </div> -->
                        <div class="form-group col text-center">
                            <!-- Buttons -->
                            <input type="submit" value="Create" id="register-btn2" class="btn btn-primary" onClick="register.register();">
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

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>
</body>
</html>