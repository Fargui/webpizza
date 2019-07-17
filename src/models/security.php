<?php

function getUserByEmail($email, $secured=true) 
{
    global $db;

    // Definition de la requête
    $sql = "SELECT `id`, `fullname`, `email`, `password` FROM `user` WHERE `email`=:email";

    // Préparation de la requete
    $query = $db['main']->prepare($sql);
    $query->bindValue(':email', $email, PDO::PARAM_STR);

    // Execution de la requete
    $query->execute();

    // Récupération du résultats
    $response = $query->fetch(PDO::FETCH_ASSOC);

    // Si la requête retourne un réponse...
    if ($response) 
    {
        // Si on sécurise la réponse...
        if ($secured) 
        {
            // On supprime le mot de passe de la réponse
            unset($response['password']);
        }

        return $response;
    }
    
    return false;
}


function addUser(array $user)
{
    global $db;

    // Definition de la requête
    $sql = "INSERT INTO `user` (`firstname`,`lastname`,`email`,`password`) VALUES (:firstname,:lastname,:email,:password)";

    // Préparation de la requete
    $query = $db['main']->prepare($sql);
    $query->bindValue(':firstname', $user['firstname'], PDO::PARAM_STR);
    $query->bindValue(':lastname', $user['lastname'], PDO::PARAM_STR);
    $query->bindValue(':email', $user['email'], PDO::PARAM_STR);
    $query->bindValue(':password', $user['password'], PDO::PARAM_STR);

    // Execution de la requete
    return $query->execute();
}