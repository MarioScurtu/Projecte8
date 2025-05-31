<?php
$host = 'db';
$user = 'root';
$pass = 'root';
$db = 'biblioteca';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) die("Connexió fallida: " . $conn->connect_error);

include 'formulari_cerca_titol.html';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $paraula = "%" . $_POST["paraula"] . "%";
    $stmt = $conn->prepare("SELECT id, titol, autor, any FROM llibres WHERE titol LIKE ?");
    $stmt->bind_param("s", $paraula);
    $stmt->execute();
    $resultat = $stmt->get_result();

    if ($resultat->num_rows > 0) {
        echo "<h3>Resultats:</h3>";
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
        echo "<p>No s’han trobat llibres amb aquesta paraula al títol.</p>";
    }
    $stmt->close();
}
$conn->close();
?>
