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

    private function getQuestionMarks($count) {
        return join(',', array_fill(0, $count, '?'));
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

    public function insertUser(&$values) {
        $columns = join(',', array_keys($values));
        $questionMarks = $this->getQuestionMarks(count($values));
        $params = array_values($values);
        $sql = "
            insert into users ({$columns}) values ({$questionMarks})
        ";
        $array = $this->dbObject->conn->query($sql, true, $params);
        $row = $array->fetch(PDO::FETCH_NUM);
        return $row[0];
    }


}

?>