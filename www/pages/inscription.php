<?php 

require_once '../composants/fonctions.php';
inscription();

$page ="inscription";
require_once '../composants/enTete.php';
?>

    <h1><?= $page ?></h1>
    
  <form method="post">
    <h2>Ajout de compte</h2>

    <label for="nom">Nom</label>
    <input type="text" id="nom" name="nom" />

    <label for="prenom">Prénom</label>
    <input type="text" id="prenom" name="prenom" />

    <label for="email">Email</label>
    <input type="text" id="email" name="email" />

    <label for="mot_de_passe">Mot de passe</label>
    <input type="password" id="mot_de_passe" name="mot_de_passe" />

    <label for="mot_de_passe_verification">Verifier le mot passe</label>
    <input type="password" id="mot_de_passe_verification" name="mot_de_passe_verification" />

    <input type="submit" value="ajouter">
  </form>
</body>

</html>