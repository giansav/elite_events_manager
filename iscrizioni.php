<?php
session_start(); // Avvia la sessione per ottenere l'ID dell'utente

$host = "localhost";
$port = 3307;
$user = "root";
$password = "Giafrik_1";
$database = "users_db";

$conn = new mysqli($host, $user, $password, $database, $port);

if ($conn->connect_error) {
    die("Connessione al database fallita: " . $conn->connect_error);
}

// Controlla se l'utente è autenticato
if (!isset($_SESSION["user_id"])) {
    die("Errore: utente non autenticato.");
}

$user_id = $_SESSION["user_id"]; // Recupera l'ID dell'utente loggato

// Se il modulo è stato inviato, inserisci i dati nel database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_atleta = $conn->real_escape_string($_POST['nome_atleta']);
    $cognome_atleta = $conn->real_escape_string($_POST['cognome_atleta']);
    $anno_atleta = $conn->real_escape_string($_POST['anno_atleta']);
    $sesso_atleta = $conn->real_escape_string($_POST['sesso_atleta']);
    $peso_atleta = $conn->real_escape_string($_POST['peso_atleta']);
    $disciplina = $conn->real_escape_string($_POST['disciplina']);
    $esperienza = $conn->real_escape_string($_POST['esperienza']);

    // Inserisci i dati nel database con l'ID dell'utente
    $sql = "INSERT INTO atleti (user_id, nome_atleta, cognome_atleta, anno_atleta, sesso_atleta, peso_atleta, disciplina, esperienza) 
            VALUES ('$user_id', '$nome_atleta', '$cognome_atleta', '$anno_atleta', '$sesso_atleta', '$peso_atleta', '$disciplina', '$esperienza')";

    if ($conn->query($sql) === TRUE) {
        // Recupera le iscrizioni aggiornate
        $sql = "SELECT cognome_atleta, nome_atleta, sesso_atleta, anno_atleta, peso_atleta, disciplina, esperienza FROM atleti WHERE user_id = '$user_id' ORDER BY id DESC";
        $result = $conn->query($sql);

        // Mostra la tabella aggiornata
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["cognome_atleta"] . "</td>
                    <td>" . $row["nome_atleta"] . "</td>
                    <td>" . $row["sesso_atleta"] . "</td>
                    <td>" . $row["anno_atleta"] . "</td>
                    <td>" . $row["peso_atleta"] . "kg</td>
                    <td>" . $row["disciplina"] . "</td>
                    <td>" . $row["esperienza"] . "</td>
                  </tr>";
        }
    } else {
        echo "Errore: " . $sql . "<br>" . $conn->error;
    }
} else {
    // Recupera solo le iscrizioni fatte dall'utente loggato
    $sql = "SELECT cognome_atleta, nome_atleta, sesso_atleta, anno_atleta, peso_atleta, disciplina, esperienza FROM atleti WHERE user_id = '$user_id' ORDER BY id DESC";
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["cognome_atleta"] . "</td>
                <td>" . $row["nome_atleta"] . "</td>
                <td>" . $row["sesso_atleta"] . "</td>
                <td>" . $row["anno_atleta"] . "</td>
                <td>" . $row["peso_atleta"] . "kg</td>
                <td>" . $row["disciplina"] . "</td>
                <td>" . $row["esperienza"] . "</td>
              </tr>";
    }
}
?>
