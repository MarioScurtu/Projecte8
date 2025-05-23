<?php
/*
 ================================================================
 Curs: ASIX
 Autor: Mario Scurtu
 Data: 23/05/2025
 Versió: 1
 ================================================================
 Especificacions d'entrada:
   - Formulari amb 3 camps.
 Especificacions de sortida:
   - Si hi ha errors, torna a mostrar el formulari amb valors introduïts.
 ================================================================
*/

$errors = []; 
$nom = $email = $missatge = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $nom = trim($_POST['nom'] ?? '');         
    $email = trim($_POST['email'] ?? '');     
    $missatge = trim($_POST['missatge'] ?? ''); 

    // Validació: comprovem si els camps estan buits
    if (!$nom) $errors['nom'] = "Falta el nom";
    if (!$email) $errors['email'] = "Falta el correu";
    if (!$missatge) $errors['missatge'] = "Falta el missatge";

    // Si no hi ha errors, mostrem missatge i acabem
    if (empty($errors)) {
        echo "Formulari enviat correctament!";
        exit;
    }
}

// Funció per recuperar valor anterior d’un camp i evitar codi HTML maliciós
function val($camp) {
    global $$camp;
    return htmlspecialchars($$camp);
}

// Funció per mostrar l’error corresponent a un camp
function err($camp) {
    global $errors;
    return $errors[$camp] ?? '';
}
?>

<!-- Formulari HTML que reomple valors i mostra errors si n’hi ha -->
<form method="post">
    Nom: <input name="nom" value="<?= val('nom') ?>"> <span style="color:red"><?= err('nom') ?></span><br>
    Email: <input name="email" value="<?= val('email') ?>"> <span style="color:red"><?= err('email') ?></span><br>
    Missatge: <textarea name="missatge"><?= val('missatge') ?></textarea> <span style="color:red"><?= err('missatge') ?></span><br>
    <input type="submit" value="Enviar">
</form>
