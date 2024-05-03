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


    $('.actualite-popup').click(function() {
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
        '<img src="' + image + '" alt="' + titre + '">' + 
        '<div class="description">' + description + '</div>' + 
        '<div class="infos">' +
            '<p>Le ' + date + 
             heure + 
            ' à ' + ville  + 
            ' - ' + codePostal +
            ' - ' + adresseComplementaire + '</p>' +
        '</div>' + 
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


    $(".particulier-sommaire a, .sommaire a").click(function(){
        // Retirer la classe "active" de tous les liens
        $(".particulier-sommaire a").removeClass("active");
        // Cacher tous les contenus
        $(".particulier-content").hide();
    
        // Récupérer la cible du lien cliqué
        var target = $(this).attr("href");
    
        // Afficher le contenu ciblé
        $(target).show();
    
        // Ajouter la classe "active" au lien cliqué
        $(this).addClass("active");
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

