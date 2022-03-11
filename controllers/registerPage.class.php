<?php

class RegisterPage {

    private $id;
    private $fname;
    private $lname;
    private $email;
    private $rpassword;
    private $cpassword;

    public function __construct($id, $fname, $lname, $email, $rpassword, $cpassword) {
        $this->$id = $id;
        $this->$fname = $fname;
        $this->$lname = $lname;
        $this->$email = $email;
        $this->$rpassword = $rpassword;
        $this->$cpassword = $cpassword;
    }

    private function emptyInput() {
        $result;
        if (empty($this->$fname) || empty($this->$lname) || empty($this->$email) || empty($this->$rpassword) || empty($this->$cpassword)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    private function invalidName() {
        $result;
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->fname, $this->lname)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    private function invalidEmail() {
        $result;
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    private function pwdMatch() {
        $result;
        if ($this->rpassword !== $this->cpassword) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

}