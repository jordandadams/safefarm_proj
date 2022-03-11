<?php

include "../controllers/registerPage.class.php";

if (isset($_POST["submit"]))
{


    //Grabbing the data
    $id = $_POST["id"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $rpassword = $_POST["rpassword"];
    $cpassword = $_POST["cpassword"];

    //Instantiate Login Controller Class
    $register = new Register($fname, $lname, $email, $rpassword, $cpassword);

    //Running error handlers and user signup

    //Going back to front page

}


?>