<?php
/**
 * Fichier de chargement automatique des script du répertoire "utils"
 */

// Test si la constante UTILS_PATH n'est pas définie.
if (!defined('UTILS_PATH')) {
    define('UTILS_PATH', null);
}

// Si UTILS_PATH n'est pas définit à NULL, C.A.D que UTILS_PATH est bien définit en amont (dans le fichier config.php)
if (UTILS_PATH != null) 
{
    // Est ce que UTILS_PATH (../utils/) est un répertoire
    if (is_dir(UTILS_PATH)) 
    {
        // Scanner le répertoir UTILS_PATH
        $utils_scan = scandir(UTILS_PATH);
    
        // Une boucle sur la liste des entrées $utils_scan
        foreach( $utils_scan as $value) 
        {
            // Filtre les fichiers se terminant par ".php"
            if (preg_match("/\.php$/", $value)) 
            {
                include_once UTILS_PATH.$value;
            }
        }
    }
}