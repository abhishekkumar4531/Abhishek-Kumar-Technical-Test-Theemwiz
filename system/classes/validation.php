<?php

class Validation {

  public $userRegex = "/(^[a-zA-Z][a-zA-Z\s]{0,20}[a-zA-Z]$)/";
  public $nameRegex = "/^[A-Za-z]+$/";
  public $mobileRegex = "/^(\+\d{1,3}[- ]?)?\d{10}$/";
  public $emailRegex = "/^[a-zA-Z0-9]+(?:\.[a-zA-Z0-9]+)*@[a-zA-Z0-9]+(?:\.[a-zA-Z0-9]+)*$/";
  public $pwdRegex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/";
  public $error = [];

  public function verifyData($userName, $firstName, $lastName, $mobile, $email, $password) : Array {
    /*if (!preg_match($this->userRegex, $userName)){
      $this->error['name'] = "Please enter valid name";
    }*/
    if (!preg_match($this->nameRegex, $firstName)){
      $this->error['name'] = "Please enter valid first name";
    }
    if (!preg_match($this->nameRegex, $lastName)){
      $this->error['name'] = "Please enter valid last name";
    }
    if (!preg_match($this->mobileRegex, $mobile)){
      $this->error['mobile'] = "Please enter valid mobile format";
    }
    if (!preg_match($this->emailRegex, $email)){
      $this->error['email'] = "Please enter valid email format";
    }
    if (!preg_match($this->pwdRegex, $password)){
      $this->error['password'] = "Please enter valid password";
    }

    return $this->error;
  }

  
}

?>
