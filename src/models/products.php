<?php

function getProducts( $type )
{
    global $db;

    $sql = "SELECT
            t1.id AS product_id,
            t1.name AS product_name,
            t1.description AS product_description,
            t1.price AS product_price,
            t1.illustration AS product_illustration,
            t3.name AS ingredient_name,
            t3.type AS ingredient_type
            
        FROM 
            product AS t1
            INNER JOIN product_ingredient AS t2 ON t2.id_product=t1.id
            INNER JOIN ingredient AS t3 ON t3.id=t2.id_ingredient
            
        WHERE
            t1.type=\"".$type."\"

        ORDER BY
            t1.name ASC,
            t3.name ASC";
    
    $q = $db['main']->query($sql);

    return $q->fetchAll(PDO::FETCH_OBJ);
}

function getPizzas(){ return getProducts('pizza'); }
function getPastas(){ return getProducts('pasta'); }
function getSalads(){ return getProducts('salad'); }
function getDesserts(){ return getProducts('dessert'); }
function getDrinks(){ return getProducts('drink'); }
function getMenus(){ return getProducts('menu'); }
function getStarters(){ return getProducts('starter'); }


/**
 * Récupération d'un produit par son $ID
 *
 * @param integer $id
 * @return void
 */
function getProduct(int $id)
{
    global $db;

    // definition de la requête
    $sql = "SELECT `id`,`name`,`description`,`price`,`type`,`illustration` FROM `product` WHERE `id`=:id";

    // Préparation de la requete
    $query = $db['main']->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    // Execution de la requete
    $query->execute();

    // Récupération du résultats
    return $query->fetch(PDO::FETCH_ASSOC);
}