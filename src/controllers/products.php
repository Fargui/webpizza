<?php

/**
 * Fonction dédiée à l'affichage des Pizzas
 *
 * @return void
 */
function products_pizzas()
{
    // Inclusion de la dépendance "Products model"
    include_once "../src/models/products.php";

    // Récupération des données de type "pizza"
    $productsModel = productsBuilder(getPizzas());

    // Titre de la page
    $pageTitle = "Nos Pizzas";

    // Intégration de la vue "product"
    include_once "../src/views/products/index.php";
}

/**
 * Fonction dédiée à l'affichage des Pates
 *
 * @return void
 */
function products_pastas()
{
    include_once "../src/models/products.php";

    $productsModel = productsBuilder(getPastas());
    $pageTitle = "Nos Pates";

    include_once "../src/views/products/pastas.php";
}

/**
 * Fonction dédiée à l'affichage des Salads
 *
 * @return void
 */
function products_salads()
{
    include_once "../src/models/products.php";

    $productsModel = productsBuilder(getSalads());
    $pageTitle = "Nos Salades";

    include_once "../src/views/products/index.php";
}

/**
 * Fonction dédiée à l'affichage des Desserts
 *
 * @return void
 */
function products_desserts()
{
    include_once "../src/models/products.php";

    $productsModel = productsBuilder(getDesserts());
    $pageTitle = "Nos Desserts";

    include_once "../src/views/products/index.php";
}

/**
 * Fonction dédiée à l'affichage des Boissons
 *
 * @return void
 */
function products_drinks()
{
    include_once "../src/models/products.php";

    $productsModel = productsBuilder(getDrinks());
    $pageTitle = "Nos Boissons";

    include_once "../src/views/products/index.php";
}

/**
 * Fonction dédiée à l'affichage des Menus
 *
 * @return void
 */
function products_menus()
{
    include_once "../src/models/products.php";

    $productsModel = productsBuilder(getMenus());
    $pageTitle = "Nos Menus";

    include_once "../src/views/products/index.php";
}

/**
 * Fonction dédiée à l'affichage des Entrées
 *
 * @return void
 */
function products_starters()
{
    include_once "../src/models/products.php";

    $productsModel = productsBuilder(getStarters());
    $pageTitle = "Nos Entrées";

    include_once "../src/views/products/index.php";
}




function productsBuilder( $products ): Array
{
    // Définition du tableur $output qui va nou servir à stocker la liste des produits
    $output = [];

    if (is_array($products)) 
    {
        foreach ($products as $product) 
        {
            // On se base sur la clé primaire du produit (ID dans la BDD et 
            // identifier sous le nom "product_id" dans la requete (t1.id AS product_id,)),
            // pour définir le nombre réel de produits dans le tableau $output.
            // 
            // Si l'index "ID du produit" n'existe pas dans le tableau $output,
            // alors on le créer et on lui affecte un tableau vide ( $output[2] = [])
            if (!isset( $output[ $product->product_id ] )) 
            {
                $output[ $product->product_id ] = [];
            }

            // On reprend les propriétés du produit ($product) pour les ajouter à
            // notre nouveau tableau $output[2] (e.g.: $output[2]['name'] = "Hawaienne")
            $output[ $product->product_id ]['id'] = $product->product_id;
            $output[ $product->product_id ]['name'] = $product->product_name;
            $output[ $product->product_id ]['description'] = $product->product_description;
            $output[ $product->product_id ]['price'] = $product->product_price;
            $output[ $product->product_id ]['illustration'] = $product->product_illustration;

            // Pour la liste d'ingrédients, nous devons définir un tableau ($output[2]['ingredient'] = [])
            // Uniquement si celui-ci n'est pas déja définit
            if (!isset($output[ $product->product_id ]['ingredients'])) 
            {
                $output[ $product->product_id ]['ingredients'] = [];
            }

            // On ajoute les ingrédients dans le tableau $output[2]['ingredient']
            array_push( $output[ $product->product_id ]['ingredients'], [
                "name" => $product->ingredient_name,
                "type" => $product->ingredient_type
            ]);
        }
    }

    return $output;
}