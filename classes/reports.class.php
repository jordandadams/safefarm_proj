<?php

include "../database/database.php";

class Reports {

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

    public function add_new_customer($uid, $name, $report) {
        $sql = "
            insert into reports (uid, name, report) values (:uid, :name, :report)
        ";
        $stmt = $this->dbObject->conn->prepare($sql);
        $stmt->execute([
            'uid'=>$uid,
            'name'=>$name,
            'report'=>$report
        ]);
        return true;
    }

    public function get_customers($uid) {
        $sql = "
            select * from reports where uid = :uid
        ";
        $stmt = $this->dbObject->conn->prepare($sql);
        $stmt->execute([
            'uid'=>$uid
        ]);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function delete_customer($id) {
        $sql = "
            delete from reports where id = :id
        ";
        $stmt = $this->dbObject->conn->prepare($sql);
        $stmt->execute([
            'id'=>$id
        ]);
        return true;
    }

}