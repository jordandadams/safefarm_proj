<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../controllers/registerPage.class.php';

if (isset($_POST)) {

    try {
        $register = new RegisterPage($_POST);
        $result = $register->executeRequest();
        echo ($result);
    } catch (Exception $e) {
        echo json_decode('0');
    }
}

?>