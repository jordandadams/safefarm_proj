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

    if(isset($_POST['action']) && $_POST['action'] == 'add_customer') {
        $name = $waitingListModel->test_input($_POST['name']);
        $notes = $waitingListModel->test_input($_POST['notes']);

        $waitingListModel->add_new_customer($currentId, $name, $notes);
    }

    if(isset($_POST['action']) && $_POST['action'] == 'display_customers') {
        $output = '';

        $customers = $waitingListModel->get_customers($currentId);

        if ($customers) {
            $output .= '
            <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Notes</th>
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
                    <td>'.$row['notes'].'</td>
                    <td>'.$row['created_at'].'</td>
                    <td>

                        <a href="#" title="Delete Customer" id="'.$row['id'].'" class="text-danger deleteBtn">
                            <i class="fas fa-trash-alt fa-lg"></i>
                        </a>&nbsp;
                    </td>
                </tr>
                ';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h3 class="text-center text-secondary">No customer data has been found. Please try again or add new customers to waitlist!</h3>';
        }
    }

    if (isset($_POST['del_id'])) {
        $id = $_POST['del_id'];

        $waitingListModel->delete_customer($id);
    }

?>