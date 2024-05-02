<?php require_once '../composants/fonctions.php';
suppression();

$page ="Liste utilisateurs";
require_once '../composants/enTete.php';
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
            echo "<li>Nom : " . $utilisateur['nom'] . ", Email : " . $utilisateur['email'] . " ";
            echo "<form method='post' class='suppression-button'>";
            echo "<input type='hidden' name='id' value='$cle'>";
            echo "<button type='submit' class='suppression-bouton'>Supprimer</button>";
            echo "</form></li>";
        }
    }
?>

    </ul>
</body>

</html>