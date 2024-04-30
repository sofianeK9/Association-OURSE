<?php

function inscription()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Vérifier si tous les champs du formulaire sont remplis
        if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['mot_de_passe']) && !empty($_POST['mot_de_passe_verification'])) {
            $nom = filter_input(INPUT_POST, "nom");
            $prenom = filter_input(INPUT_POST, "prenom");
            $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
            $motDePasse = filter_input(INPUT_POST, "mot_de_passe");
            $motDePasseVerification = filter_input(INPUT_POST, "mot_de_passe_verification");

            $jsonData = file_get_contents("../../donnees/utilisateurs.json");
            $utilisateurs = json_decode($jsonData, true);

            if ($utilisateurs === null) {
                $utilisateurs = [];
            }

            $mailExistant = false;

            if (count($utilisateurs) >= 1) {
                foreach ($utilisateurs as $utilisateur) {
                    if ($utilisateur["email"] === $email) {
                        $mailExistant = "true";
                        echo 'E-mail déjà existant';
                    }
                }
            }

            if (!$mailExistant && $motDePasse === $motDePasseVerification) {
                $hashageMdp = password_hash($motDePasse, PASSWORD_DEFAULT);

                $nouvelUtilisateur = array(
                    "id" => count($utilisateurs),
                    'nom' => $nom,
                    'prenom' => $prenom,
                    "email" => $email,
                    "mot_de_passe" => $hashageMdp
                );

                $utilisateurs[] = $nouvelUtilisateur;

                file_put_contents("../../donnees/utilisateurs.json", json_encode($utilisateurs));

                session_start();
                $_SESSION['connecte'] = true;
                $_SESSION['id'] = count($utilisateurs);
            } elseif ($motDePasse !== $motDePasseVerification) {
                echo ('Les mots de passe ne sont pas identiques, veuillez entrer deux mots de passe similaires');
            }
        } else {
            echo "Veuillez remplir tous les champs du formulaire.";
        }
    }
}


function connexion()
{

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        session_start();

        $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
        $motDePasse = filter_input(INPUT_POST, "mot_de_passe_connexion");

        $jsonData = file_get_contents("../../donnees/utilisateurs.json");
        $utilisateurs = json_decode($jsonData, true);


        foreach ($utilisateurs as $utilisateur) {

            if ($utilisateur["email"] === $email) {
                if (password_verify($motDePasse, $utilisateur["mot_de_passe"])) {
                    $_SESSION['connecte'] = true;
                    $_SESSION['id'] = $utilisateur['id'];

                    header('Location: ./index.html');
                } else if (!password_verify($motDePasse, $utilisateur['mot_de_passe'])) {
                    http_response_code(401);
                    echo 'Le mot de passe est incorrect';
                } else {
                    http_response_code(401);
                    echo 'email non valide';
                }
            }
        }
    }
}
