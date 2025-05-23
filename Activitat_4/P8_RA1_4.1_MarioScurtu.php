<?php
/*
 ================================================================
 Curs: ASIX
 Autor: Mario Scurtu
 Data: 23/05/2025
 Versió: 1
 ================================================================
 Especificacions d'entrada:
   - Un nom introduït per formulari.
 Especificacions de sortida:
   - Missatge de benvinguda amb el nom.
 ================================================================
*/

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['nom'])) {
    echo "Benvingut, " . htmlspecialchars($_POST['nom']);
} else {
    echo '<form method="post"><input name="nom" required><input type="submit"></form>';
}
// Formulari i missatge benvinguda
?>
