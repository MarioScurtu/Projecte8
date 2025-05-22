<?php
/*
 ================================================================
 Curs: ASIX (Administració de Sistemes Informàtics en Xarxa)
 Autor: Mario Scurtu
 Data: 22/05/2025
 Versió: 1
 ================================================================
 Especificacions d'entrada:
   - Un array amb 3 usuaris (nom, correu, edat).
 Especificacions de sortida:
   - Mostra si cada usuari és major d’edat en una taula HTML.
 ================================================================
*/

$usuaris = [
    ["nom" => "Mario", "correu" => "mario@example.com", "edat" => 19],
    ["nom" => "Andres", "correu" => "andres@example.com", "edat" => 18],
    ["nom" => "Lluis", "correu" => "lluis@example.com", "edat" => 20],
];

// Funció per saber si és major d'edat
function esMajorEdat($edat) {
    return $edat >= 18 ? "Major d'edat" : "Menor d'edat";
}

// Creem una taula per mostrar les dades
echo "<table border='1'>
<tr><th>Nom</th><th>Correu</th><th>Edat</th><th>Estat</th></tr>";

foreach ($usuaris as $usuari) {
    echo "<tr>
        <td>{$usuari['nom']}</td>
        <td>{$usuari['correu']}</td>
        <td>{$usuari['edat']}</td>
        <td>" . esMajorEdat($usuari['edat']) . "</td>
    </tr>";
}
echo "</table>";
?>










