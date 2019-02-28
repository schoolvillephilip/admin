<?php

if(! defined('ENVIRONMENT') )
{
    $domain = strtolower($_SERVER['HTTP_HOST']);
//    die( $domain );
    switch($domain) {
        case 'config.onitshamarket.com' :
        case 'www.config.onitshamarket.com':
            define('ENVIRONMENT', 'production');
            break;
        default :
            define('ENVIRONMENT', 'development');
            break;
    }
}