<?php 
$page ="connexion";
require_once '../composants/enTete.php'; ?>

    <h1><?= $page ?></h1>
    
    <form method="post">
        <label for="email">E-mail</label>
        <input type="text" id="email" name="email">

        <label for="mot_de_passe_connexion">Mot de passe</label>
        <input type="text" id="mot_de_passe_connexion" name="mot_de_passe_connexion">
        <input type="checkbox" name="remember" id="remember">Se souvenir de moi
        <a href="motDePasseOublie.php">Mot de passe perdu ?</a>

        <input type="submit" value="soumettre" id="soumettre">

    </form>

</body>
</html>