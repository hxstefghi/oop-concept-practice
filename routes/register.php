<?php

namespace routes;

use controllers\Register;

require_once("../controllers/Database.php");
require_once("../controllers/Register.php");

$class = new Register();

$class->save();
