<?php
/**
 * Fichier qui gère les pages de securité
 */

/**
 * login
 */
// Si utilisateur deja identifier => redirection vers /mon-compte
// Affichage du formulaire d'identification de l'utilisateur (identifiant + mot de passe)
// Traitement des données du formulaire
    // Definition de $isValid = true;
    // Récup des données
    // Recup (dans la BDD) de la ligne correspondante à l'identifiant utilisateur
    // Si utilisateur OK
        // Test du mot de passe
        // Si mot de passe OK => création de la session
        // Recup du panier client (a faire plus tard)
        // Si mot de passe KO => $isValid = false;
    // Si utilisateur KO => $isValid = false;
    // Test si !$isValid => flashbag : message d'erreur

    
/**
 * register
 */
// Si utilisateur deja identifier => redirection vers /mon-compte
// Affichage du formulaire (Nom + prenom + email + mot de passe + date naissance + CGV)
// Traitement des données du formulaire
    // Récup des données
    // Controle des données
    // Verification de l'unicité de l'utilisateur
    // Enregistrement des données dans la BDD
    // Si OK => redirection vers /connexion ou process de connexion
    // Si KO => flashbag message d'erreur


/**
 * forgotten_password
 */
// Si utilisateur deja identifier => redirection vers /mon-compte
// Affichage du formulaire (email)
// Traitement des données du formulaire
    // Récup des données
    // Controle des données
    // Verification de l'utilisateur
    // Si OK => Process (token + email)
    // Si KO => flashbag message d'erreur


/**
 * Deconnexion utilisateur
 */
// Deconnexion de l'utilisateur, puis redirection vers la page d'accueil