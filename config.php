<?php

$host = "localhost";
$port = 3307;
$user = "root";
$password = "Giafrik_1";
$database = "users_db";

$conn = new mysqli($host, $user, $password, $database, $port);

// dove la porta è quella standard usa: " $conn = new mysqli("localhost", "root", "", "users_db"); " 
// al posto delle righe da 3 a 9

if($conn->connect_error) {
  die("Connessione fallita: ". $conn->connect_error);
}

?>