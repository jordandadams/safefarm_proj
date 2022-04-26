<?php

session_start();
require_once '../classes/reports.class.php';

$reportsModel = new Reports();

if(!isset($_SESSION['user'])) {
    header('location: ../views/login.php');
    die;
}

$currentEmail = $_SESSION['user'];
$data = $reportsModel->currentUser($currentEmail);

$currentId = $data['id'];
$currentFirstName = $data['first_name'];
$currentLastName = $data['last_name'];
$created = $data['created_at'];

?>