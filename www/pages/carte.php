
<?php 
$page ="CARTE";
require_once '../composants/enTete.php'; ?>

    <h1><?= $page ?></h1>
<div class="map-container">
<iframe class="map-iframe" width="100%" height="600px" frameborder="0" allowfullscreen=""
src="https://umap.openstreetmap.fr/fr/map/les-prestataires-de-
lourse_251740?scaleControl=false&amp;miniMap=false&amp;scrollWheelZoom=false&amp;zoomControl=
true&amp;allowEdit=false&amp;moreControl=true&amp;searchControl=null&amp;tilelayersControl=null&a
mp;embedControl=null&amp;datalayersControl=true&amp;onLoadPanel=databrowser&amp;captionBar=fa
lse"></iframe>
</div>