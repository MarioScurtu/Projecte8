<?php
/*
 ================================================================
 Curs: ASIX
 Autor: Mario Scurtu
 Data: 23/05/2025
 Versió: 1
 ================================================================
 Especificacions d'entrada:
   - Selecció de ciutat.
 Especificacions de sortida:
   - Mostra la ciutat triada.
 ================================================================
*/

$ciutats = ["Barcelona","Madrid","València"];

if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['ciutat'])) {
    echo "Ciutat: ".htmlspecialchars($_POST['ciutat']);
} else {
    echo '<form method="post"><select name="ciutat">';
    foreach ($ciutats as $c) echo "<option>$c</option>";
    echo '</select><input type="submit"></form>';
}
// Menú desplegable i mostra seleccionat
?>
