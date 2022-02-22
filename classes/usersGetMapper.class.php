<?php

require '../database/database.php';

class UsersGetMapper {

    private $dbObject;

    function __construct() {
        $this->createDependentObjects();
    }

    private function createDependentObjects() {
        $this->dbObject = new Database(); //instantiating Database class from database.php
    }

    public function getUserById($id) {
        $users = array();
        $params = array($id);
        $sql = "
            select id, first_name, last_name, email, phone
            from users
            where id = ?
            order by id, first_name, last_name, email, phone
        ";
        $array = $this->dbObject->query($sql, true, $params);
        while($row = fetchAll($array, PDO::FETCH_COLUMN)) {
            $users[$row['id']] = array(
                'first_name'=>$row['first_name'],
                'last_name'=>$row['last_name'],
                'email'=>$row['email'],
                'phone'=>$row['phone']
            );
        }

        return $users;
    }

    public function getAllUsers() {
        $users = array();
        $sql = "
            select id, first_name, last_name from users order by first_name
        ";
        $array = $this->dbObject->conn->query($sql);
        while($row = fetchAll($array, PDO::FETCH_COLUMN)) {
            $users[$row['id']] = array(
                'first_name'=>$row['first_name'],
                'last_name'=>$row['last_name'],
            );
        }
    }

    public function insertNewUser($fname, $lname, $email, $phone) {
        $sql = "INSERT INTO users (first_name,last_name,email,phone) VALUES (:fname,:lname,:email,:phone)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'fname'=>$fname,
            'lname'=>$lname,
            'email'=>$email,
            'phone'=>$phone
        ]);

        return true;
    }

    public function totalRowCount() {
        $sql = "SELECT * FROM users";
        $prepare = $this->dbObject->conn->prepare($sql);
        $prepare->execute();
        $t_rows = $prepare->rowCount();

        return $t_rows;
    }

}

    // test methods
    $ob = new UsersGetMapper();
    print_r($ob->getAllUsers());

?>