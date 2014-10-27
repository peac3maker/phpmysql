<?php

# Error level
ini_set('display_errors', 1);
error_reporting(E_ALL);

# DB settings
define("connection", "mysql:host=localhost;dbname=loc_orm");
define("user", "loc_orm");
define("password", "12341234");

# debug mode
define("DEBUGGING", false);



?>