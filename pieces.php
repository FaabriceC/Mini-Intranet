<?php

session_start();

include 'database.php';

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['loggedin'])) {
    header("Location: index.php");
    exit();
}

$username = $_SESSION['username'];

// Requête préparer pour afficher toutes les pièces de la BDD.
$req = $bdd->prepare("SELECT numeroPiece, nomPiece FROM pieces");
$req->execute();

$pieces = [];

$pieces = $req->fetchAll();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Rechercher une pièce</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="img/logo.jpg">
</head>
<body>
    <div class="box">
        <h2><span id="lettre">E</span>ntrez le n° ou nom de la pièce</h2>

        <p>Vous êtes connecté en tant que <?php echo $username; ?>.</p>
        <div class="recherche-container">
                <input type="text" id="recherche" name="recherche" placeholder="Rechercher une pièce" autocomplete="off">
                <input type="text" id="suggestion" disabled>
        </div>
        <div id="contenueListe"></div>
        <a href="index.php"><img src="img/accueil.png" alt="Accueil" class="accueil"></a>
    </div>

    <footer>
        <p>&copy; Fabrice CANNAN - Mini-Intranet - 2024</p>
        <a href="https://www.linkedin.com/in/fabrice-cannan/" target="_blank"><img src="img/linkedin.png" alt="LinkedIn"></a>
    </footer>

    <!-- Ce script permet de transmettre les données des pièces au format JSON vers JavaScript. -->
    <script>
        let pieces = <?php echo json_encode($pieces); ?>;
    </script>

    <script src="js/script.js"></script>
</body>
</html>