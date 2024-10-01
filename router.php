<?php
require_once 'top_songs.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

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
    default:
        echo('404 Page not found');
        break;
}