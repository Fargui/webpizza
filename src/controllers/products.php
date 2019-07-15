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
    // dump( getPizzas() );

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