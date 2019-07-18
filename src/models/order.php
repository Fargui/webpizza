<?php

/**
 * Récupère une commande en fonction de l'id utilisateur ou la session PHP
 *
 * @param int|string $user ID user ou PHP Sess ID
 * @return void
 */
function getOrderByUser($user) 
{
    global $db;

    // Définition de la requete
    $sql = "SELECT `id`,`amount` FROM `order` WHERE `id_user`=:user || `sess_user`=:user";
    // Préparation de la requete
    $query = $db['main']->prepare($sql);
    $query->bindValue(':user', $user);

    // Execution de la requete
    $query->execute();

    // Resultat de la requete
    return $query->fetch(PDO::FETCH_OBJ);
}


/**
 * Creation d'un commande liée à un utilisateur
 *
 * @param [type] $user
 * @return void
 */
function createOrder($user)
{
    global $db;

    // Définition de la requete
    $sql = "INSERT INTO `order` (`id_user`, `sess_user`) VALUES (:id_user, :sess_user)";

    // Oréparation de la requete
    $query = $db['main']->prepare($sql);
    $query->bindValue(':id_user', $user['id']);
    $query->bindValue(':sess_user', $user['session'], PDO::PARAM_STR);

    // Execution de la requete
    $query->execute();

    // Retourne l'id de la commande
    return $db['main']->lastInsertId();
}


/**
 * Retourne la liste des produits d'une commande
 *
 * @param integer $id_order ID de la commande
 * @return void
 */
function getOrderProducts($id_order)
{
    global $db;
    
    // définition de la requete
    $sql = "SELECT `id`,`id_product`,`quantity`,`price` FROM `order_product` WHERE `id_order`=:id_order";

    // Préparattion de la requete
    $query = $db['main']->prepare($sql);
    $query->bindValue(':id_order', $id_order, PDO::PARAM_INT);

    // Execution de la requete
    $query->execute();

    return $query->fetchAll(PDO::FETCH_OBJ);
}


/**
 * Ajoute un produit à une commande
 *
 * @param array $product données du produit
 * @param integer $order id de la commande
 * @return void
 */
function addProductToOrder($product, $order)
{
    global $db;

    // Définition de la requete
    $sql = "INSERT INTO `order_product` (`id_order`,`id_product`,`quantity`,`price`,`amount`) VALUES (:id_order,:id_product,:quantity,:price,:amount)";
    
    // Préparation de la requete
    $query = $db['main']->prepare($sql);
    $query->bindValue(':id_order', $order, PDO::PARAM_INT);
    $query->bindValue(':id_product', $product['id'], PDO::PARAM_INT);
    $query->bindValue(':quantity', 1, PDO::PARAM_INT);
    $query->bindValue(':price', $product['price']);
    $query->bindValue(':amount', $product['price']);
    
    // Execution de la requete
    $query->execute();

    // Retourne l'id de l'enregistrement
    return $db['main']->lastInsertId();
}


function updateProductInOrder($product, $order_product_id)
{
    global $db;

    // Definition de la requete

    // Préparation de la requete
    $query = $db['main']->prepare($sql);

    // Execution de la requete
    return $query->execute();
}