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
        $dob = $customersModel->test_input($_POST['dob']);

        $customersModel->add_new_customer($currentId, $fName, $lName, $email, $phone, $dob);
    }

    if(isset($_POST['action']) && $_POST['action'] == 'display_customers') {
        $output = '';

        $customers = $customersModel->get_customers($currentId);

        if ($customers) {
            $output .= '
            <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone</th>
                    <th>Date of Birth</th>
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
                    <td>'.$row['first_name'].'</td>
                    <td>'.$row['last_name'].'</td>
                    <td>'.$row['email'].'</td>
                    <td>'.$row['phone'].'</td>
                    <td>'.$row['dob'].'</td>
                    <td>
                        <a href="#" title="Edit Customer" id="'.$row['id'].'" class="text-priamry editBtn">
                            <i class="fas fa-edit fa-lg" data-toggle="modal" data-target="#editCustomerModal"></i>
                        </a>&nbsp;

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
            echo '<h3 class="text-center text-secondary">No customer data has been found. Please try again or add new customers!</h3>';
        }
    }

    if (isset($_POST['edit_id'])) {
        $id = $_POST['edit_id'];

        $row = $customersModel->edit_customers($id);
        echo json_encode($row);
    }

    if (isset($_POST['action']) && $_POST['action'] == 'update_customers') {
        $id = $customersModel->test_input($_POST['id']);
        $fName = $customersModel->test_input($_POST['fName']);
        $lName = $customersModel->test_input($_POST['lName']);
        $email = $customersModel->test_input($_POST['email']);
        $phone = $customersModel->test_input($_POST['phone']);
        $dob = $customersModel->test_input($_POST['dob']);

        $customersModel->update_customers($id, $fName, $lName, $email, $phone, $dob);
    }

?>