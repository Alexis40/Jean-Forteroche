<?php
require_once('framework/Autoloader.php');

Autoloader::register();
session_start();

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
    
    case 'addComment';
        $controller = new Controller();
        echo $controller->addComment();
        break;
    
    case 'login';
        $controller = new Controller();
        echo $controller->loginPage();
        break;
        
    case 'connexion';
        $controller = new Controller();
        echo $controller->connexion();
        break;

    case 'deconnexion';
        $controller = new Controller();
        echo $controller->deconnexion();
        break;

    case 'registration';
        $controller = new Controller();
        echo $controller->registrationPage();
        break;
        
    default:
        $controller = new Controller();
        echo $controller->errorPage();
        
}