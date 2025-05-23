<?php
/*
 ================================================================
 Curs: ASIX
 Autor: Mario Scurtu
 Data: 23/05/2025
 Versió: 1
 ================================================================
 Especificacions d'entrada:
   - Nom i edat per formulari GET.
 Especificacions de sortida:
   - Mostra nom i edat introduïts.
 ================================================================
*/

if (isset($_GET['nom'], $_GET['edat'])) {
    echo "Nom: " . htmlspecialchars($_GET['nom']) . "<br> Edat: " . (int)$_GET['edat'];
} else {
    echo '<form method="get">
            <input name="nom" required>
            <input name="edat" type="number" required>
            <input type="submit">
          </form>';
}
// Formulari GET i mostra dades
?>
