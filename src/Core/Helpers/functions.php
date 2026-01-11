<?php

use Core\Helpers\Auth;
use Core\Helpers\Request;
use Core\Helpers\Session;
use Core\Router\Router;

function session(){
    return new Session() ;
}

function auth(){
    return new Auth() ;
}

function route(string $name){
    $router = Router::$instance;
    return $router->namedRoutes[$name];
}

function diffForHuman(DateTime $date){
    $now = new DateTime();
    $diff = $now->diff($date);

    if ($diff->y > 0) {
        $comment_diff = $diff->y . ' year' . ($diff->y > 1 ? 's' : '') . ' ago';
    } elseif ($diff->m > 0) {
        $comment_diff = $diff->m . ' month' . ($diff->m > 1 ? 's' : '') . ' ago';
    } elseif ($diff->d > 0) {
        $comment_diff = $diff->d . ' day' . ($diff->d > 1 ? 's' : '') . ' ago';
    } elseif ($diff->h > 0) {
        $comment_diff = $diff->h . ' hour' . ($diff->h > 1 ? 's' : '') . ' ago';
    } elseif ($diff->i > 0) {
        $comment_diff = $diff->i . ' min ago';
    } else {
        $comment_diff = 'Just now';
    }

    return $comment_diff;
}

function page(){
    return parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
}

function dns(){
    $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
    ? 'https'
    : 'http';

    $host = $_SERVER['HTTP_HOST'];

    $baseUrl = $scheme . '://' . $host;

    return $baseUrl;
}