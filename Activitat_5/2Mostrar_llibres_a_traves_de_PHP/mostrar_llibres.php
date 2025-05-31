<?php
$host = 'db';
$user = 'root';
$pass = 'root';
$db = 'biblioteca';

$conn = new mysqli('db', 'root', 'root', 'biblioteca');
if ($conn->connect_error) die("Connexió fallida: " . $conn->connect_error);

$sql = "SELECT id, titol, autor, any FROM llibres";
$result = $conn->query($sql);

$llibres = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $llibres[] = $row;
    }
}
$conn->close();

include 'taula_llibres.html';
?>





