<?php
session_start();
require_once '../composants/fonctions.php';

if (isset($_POST['deconnexion'])) {
    deconnexion();
}

?>

<header class="header">
    <img src="../../img/logo.jpg" alt="logo" title="logo">
    <nav class="sommaire">
        <a href="../pages/index.php">Accueil</a>
        <a href="../pages/carte.php">La Carte</a>
        <div class="dropdown">
            <a href="">Adhésion ▼</a>
            <div class="dropdown-content">
                <a href="../pages/particulier.php">Particulier</a>
                <a href="../pages/professionnel.php">Professionnel</a>
            </div>
        </div>
        <?php if (!isset($_SESSION["connecte"])) : ?>
            <a href="../pages/connexion.php">Se Connecter</a>
        <?php endif; ?>
        <?php if (isset($_SESSION["connecte"])) : ?>
            <a href="../pages/inscription.php">Inscription</a>
            <a href="../pages/profil.php">Profil</a>
            <a href="../pages/listeUtilisateurs.php">Liste des utilisateurs</a>
            <a href="../pages/actualites.php">Actualités</a>
            <form method="post" action="">
                <button type="submit" name="deconnexion">Déconnexion</button>
            </form>
        <?php endif; ?>
    </nav>
</header>