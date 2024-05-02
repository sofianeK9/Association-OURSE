<?php
function telechargerPDF($nom_fichier) {
    // Chemin du dossier où se trouve le fichier PDF
    $dossier = '../../pdf/';

    // Chemin complet du fichier PDF
    $chemin_fichier = $dossier . $nom_fichier;

    // Vérifier si le fichier existe
    if(file_exists($chemin_fichier)) {
        // En-têtes HTTP pour indiquer que le contenu est un fichier PDF à télécharger
        header('Content-Description: File Transfer');
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . basename($chemin_fichier) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($chemin_fichier));

        // Lire le fichier et le renvoyer au client
        readfile($chemin_fichier);
        exit;
    } else {
        // Le fichier n'existe pas, afficher un message d'erreur
        echo "Le fichier n'existe pas.";
    }
}

// Utilisation de la fonction avec le nom du fichier passé en paramètre GET
if(isset($_GET['nom_fichier'])) {
    telechargerPDF($_GET['nom_fichier']);
} else {
    // Paramètre manquant, afficher un message d'erreur
    echo "Paramètre manquant.";
}
?>
