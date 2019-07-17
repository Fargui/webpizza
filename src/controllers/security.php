<?php
/**
 * Fichier qui gère les pages de securité
 */

/**
 * login
 */
function security_login()
{
    $pageTitle = "Connexion";

    // Verifie si l'utilisateur est deja identifié
    if (isset($_SESSION['user']['id']) && !empty($_SESSION['user']['id'])) 
    {
        redirect( url("account") );
    }

    if ($_SERVER['REQUEST_METHOD'] === "POST")
    {
        // Inclusion de la dépendance du model sécurity
        include_once "../src/models/security.php";

        // Définition du tableau d'erreurs
        $isValid = true;
    
        // Récup des données
        $email          = isset($_POST['login']) ? trim($_POST['login']) : null;
        $password_text  = isset($_POST['password']) ? $_POST['password'] : null;

        // Est ce que un utilisateur correspond à l'adresse $email
        $user = getUserByEmail($email, false);

        // Si $user est un tableau vide, => L'UTILISATEUR N'EST PAS ENREGISTRE DANS LA BDD
        if (!$user) {
            $isValid = false;
        }
    
        // Si l'utilisateur a ete trouvé dans la BDD
        // On compare le mot de passe saisi et celui de la BDD
        if ($isValid) 
        {
            if (password_verify( $password_text, $user['password'] )) 
            {
                // Recupération du panier utilisateur a partir du numero de session
                // Ce code permet d'associer un panier à un client qui s'identifie après 
                // que celui-ci ait créer le panier en étant anonyme
                // $order = getOrderByUser( session_id() );

                // Suppression du MDP du resultat de la requete
                unset($user['password']);

                // Ajouter les informations utilisateur dans la $_SESSION
                $_SESSION['user'] = $user;

                // Associe l'ID utilisateur à sa commande en cours

                // Redirige l'utilisateur
                redirect();
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
    global $regex;

    $pageTitle = "Inscription";

    // Verifie si l'utilisateur est deja identifié
    if (isset($_SESSION['user']['id']) && !empty($_SESSION['user']['id'])) 
    {
        redirect( url("account") );
    }

    if ($_SERVER['REQUEST_METHOD'] === "POST")
    {
        // Inclusion de la dépendance du model sécurity
        include_once "../src/models/security.php";

        // Définition du tableau d'erreurs
        $errors = [];

        // Récupération des données 
        $firstname      = isset($_POST['firstname']) ? trim($_POST['firstname']) : null;
        $lastname       = isset($_POST['lastname']) ? trim($_POST['lastname']) : null;
        $email          = isset($_POST['email']) ? trim($_POST['email']) : null;
        $terms          = isset($_POST['terms_of_sales']) ? true : false;
        $password_text  = isset($_POST['password']) ? $_POST['password'] : null;
        $password_hash  = password_hash($password_text, PASSWORD_DEFAULT);        

        // Controle du prénom
        if (!preg_match($regex["names"], $firstname)) 
        {
            $errors['firstname'] = "Votre prénom n'est pas valide.";
        }

        // Controle du nom
        if (!preg_match($regex["names"], $lastname)) 
        {
            $errors['lastname'] = "Votre Nom n'est pas valide.";
        }

        // Controle de l'adresse email
        // if (!preg_match($regex["email"], $email)) 
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $errors['email'] = "L'adresse email n'est pas valide.";
        }

        // Controle des CGV
        if (!$terms) 
        {
            $errors['terms_of_sales'] = "Vous devez accepter les Conditions de ventes.";
        }


        // Verification de l'unicité de l'utilisateur
        $user = getUserByEmail($email);

        // Si $user contient au moins un résultat, on stop le processus d'inscription
        if (!empty($user)) 
        {
            $errors['user'] = "Un utilisateur est déjà enregistré avec cette adresse email.";
        }

        // Enregistrement des données dans la BDD
        if (empty($errors)) 
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
    $pageTitle = "Récupération du mot de passe";

    // Verifie si l'utilisateur est deja identifié
    if (isset($_SESSION['user']['id']) && !empty($_SESSION['user']['id'])) 
    {
        redirect( url("account") );
    }

    if ($_SERVER['REQUEST_METHOD'] === "POST")
    {

    }
    
    include_once "../src/views/security/forgotten_password.php";
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