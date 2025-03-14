<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "users_db";

$conn = new mysqli($host, $user, $password, $database);

if($conn->connect_error) {
  die("Coneessione fallita: ". $conn->connect_error);
}

?>