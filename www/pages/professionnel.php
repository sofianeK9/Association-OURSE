<?php 
$page ="PROFESSIONNEL";
require_once '../composants/enTete.php'; ?>

    <h1><?= $page ?></h1>
    
    <div class="particulier-contenair">    

    <div class="colonne-gauche">
        <div class="particulier-content" id="fonctionnement">
            <h2 class="particulier-titre">Comment cela fonctionne-t-il ?</h2>
            <p class="particulier-paragraphe">
                Pour pouvoir vous faire payer en OURSE dans votre commerce ou autre activité, vous devez être prestataire.

Vous remplissez une demande d'agrément en acceptant la charte faisable en ligne en suivant ce lien
La cotisation annuelle est de 20 euro, plus 10 euro par équivalent temps plein dans la structure.


Les OURSE obtenues peuvent ensuite être utilisées comme dépense personnelle du professionnel, paiement d'un part du revenu des salariés s'ils sont d'accord ou en règlement des factures de ses fournisseurs à hauteur maximum de 1 000,00 Euro si ceux-ci sont aussi prestataires de l'OURSE.</p>
        </div>

        <div class="particulier-content" id="correction">
            <h2 class="particulier-titre">Corriger mes informations</h2>
            <p class="particulier-paragraphe">
                Si vous percevez la moindre information erronnée ou obsolète, <a href="contact.php">contactez-nous</a> ! Nous sommes à votre disposition pour tout changement important.</p>
        </div>
    </div>


    <div class="colonne-droite">
        <ul class="particulier-sommaire">
            <li><a href="#fonctionnement" class="active">Comment cela fonctionne-t-il ?</a></li>
            <li><a href="#correction">Corriger mes informations</a></li>
        </ul>
    </div>
</div>

<?php include_once '../composants/footer.php' ?>