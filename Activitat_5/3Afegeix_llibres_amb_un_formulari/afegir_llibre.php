<?php
$host = 'db';
$user = 'root';
$pass = 'root';
$db = 'biblioteca';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) die("Connexió fallida: " . $conn->connect_error);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $titol = $_POST["titol"];
    $autor = $_POST["autor"];
    $any = $_POST["any"];

    // Prepared statement per inserció segura
    $stmt = $conn->prepare("INSERT INTO llibres (titol, autor, any) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $titol, $autor, $any);

    if ($stmt->execute()) {
        echo "<p>Llibre afegit correctament!</p>";
    } else {
        echo "<p>Error: " . $stmt->error . "</p>";
    }
    $stmt->close();
}

include 'formulari_afegir.html';
?>

