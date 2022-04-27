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

if(isset($_POST['action']) && $_POST['action'] == 'add_customer') {
    $name = $reportsModel->test_input($_POST['name']);
    $report = $reportsModel->test_input($_POST['report']);

    $reportsModel->add_new_customer($currentId, $name, $report);
}

if(isset($_POST['action']) && $_POST['action'] == 'display_customers') {
    $output = '';

    $customers = $reportsModel->get_customers($currentId);

    if ($customers) {
        $output .= '
        <table class="table table-striped text-center">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Report Notes</th>
                <th>Created</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        ';

        foreach ($customers as $row) {
            $output.= '
            <tr>
                <td>'.$row['id'].'</td>
                <td>'.$row['name'].'</td>
                <td>'.$row['report'].'</td>
                <td>'.$row['created_at'].'</td>
                <td>

                    <a href="#" title="Delete Report" id="'.$row['id'].'" class="text-danger deleteBtn">
                        <i class="fas fa-trash-alt fa-lg"></i>
                    </a>&nbsp;
                </td>
            </tr>
            ';
        }
        $output .= '</tbody></table>';
        echo $output;
    } else {
        echo '<h3 class="text-center text-secondary">No report data has been found. Please try again or add new reports!</h3>';
    }
}

if (isset($_POST['del_id'])) {
    $id = $_POST['del_id'];

    $reportsModel->delete_customer($id);
}

?>