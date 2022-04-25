<?php

include "../database/database.php";

class Register {

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

    public function getAllUsers() {
        $users = array();
        $sql = "
            select id, first_name, last_name, email from users order by first_name
        ";
        $array = $this->dbObject->conn->query($sql);
        while($row = $array->fetch(PDO::FETCH_ASSOC)) {
            $users[$row['id']] = array(
                'first_name'=>$row['first_name'],
                'last_name'=>$row['last_name'],
                'email'=>$row['email']
            );
        }

        return $users;
    }

    public function register($fName, $lName, $email, $password) {
        $sql = "
            insert into users (first_name, last_name, email, password) values (:fName, :lName, :email, :rpassword)
        ";
        $stmt = $this->dbObject->conn->prepare($sql);
        $stmt->execute([
            'fName'=>$fName,
            'lName'=>$lName,
            'email'=>$email,
            'rpassword'=>$password
        ]);
        return true;
    }

    public function userExists($email) {
        $sql = "
            SELECT email FROM users WHERE email = :email
        ";
        $stmt = $this->dbObject->conn->prepare($sql);
        $stmt->execute([
            'email'=>$email
        ]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

}