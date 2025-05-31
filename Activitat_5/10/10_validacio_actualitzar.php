<?php
$host = 'db';
$user = 'root';
$pass = 'root';
$db = 'biblioteca';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) die("Connexió fallida: " . $conn->connect_error);

$id = $_GET['id'] ?? null;
if (!$id) {
    die("ID de llibre no especificat.");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $titol = trim($_POST["titol"] ?? '');
    $autor = trim($_POST["autor"] ?? '');
    $any = trim($_POST["any"] ?? '');

    // Validació: cap camp buit
    if ($titol === '' || $autor === '' || $any === '') {
        $error = "No es pot deixar cap camp buit.";
    } else {
        // Actualitza llibre
        $stmt = $conn->prepare("UPDATE llibres SET titol=?, autor=?, any=? WHERE id=?");
        $stmt->bind_param("ssii", $titol, $autor, $any, $id);

        if ($stmt->execute()) {
            // Redirigeix a confirmació (modifica la ruta si cal)
            header("Location: 11_confirmacio_actualitzar.php?id=$id");
            exit;
        } else {
            $error = "Error actualitzant: " . $stmt->error;
        }
        $stmt->close();
    }
} else {
    // GET: agafa dades actuals per omplir el formulari
    $stmt = $conn->prepare("SELECT titol, autor, any FROM llibres WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($titol, $autor, $any);
    if (!$stmt->fetch()) {
        die("Llibre no trobat.");
    }
    $stmt->close();
}

$conn->close();

// Inclou el formulari (que haurà d'usar les variables $titol, $autor, $any)
include 'formulari_editar_llibre.html';
?>
