<?php
/*
 ================================================================
 Curs: ASIX (Administració de Sistemes Informàtics en Xarxa)
 Autor: Mario Scurtu
 Data: 22/05/2025
 Versió: 1
 ================================================================
 Especificacions d'entrada:
   - Un array amb notes.
 Especificacions de sortida:
   - Mostra la mitjana i si està aprovat.
 ================================================================
*/

$notes = [6, 7, 8, 4, 5];

// Calculem la mitjana
$mitjana = array_sum($notes) / count($notes);

// Mostrem si està aprovat (5 o més)
echo "Mitjana: $mitjana - ";
echo ($mitjana >= 5) ? "Aprovat<br>" : "Suspès<br>";
?>










