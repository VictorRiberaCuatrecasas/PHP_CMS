<?php

$db["db_host"] = "localhost";
$db["db_user"] = "root";
$db["db_password"] = "secret";
$db["db_name"] = "cms";

// associative array can also be written like this, js object style with key/value pairs
// $db = [
//     "db_host" => "localhost",
//     "db_user" => "root",
//     "db_password" => "secret",
//     "db_name" => "cms"
// ];

//CONVERT VARIABLES INTO CONSTANTS for more security
foreach($db as $key => $value){
    define(strtoupper($key), $value);
};

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
  }

?>