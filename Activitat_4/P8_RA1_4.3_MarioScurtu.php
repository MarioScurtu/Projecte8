<?php
/*
 ================================================================
 Curs: ASIX
 Autor: Mario Scurtu
 Data: 23/05/2025
 Versió: 1
 ================================================================
 Especificacions d'entrada:
   - Nom, correu i missatge.
 Especificacions de sortida:
   - Comprova que cap camp estigui buit i mostra valors.
 ================================================================
*/

if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $n = trim($_POST['nom'] ?? '');
    $e = trim($_POST['email'] ?? '');
    $m = trim($_POST['missatge'] ?? '');
    if ($n && $e && $m) {
        echo htmlspecialchars($n)."<br>".htmlspecialchars($e)."<br>".htmlspecialchars($m);
    } else {
        echo "Falten camps";
    }
} else {
    echo '<form method="post">
            <input name="nom" required>
            <input name="email" type="email" required>
            <textarea name="missatge" required></textarea>
            <input type="submit">
          </form>';
}
// Formulari i validació bàsica
?>
