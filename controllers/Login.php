<?php

namespace controllers;

use controllers\Database;

class Login extends Database
{
  private $email, $password, $errors;

  public function __construct()
  {
    session_start();
    parent::__construct();

    $this->email = $_POST['email'];
    $this->password = $_POST['password'];

    $this->errors = [];

    $this->validateFields();
  }

  private function validateFields()
  {
    if (!isset($this->email) || empty($this->email)) {
      $this->errors['email'] = "Email is empty";
    }

    if (!isset($this->password) || empty($this->password)) {
      $this->errors['password'] = "Password is empty";
    }

    if (!empty($this->errors)) {
      $_SESSION['errors'] = $this->errors;

      header("Location: ../login.php");
      die();
    }

    $this->authenticate();
  }

  private function authenticate()
  {
    $query = "SELECT * FROM users WHERE email = '$this->email' AND password = '$this->password' LIMIT 1";

    $result = $this->sql->query($query);

    if ($result->num_rows > 0) {
      $user = $result->fetch_assoc();

      $_SESSION['user'] = $user;

      header("Location: ../home.php");
      die();
    } else {
      $this->errors['email'] = "";
      $this->errors['password'] = "Invalid credentials";
      $_SESSION['errors'] = $this->errors;
      header("Location: ../login.php");
      die();
    }
  }
}
