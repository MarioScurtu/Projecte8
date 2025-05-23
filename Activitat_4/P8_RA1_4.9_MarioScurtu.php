<?php
/*
 ================================================================
 Curs: ASIX
 Autor: Mario Scurtu
 Data: 23/05/2025
 Versió: 1
 ================================================================
 Especificacions d'entrada:
   - Comentari via formulari.
 Especificacions de sortida:
   - Mostra comentari escapant HTML.
 ================================================================
*/

if ($_SERVER["REQUEST_METHOD"]=="POST") {
    echo htmlspecialchars($_POST['comentari'] ?? '');
} else {
    echo '<form method="post"><textarea name="comentari" required></textarea><input type="submit"></form>';
}
// Mostra comentari amb htmlspecialchars per evitar injeccions
?>
