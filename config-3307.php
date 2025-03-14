<?php

$host = "localhost";
$port = 3307;
$user = "root";
$password = "Giafrik_1";
$database = "users_db";

$conn = new mysqli($host, $user, $password, $database, $port);

if($conn->connect_error) {
  die("Connessione fallita: ". $conn->connect_error);
}

?>