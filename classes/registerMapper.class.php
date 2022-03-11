<?php

include "../database/database.php";

class RegisterMapper {

    private $dbObject;

    function __construct() {
        $this->createDependentObjects();
    }

    private function createDependentObjects() {
        $this->dbObject = new Database(); //instantiating Database class from database.php
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


}

    $x = new RegisterMapper();
    print_r($x->getAllUsers());

?>