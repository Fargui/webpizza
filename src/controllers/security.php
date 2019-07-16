<?php
/**
 * Fichier qui gère les pages de securité
 */

/**
 * login
 */
function security_login()
{
    // Verifie si l'utilisateur est deja identifié
    if (isset($_SESSION['user']['id']) && !empty($_SESSION['user']['id'])) 
    {
        redirect( url("account") );
    }

    if ($_SERVER['REQUEST_METHOD'] === "POST")
    {
        $isValid = true;
    
        // Récup des données
        $email          = isset($_POST['email']) ? trim($_POST['email']) : null;
        $password_text  = isset($_POST['password']) ? $_POST['password'] : null;
    
        // Est ce que un utilisateur correspond à l'adresse $email
        $user = getUserByEmail($email);

        // Si $user est un tableau vide, => L'UTILISATEUR N'EST PAS ENREGISTRE DANS LA BDD
        if (empty($user)) {
            $isValid = false;
        }
    
        // Si l'utilisateur a ete trouvé dans la BDD
        // On compare le mot de passe saisi et celui de la BDD
        if ($isValid) 
        {
            if (password_verify( $password_text, $user[0]['password'] )) 
            {
                // Recupération du panier utilisateur a partir du numero de session
                // Ce code permet d'associer un panier à un client qui s'identifie après 
                // que celui-ci ait créer le panier en étant anonyme
                $order = getOrderByUser( session_id() );

                // Suppression du MDP du resultat de la requete

                // Ajouter les informations utilisateur dans la $_SESSION

                // Associe l'ID utilisateur à sa commande en cours

                // Redirige l'utilisateur
            }
            else {
                $isValid = false;
            }
        }
    
        if (!$isValid) {
            setFlashbag("danger", "oops, mauvais identifiants....");
        }
    }

    include_once "../src/views/security/login.php";
}


/**
 * register
 */
function security_register()
{
    // Verifie si l'utilisateur est deja identifié
    if (isset($_SESSION['user']['id']) && !empty($_SESSION['user']['id'])) 
    {
        redirect( url("account") );
    }

    if ($_SERVER['REQUEST_METHOD'] === "POST")
    {
        include_once "../src/models/security.php";

        $isValid = true;

        // Récupération des données 
        $firstname      = isset($_POST['firstname']) ? trim($_POST['firstname']) : null;
        $lastname       = isset($_POST['lastname']) ? trim($_POST['lastname']) : null;
        $email          = isset($_POST['email']) ? trim($_POST['email']) : null;
        $password_text  = isset($_POST['password']) ? $_POST['password'] : null;
        $password_hash  = password_hash($password_text, PASSWORD_DEFAULT);        

        // Controle des données
        // ...

        // Verification de l'unicité de l'utilisateur
        $user = getUserByEmail($email);

        // Si $user contient au moins un résultat, on stop le processus d'inscription
        if (!empty($user)) 
        {
            $isValid = false;
        }

        // Enregistrement des données dans la BDD
        if ($isValid) 
        {
            $user = addUser([
                "firstname" => $firstname,
                "lastname" => $lastname,
                "email" => $email,
                "password" => $password_hash
            ]);

            // Si la requete est un succès
            if ($user) { // $user === true
                redirect(url("login"));
            }
            else {
                setFlashbag("danger", "les données n'ont pas été enregistrées dans la BDD !");
            }
        }
        else {
            setFlashbag("warning", "oops, erreur sur le form !");
        }
    }

    include_once "../src/views/security/register.php";
}


/**
 * forgotten_password
 */
function security_forgotten_password()
{
    // Verifie si l'utilisateur est deja identifié
    if (isset($_SESSION['user']['id']) && !empty($_SESSION['user']['id'])) 
    {
        redirect( url("account") );
    }

    if ($_SERVER['REQUEST_METHOD'] === "POST")
    {

    }
}
// Si utilisateur deja identifier => redirection vers /mon-compte
// Affichage du formulaire (email)
// Traitement des données du formulaire
    // Récup des données
    // Controle des données
    // Verification de l'utilisateur
    // Si OK => Process (token + email)
    // Si KO => flashbag message d'erreur


/**
 * Deconnexion utilisateur
 */
function security_logout()
{
    // Deconnexion de l'utilisateur
    session_destroy();

    // redirection vers la page d'accueil
    redirect();
}