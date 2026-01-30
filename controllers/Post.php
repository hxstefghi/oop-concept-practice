<?php

namespace controllers;

use controllers\Database;


class Post extends Database
{

  private $user_id, $title, $body, $errors;

  public function __construct()
  {
    parent::__construct();

    session_start();

    // Only validate if POST data exists (form submission)
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['title'])) {
      $this->user_id = $_POST['user_id'];
      $this->title = $_POST['title'];
      $this->body = $_POST['body'];

      $this->errors = [];

      $this->validate();
    }
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
    $query = "INSERT INTO posts (user_id, title, content, created_at, updated_at) VALUES ('$this->user_id','$this->title', '$this->body',NOW(),NOW())";
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

  public function getAllPosts()
  {
    $query = "SELECT posts.*, users.first_name, users.last_name, users.email 
              FROM posts
              LEFT JOIN users ON posts.user_id = users.id
              ORDER BY posts.created_at DESC";

    $result = $this->sql->query($query);

    return $result->fetch_all(MYSQLI_ASSOC);
  }
}
