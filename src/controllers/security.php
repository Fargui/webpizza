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
        
    }
}
// Si utilisateur deja identifier => redirection vers /mon-compte
// Affichage du formulaire d'identification de l'utilisateur (identifiant + mot de passe)
// Traitement des données du formulaire
    // Definition de $isValid = true;
    // Récup des données
    // Recup (dans la BDD) de la ligne correspondante à l'identifiant utilisateur
    // Si utilisateur OK
        // Test du mot de passe
        // Si mot de passe OK => création de la session
        // Recup du panier client (a faire plus tard)
        // Si mot de passe KO => $isValid = false;
    // Si utilisateur KO => $isValid = false;
    // Test si !$isValid => flashbag : message d'erreur


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
// Si utilisateur deja identifier => redirection vers /mon-compte
// Affichage du formulaire (Nom + prenom + email + mot de passe + date naissance + CGV)
// Traitement des données du formulaire
    // Récup des données
    // Controle des données
    // Verification de l'unicité de l'utilisateur
    // Enregistrement des données dans la BDD
    // Si OK => redirection vers /connexion ou process de connexion
    // Si KO => flashbag message d'erreur


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