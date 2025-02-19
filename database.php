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


function renderPDF(pdfUrl, idCanvas, maxWidth = 0, maxHeight = 0) {
    // Définition du worker de PDF.js
    pdfjsLib.GlobalWorkerOptions.workerSrc =
        "https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.worker.min.js";

    // Chargement du PDF
    pdfjsLib.getDocument(pdfUrl).promise.then((pdf) => {
        console.log("PDF chargé :", pdf);
        pdf.getPage(1).then((page) => {
            var pdfCanvas = document.getElementById(idCanvas);
            renderPDFPage(page, pdfCanvas, maxWidth, maxHeight);
        });
    }).catch(error => {
        console.error("Erreur lors du chargement du PDF :", error);
    });
}

// Fonction pour afficher la page du PDF dans un canvas
function renderPDFPage(page, canvas, maxWidth = 0, maxHeight = 0) {
    var viewport = page.getViewport({ scale: 1 });
    var context = canvas.getContext("2d");
    var newScale = 1;

    // Calcul de l'échelle en fonction de maxWidth et maxHeight
    if (maxWidth !== 0 && maxHeight === 0) {
        newScale = maxWidth / viewport.width;
    } else if (maxWidth === 0 && maxHeight !== 0) {
        newScale = maxHeight / viewport.height;
    } else if (maxWidth !== 0 && maxHeight !== 0) {
        if (maxWidth > (viewport.width * maxHeight) / viewport.height) {
            newScale = maxWidth / viewport.width;
        } else {
            newScale = maxHeight / viewport.height;
        }
    }

    viewport = page.getViewport({ scale: newScale });
    canvas.width = viewport.width;
    canvas.height = viewport.height;

    var renderContext = {
        canvasContext: context,
        viewport: viewport
    };

    console.log("Affichage du PDF avec les paramètres :", renderContext);
    page.render(renderContext);
}
