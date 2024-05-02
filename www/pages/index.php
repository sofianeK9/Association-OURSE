<?php
$page = "accueil";
require_once '../composants/enTete.php'; ?>

<h1>PAGE D'ACCEUIL</h1>

<?php
    $jsonData = file_get_contents('../../donnees/fichiers.json');
    $actualites = json_decode($jsonData, true);

    if($actualites === null) {
        echo '<li>erreur lors de la récupération des actualités</li>';
    } else {

            foreach($actualites as $actualite) {
                echo "<div class='miniature-actualite'>";
                echo "<div class='miniature' data-titre='" . $actualite["titre"] . "' data-image='" . $actualite["image"] . "' data-description='" . $actualite["description"] . "' data-date='" . $actualite["date"] . "' data-heure='" . $actualite["heure"] . "' data-lien='" . $actualite["lien"] . "' data-ville='" . $actualite["ville"] . "' data-code-postal='" . $actualite["code-postal"] . "' data-complement-adresse='" . $actualite["complement-adresse"] . "'>";
                echo "<h2>" . $actualite['titre'] . "</h2><img src='" . $actualite["image"] . "' alt='" . $actualite["titre"] . "' style='width:100px;height:100px;'>";
                echo "</div>";
                echo "</div>";
            }
    }

?>

<div id="overlay" style="display: none;"></div>
<div id="popup" style="display: none;"></div>
</main>
</body>


</html>