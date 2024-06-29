<?php
/**
 * Cette page gère la connexion de l'utilisateur.
 */

include 'database.php';

$username = $_POST['username'];
$password = $_POST['password'];

// Requête SQL préparée pour vérifier si l'utilisateur existe (éviter les injonctions).
$req = $bdd->prepare("SELECT * FROM users WHERE username=:username");
$req->bindValue(':username', $username, PDO::PARAM_STR);
$req->execute();

// Vérifie si un utilisateur a été trouvé.
if ($req->rowCount() > 0) {  

    // Récupère les informations de l'utilisateur trouvé.
    $ligne = $req->fetch();
    $hashed_password = $ligne['password'];

    // Vérifie si le mot de passe fourni correspond au mot de passe haché dans la base de données.
    if (password_verify($password, $hashed_password)) {
        // Si le mot de passe est correct, démarre une session et redirige vers la page 'pieces.php'.
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;

        header("Location: pieces.php");
        exit();

    } else {
        // Si le mot de passe est incorrect, redirige vers la page de connexion.
        header("Location: index.php");
        exit();
    }

} else {
    // Si aucun utilisateur avec ce nom d'utilisateur n'est trouvé, redirige vers la page de connexion.
    header("Location: index.php");
    exit();
}
?>