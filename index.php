<?php
require_once('framework/Autoloader.php');

Autoloader::register();
session_start();


$page = $_REQUEST['page'] ?? 'home';

switch($page){
    case 'homePage':
        $controller = new Controller();
        echo $controller->homePage();
        break;

    case 'book';
        $controller = new Controller();
        echo $controller->chapterPage();
        break;
    
    case 'addCommentAction';
        $controller = new Controller();
        echo $controller->addCommentAction();
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
        
    case 'adminComments';
        $controller = new Controller();
        echo $controller->adminCommentsPage();
        break;

    case 'deleteCommentAction';
        $controller = new Controller();
        echo $controller->deleteCommentAction();
        break;
    
    case 'reportAction';
        $controller = new Controller();
        echo $controller->ReportAction();
        break;

    case 'modifyReportAction';
        $controller = new Controller();
        echo $controller->modifyReportAction();
        break;
    
    case 'adminChapters';
        $controller = new Controller();
        echo $controller->adminChaptersPage();
        break;

    case 'addChapterAction';
        $controller = new Controller();
        echo $controller->addChapterAction();
        break;

    case 'modifyChapterAction';
        $controller = new Controller();
        echo $controller->modifyChapterAction();
        break;

    case 'deleteChapterAction';
        $controller = new Controller();
        echo $controller->deleteChapterAction();
        break;

    case 'updateChapterAction';
        $controller = new Controller();
        echo $controller->updateChapterAction();
        break;

    default:
        $controller = new Controller();
        echo 'mauvaise page';
        
}