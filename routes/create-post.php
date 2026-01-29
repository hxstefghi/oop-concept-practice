<?php

namespace controllers;

use controllers\Post;

require_once("../controllers/Database.php");
require_once("../controllers/Post.php");

$class = new Post();

$class->save();
