<?php

namespace controllers;

use controllers\Database;

class Register extends Database
{

  private $firstName, $lastName, $email, $password, $confirmPassword, $errors;

  public function __construct()
  {
    session_start();
    // established database connection
    parent::__construct();

    $this->firstName = $_POST['firstName'];
    $this->lastName = $_POST['lastName'];
    $this->email = $_POST['email'];
    $this->password = $_POST['password'];
    $this->confirmPassword = $_POST['cpassword'];

    $this->errors = [];

    $this->validateFields();
  }

  private function validateFields()
  {
    if (!isset($this->firstName) || empty($this->firstName)) {
      $this->errors['firstName'] = "First Name is required";
    }
    if (!isset($this->lastName) || empty($this->lastName)) {
      $this->errors['lastName'] = "Last Name is required";
    }
    if (!isset($this->email) || empty($this->email)) {
      $this->errors['email'] = "Email is required";
    }
    if (!isset($this->password) || empty($this->password)) {
      $this->errors['password'] = "Password is required";
    }
    if (!isset($this->confirmPassword) || empty($this->confirmPassword)) {
      $this->errors['cpassword'] = "Confirm Password is required";
    }

    if ($this->password !== $this->confirmPassword) {
      $this->errors['cpassword'] = "Password is not match";
    }

    if (!empty($this->errors)) {
      $_SESSION['errors'] = $this->errors;

      header("Location: ../register.php");
    }
  }
}
