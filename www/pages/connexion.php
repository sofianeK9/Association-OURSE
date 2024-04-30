<?php require_once '../composants/fonctions.php';
connexion();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>

<body>
    <form method="post">
        <label for="email">E-mail</label>
        <input type="text" id="email" name="email">

        <label for="mot_de_passe_connexion">Mot de passe</label>
        <input type="text" id="mot_de_passe_connexion" name="mot_de_passe_connexion">
        <input type="checkbox" name="remember" id="remember">Se souvenir de moi
        <a href="">Mot de passe perdu ?</a>

        <input type="submit" value="soumettre" id="soumettre">

    </form>

</body>

</html>