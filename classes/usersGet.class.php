<?php

require '../classes/usersGetMapper.class.php';

class UsersGet {

    private $usersGetMapper;
    private $usersInfoArray;
    private $groupId;
    
    function __construct($usersGet) {
        $this->groupId = $groupId;
        $this->usersGet = $usersGet;
        $this->usersInfoArray = $usersInfoArray;
        $this->createDependentObjects();
    }

    private $usersField = array(
        'id'=>null,
        'first_name'=>null,
        'last_name'=>null,
        'email'=>null,
        'phone'=>null
    );

    private function createDependentObjects() {
        $this->usersGetMapper = new UsersGetMapper($this->usersInfoArray);
    }

    private function getMain() {
        return $this->usersGetMapper->getUsersById($this->groupId);
    }

    private function buildRow($id) {
        $usersGet = $this->getMain();

        $row = $this->usersField;
        $row['id'] = $id;
        $row['first_name'] = $usersGet['first_name'];
        $row['last_name'] = $usersGet['last_name'];
        $row['phone'] = $usersGet['phone'];
        $row['email'] = $usersGet['email'];

        return $row;
    }

    public function getUsers() {
        $returnArray = array();
        $users = $this->usersGetMapper->getAllUsers();

        foreach ($users as $id=>$array) {
            $row = $this->buildRow($id, $array);
            $returnArray[$id] = $row;
        }

        return $returnArray;
    }

    private function insertUser() {
        return $this->usersGetMapper->insertNewUser($this->usersInfoArray);
    }
}

// test methods
//$ob = new UsersGet();
//print_r($ob->getUsers());


?>