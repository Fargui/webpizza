<?php

if (!function_exists('redirectToPreviousPage')) 
{
    function redirectToPreviousPage() 
    {
        $redirectTo = "/";

        if (isset($_SERVER['HTTP_REFERER']))
        {
            $redirectTo = $_SERVER['HTTP_REFERER'];
        }

        redirect( $redirectTo );

    }
}