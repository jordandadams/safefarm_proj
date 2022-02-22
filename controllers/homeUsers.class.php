<?php

require '../classes/usersGet.class.php';

class HomeUsers {

    private $usersInfoArray;
    private $requestArray;

    function __construct($requestArray, $usersInfoArray) {
        $this->requestArray = $requestArray;
        $this->usersInfoArray = $usersInfoArray;
        $this->createDependentObjects();
    }

    function createDependentObjects() {

    }

    private function getUsers() {
        $users = new UsersGet($this->userInfoArray);
        return $users->getUsers();
    }

    private function insertUsers() {
        $insertUsers = $this->getUsersObject();
        return $insertUsers->insertUsers();
    }

    public function executeRequest() {
        if ($this->requestArray['request'] == 'get_users') {
            return $this->getUsers();
        }
        if ($this->requestArray['request'] == 'insert_user') {
            return $this->insertUsers();
        }
    }

}

    // test methods
    //$ob = new HomeUsers();
    //print_r($ob->getUsers());


?>