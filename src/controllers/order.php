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
    include_once "../src/models/order.php";

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

    // Récupération de la commande client
    if ($user_id != null) {
        $order = getOrderByUser($user_id);
    } else {
        $order = getOrderByUser($user_sess_id);
    }

    // Création de la commande (si non existante)
    if (!$order) 
    {
        $order = createOrder([
            "session" => $user_sess_id,
            "id" => $user_id
        ]);
    } 
    // Ou récupération de l'id de la commande
    else 
    {
        $order = $order->id;
    }

    // Récupération des produits dans la commande
    $order_products = getOrderProducts($order);

    // Si la requete retourne FALSE
    if (!$order_products) {
        // On surcharge $order_products avec un tableau vide
        $order_products = [];
    }

    // On déclare la variable $addProductToOrder avec la valeur TRUE, qui va nous permettre de 
    // savoir si on ajoute le produit dans la BDD ou non
    $addProductToOrder = true;



    dump( $product );
    dump( $user_sess_id );
    dump( $user_id );
    var_dump( $order_products );

}

/**
 * Supprime un produit du pabnier client
 *
 * @return void
 */
function order_remove()
{

}