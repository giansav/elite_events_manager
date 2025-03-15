<?php

session_start(); 


$host = "localhost";
$port = 3307;
$user = "root";
$password = "Giafrik_1";
$database = "users_db";

$conn = new mysqli($host, $user, $password, $database, $port);

// dove la porta è quella standard usa: " $conn = new mysqli("localhost", "root", "", "users_db"); " 
// al posto delle righe da 3 a 9

if ($conn->connect_error) {
    die("Connessione al database fallita: " . $conn->connect_error);
}

// Controlliamo se l'utente è loggato
if (!isset($_SESSION['user_id'])) {
    die("Errore: utente non autenticato.");
}

// Otteniamo l'user_id dell'utente loggato
$user_id = $_SESSION['user_id'];

// Recupera SOLO gli atleti iscritti dall'utente loggato
$sql = "SELECT nome_atleta, cognome_atleta, sesso_atleta, anno_atleta, peso_atleta, disciplina, esperienza 
        FROM atleti 
        WHERE user_id = ? 
        ORDER BY id DESC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ELITE EVENTS MANAGER</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

<header class="header">
    <a href="#" class="logo-img"><img src="img/csen-logo.png" id="logo1" /></a>
    <a href="#" class="logo-img"><img src="img/elite-logo.png" id="logo2" /></a>
    <a href="#" class="logo">Elite Events Manager</a>
</header>

<div class="page-wrapper">
    
    <!-- CONTENITORE BOX (RIQUADRI AFFIANCATI) -->
    <div class="box-container">
        <div class="left-box">
            <h2>Puoi iscrivere i tuoi atleti al seguente evento:</h2>
            <p style="font-weight:bold">Grand Prix CSEN di Sport del Ring - 6a edizione</p>
            <p>Casaluce (CE) - 27 aprile 2025</p>
            <p style="color: red; font-weight:bold">Iscrizioni entro e non oltre le ore 12:00 del 22 aprile 2025</p>
            <img src="img/locandina.jpg" alt="Locandina evento" class="event-image">
        </div>

        <div class="right-box">
            <h2>Iscrivi un atleta all'evento:</h2>
            <form id="registerForm" method="post">
              <input type="text" name="cognome_atleta" placeholder="Cognome" required oninput="this.value = this.value.toUpperCase()">
              <input type="text" name="nome_atleta" placeholder="Nome" required oninput="this.value = this.value.toUpperCase()">
              <input type="number" name="anno_atleta" placeholder="Anno di nascita" required>
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

    <!-- TABELLA SOTTO I BOX -->
    <div class="table-container">
        <h2 style="color: white;">--- Iscrizioni effettuate ---</h2>
        <table>
            <thead>
                <tr>
                    <th>Cognome</th>
                    <th>Nome</th>
                    <th>Sesso</th>
                    <th>Anno di nascita</th>
                    <th>Peso</th>
                    <th>Disciplina</th>
                    <th>Esperienza</th>
                </tr>
            </thead>
            <tbody id="iscrizioniTable">
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row["cognome_atleta"] ?></td>
                    <td><?= $row["nome_atleta"] ?></td>
                    <td><?= $row["sesso_atleta"] ?></td>
                    <td><?= $row["anno_atleta"] ?></td>
                    <td><?= $row["peso_atleta"] ?>kg</td>
                    <td><?= $row["disciplina"] ?></td>
                    <td><?= $row["esperienza"] ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    // Quando il form viene inviato
    $("#registerForm").submit(function(event) {
        event.preventDefault();  // Previene l'invio tradizionale del form
        var formData = $(this).serialize();  // Serializza i dati del modulo

        $.ajax({
            url: "iscrizioni.php",  // L'URL a cui inviare i dati
            type: "POST",
            data: formData,
            success: function(response) {
                // Quando il POST è completato con successo
                $("#iscrizioniTable").html(response);  // Aggiorna la tabella con i nuovi dati
                $("#registerForm")[0].reset();  // Resetta il modulo
            },
            error: function() {
                alert("Errore nell'invio della richiesta");
            }
        });
    });
});
</script>


</body>
</html>
