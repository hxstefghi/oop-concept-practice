<?php

namespace controllers;

use controllers\Database;


class Post extends Database
{

  private $title, $body, $errors;

  public function __construct()
  {
    parent::__construct();

    session_start();

    $this->title = $_POST['title'];
    $this->body = $_POST['body'];

    $this->errors = [];

    $this->validate();
  }

  private function validate()
  {
    if (!isset($this->title) || empty(trim($this->title))) {
      $this->errors['title'] = "Title is required!";
    }
    if (!isset($this->body) || empty(trim($this->body))) {
      $this->errors['body'] = "Body is required!";
    }

    if (!empty($this->errors)) {
      $_SESSION['errors'] = $this->errors;

      header("Location: ../create-post.php");
      die();
    }

    $this->save();
  }

  public function save()
  {
    $query = "INSERT INTO posts (title, content, created_at, updated_at) VALUES ('$this->title', '$this->body',NOW(),NOW())";
    $result = $this->sql->query($query);

    if ($result) {
      echo "Post successfully created!";

      header("Location: ../home.php");
      die();
    } else {
      echo "Error: " . $this->sql->error;
      die();
    }
  }
}
