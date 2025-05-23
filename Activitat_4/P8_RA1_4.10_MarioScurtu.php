<?php
/*
 ================================================================
 Curs: ASIX
 Autor: Mario Scurtu
 Data: 23/05/2025
 Versió: 1
 ================================================================
 Especificacions d'entrada:
   - Nom, email, assumpte i missatge.
 Especificacions de sortida:
   - Validació, mostra errors en vermell i confirmació.
 ================================================================
*/

$errors = [];
$nom = $email = $assumpte = $missatge = "";

if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $nom = trim($_POST['nom'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $assumpte = trim($_POST['assumpte'] ?? '');
    $missatge = trim($_POST['missatge'] ?? '');

    if (!$nom) $errors['nom'] = "Falta el nom";
    if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors['email'] = "Correu no vàlid";
    if (!$assumpte) $errors['assumpte'] = "Falta l'assumpte";
    if (!$missatge) $errors['missatge'] = "Falta el missatge";

    if (empty($errors)) {
        echo "<p style='color:green'>Enviament correcte!</p>";
        exit;
    }
}

function val($field) {
    global $$field;
    return htmlspecialchars($$field);
}

function err($field, $errors) {
    return isset($errors[$field]) ? "<span style='color:red'>{$errors[$field]}</span><br>" : "";
}

?>
<form method="post">
    Nom:<br><input name="nom" value="<?= val('nom') ?>"><br><?= err('nom', $errors) ?>
    Email:<br><input name="email" value="<?= val('email') ?>"><br><?= err('email', $errors) ?>
    Assumpte:<br><input name="assumpte" value="<?= val('assumpte') ?>"><br><?= err('assumpte', $errors) ?>
    Missatge:<br><textarea name="missatge"><?= val('missatge') ?></textarea><br><?= err('missatge', $errors) ?>
    <input type="submit" value="Enviar">
</form>
// Formulari complet amb validació i errors en vermell
