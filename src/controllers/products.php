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
    $productsModel = getPizzas();

    dump( productsBuilder($productsModel) );

    dump( $productsModel );

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
    // Inclusion de la dépendance "Products model"
    include_once "../src/models/products.php";

    // Récupération des données de type "pasta"
    dump( getPastas() );

}

/**
 * Fonction dédiée à l'affichage des Salads
 *
 * @return void
 */
function products_salads()
{
    // Inclusion de la dépendance "Products model"
    include_once "../src/models/products.php";

    // Récupération des données de type "pizza"
    // dump( getSalads() );
    $productsModel = getSalads();

    // Titre de la page
    $pageTitle = "Nos Salades";

    // Intégration de la vue "product"
    include_once "../src/views/products/index.php";
}

/**
 * Fonction dédiée à l'affichage des Desserts
 *
 * @return void
 */
function products_desserts()
{
    
    echo "Je vais chercher les desserts dans la BDD et je les affiches";

}

/**
 * Fonction dédiée à l'affichage des Boissons
 *
 * @return void
 */
function products_drinks()
{
    // Inclusion de la dépendance "Products model"
    include_once "../src/models/products.php";

    // Récupération des données de type "drink"
    dump( getDrinks() );

}

/**
 * Fonction dédiée à l'affichage des Menus
 *
 * @return void
 */
function products_menus()
{
    // Inclusion de la dépendance "Products model"
    include_once "../src/models/products.php";

    // Récupération des données de type "menu"
    dump( getMenus() );

}

/**
 * Fonction dédiée à l'affichage des Entrées
 *
 * @return void
 */
function products_starters()
{
    // Inclusion de la dépendance "Products model"
    include_once "../src/models/products.php";

    // Récupération des données de type "starter"
    dump( getStarters() );

}




function productsBuilder( $products ): Array
{
    $output = [];

    if (is_array($products)) 
    {
        foreach ($products as $product) 
        {
            if (!isset( $output[ $product->product_id ] )) 
            {
                $output[ $product->product_id ] = [];
            }

            $output[ $product->product_id ]['id'] = $product->product_id;
            $output[ $product->product_id ]['name'] = $product->product_name;
            $output[ $product->product_id ]['description'] = $product->product_description;
            $output[ $product->product_id ]['price'] = $product->product_price;
            $output[ $product->product_id ]['illustration'] = $product->product_illustration;
            $output[ $product->product_id ]['ingredients'] = [];

            // dump( $product->product_id );

            // array_push($output, $product);
        }
    }

    return $output;
}