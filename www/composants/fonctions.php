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


// Fonction pour mettre à jour le mot de passe dans le fichier JSON
function updatePassword($email, $newPassword) {
    $data = file_get_contents('users.json');
    $users = json_decode($data, true);

    // Recherche de l'utilisateur par son email
    foreach ($users as &$user) {
        if ($user['email'] === $email) {
            $user['password'] = password_hash($newPassword, PASSWORD_DEFAULT);
            break;
        }
    }

    // Écriture des données mises à jour dans le fichier JSON
    file_put_contents('users.json', json_encode($users, JSON_PRETTY_PRINT));
}



// Fonction pour envoyer un e-mail avec le nouveau mot de passe
function envoyerEmail($to, $subject, $message)
{
    // Adresse email de l'expéditeur
    $from = "votre@email.com";

    // En-têtes de l'email
    $headers = "From: $from" . "\r\n";
    $headers .= "Reply-To: $from" . "\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";

    // Envoi de l'email
    if (mail($to, $subject, $message, $headers)) {
        echo "Email envoyé avec succès.";
    } else {
        echo "Erreur lors de l'envoi de l'email.";
    }
}

function envoyerNouveauMotDePasse($email, $nouveauMotDePasse)
{
    // Votre adresse email expéditeur
    $from = "votre@email.com";

    // Sujet de l'email
    $subject = "Nouveau mot de passe";

    // Contenu de l'email
    $message = "Bonjour,\r\n\r\n";
    $message .= "Vous avez demandé un nouveau mot de passe. Voici votre nouveau mot de passe :\r\n";
    $message .= $nouveauMotDePasse . "\r\n\r\n";
    $message .= "Nous vous recommandons de changer votre mot de passe après vous être connecté.\r\n\r\n";
    $message .= "Cordialement,\r\nVotre équipe";

    // En-têtes de l'email
    $headers = "From: $from" . "\r\n";
    $headers .= "Reply-To: $from" . "\r\n";
    $headers .= "Content-type: text/plain; charset=UTF-8" . "\r\n";

    // Envoi de l'email
    if (mail($email, $subject, $message, $headers)) {
        return true; // Email envoyé avec succès
    } else {
        return false; // Erreur lors de l'envoi de l'email
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
