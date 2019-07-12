<?php
/**
 * Fichier de compilation de l'application
 * 
 * Ce fichier génére la page finale HTML avant de retourner le résultat au navigateur
 */


// Dans le cas ou la route est vide, on force le programme a redefinir la route
// vers la page 404

if (empty($route)) 
{
    $route = end($routes);
}


/**
 * Récupération des éléments de la route qui definissent le controleur
 */

// Si ce paramètre est vide, on arrete le programme
if (!isset($route[2]) || empty($route[2])) 
{
    throw new Exception("Le controleur n'est pas définit.");
}

// Initialisation des variables qui définiront le fichier et la fonction à exécuter
$controller_exp = $route[2];    // homepage:index
$controller_file = null;        // homepage
$controller_path = null;        // "../src/controllers/".$controller_file.".php";
$controller_methode = null;     // homepage_index

// Récupération des élément du controleur
$controller = explode(":", $controller_exp);


// -- Définition du fichier controleur ($controller_file = "homepage")
$controller_file = $controller[0];
$controller_path = "../src/controllers/".$controller_file.".php";

// -- Définition de la fonction à exécuter
// $controller_methode = join("_", $controller);
$controller_methode = isset($controller[1]) ? $controller[1] : null;

if ($controller_methode !== null && !empty($controller_methode)) 
{
    $controller_methode = $controller_file."_".$controller_methode;
}
else {
    $controller_methode = $controller_file."_index";
}

/**
 * Intégration du fichier controleur
 */
if (!file_exists($controller_path)) 
{
    // Si oui le programme est arreté
    throw new Exception("Le fichier controleur de la route \"".$route[0]."\" est manquant.");
}

// Le fichier controleur existe, il est inclus au programme
include_once $controller_path;




/**
 * Exécution de la fonction du controleur
 */

// test l'existance de la fonction du controleur
if (!function_exists($controller_methode)) 
{
    // Si la fonction n'existe pas le programme est arreté
    throw new Exception("La methode \"".$controller_methode."\" de la route \"".$route[0]."\" est manquante.");
}

// Exécution de la fonction liée à la route
$controller_methode();