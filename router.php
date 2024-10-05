<?php
require_once 'libs/response.php';
require_once 'app/middlewares/session.auth.middleware.php';
require_once 'top_songs.php';
require_once 'app/controllers/auth.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$res = new Response();

if (!empty($_GET['action'])){
    $action = $_GET['action'];
}else {
    $action = 'top-songs'; // acción por defecto si no envían
}


$params = explode('/', $action);

switch($params[0]){
    case 'top-songs':
        showTop();
        break;
    case 'artist':
        if(isset($params[1])){
            showArtistByID($params[1]);
        }else{
            showTop();
        }
    break;
    case 'artists': 
        showArtists();
        break;
    case 'about':
        showAbout();
        break;
    case 'song':
        showSong($params[1]);
        break;
    case 'suggestions':
        sessionAuthMiddleware($res);
        showSuggestion();
        break;
    case 'showLogin':
        $controller = new AuthController();
        $controller->showLogin();
        break;
    case 'login':
        $controller = new AuthController();
        $controller->login();
        break;
    case 'logOut' : 
        $controller = new AuthController();
        $controller->logOut();
        break;
    default:
        echo('404 Page not found');
        break;
}