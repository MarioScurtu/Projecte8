<?php
/*
 ================================================================
 Curs: ASIX
 Autor: Mario Scurtu
 Data: 23/05/2025
 Versió: 1
 ================================================================
 Especificacions d'entrada:
   - Correu electrònic.
 Especificacions de sortida:
   - Valida format de correu i mostra missatge.
 ================================================================
*/

if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $email = $_POST['email'] ?? '';
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Correu vàlid";
    } else {
        echo "Correu no vàlid";
    }
} else {
    echo '<form method="post"><input name="email" type="email" required><input type="submit"></form>';
}
// Validació format email
?>
