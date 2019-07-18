<?php

/**
 * Affiche la synthese du panier client
 *
 * @return void
 */
function order_index()
{
    // Définition du tableau $products (liste des produits dans le panier)
    $products = [];

    // ...

    // Integration de la vue
    include_once "../src/views/order/index.php";
}

/**
 * Ajoute un produit au panier client
 *
 * @return void
 */
function order_add()
{
    // Dépendances des Models
    include_once "../src/models/products.php";

    // Récupération de l'ID produit
    $product_id = isset($_GET['id']) ? (int) (trim($_GET['id'])) : null;

    // Test l'id produit
    if (empty($product_id))
    {
        setFlashbag("warning", "Le produit ne peux pas être ajouté au panier");
        redirectToPreviousPage();
    }

    // Récupération des données du produit
    $product = getProduct( $product_id );

    // Récupération des données du client
    $user_sess_id = session_id();
    $user_id = isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : null;

    dump( $product );
    dump( $user_sess_id );
    dump( $user_id );

}

/**
 * Supprime un produit du pabnier client
 *
 * @return void
 */
function order_remove()
{

}