<?php

require_once '../pages/ajoutCompte.php';

function inscription()
{

    if ($_SERVER["REQUIRE_METHOD"] == "POST") {
        $nom = filter_input(INPUT_POST, "nom");
        $prenom = filter_input(INPUT_POST, "prenom");
        $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
        $motDePasse = filter_input(INPUT_POST, "mot_de_passe");
        $motDePasseVerification = filter_input(INPUT_POST, "mot_de_passe_verification");

        $jsonData = file_get_contents("../../donnees/utilisateurs.json");
        $utilisateurs = json_decode($jsonData, true);


        $mailExistant = "false";

        $compteur = count($utilisateurs);


        if (count($utilisateurs) >= 1) {

            foreach ($utilisateurs as $utilisateur) {
                if ($utilisateurs["email"] === $email) {
                    $mailExistant = "true";
                    echo 'e-mail déjà existant';
                }
            }
        }

        if($mailExistant === "false" && $motDePasse === $motDePasseVerification) {
            $hashageMdp = password_hash($motDePasse, PASSWORD_DEFAULT);

            $nouvelUtilisaeur = array(
                "id" => $compteur,
                "email" => $email,
                "mot_de_passe" => $hashageMdp
            );

            $utilisateurs[] = $nouvelUtilisaeur;

            file_put_contents("../../donnees/utilisateurs.json", json_encode($utilisateurs));


            $_SESSION['connecte'] = true;
            $_SESSION['id'] = $compteur;
    
            $compteur++;
        } else if ($motDePasse !== $motDePasseVerification) {
            echo('les mots de passe ne sont pas identiques, veuillez entrer deux mots de passe similaire');
        }
    }


}
