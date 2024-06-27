document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search');
    const liste = document.getElementById('contenueListe');

    searchInput.addEventListener('input', function() {
        const searchTerm = searchInput.value.trim().toLowerCase();
        liste.innerHTML = '';

        if (searchTerm.length >= 1) {
            const filteredPieces = pieces.filter(piece => 
                piece.numeroPiece.toLowerCase().includes(searchTerm) || 
                piece.nomPiece.toLowerCase().includes(searchTerm)
            );

            if (filteredPieces.length > 0) {
                const selectElement = document.createElement('select');
                selectElement.id = 'results';
                selectElement.className = 'listeItems';
                selectElement.size = 6;

                // Création des options pour la liste déroulante
                filteredPieces.forEach(piece => {
                    const option = document.createElement('option');
                    option.textContent = `${piece.numeroPiece} - ${piece.nomPiece}`;
                    option.value = `${piece.numeroPiece} - ${piece.nomPiece}`; // Valeur complète de l'option
                    selectElement.appendChild(option);
                });

                liste.appendChild(selectElement);

                // Ajout d'un gestionnaire d'événements 'click' aux options de la liste déroulante
                selectElement.addEventListener('click', function(event) {
                    if (event.target.tagName === 'OPTION') {
                        searchInput.value = event.target.value; // Met à jour le champ de recherche avec la valeur complète de l'option cliquée
                        selectElement.style.display = 'none'; // Masque la liste déroulante après avoir sélectionné une option
                    }
                });
            }
        }
    });


});