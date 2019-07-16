<?php

function errors_404() 
{
    // On force la reponse HTTP avec le code 404
    header("HTTP/1.0 404 Not Found");

    // On affiche la page 404
    include_once "../src/views/errors/404.php";
}