CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,    -- Nome dell'associazione
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE athletes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,               -- Associazione che ha registrato l'atleta
    nome VARCHAR(100) NOT NULL,
    cognome VARCHAR(100) NOT NULL,
    data_nascita DATE NOT NULL,
    peso DECIMAL(5,2) NOT NULL,        -- Peso con due decimali
    disciplina VARCHAR(100) NOT NULL,   -- Es. "Boxe", "Judo", etc.
    match_sostenuti INT DEFAULT 0,     -- Numero di incontri disputati
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);



session_start();
$_SESSION['user_id'] = $user_id; // ID dell'associazione autenticata



<form action="insert_athlete.php" method="POST">
    <input type="text" name="nome" placeholder="Nome" required>
    <input type="text" name="cognome" placeholder="Cognome" required>
    <input type="date" name="data_nascita" required>
    <input type="number" name="peso" placeholder="Peso (kg)" step="0.1" required>
    <input type="text" name="disciplina" placeholder="Disciplina" required>
    <input type="number" name="match_sostenuti" placeholder="Match sostenuti" required>
    <button type="submit">Aggiungi Atleta</button>
</form>



<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    die("Accesso negato. Devi effettuare il login.");
}

$host = "localhost";
$user = "root";
$password = "Giafrik_1"; // Cambia con la tua password MySQL
$database = "your_database";

$conn = new mysqli($host, $user, $password, $database, 3307);
if ($conn->connect_error) {
    die("Errore di connessione: " . $conn->connect_error);
}

// Recupera i dati dal form
$user_id = $_SESSION['user_id'];
$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$data_nascita = $_POST['data_nascita'];
$peso = $_POST['peso'];
$disciplina = $_POST['disciplina'];
$match_sostenuti = $_POST['match_sostenuti'];

// Query di inserimento
$sql = "INSERT INTO athletes (user_id, nome, cognome, data_nascita, peso, disciplina, match_sostenuti)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("isssdsi", $user_id, $nome, $cognome, $data_nascita, $peso, $disciplina, $match_sostenuti);

if ($stmt->execute()) {
    echo "Atleta registrato con successo!";
} else {
    echo "Errore: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>




<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    die("Accesso negato. Devi effettuare il login.");
}

$host = "localhost";
$user = "root";
$password = "Giafrik_1";
$database = "your_database";

$conn = new mysqli($host, $user, $password, $database, 3307);
if ($conn->connect_error) {
    die("Errore di connessione: " . $conn->connect_error);
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM athletes WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

echo "<h2>I tuoi atleti</h2>";
while ($row = $result->fetch_assoc()) {
    echo "<p>{$row['nome']} {$row['cognome']} - Disciplina: {$row['disciplina']} - Match: {$row['match_sostenuti']}</p>";
}

$stmt->close();
$conn->close();
?>


