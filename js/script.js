document.addEventListener('DOMContentLoaded', function() {
    const champRecherche = document.getElementById('recherche');
    const conteneurListe = document.getElementById('contenueListe');
    const suggestion = document.getElementById('suggestion');


    // Listener pour écouter les modifications dans le champ de recherche.
    champRecherche.addEventListener('input', function() {
        const termeRecherche = champRecherche.value.trim().toLowerCase();
        conteneurListe.innerHTML = '';
        suggestion.value = '';


        // Récupère seulement les pièces avec les lettre de 'termeRecherche'.
        if (termeRecherche.length >= 1) {
            const piecesFiltrees = pieces.filter(piece => piece.numeroPiece.toString().includes(termeRecherche) || piece.nomPiece.toLowerCase().includes(termeRecherche)
        );


            // Vérifie qu'il y a au moins une pièce.
            if (piecesFiltrees.length > 0) {

                // Créer un élément 'select' pour afficher les résultats.
                suggestion.value = `${piecesFiltrees[0].numeroPiece} - ${piecesFiltrees[0].nomPiece}`;
                const resultatsListe = document.createElement('select');
                resultatsListe.className = 'listeItems';
                resultatsListe.size = 6;


                // Ajout des pièces dans les options.
                piecesFiltrees.forEach(piece => {
                    const option = document.createElement('option');
                    option.textContent = `${piece.numeroPiece} - ${piece.nomPiece}`;
                    resultatsListe.appendChild(option);
                });

                conteneurListe.appendChild(resultatsListe);

                // Listener pour écouter le "clique" et remplir le champ de texte.
                resultatsListe.addEventListener('click', function(event) {
                    champRecherche.value = event.target.textContent;
                    resultatsListe.style.display = 'none';
                    suggestion.value = '';
                });
            }
        }
    });
});