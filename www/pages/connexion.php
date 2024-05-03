<?php 
$page ="connexion";
require_once '../composants/enTete.php';
require_once '../composants/fonctions.php' ;
connexion();
?>


<form method="post">
        <h2><?= $page ?></h2>
        <label for="email">E-mail
        <input type="text" id="email" name="email"></label>

        <label for="mot_de_passe_connexion">Mot de passe
        <input type="password" id="mot_de_passe_connexion" name="mot_de_passe_connexion"></label>
        <label><input type="checkbox" name="remember" id="remember">Se souvenir de moi</label>
        <a href="motDePasseOublie.php">Mot de passe perdu ?</a>

        <input type="submit" value="soumettre" id="soumettre">

    </form>

    <?php include_once '../composants/footer.php' ?>