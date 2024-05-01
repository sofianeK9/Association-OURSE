<?php require_once '../composants/fonctions.php';
suppression();

?>


    <h2>Liste des utilisateurs</h2>
    <ul>
        <?php
        $jsonData = file_get_contents('../../donnees/utilisateurs.json');
        $utilisateurs = json_decode($jsonData, true);

        if ($utilisateurs === null) {
            echo "<li>Erreur lors de la lecture du fichier JSON.</li>";
        } else {
            foreach ($utilisateurs as $cle => $utilisateur) {
                echo "<li>Nom : " . $utilisateur['nom'] . ", Email : " . $utilisateur['email'] . " <form method='post'><input type='hidden' name='id' value='$cle'><button type='submit'>Supprimer</button></form></li>";
            }
        }
        ?>
    </ul>
</body>

</html>