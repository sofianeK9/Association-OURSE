<?php 
$page ="Contact";
require_once '../composants/enTete.php';
require_once '../composants/fonctions.php' ;

?>


<form method="post">
        <h2><?= $page ?></h2>
        <label for="nom">Nom
        <input type="text" id="nom" name="nom"></label>

        <label for="prenom">Prénom
        <input type="text" id="prenom" name="prenom"></label>

        <label for="email">E-mail
        <input type="text" id="email" name="email"></label>

       <label for="objet">Objet</label>
       <input type="text" id="objet" name="objet">

       <label for="message">Message</label>
       <textarea name="message" id="message" cols="30" rows="10"></textarea>

        <input type="submit" value="soumettre" id="soumettre">

    </form>

</body>
</html>