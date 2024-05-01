<?php
$page = "accueil";
require_once '../composants/enTete.php'; ?>

<h1>PAGE D'ACCEUIL</h1>

</main>
<?php
    $jsonData = file_get_contents('../../donnees/fichiers.json');
    $actualites = json_decode($jsonData, true);

    if($actualites === null) {
        echo '<li>erreur lors de la récupération des actualités</li>';
    } else {
        foreach($actualites as $actualite) {
            echo "<li> Titre:" . $actualite["titre"] . "</li>";
        }
    }

?>
</body>


</html>