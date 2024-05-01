<?php

function inscription()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
                        $mailExistant = true;
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
                    exit();
                } else {
                    http_response_code(401);
                    echo 'Le mot de passe est incorrect';
                    exit();
                }
            }
        }
        http_response_code(401);
        echo 'email non valide';
    }
}


// Fonction pour générer un mot de passe aléatoire sécurisé
function genererMotDePasse($longueur = 8)
{
    // Caractères possibles pour le mot de passe
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()-_';

    // Initialiser le mot de passe
    $motDePasse = '';

    // Obtenir la longueur de la chaîne de caractères
    $longueurCaracteres = strlen($caracteres);

    // Générer le mot de passe
    for ($i = 0; $i < $longueur; $i++) {
        // Sélectionner un caractère aléatoire dans la liste des caractères possibles
        $motDePasse .= $caracteres[rand(0, $longueurCaracteres - 1)];
    }

    return $motDePasse;
}

// Fonction pour envoyer un e-mail avec le nouveau mot de passe
function envoyerEmail($destinataire, $nouveauMotDePasse)
{
    // Sujet de l'e-mail
    $sujet = 'Mot de passe oublié';

    // Message de l'e-mail
    $message = 'Bonjour, voici votre nouveau mot de passe : ' . $nouveauMotDePasse;

    // En-têtes de l'e-mail
    $headers = "Content-Type: text/plain; charset=UTF-8\r\n";

    // Envoyer l'e-mail
    if (mail($destinataire, $sujet, $message, $headers)) {
        return true; // Succès de l'envoi de l'e-mail
    } else {
        return false; // Échec de l'envoi de l'e-mail
    }
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer l'adresse e-mail du formulaire
    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);

    // Générer un nouveau mot de passe sécurisé
    $nouveauMotDePasse = genererMotDePasse();

    // Envoyer l'e-mail avec le nouveau mot de passe
    if (envoyerEmail($email, $nouveauMotDePasse)) {
        echo "Un e-mail a été envoyé à votre adresse e-mail avec votre nouveau mot de passe.";
    } else {
        echo "Une erreur s'est produite lors de l'envoi de l'e-mail.";
    }
}

function suppression()
{

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
        $userId = $_POST['id'];

        $json_data = file_get_contents('../../donnees/utilisateurs.json');
        $users = json_decode($json_data, true);

        if (isset($users[$userId])) {
            unset($users[$userId]);

            file_put_contents('../../donnees/utilisateurs.json', json_encode($users));

            header("Location: listeUtilisateurs.php");
            exit;
        } else {
            echo "L'utilisateur avec l'ID $userId n'existe pas.";
        }
    }
}
