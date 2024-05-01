<?php
require_once '../composants/fonctions.php';

require_once '../composants/enTete.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualités</title>
</head>

<body>
    <h2>Saisir une fiche : Gestion des évènements</h2>
    <form method="post">
        <label for="titre">Titre de la fiche</label>
        <input type="text" id="titre" name="titre">

        <label for="image">Image</label>
        <input type="file" name="image" id="image">

        <label for="description">Description de l'évènement</label>
        <textarea name="description" id="description" cols="30" rows="10"></textarea>

        <label for="date">Date de l'actualité</label>
        <input type="date" name="date" id="date">

        <select name="moment" id="moment" onchange="toggleHeure()">
            <option value="journee">Toute la journée</option>
            <option value="heure">Entrer l'heure</option>
        </select>


        <div id="heureContainer" style="display:none;">
            <label for="heure">Heure de l'évènement</label>
            <input type="time" name="heure" id="heure">
        </div>

        <label for="ville">Ville</label>
        <input type="text" id="ville" name="ville">

        <label for="lien">Lien pour avoir plus d'information</label>
        <input type="text" id="lien" name="lien">
    </form>

    <script>
        function toggleHeure() {
            var moment = document.getElementById("moment");
            var heureContainer = document.getElementById("heureContainer");

            if (moment.value === "heure") {
                heureContainer.style.display = "block";
            } else {
                heureContainer.style.display = "none";
            }
        }
    </script>
</body>

</html>