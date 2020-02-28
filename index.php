<?php
require_once('framework/Autoloader.php');
Autoloader::register();

$page = $_REQUEST['page'] ?? 'home';

switch($page){
    case 'home':
        $controller = new Controller();
        echo $controller->chaptersList();
        break;

    case 'book';
        $controller = new Controller();
        echo $controller->chapter();
        break;
    

    case 'connexion';
        $controller = new Controller();
        echo $controller->connexionPage();
        break;
        
    default:
        echo 'affichage page par defaut';
}