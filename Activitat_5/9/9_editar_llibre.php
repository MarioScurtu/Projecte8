<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$host = 'db';
$user = 'root';
$pass = 'root';
$db = 'biblioteca';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) die("Connexió fallida: " . $conn->connect_error);

// Mostrar formulari amb dades del llibre
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM llibres WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultat = $stmt->get_result();
    $llibre = $resultat->fetch_assoc();
    $stmt->close();

    if ($llibre) {
        include 'formulari_editar_llibre.html';
    } else {
        echo "<p>Llibre no trobat.</p>";
    }
}

// Actualitzar dades
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST['id'];
    $titol = $_POST['titol'];
    $autor = $_POST['autor'];
    $any = $_POST['any'];

    $stmt = $conn->prepare("UPDATE llibres SET titol=?, autor=?, any=? WHERE id=?");
    $stmt->bind_param("ssii", $titol, $autor, $any, $id);

    if ($stmt->execute()) {
        echo "<p>Llibre actualitzat correctament!</p>";
    } else {
        echo "<p>Error en actualitzar: " . $stmt->error . "</p>";
    }
    $stmt->close();
}

$conn->close();

?>
