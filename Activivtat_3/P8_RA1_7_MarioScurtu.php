<?php
/*
 ================================================================
 Curs: ASIX (Administració de Sistemes Informàtics en Xarxa)
 Autor: Mario Scurtu
 Data: 22/05/2025
 Versió: 1
 ================================================================
 Especificacions d'entrada:
   - Preu i percentatge d’IVA.
 Especificacions de sortida:
   - Retorna el preu amb l’IVA aplicat.
 ================================================================
*/

function calculaIVA($preu, $iva) {
    return $preu * (1 + $iva / 100);
}

// Exemple: 100€ amb 21% d’IVA
echo "Preu amb IVA: " . calculaIVA(100, 21) . "<br>";
?>











