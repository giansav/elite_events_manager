<?php
$conn = new mysqli("localhost", "root", "", "users_db");

if ($conn->connect_error) {
    die("Connessione al database fallita: " . $conn->connect_error);
}

// Se il modulo è stato inviato, inserisci i dati nel database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_atleta = $_POST['nome_atleta'];
    $cognome_atleta = $_POST['cognome_atleta'];
    $anno_atleta = $_POST['anno_atleta'];
    $sesso_atleta = $_POST['sesso_atleta'];
    $peso_atleta = $_POST['peso_atleta'];
    $disciplina = $_POST['disciplina'];
    $esperienza = $_POST['esperienza'];

    // Inserisci i dati nel database
    $sql = "INSERT INTO atleti (nome_atleta, cognome_atleta, anno_atleta, sesso_atleta, peso_atleta, disciplina, esperienza) 
            VALUES ('$nome_atleta', '$cognome_atleta', '$anno_atleta', '$sesso_atleta', '$peso_atleta', '$disciplina', '$esperienza')";

    if ($conn->query($sql) === TRUE) {
        // Recupera le iscrizioni aggiornate
        $sql = "SELECT nome_atleta, cognome_atleta, sesso_atleta, anno_atleta, peso_atleta, disciplina, esperienza FROM atleti ORDER BY id DESC";
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
    // Recupera le iscrizioni dal database
    $sql = "SELECT nome_atleta, cognome_atleta, sesso_atleta, anno_atleta, peso_atleta, disciplina, esperienza FROM atleti ORDER BY id DESC";
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

