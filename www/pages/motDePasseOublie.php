<?php
require_once '../composants/fonctions.php';
$nouveauMotDePasse = genererMotDePasse();
envoyerEmail($_POST['email'], $nouveauMotDePasse);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de récupération de mot de passe</title>
</head>

<body>
    <h2>Récupérer votre mot de passe</h2>
    <form method="post">
        <label for="email">Entrez votre e-mail:</label>
        <input type="email" id="email" name="email">
        <button type="submit">Envoyer</button>
    </form>
</body>

</html>