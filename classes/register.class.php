<?php

include "../classes/registerMapper.class.php";

class Register {

    private $registerMapper;
    private $usersInfoArray;
    
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

}