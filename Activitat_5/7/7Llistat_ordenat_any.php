<?php
$host = 'db';
$user = 'root';
$pass = 'root';
$db = 'biblioteca';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) die("Connexió fallida: " . $conn->connect_error);

include 'formulari_llistat_any.html';

$sql = "SELECT id, titol, autor, any FROM llibres ORDER BY any DESC";
$resultat = $conn->query($sql);

if ($resultat->num_rows > 0) {
    echo "<h2>Llibres ordenats per any (descendent)</h2>";
    echo "<table border='1' cellpadding='8'>";
    echo "<tr><th>ID</th><th>Títol</th><th>Autor</th><th>Any</th></tr>";

    while ($fila = $resultat->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $fila["id"] . "</td>";
        echo "<td>" . htmlspecialchars($fila["titol"]) . "</td>";
        echo "<td>" . htmlspecialchars($fila["autor"]) . "</td>";
        echo "<td>" . $fila["any"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>No hi ha llibres a la base de dades.</p>";
}

$conn->close();
?>

