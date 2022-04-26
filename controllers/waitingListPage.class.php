<?php

session_start();
require_once '../classes/waitingList.class.php';

$waitingListModel = new WaitingList();

if(!isset($_SESSION['user'])) {
    header('location: ../views/login.php');
    die;
}

$currentEmail = $_SESSION['user'];
$data = $waitingListModel->currentUser($currentEmail);

$currentId = $data['id'];
$currentFirstName = $data['first_name'];
$currentLastName = $data['last_name'];
$created = $data['created_at'];

?>