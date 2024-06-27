<?php
session_start();

include 'database.php';

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['loggedin'])) {
    header("Location: index.php");
    exit();
}


$username = $_SESSION['username'];

// Récupération des données des pièces depuis la base de données
$req = $bdd->query("SELECT numeroPiece, nomPiece FROM pieces");
$pieces = [];


// Vérifier si des pièces ont été trouvées dans la base de données
if ($req->num_rows > 0) {

    // Parcourir chaque ligne de résultat et stocker les pièces dans un tableau
    while ($row = $req->fetch_assoc()) {
        $pieces[] = $row;
    }
}


$bdd->close();
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

        <p>Vous êtes connecté en tant que <?php echo $username?>.</p>
        <form>
            <input type="text" id="search" name="search" placeholder="Rechercher une pièce" autocomplete="off">
        </form>
        <div id="contenueListe"></div>
        <a href="#"><button id="rechercher" type="button">Rechercher</button></a>
    </div>



    <footer>
        <p>&copy Fabrice CANNAN - Mini-Intranet - 2024</p>
        <a href="https://www.linkedin.com/in/fabrice-cannan/" target="__blank"><img src="img/linkedin.png" alt=""></a>
    </footer>

    <!-- Ce script permet de transmettre les données des pièces au format JSON au JavaScript. -->

    <script>
        let pieces = <?php echo json_encode($pieces); ?>;
    </script>

    <script src="js/script.js"></script>

</body>
</html>