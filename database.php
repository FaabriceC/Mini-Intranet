<?php

    // Création de la connexion à la base de données et gestion des erreurs
    
    try {
        $bdd = new mysqli("localhost", "root", "root", "intranet");
    
        if ($bdd->connect_error) {
            throw new DatabaseConnectionException("ERREUR: " . $bdd->connect_error);
        }
    
    } catch (DatabaseConnectionException $e) {
        echo "ERREUR: " . $e->getMessage();
    }

?>