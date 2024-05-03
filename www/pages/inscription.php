<?php
require_once '../composants/fonctions.php';
inscription();

$page = "Ajout d'un compte";
require_once '../composants/enTete.php';
?>


<form method="post">
    <h2>Ajout de compte</h2>

    <label for="nom">Nom</label>
    <input type="text" id="nom" name="nom" required />

    <label for="prenom">Prénom</label>
    <input type="text" id="prenom" name="prenom" required />

    <label for="email">Email</label>
    <input type="email" id="email" name="email" required />

    <label for="mot_de_passe">Mot de passe</label>
    <input type="password" id="mot_de_passe" name="mot_de_passe" required />

    <label for="mot_de_passe_verification">Vérifier le mot de passe</label>
    <input type="password" id="mot_de_passe_verification" name="mot_de_passe_verification" required />

    <input type="submit" value="Ajouter">
</form>

<?php include_once '../composants/footer.php' ?>