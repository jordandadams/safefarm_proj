<?php

session_start();
require_once '../classes/register.class.php';

$registerModel = new Register();

        if (isset($_POST['action']) && $_POST['action'] == 'register') {
            $fName = $registerModel->test_input($_POST['fName']);
            $lName = $registerModel->test_input($_POST['lName']);
            $email = $registerModel->test_input($_POST['email']);
            $password = $registerModel->test_input($_POST['rpassword']);

            $hash = password_hash($password, PASSWORD_DEFAULT);

            if ($registerModel->userExists($email)) {
                echo $registerModel->showMessage('warning', 'This e-mail has already been registered!');
            } else {
                if ($registerModel->register($fName, $lName, $email, $hash)) {
                    echo 'register';
                    $_SESSION['user'] = $email;
                } else {
                    echo $registerModel->showMessage('danger', 'Something went wrong! Try again later!');
                }
            }
        }



?>