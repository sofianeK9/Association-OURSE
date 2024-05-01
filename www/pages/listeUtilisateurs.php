<?php

require_once '../composants/enTete.php';



require_once '../composants/fonctions.php';
suppression();

if (isset($_SESSION["connecte"])) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Liste des utilisateurs</title>
    </head>

    <body>
        <h2>Liste des utilisateurs</h2>
        <ul>
            <?php
            $jsonData = file_get_contents('../../donnees/utilisateurs.json');
            $utilisateurs = json_decode($jsonData, true);

            if ($utilisateurs === null) {
                echo "<li>Erreur lors de la lecture du fichier JSON.</li>";
            } else {
                foreach ($utilisateurs as $cle => $utilisateur) {
                    echo "<li>Nom : " . $utilisateur['nom'] . ", Email : " . $utilisateur['email'];
                    echo " <form method='post'><input type='hidden' name='id' value='$cle'><button type='submit'>Supprimer</button></form>";
                    echo "</li>";
                }
            }
            ?>
        </ul>
    </body>

    </html>

<?php
}
?>