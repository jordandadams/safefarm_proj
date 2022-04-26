<?php

include "../database/database.php";

class Customers {

    private $dbObject;

    function __construct() {
        $this->createDependentObjects();
    }

    private function createDependentObjects() {
        $this->dbObject = new Database(); //instantiating Database class from database.php
    }

    public function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function showMessage($type, $message) {
        return '<div class="alert alert-' .$type. ' alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong class="text-center">' .$message. '</strong>
                </div>';
    }

    public function currentUser($email) {
        $sql = "
            select * from users where email = :email and deleted != 0
        ";
        $stmt = $this->dbObject->conn->prepare($sql);
        $stmt->execute([
            'email'=>$email
        ]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row;
    }

    public function add_new_customer($uid, $fName, $lName, $email, $phone, $dob) {
        $sql = "
            insert into customers (uid, first_name, last_name, email, phone, dob) values (:uid, :first_name, :last_name, :email, :phone, :dob)
        ";
        $stmt = $this->dbObject->conn->prepare($sql);
        $stmt->execute([
            'uid'=>$uid,
            'first_name'=>$fName,
            'last_name'=>$lName,
            'email'=>$email,
            'phone'=>$phone,
            'dob'=>$dob
        ]);
        return true;
    }

    public function get_customers($uid) {
        $sql = "
            select * from customers where uid = :uid
        ";
        $stmt = $this->dbObject->conn->prepare($sql);
        $stmt->execute([
            'uid'=>$uid
        ]);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function edit_customers($id) {
        $sql = "
            select * from customers where id = :id;
        ";
        $stmt = $this->dbObject->conn->prepare($sql);
        $stmt->execute([
            'id'=>$id
        ]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function update_customers($id, $fName, $lName, $email, $phone, $dob) {
        $sql = "
            update customers set first_name = :first_name, last_name = :last_name, email = :email, phone = :phone, dob = :dob where id = :id;
        ";
        $stmt = $this->dbObject->conn->prepare($sql);
        $stmt->execute([
            'first_name'=>$fName,
            'last_name'=>$lName,
            'email'=>$email,
            'phone'=>$phone,
            'dob'=>$dob,
            'id'=>$id
        ]);
        return true;
    }

    public function delete_customer($id) {
        $sql = "
            delete from customers where id = :id
        ";
        $stmt = $this->dbObject->conn->prepare($sql);
        $stmt->execute([
            'id'=>$id
        ]);
        return true;
    }

}