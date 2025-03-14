<?php


?>

<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ELITE EVENTS MANAGER</title>
    <link rel="stylesheet" href="styles.css">
  </head>

  <body>

  <header class="header">
      <a href="#" class="logo-img"><img src="img/csen-logo.png" id=logo1 /> </a>
      <a href="#" class="logo-img"><img src="img/elite-logo.png" id=logo2 /> </a>
      <a href="#" class="logo">Elite Eventi</a>
  </header>

  <div class="page-wrapper">
    <h1 class="welcome-title">Benvenuto su Elite Events Manager</h1>

    <div class="main-container">
        <!-- RIQUADRO SINISTRO -->
        <div class="left-box">
            <h2>Puoi iscrivere i tuoi atleti al seguente evento:</h2>
            <p style="font-weight:bold">Grand Prix CSEN di Sport del Ring - 6a edizione</p>
            <p>Casaluce (CE) - 27 aprile 2025</p>
            <p style="color: red; font-weight:bold">iscrizioni entro e non oltre le ore 12:00 del 22 aprile 2025</p>
            <img src="img/locandina.jpg" alt="locandina evento" class="event-image">
        </div>

        <!-- RIQUADRO DESTRO -->
        <div class="right-box">
            <h2>Iscrivi un atleta all'evento:</h2>
            <form action="register.php" method="post">
                <input type="text" name="nome_atleta" placeholder="Nome" required oninput="this.value = this.value.toUpperCase()">
                <input type="text" name="cognome_atleta" placeholder="Cognome" required oninput="this.value = this.value.toUpperCase()">
                <input type="date" name="anno_atleta" placeholder="Data di nascita" required>
                <select name="sesso_atleta" required>
                  <option value="">Seleziona il sesso</option>
                  <option value="M">M</option>
                  <option value="F">F</option>
                </select>
                <select name="peso_atleta" required>
                  <option value="">Seleziona il peso</option>
                  <option value="44">-44kg</option>
                  <option value="48">-48kg</option>
                  <option value="52">-52kg</option>
                  <option value="57">-57kg</option>
                  <option value="63">-63kg</option>
                  <option value="69">-69kg</option>
                  <option value="75">-75kg</option>
                  <option value="81">-81kg</option>
                  <option value="91">-91kg</option>
                  <option value="100">+91kg</option>
                </select>
                <select name="disciplina" required>
                  <option value="">Seleziona la disciplina</option>
                  <option value="KL">Kick Light</option>
                  <option value="FB">Free Boxe</option>
                  <option value="KJ">Kick Jitsu</option>
                  <option value="GR">Grappling</option>
                </select>
                <select name="esperienza" required>
                  <option value="">Numero di match già sostenuti dall'atleta:</option>
                  <option value="esordiente">meno di 3</option>
                  <option value="intermedio">tra 3 e 10</option>
                  <option value="avanzato">più di 10</option>
                </select>
                <button type="submit">Iscrivi</button>
            </form>
        </div>
    </div>
  </div>

</body>

</html>
