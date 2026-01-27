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
      die();
    }
  }

  public function save()
  {
    $query = "INSERT INTO users (first_name, last_name, email, password, created_at, updated_at)
    VALUES ('$this->firstName','$this->lastName','$this->email','$this->password',NOW(),NOW())";

    $result = $this->sql->query($query);

    if ($result) {
      echo "User registered successfully";
    } else {
      echo "Error: " . $this->sql->error;
    }

    $this->authenticate();
  }

  private function authenticate()
  {
    $query = "SELECT * FROM users WHERE email = '$this->email' LIMIT 1";

    $result = $this->sql->query($query);

    $user = $result->fetch_assoc();

    $_SESSION['user'] = $user;

    header("Location: ../home.php");
    die();
  }
}
