<?php

session_start();
require_once '../classes/login.class.php';

$loginModel = new login();

        if (isset($_POST['action']) && $_POST['action'] == 'login') {
            $email = $loginModel->test_input($_POST['email']);
            $password = $loginModel->test_input($_POST['password']);

            $loggedInUser = $loginModel->login($email);

            if($loggedInUser != null) {
                if (password_verify($password, $loggedInUser['password'])) {
                    if (!empty($_POST['rem'])) {
                        setcookie('email', $email, time() + (30 * 24 * 60 * 60), '/');
                        setcookie('password', $password, time() + (30 * 24 * 60 * 60), '/');
                    } else {
                        setcookie('email', '', 1, '/');
                        setcookie('password', '', 1, '/');
                    }

                    echo 'login';
                    $_SESSION['user'] = $email;
                } else {
                    echo $loginModel->showMessage('danger', 'Password is incorrect!');
                } 
            } else {
                echo $loginModel->showMessage('danger', 'User not found!');
            }
        }

?>