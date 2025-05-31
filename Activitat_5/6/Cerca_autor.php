<?php
$host = 'db';
$user = 'root';
$pass = 'root';
$db = 'biblioteca';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) die("Connexió fallida: " . $conn->connect_error);

if (isset($_GET["autor"])) {
    $autor = "%" . $_GET["autor"] . "%";

    $stmt = $conn->prepare("SELECT titol, autor, any FROM llibres WHERE autor LIKE ?");
    $stmt->bind_param("s", $autor);
    $stmt->execute();
    $resultat = $stmt->get_result();

    if ($resultat->num_rows > 0) {
        echo "<h3>Resultats:</h3>";
        echo "<table border='1' cellpadding='8'>";
        echo "<tr><th>Títol</th><th>Autor</th><th>Any</th></tr>";

        while ($fila = $resultat->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($fila["titol"]) . "</td>";
            echo "<td>" . htmlspecialchars($fila["autor"]) . "</td>";
            echo "<td>" . $fila["any"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No s'han trobat llibres per aquest autor.</p>";
    }

    $stmt->close();
}

$conn->close();

include 'formulari_afegir_segura.html';
?>

