<?php
/*
 ================================================================
 Curs: ASIX
 Autor: Mario Scurtu
 Data: 23/05/2025
 Versió: 1
 ================================================================
 Especificacions d'entrada:
   - Llista d'aficions seleccionades.
 Especificacions de sortida:
   - Mostra les aficions triades.
 ================================================================
*/

$aficions = ["Futbol","Cinema","Lectura"];

if ($_SERVER["REQUEST_METHOD"]=="POST" && !empty($_POST['aficions'])) {
    foreach ($_POST['aficions'] as $a) echo htmlspecialchars($a)."<br>";
} else {
    echo '<form method="post">';
    foreach ($aficions as $a) echo '<input type="checkbox" name="aficions[]" value="'.$a.'"> '.$a.'<br>';
    echo '<input type="submit"></form>';
}
// Formulari checkbox i mostra seleccionats
?>
