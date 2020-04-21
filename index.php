<?php
require_once('framework/Autoloader.php');

Autoloader::register();
session_start();


$page = $_REQUEST['page'] ?? 'homePage';

switch($page){
    case 'homePage':
        $controller = new Controller();
        echo $controller->homePage();
        break;

    case 'bookPage';
        $controller = new Controller();
        echo $controller->chapterPage();
        break;
    
    case 'adminChaptersPage';
        $controller = new Controller();
        echo $controller->adminChaptersPage();
        break;
    
    case 'loginPage';
        $controller = new Controller();
        echo $controller->loginPage();
        break;
        
    case 'connexionPage';
        $controller = new Controller();
        echo $controller->connexionPage();
        break;

    case 'deconnexionPage';
        $controller = new Controller();
        echo $controller->deconnexionPage();
        break;

    case 'registrationPage';
        $controller = new Controller();
        echo $controller->registrationPage();
        break;
        
    case 'adminCommentsPage';
        $controller = new Controller();
        echo $controller->adminCommentsPage();
        break;

    case 'adminCreateChapterPage';
        $controller = new Controller();
        echo $controller->adminCreateChapterPage();
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

    case 'addCommentAction';
        $controller = new Controller();
        echo $controller->addCommentAction();
        break;
        
    default:
        $controller = new Controller();
        echo $controller->wrongPage();
        
}