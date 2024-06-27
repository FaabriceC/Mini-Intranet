<?php

/**
 * Cette page permet uniquement de saisir un mot de passe
 * puis de générer un password_hash() afin de l'insérer manuellement dans la table 'users' via PHPMyAdmin
 */


$password = 'Intranet';
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
echo "Mot de passe haché: " . $hashed_password;


?>