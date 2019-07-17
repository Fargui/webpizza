<?php

function getUserByEmail($email) {
    
}


function addUser(array $user) 
{
    global $db;

    // Préparation de la requête
    $sql = "INSERT INTO user (`firstname`,`lastname`,`email`,`password`) VALUES (:firstname,:lastname,:email,:password)";

    // Préparation de la requete
    $query = $db['main']->prepare($sql);
    $query->bindValue(':firstname', $user['firstname'], PDO::PARAM_STR);
    $query->bindValue(':lastname', $user['lastname'], PDO::PARAM_STR);
    $query->bindValue(':email', $user['email'], PDO::PARAM_STR);
    $query->bindValue(':password', $user['password'], PDO::PARAM_STR);

    // Execution de la requete
    return $query->execute();
}