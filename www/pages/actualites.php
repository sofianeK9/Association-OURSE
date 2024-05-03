<?php
require_once '../composants/fonctions.php';
ajoutActualites();
require_once '../composants/enTete.php';
$page = "Ajouter une actualité";
?>

    <form method="post" enctype="multipart/form-data">

    <h2><?= $page ?></h2>

        <label for="titre">Titre de la fiche</label>
        <input type="text" id="titre" name="titre">

        <label for="image">Image</label>
        <input type="file" name="image" id="image">

        <label for="description">Description de l'évènement</label>
        <textarea name="description" id="description" cols="30" rows="10"></textarea>

        <label for="date">Date de l'actualité</label>
        <input type="date" name="date" id="date">

        <select class="select-heure-actualite" name="moment" id="moment">
            <option value="journee">Toute la journée</option>
            <option value="heure">Entrer l'heure</option>
        </select>

        <div id="heureContainer">
            <label for="heure">Heure de l'évènement</label>
            <input type="time" name="heure" id="heure">
        </div>

        <label for="ville">Ville</label>
        <input type="text" id="ville" name="ville">

        <label for="code-postal">Code postal</label>
        <input type="text" id="code-postal" name="code-postal">

        <label for="complement-adresse">Complément d'adresse</label>
        <input type="text" id="complement-adresse" name="complement-adresse">

        <label for="lien">Lien pour avoir plus d'information</label>
        <input type="text" id="lien" name="lien">

        <input type="submit" value="soumettre" id="soumettre">

    </form>

<?php include_once '../composants/footer.php' ?>