<?php
require_once 'libs/response.php';
require_once 'app/middlewares/session.auth.middleware.php';
require_once 'app/controllers/top.controller.php';
require_once 'app/controllers/auth.controller.php';
require_once 'config.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$res = new Response();

if (!empty($_GET['action'])){
    $action = $_GET['action'];
}else {
    $action = 'top-songs'; // acción por defecto si no envían
}

//                          TABLA DE RUTEO
//======================================================================================
//           URL                                LLAMADO
//======================================================================================
// top-songs                       TopController->showTop();
// artist/:id                      TopController->showArtist($params[1]);
// artists                         TopController->showArtists();
// about                           TopController->showAbout();
// song/:id                        TopController->showSong($params[1]);
// suggestions                     TopController->showSuggestion();
//======================================================================================
// showLogin                       AuthController->showLogin();
// login                           AuthController->login();
// logOut                          AuthController->logOut();
//======================================================================================
// newSong                         TopController->addSong();
// updateSong                      TopController->modifySong();
// deleteSong                      TopController->deleteSong();
//======================================================================================
// newArtist                       TopController->addArtist();
// updateArtist                    TopController->modifyArtist();
// deleteArtist                    TopController->deleteArtist();
//======================================================================================


$params = explode('/', $action);

switch($params[0]){

    // Paginas del TOP

    case 'top-songs':
        session($res);
        $controller = new TopController($res);
        $controller->showTop();
        break;
    case 'artist':
        session($res);
        $controller = new TopController($res);
        if(isset($params[1])){
            $controller->showArtist($params[1]);
        }else{
            $controller->showTop();
        }
    break;
    case 'artists': 
        session($res);
        $controller = new TopController($res);
        $controller->showArtists();
        break;
    case 'about':
        session($res);
        $controller = new TopController($res);
            $controller->showAbout();
        break;
    case 'song':
        session($res);
        $controller = new TopController($res);
        if(isset($params[1])){
            $controller->showSong($params[1]);
        }else{
            $controller->showTop();
        }
        break;
    case 'suggestions':
        sessionAuthMiddleware($res);
        $controller = new TopController($res);
        $controller->showSuggestion();
        break;

    // Login de la pagina

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

    // Modificaciones de los artistas y las cancioness

    case 'newSong':
        sessionAuthMiddleware($res);
        $controller = new TopController($res);
        $controller->addSong();
        break;
    case 'updateSong':
        sessionAuthMiddleware($res);
        $controller = new TopController($res);
        $controller->modifySong();
        break;
    case 'deleteSong':
        sessionAuthMiddleware($res);
        $controller = new TopController($res);
        $controller->deleteSong();
        break;
    case 'newArtist':
        sessionAuthMiddleware($res);
        $controller = new TopController($res);
        $controller->addArtist();
        break;
    case 'updateArtist':
        sessionAuthMiddleware($res);
        $controller = new TopController($res);
        $controller->modifyArtist();
        break;
    case 'deleteArtist':
        sessionAuthMiddleware($res);
        $controller = new TopController($res);
        $controller->deleteArtist();
        break;

    // Errores

    default:
        echo('404 Page not found');
        break;
}