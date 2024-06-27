<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="img/logo.jpg">
</head>
<body>

    <div class="box">
        <h2><span id="lettre">C</span>onnexion</h2>
        <form id="loginForm" action="login.php" method="post">
            <input type="text" id="username" name="username" autocomplete="off" placeholder="Nom d'utilisateur" require><br><br>
            <input type="password" id="password" name="password" placeholder="Mot de passe" required><br><br>
            <input type="submit" value="Se connecter">
        </form>
    </div>


    <footer>
        <p>&copy Fabrice CANNAN - Mini-Intranet - 2024</p>
        <a href="https://www.linkedin.com/in/fabrice-cannan/" target="__blank"><img src="img/linkedin.png" alt=""></a>
    </footer>
</body>
</html>