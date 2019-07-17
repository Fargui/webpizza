<?php
/**
 * Fichier d'exécution de l'application
 */

/**
 * 1. Démarrage de la session
 * --
 * La session va permettre de suivre le visiteur pendant la durée de sa navigation
 */
session_start();

/**
 * 2. Intégration de la configuration
 */
require_once "../config/config.php";

/**
 * 3. Définition de l'environnement
 */
require_once "../app/environnement.php";

/**
 * 4. Comportement des erreurs
 */
require_once "../app/err_reporting.php";

/**
 * 5. Connections aux base de données
 */
require_once "../app/dbconnect.php";

/**
 * 6. Routage de l'application
 */
require_once "../app/routing.php";

/**
 * 7. Inclusion des fonctions "Utils"
 */
include_once "../app/utils.php";

/**
 * 8. Controleur principal (commun à toutes les pages du site)
 */
include_once "../src/controllers/common.php";

/**
 * 9. Compilation de la page
 */
include_once "../app/compile.php";