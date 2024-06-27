<?php

/**
 * Cette page gère la connexion de l'utilisateur.
 */

include 'database.php';


// Récupération des informations de connexion depuis le formulaire.
$username = $_POST['username'];
$password = $_POST['password'];


// Prépare une requête SQL pour vérifier si l'utilisateur existe.
$req = $bdd->query("SELECT * FROM users WHERE username='$username'");

if ($req->num_rows > 0) {  // Vérifie si la requête a un tuple (ce qui veut dire que l'utilisateur a été trouvé).

    // Récupère les informations de l'utilisateur trouvé.
    $ligne = $req->fetch_assoc();
    $hashed_password = $ligne['password'];

    // Vérifie si le mot de passe fourni correspond au mot de passe haché dans la base de données.
    if (password_verify($password, $hashed_password)) {

        // Si le mot de passe est correct, démarre une session et redirige vers la page 'pieces.php'.
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;

        header("Location: pieces.php");

    } else {

        // Si le mot de passe est incorrect, redirige vers la page de connexion.
        header("Location: index.php");

    }

} else {

    // Si aucun utilisateur avec ce nom d'utilisateur n'est trouvé, redirige vers la page de connexion.
    header("Location: index.php");

}


?>