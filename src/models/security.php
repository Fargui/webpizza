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

function addPwdToken($token, $user_id)
{
    global $db;

    // oDéfinition de la requete
    $sql = "UPDATE `user` SET `pwd_token`=:token WHERE `id`=:id";

    // Préparation de la requete
    $query = $db['main']->prepare($sql);
    $query->bindValue(':token', $token, PDO::PARAM_STR);
    $query->bindValue(':id', $user_id, PDO::PARAM_INT);

    // Execution de la requete
    return $query->execute();
}


function getUserByPwdToken($token)
{
    global $db;

    // Definition de la requête
    $sql = "SELECT `id`, `fullname`, `email` FROM `user` WHERE `pwd_token`=:token";

    // Préparation de la requete
    $query = $db['main']->prepare($sql);
    $query->bindValue(':token', $token, PDO::PARAM_STR);

    // Execution de la requete
    $query->execute();

    // Récupération du résultats
    return $query->fetch(PDO::FETCH_ASSOC);
}