<?php
$host = 'db';
$user = 'root';
$pass = 'root';
$db = 'biblioteca';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) die("Connexió fallida: " . $conn->connect_error);

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $titol = trim($_POST["titol"]);
    $autor = trim($_POST["autor"]);
    $any = trim($_POST["any"]);

    // Validació servidor: no deixar camps buits
    if ($titol === "" || $autor === "" || $any === "") {
        $error = "Tots els camps són obligatoris.";
    } else {
        $stmt = $conn->prepare("INSERT INTO llibres (titol, autor, any) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $titol, $autor, $any);

        if ($stmt->execute()) {
            echo "<p>Llibre afegit correctament!</p>";
        } else {
            echo "<p>Error: " . $stmt->error . "</p>";
        }
        $stmt->close();
    }
}
?>

<h2>Afegir llibre (sense camps buits)</h2>

<?php if ($error) echo "<p style='color:red;'>$error</p>"; ?>

<form method="POST" action="" onsubmit="return validarFormulari();">
    <label>Títol: <input type="text" id="titol" name="titol"></label><br><br>
    <label>Autor: <input type="text" id="autor" name="autor"></label><br><br>
    <label>Any: <input type="number" id="any" name="any"></label><br><br>
    <input type="submit" value="Afegir llibre">
</form>

<script>
function validarFormulari() {
    const titol = document.getElementById('titol').value.trim();
    const autor = document.getElementById('autor').value.trim();
    const any = document.getElementById('any').value.trim();
    if (!titol || !autor || !any) {
        alert("Tots els camps són obligatoris.");
        return false;
    }
    return true;
}
</script>







