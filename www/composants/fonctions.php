<?php require_once '../composants/donneesRecup.php';

function inscription()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['mot_de_passe']) && !empty($_POST['mot_de_passe_verification'])) {
            $nom = filter_input(INPUT_POST, "nom");
            $prenom = filter_input(INPUT_POST, "prenom");
            $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
            $motDePasse = filter_input(INPUT_POST, "mot_de_passe");

            // Validation de l'e-mail
            if (!$email) {
                echo "Veuillez saisir une adresse e-mail valide.";
                return;
            }

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
                        return;
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
        $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
        $motDePasse = filter_input(INPUT_POST, "mot_de_passe_connexion");

        $jsonData = file_get_contents("../../donnees/utilisateurs.json");
        $utilisateurs = json_decode($jsonData, true);

        foreach ($utilisateurs as $utilisateur) {
            if ($utilisateur["email"] === $email) {
                if (password_verify($motDePasse, $utilisateur["mot_de_passe"])) {
                    $_SESSION['connecte'] = true;
                    $_SESSION['id'] = $utilisateur['id'];
                    $_SESSION['role'] = $utilisateur['role'];
                    header('Location: ./index.php');
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


function deconnexion()
{
    session_unset();
    session_destroy();
    header("Location: ./connexion.php");
    exit;
};

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
function updatePassword($email, $newPassword)
{
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

function modificationProfil()
{

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        session_start();

        // Récupérer les données du formulaire
        $email = filter_input(INPUT_POST, "email");
        $motDePasse = filter_input(INPUT_POST, "mot_de_passe");
        $nouveauMotDePasse = filter_input(INPUT_POST, "nouveau_mot_de_passe");
        $motDePasseConfirme = filter_input(INPUT_POST, "mot_de_passe_confirme");

        $jsonData = file_get_contents("../../donnees/utilisateurs.json");
        $utilisateurs = json_decode($jsonData, true);

        // Initialiser la variable $mailExistant en dehors de la boucle
        $mailExistant = "false";

        // Condition de vérification de mot de passe
        if (password_verify($motDePasse, $utilisateurs[$_SESSION['id']]["mot_de_passe"])) {

            if ($email !== $utilisateurs[$_SESSION['id']]["email"]) {

                if (count($utilisateurs) >= 1) {

                    // Boucle pour parcourir le tableau et retrouver les mails 
                    foreach ($utilisateurs as $utilisateur) {

                        // Condition pour l'email déjà existant et attribuation à la variable mailExistant
                        if ($utilisateur["email"] === $email) {
                            $mailExistant = "true";
                            echo "mail déjà existant";
                        }
                    }
                }
            }


            if ($mailExistant === "false" && $nouveauMotDePasse === $motDePasseConfirme) {
                $motDePasseHash = password_hash($nouveauMotDePasse, PASSWORD_DEFAULT);

                $utilisateurs[$_SESSION['id']]["email"] = $email;
                $utilisateurs[$_SESSION['id']]["mot_de_passe"] = $motDePasseHash;

                file_put_contents("../../donnees/utilisateurs.json", json_encode($utilisateurs));

                echo "Les informations ont été modifiées avec succès.";
            } else {

                http_response_code(400);

                echo "Les nouveaux mots de passe ne correspondent pas.";
            }
        } else {

            http_response_code(401);

            echo "Mot de passe incorrect.";
        }
    }
}

function ajoutActualites()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $titre = $_POST['titre'];
        $image = $_POST['image'];
        $description = $_POST['description'];
        $date = $_POST['date'];
        $moment = $_POST['moment'];
        $heure = isset($_POST['heure']) ? $_POST['heure'] : null;
        $ville = $_POST['ville'];
        $ville = $_POST['code-postal'];
        $ville = $_POST['complement-adresse'];
        $lien = $_POST['lien'];

        
        $actualite = [
            'titre' => $titre,
            'image' => $image,
            'description' => $description,
            'date' => $date,
            'moment' => $moment,
            'heure' => $heure,
            'ville' => $ville,
            'lien' => $lien
        ];

        $actualites = file_exists("../../donnees/fichiers.json") ? json_decode(file_get_contents("../../donnees/fichiers.json"), true) : [];

        $actualites[] = $actualite;

        file_put_contents("../../donnees/fichiers.json", json_encode($actualites, JSON_PRETTY_PRINT));

        
        echo "L'actualité a été ajoutée avec succès.";
        // header("Location: page-de-redirection.php");
    }
}
