<?php

require_once dirname(__FILE__) . '../classes/register.php';

class RegisterPage {

    private $requestArray;

    function __construct($requestArray)
    {
        $this->requestArray = $requestArray;
    }

    private function register() {
        $reg = new Register();
        $reg->setFirstName($this->requestArray['first_name']);
        $reg->setLastName($this->requestArray['last_name']);
        $reg->setEmail($this->requestArray['email']);
        $reg->setPassword($this->requestArray['password']);
        $result = $reg->create();
        return $result;
    }

    public function executeRequest() {
        if ($this->requestArray['request'] == 'register') {
            $this->register();
            return '1';
        }
    }

}

?>