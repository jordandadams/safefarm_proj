<?php

use JetBrains\PhpStorm\ExpectedValues;

require_once dirname(__FILE__) . "../classes/registerMapper.class.php";

class Register {

    private $registerMapper;
    private $id;
    private $firstName;
    private $lastName;
    private $email;
    private $password;
    
    function __construct($id, $usersInfoArray) {
        $this->id = $id;
        $this->usersInfoArray = $usersInfoArray;
        $this->createDependentObjects();
    }

    private function createDependentObjects() {
        $this->registerMapper = new RegisterMapper($this->usersInfoArray);
    }

    private function getDateTime() {
        $now = new DateTime();
        $now->setTimezone(new DateTimeZone('America/Chicago'));
        $dateTime = $now->format('Y-m-d H:i:s');
        return $dateTime;
    }

    private function validateuser() {
        if (empty($this->firstName) || empty($this->lastName) || empty($this->email) || empty($this->password)) {
            throw new Exception('Please check all details!');
        }
        if ($this->registerMapper->emailExists($this->email)) {
            throw new Exception('This email already exists!');
        }
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function create() {
        $this->validateuser();
        $dateTime = $this->getDateTime();

        $array = array(
            'first_name'=>$this->firstName,
            'last_name'=>$this->lastName,
            'email'=>$this->email,
            'password'=>$this->password,
            'created_at'=>$this->$dateTime
        );

        $id = $this->registerMapper->insertUser($array);
        
        return $id;
    }

}

?>