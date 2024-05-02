$(document).ready(function() {
    $("#heureContainer").hide();

    $(".select-heure-actualite").change(function() {
        toggleHeure();
    });


    $(".suppression-button").click(function(){
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


            $('#popup').html(popupContent);
        $('#popup').show();
        $('#overlay').show();
    });


    $('#overlay').click(function() {
        $('#popup').hide();
        $(this).hide();
    });


    $(".particulier-content").hide();
    $(".particulier-content:first").show();


    $(".particulier-sommaire a").click(function(){

        $(".particulier-content").hide();


        var target = $(this).attr("href");

        $(target).show();

        return false;
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
