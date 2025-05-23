<?php
/*
 ================================================================
 Curs: ASIX
 Autor: Mario Scurtu
 Data: 23/05/2025
 Versió: 1
 ================================================================
 Especificacions d'entrada:
   - Selecció de gènere.
 Especificacions de sortida:
   - Mostra el gènere triat.
 ================================================================
*/

$gens = ["Home","Dona","Altres"];

if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['genere'])) {
    echo "Gènere: ".htmlspecialchars($_POST['genere']);
} else {
    echo '<form method="post">';
    foreach ($gens as $g) echo '<input type="radio" name="genere" value="'.$g.'"> '.$g.'<br>';
    echo '<input type="submit"></form>';
}
// Radio buttons i mostra seleccionat
?>
