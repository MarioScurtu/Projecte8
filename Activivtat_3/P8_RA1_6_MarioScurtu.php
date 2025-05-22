<?php
/*
 ================================================================
 Curs: ASIX (Administració de Sistemes Informàtics en Xarxa)
 Autor: Mario Scurtu
 Data: 22/05/2025
 Versió: 1
 ================================================================
 Especificacions d'entrada:
   - Un array amb noms i edats.
 Especificacions de sortida:
   - Mostra només els majors d’edat.
 ================================================================
*/

$alumnes = ["Mario" => 19, "Andres" => 18, "Lluis" => 20, "Joel" => 20];

// Recorrem els alumnes i mostrem els que tenen 18 o més
foreach ($alumnes as $nom => $edat) {
    if ($edat >= 18) {
        echo "$nom té $edat anys i és major d'edat<br>";
    }
}
?>











