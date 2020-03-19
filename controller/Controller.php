<?php

class Controller{

    public function chaptersList(){
        $title = 'Accueil';
        $chapterManager = new ChapterManager();
        $chaptersList = $chapterManager->getChapters();
        $view = new View();

        return $view->render('view/homeView.php', ['title'=>$title, 'chaptersList'=>$chaptersList]);
    }

    public function chapter($message=null){
        $title = 'Billet simple pour l\'Alaska';

        //Permet l'affichage des chapitres en fonction de l'id.
        $chapterManager = new ChapterManager();
        $idLastChapter = $chapterManager->getLastIdChapter();
        $idChapter = $_GET['id'] ?? $idLastChapter;
        $chapter = $chapterManager->getChapter($idChapter);

        //Permet l'affichage de tous les chapitres du livre.
        $allChapter = $chapterManager->getAllChapters();

        //Permet l'affichage des commentaires.
        $commentManager = new CommentManager();
        $commentsList = $commentManager->getComments($idChapter);

        //Permet l'affichage de la vue book
        $view = new View();

        return $view->render('view/bookView.php', ['title'=>$title, 'chapter'=>$chapter, 'commentsList'=>$commentsList, 'allChapter'=>$allChapter, 'message'=>$message]);
    }

    public function addComment(){
        $commentManager = new CommentManager();
        $comment = new Comment($_REQUEST);

        $commentManager->postComment($comment);
        return $this->chapter('votre commentaire est bien ajouté');
    }

    public function loginPage($login=null){
        $title = 'Login';

        $view = new View();

        return $view->render('view/loginView.php', ['title'=>$title, 'login'=>$login]);
    }

    public function connexion(){
        $alias = $_POST['alias'];
        $password = $_POST['password'];

        $memberManager = new MembersManager;
        $member = $memberManager->getMemberFromLoginPass($alias, $password);

        if($member==null){
            return $this->loginPage($alias);
        } else {
            $_SESSION['member'] = serialize($member);
            return $this->chaptersList();
        }
    }

    public function registration($message=null){
        $title = 'Créer un compte';
        if(isset($_POST['chooseUsername'])){
            //REGEX PERMETTANT DE CONTRAINDRE LES CHAMPS D'ENREGISTREMENTS.
            if(preg_match("#^[a-z][a-z0-9]{1,}#i", $_POST['chooseUsername'])){
                if(preg_match("#[a-zA-Z0-9]{5,10}#", $_POST['choosePassword'])){
                    if($_POST['choosePassword'] === $_POST['confirmPassword']){
                        $member = new Member();
                        $member->setAlias($_POST['chooseUsername']);
                        $encodedPassword = password_hash($_POST['choosePassword'], PASSWORD_DEFAULT);
                        $member->setpassword($encodedPassword);
                        $message = 'Vous avez bien été ajouter comme membre.';
                        //Création d'une fonction dans MemberManager pour inserer un membre dans la base.
                    } else {
                        $message = 'Les mots de passe sont différents';
                    }
                } else {
                    $message = 'Le mot de passe doit comporter au moins 5 caractères, 1 majuscule et 1 chiffre.';
                }
            } else {
                $message = 'Le nom choisi doit comporter au moins 2 caractères et commençer par une lettre.';
            }
        }
        
        $view = new View();

        return $view->render('view/registrationView.php', ['title'=>$title, 'message'=>$message]);
    }

    public function errorPage(){
        $title = 'Page d\'erreur';

        //Affichage de la page d'erreur
        $view = new View();

        return $view->render('view/errorView.php', ['title'=>$title]);
    }

    
}