<?php

session_start();
require_once 'config.php';

if(isset($_POST['register'])) {
  $nome_asd = $_POST['nome_asd'];
  $cf_asd = $_POST['cf_asd'];
  $rappr_asd = $_POST['rappr_asd'];
  $email = $_POST['email'];
  $tel = $_POST['tel'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  
  $checkEmail = $conn->query("SELECT email FROM users WHERE email = '$email'");
  if($checkEmail->num_rows > 0) {
    $_SESSION['register_error'] = 'Questa email risulta già registrata!';
    $_SESSION['active_form'] = 'register';
  } else {
    $conn->query("INSERT INTO users (nome_asd, cf_asd, rappr_asd, email, tel, password) VALUES ('$nome_asd', '$cf_asd', '$rappr_asd', '$email', '$tel', '$password')");
  }
  
  header("Location: index.php");
  exit();
}

if(isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $result = $conn->query("SELECT * FROM users WHERE email = '$email'");
  if($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if(password_verify($password, $user['password'])) {
      // Salviamo anche user_id nella sessione
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['nome_asd'] = $user['nome_asd'];
      $_SESSION['email'] = $user['email'];  
    }
    header("Location: user_page.php");
    exit();
  }
}
  
  $_SESSION['login_error'] = 'Email o password errata!';
  $_SESSION['active_form'] = 'login';
  
  header("Location: index.php");
  exit();
  
?>