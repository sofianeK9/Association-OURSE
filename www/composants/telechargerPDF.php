<?php
function telechargerPDF($nom_fichier) {

    $dossier = '../../pdf/';


    $chemin_fichier = $dossier . $nom_fichier;


    if(file_exists($chemin_fichier)) {

        header('Content-Description: File Transfer');
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . basename($chemin_fichier) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($chemin_fichier));


        readfile($chemin_fichier);
        exit;
    } else {

        echo "Le fichier n'existe pas.";
    }
}


if(isset($_GET['nom_fichier'])) {
    telechargerPDF($_GET['nom_fichier']);
} else {
    echo "Paramètre manquant.";
}
?>
