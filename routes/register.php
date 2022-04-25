<?php

require dirname(__DIR__, 1) . '../controllers/registerPage.class.php';

if (isset($_POST)) {

    try {
        $register = new RegisterPage($_POST);
        $result = $register->executeRequest();
        echo json_encode($result);
    } catch (Exception $e) {
        echo json_decode('0');
    }
}

?>