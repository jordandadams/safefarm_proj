<?php

include "../database/database.php";

class WaitingList {

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

    public function add_new_customer($uid, $name, $notes) {
        $sql = "
            insert into waiting_list (uid, name, notes) values (:uid, :name, :notes)
        ";
        $stmt = $this->dbObject->conn->prepare($sql);
        $stmt->execute([
            'uid'=>$uid,
            'name'=>$name,
            'notes'=>$notes
        ]);
        return true;
    }

    public function get_customers($uid) {
        $sql = "
            select * from waiting_list where uid = :uid
        ";
        $stmt = $this->dbObject->conn->prepare($sql);
        $stmt->execute([
            'uid'=>$uid
        ]);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

}