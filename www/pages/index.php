<?php
$page = "accueil";
require_once '../composants/enTete.php'; 

$jsonData = file_get_contents('../../donnees/actualites.json');
$actualites = json_decode($jsonData, true);

?>
<div class="accueil-container">
    <div class="accueil-content">
    <h2>Bienvenue sur le site de l'OURSE</h2>
    <p><strong>L'OURSE</strong> est la <strong>monnaie locale citoyenne complémentaire, sociale et solidaire</strong> du Pays de Questembert à celui de Férel.</p>
</div>
    <a href="carte.php"><img src="https://mlcc-ourse.org/cache/OpeN_map_large_vignette_300_209_20230801231315_20230802002627.jpg" alt="image map_large.jpg (36.0kB)
Lien vers: https://mlcc-ourse.org/?AcceuilCarte" width="270" height="209"></a></div>

<h2>Dernières actualités</h2>
<div class="actualite-container">

<?php

if ($actualites === null) {
    echo '<li>erreur lors de la récupération des actualités</li>';
} else {

    foreach ($actualites as $index => $actualite) {
        $class = ($index % 2 == 0) ? 'odd' : '';
        $description_abbreviated = substr($actualite["description"], 0, 50) . '...'; // Extrait les 20 premières lettres de la description
    
        echo "<div class='actualite-popup' data-titre='" . $actualite["titre"] . "' data-image='" . $actualite["image"] . "' data-description='" . $actualite["description"] . "' data-date='" . $actualite["date"] . "' data-heure='" . $actualite["heure"] . "' data-lien='" . $actualite["lien"] . "' data-ville='" . $actualite["ville"] . "' data-code-postal='" . $actualite["code_postal"] . "' data-complement-adresse='" . $actualite["complement_adresse"] . "'>";
        echo "<div class='miniature $class'>
                <h2>".$actualite["titre"]."</h2>
                <img src='../img/" . $actualite["image"] . "' alt='" . $actualite["titre"] . "' style='width:100px;'>
               <p>".$description_abbreviated."</p>
               <span>Date: ".$actualite["date"]."</span>
              </div>";
        echo "</div>";
    }
    
}

?>

</div>

<div id="overlay" style="display: none;"></div>
<div id="popup" style="display: none;"></div>
<?php include_once '../composants/footer.php' ?>