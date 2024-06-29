<?php

    // Connexion a la base de données.

    define('HOST', 'localhost');
    define('DB_NAME', 'intranet');
    define('USER', 'root');
    define('PASS', 'root');


    try {
        $bdd = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, USER, PASS);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo $e;
    }