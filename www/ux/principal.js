$(document).ready(function() {
    $("#heureContainer").hide();

    $(".select-heure-actualite").change(function() {
        toggleHeure();
    });


    $(".delete-button").click(function(){
        if (confirm("Êtes-vous sûr de vouloir supprimer cet utilisateur ?")) {
            $(this).closest("form").submit();
        }
    });


    $('.miniature').click(function() {
        var titre = $(this).data('titre');
        var image = $(this).data('image');
        var description = $(this).data('description');
        var date = $(this).data('date');
        var heure = $(this).data('heure');
        var lien = $(this).data('lien');
        var ville = $(this).data('ville');
        var codePostal = $(this).data('code-postal');
        var adresseComplementaire = $(this).data('complement-adresse');

        var popupContent = 
            '<h2>' + titre + '</h2>' + 
            '<img src="' + image + '" alt="' + titre + '" style="width:200px;height:200px;">' + 
            '<p>' + description + '</p>' + 
            '<p>Date: ' + date + '</p>' + 
            '<p>Heure: ' + heure + '</p>' + 
            '<p>Ville: ' + ville + '</p>' + 
            '<p>Code postal: ' + codePostal + '</p>' + 
            '<p>Adresse complémentaire: ' + adresseComplementaire + '</p>' + 
            '<a href="' + lien + '">Lien vers l\'actualité</a>';

        // Affichage de la pop-up
        $('#popup').html(popupContent);
        $('#popup').show();
        $('#overlay').show();
    });

    // Fermeture de la pop-up lors du clic sur l'overlay
    $('#overlay').click(function() {
        $('#popup').hide();
        $(this).hide();
    });
});

function toggleHeure() {
    var moment = $("#moment");
    var heureContainer = $("#heureContainer");

    if (moment.val() === "heure") {
        heureContainer.show();
    } else {
        heureContainer.hide();
    }
}
