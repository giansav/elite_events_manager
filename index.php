<?php

session_start();

$errors =[
  'login' => $_SESSION['login_error'] ?? '',
  'register' => $_SESSION['register_error'] ?? ''
  ];

$activeForm = $_SESSION['active_form'] ?? 'login';

session_unset();


function showError($error) {
  return !empty($error) ? "<p class='error_message'>$error</p>" : '' ;
}

function isActiveForm($formName, $activeForm) {
  return $formName === $activeForm ? 'active' : '';
}

?>

<!DOCTYPE html>
<html lang = "en">
<html>
  <head>
    <meta charset = "UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ELITE EVENTS MANAGER</title>
    <link rel="stylesheet" href="styles.css">
  </head>

  <body>
    <div class="container">
      <div class="form-box <?= isActiveForm('login', $activeForm); ?>" id="login-form">
        <form action="login_register.php" method="post">
          <h2>Login</h2>
          <?= showError($errors['login']); ?>
          <input type="email" name="email" placeholder="Email" required>
          <input type="password" name="password" placeholder="Password" required>
          <button type="submit" name="login">Login</button>
          <p>Non sei ancora registrato? <a href="#" onclick="showForm('register-form')">Registrati</a></p>
        </form>
      </div>
      
      <div class="form-box <?= isActiveForm('register', $activeForm); ?>" id="register-form">
        <form action="login_register.php" method="post">
          <h2>Registrati</h2>
          <?= showError($errors['register']); ?>
          <input type="text" name="nome_asd" placeholder="Nome ASD" required>
          <input type="text" name="cf_asd" placeholder="Codice Fiscale ASD" required>
          <input type="text" name="rappr_asd" placeholder="Legale Rappresentante ASD" required>
          <input type="email" name="email" placeholder="Email ASD" required>
          <input type="text" name="tel" placeholder="Telefono ASD" required>
          <input type="password" name="password" placeholder="Password" required>
          <button type="submit" name="register">Registrati</button>
          <p>Sei già registrato? <a href="#" onclick="showForm('login-form')">Login</a></p>
        </form>
      </div>
      
    </div>
  
    <script src="script.js"></script>
  
  </body>
</html>
