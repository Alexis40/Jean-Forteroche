<?php

class Controller{

    public function chaptersList(){
        $title = 'Accueil';
        $chapterManager = new ChapterManager();
        $chaptersList = $chapterManager->getChapters();
        $view = new View();

        return $view->render('view/homeView.php', ['title'=>$title, 'chaptersList'=>$chaptersList]);
    }

    public function chapter(){
        $title = 'Billet simple pour l\'Alaska';
       
        $chapterManager = new ChapterManager();
        $idLastChapter = $chapterManager->getLastIdChapter();
        $idChapter = $_GET['id'] ?? $idLastChapter;
        $chapter = $chapterManager->getChapter($idChapter);

        $commentManager = new CommentManager();
        $commentsList = $commentManager->getComments($idChapter);
        $view = new View();

        return $view->render('view/bookView.php', ['title'=>$title, 'chapter'=>$chapter, 'commentsList'=>$commentsList]);
    }

    public function connexionPage(){
        $title = 'Connexion';
        $view = new View();

        return $view->render('view/connexionView.php', ['title'=>$title]);
    }
}