<?php 
$page ="PARTICULIER";
require_once '../composants/enTete.php'; ?>

    <h1><?= $page ?></h1>
    
<div class="particulier-contenair">    

    <div class="colonne-gauche">
        <div class="particulier-content" id="fonctionnement">
            <h2 class="particulier-titre">Comment cela fonctionne-t-il ?</h2>
            <p class="particulier-paragraphe">Toute personne souhaitant utiliser cette monnaie doit adhérer à l'association OURSE en amenant ce bulletin d'adhésion téléchargeable rempli au comptoir d'échange le plus proche. (voir plus bas). Vous pouvez maintenant adhérer en ligne <a href="https://framaforms.org/lourse-fiche-dadhesion-pour-les-particuliers-1533566569">sur ce formulaire</a>, en réglant votre cotisation par virement vers le compte indiqué par le formulaire.<br />
        L'adhésion est à prix libre néanmoins conseillé à 10 Euro.
        <br /><br />
        Les OURSE peuvent être obtenus dans un des cinq comptoirs d'échange (consultables sur la carte des prestataires), au taux de 1 EURO = 1 OURSE.
        <br /><br />
        Ces OURSE peuvent être dépensés chez les <a href="#prestataire">prestataires</a> qui l'acceptent.</p>
        </div>

        <div class="particulier-content" id="abonnement">
            <h2 class="particulier-titre">Souscrire un abonnement</h2>
            <p class="particulier-paragraphe">Afin de recevoir régulièrement des OURSE dans votre compte d'échange habituel Vous pouvez utiliser le <a href="https://framaforms.org/souscription-mensuel-d-ourse-1605090532">formulaire de souscription en ligne</a> ou le bulletin de souscription d'Ourse sur internet par virement ponctuel ou régulier.<br />
            Souscrivez à l'abonnement em remplissant <a href="../composants/telechargerPDF.php?nom_fichier=Bulletin_de_souscription_dOurse_sur_internetpar_virement_ponctuel_ou_rgulier.pdf">ce formulaire téléchargeable</a>.
            </p>
        </div>

        <div class="particulier-content" id="prestataire">
        <h2 class="particulier-titre">Les prestataires</h2>
            <img src="../../img/pins-ourse.png" width="300" alt="monnaie-ourse" title="monnaie-ourse">
            <p class="particulier-paragraphe">
            Ce logo, vous assure qu'il est possible de régler en Ourse. <br /><br />
            Pour les localiser, <a href="carte.php">cliquez ici</a>.
            <br />Si vous avez repéré un prestataire près de chez vous qui souhaiterait accepter les Ourse, envoyez-nous un message <a href="contact.php">ICI</a>.
            </p>
        </div>

        <div class="particulier-content" id="echange">
        <h2 class="particulier-titre">Les comptoirs d'échange</h2>
            <p class="particulier-paragraphe">
            Les comptoires d'échange sont des lieux privilégier et permettent d'effectuer plusieurs opérations : <br />
- <strong>Adhérer</strong><br /><br />
Vous y trouverez les bulletins d'inscriptions à remplir et à donner au comptoire d'échange. Les bénévoles de l'Ourse viendront récupérer votre bulletin et vous recontactera pour réaliser votre carte d'adhérent. Vous pouvez pré-remplir votre adhésion en imprimant ce bulletin d'adhésion téléchargeable
<br /><br />
- <strong>Renouveler son adhésion</strong><br />
A définir<br /><br />

- <strong>Echanger</strong><br />
C'est ici que vous pourrez échanger vos Euros en monnaie locale.<br /><br />

Il y a forcément un comptoir d'échange proche de chez vous :<br /><br />
- Questembert : <a href="https://www.facebook.com/halleterrenative/">Halle Terre Native</a><br />
- Muzillac / Ambon : <a href="https://www.biocooplepanierbio.com/">Biocoop Le Panier Bio</a><br />
- La roche-Bernard : <a href="https://www.facebook.com/LaPetiteBanquise.librairie.cafe/">Petite Banquise</a><br />
- Nivillac : <a href="https://ovalenvert.fr/">O'Val en Vert</a><br />
- Damgan : <a href="https://www.lesbijouxmarine.fr/">Les Bijoux Marine</a><br />

<br />
Si vous avez repéré un commerce près de chez vous qui souhaiterait devenir comptoir d'échange, envoyez nous un message <a href="contact.php">ICI</a>.
            </p>
        </div>
    </div>
    <div class="colonne-droite">
        <ul class="particulier-sommaire">
            <li><a href="#fonctionnement" class="active-link">Comment cela fonctionne-t-il ?</a></li>
            <li><a href="#abonnement">Souscrire à l'abonnement</a></li>
            <li><a href="#prestataire">Les prestataires</a></li>
            <li><a href="#echange">Les comptoirs d'échange</a></li>
        </ul>
    </div>
</div>