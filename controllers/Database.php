<?php

namespace controllers;

use mysqli;

class Database
{

  public $sql;

  public function __construct()
  {
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $dbName = "blog";

    $this->sql = new mysqli($serverName, $userName, $password, $dbName);

    if ($this->sql->connect_error) {
      die("Connection error: " . $this->sql->connect_error);
    }
  }
}
