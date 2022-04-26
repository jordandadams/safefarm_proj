<?php

session_start();
require_once '../classes/customers.class.php';

$customersModel = new Customers();

if(!isset($_SESSION['user'])) {
    header('location: ../views/login.php');
    die;
}

$currentEmail = $_SESSION['user'];
$data = $customersModel->currentUser($currentEmail);

$currentId = $data['id'];
$currentFirstName = $data['first_name'];
$currentLastName = $data['last_name'];
$created = $data['created_at'];

if(isset($_POST['action']) && $_POST['action'] == 'add_customer') {
    $fName = $customersModel->test_input($_POST['fName']);
    $lName = $customersModel->test_input($_POST['lName']);
    $email = $customersModel->test_input($_POST['email']);
    $phone = $customersModel->test_input($_POST['phone']);
    $gender = $customersModel->test_input($_POST['gender']);
    $dob = $customersModel->test_input($_POST['dob']);

    $customersModel->add_new_customer($fName, $lName, $email, $phone, $gender, $dob);
}

?>