<?php require_once '../composants/ajout.php';
inscription();
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Formulaire d'ajout de compte</title>
  </head>
  <body>
    <form action="" method="post">
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
      <input
        type="password"
        id="mot_de_passe_verification"
        name="mot_de_passe_verification" />

        <input type="submit" value="ajouter">
    </form>
  </body>
</html>
