<?php require_once '../composants/donneesRecup.php';
require_once '../composants/fonctions.php';
modificationProfil();

require_once '../composants/enTete.php';
$page = "PROFIL";
$mailExistant = "false";
?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page ?></title>
</head>

<body>


<form action="" method="POST">

    <h2><?= $page ?></h2>

    <label for="email">Nouvelle adresse email :</label>
    <input type="email" id="email" name="email" value=""required>

    <label for="mot_de_passe">Mot de passe actuel :</label>
    <input type="password" id="mot_de_passe" name="mot_de_passe" required>

    <label for="nouveau_mot_de_passe">Nouveau mot de passe :</label>
    <input type="password" id="nouveau_mot_de_passe" name="nouveau_mot_de_passe" required>

    <label for="mot_de_passe_confirme">Confirmer le nouveau mot de passe :</label>
    <input type="password" id="mot_de_passe_confirme" name="mot_de_passe_confirme" required>

    <input type="submit" value="Modifier">
</form>

</body>

</html>