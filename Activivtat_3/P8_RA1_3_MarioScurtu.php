<?php
/*
 ================================================================
 Curs: ASIX (Administració de Sistemes Informàtics en Xarxa)
 Autor: Mario Scurtu
 Data: 22/05/2025
 Versió: 1
 ================================================================
 Especificacions d'entrada:
   - Un número de l’1 al 10.
 Especificacions de sortida:
   - Mostra la seva taula de multiplicar.
 ================================================================
*/

$n = 5;

// Fem la taula de multiplicar d'aquest número
if ($n >= 1 && $n <= 10) {
    for ($i = 1; $i <= 10; $i++) {
        echo "$n x $i = " . ($n * $i) . "<br>";
    }
} else {
    echo "Número fora de rang<br>";
}
?>











