<?php

class Controller{

    public function chaptersList(){
        $title = 'Accueil';
        $chapterManager = new ChapterManager();
        $chaptersList = $chapterManager->getChapters();
        $view = new View();

        return $view->render('view/homeView.php', ['title'=>$title, 'chaptersList'=>$chaptersList]);
    }

    public function chapter($message=null, $member=null){
        $title = 'Billet simple pour l\'Alaska';
        if(!empty($_SESSION)){
            $member=unserialize($_SESSION['member']);
        }
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

        return $view->render('view/bookView.php', [ 'title'=>$title, 
                                                    'chapter'=>$chapter, 
                                                    'commentsList'=>$commentsList, 
                                                    'allChapter'=>$allChapter, 
                                                    'message'=>$message, 
                                                    'member'=>$member
                                                    ]);
    }

    public function addComment(){
        $commentManager = new CommentManager();
        $comment = new Comment($_REQUEST);
        $content= $comment->getContent();
        $content= htmlspecialchars($content);
        $comment->setContent($content);
        $commentManager->postComment($comment);
        return $this->chapter('votre commentaire est bien ajouté', $member=null);
    }

    public function loginPage($pseudo=null, $warningConnexionMessage=null){
        $title = 'Login';

        $view = new View();

        return $view->render('view/loginView.php', ['title'=>$title, 'pseudo'=>$pseudo, 'warningConnexionMessage'=>$warningConnexionMessage]);
    }
    //CETTE FOONCTION EST APPELÉ QUAND ON APPUI SUR LE LIEN DE CONNEXION.
    public function connexion(){
        $pseudo = $_POST['connectPseudo'];
        $password = $_POST['connectPassword'];
        if(($pseudo==null) || ($password==null)){
            $warningConnexionMessage = 'Vous devez renseigner votre Pseudo et le mot de passe associé';
            return $this->loginPage($pseudo=null, $warningConnexionMessage);
        } else {
            $memberManager = new MembersManager();
            //RÉCUPÉRATION D'UN MEMBRE AVEC SON PSEUDO POUR POUVOIR UTILISER LA FONCTION PASSWORD_VERIFY ET COMPARER LES DEUX MOT DE PASSE.
            $memberForVerifPWD = $memberManager->getMemberByPseudo($pseudo);
            $pwdHash = $memberForVerifPWD->getPass();
            if(password_verify($password, $pwdHash)){
                $member = $memberManager->getMemberFromLoginPass($pseudo, $pwdHash);
                if($member==null){
                    return $this->loginPage($pseudo);
                } else {
                    $_SESSION['member'] = serialize($member);
                    return $this->chaptersList();
                }
            } else {
                $warningConnexionMessage = 'Mauvais identifiant ou mot de passe';
                return $this->loginPage($pseudo, $warningConnexionMessage);
            }
        }
    }

    //CETTE FONCTION EST APPELÉ QUAND ON APPUIS SUR LE LIEN DE DECONNEXION
    public function deconnexion(){
        $_SESSION = array();
        session_destroy();
        return $this->chaptersList();
    }

    public function registrationPage($warningRegistrationMessage=null){
        $title = 'Créer un compte';
        if(isset($_POST['chooseUsername'])){
            //REGEX PERMETTANT DE CONTRAINDRE LES CHAMPS D'ENREGISTREMENTS.
            if(preg_match("#^[a-z][a-z0-9]{1,}#i", $_POST['chooseUsername'])){
                if(preg_match("#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{5,}$#", $_POST['choosePassword'])){
                    if($_POST['choosePassword'] === $_POST['confirmPassword']){
                        $newMember = new Member();
                        $newMember->setPseudo($_POST['chooseUsername']);
                        $encodedPassword = password_hash($_POST['choosePassword'], PASSWORD_DEFAULT);
                        $newMember->setPass($encodedPassword);
                        $addMember = new MembersManager();
                        $addMember->addmember($newMember);
                        $warningRegistrationMessage = 'Vous êtes maintenant enregistré, vous pouvez vous connecter.';
                        return $this->loginPage($newMember->getPseudo(), $warningRegistrationMessage);
                    } else {
                        $warningRegistrationMessage = 'Les mots de passe sont différents';
                    }
                } else {
                    $warningRegistrationMessage = 'Le mot de passe doit comporter au moins 5 caractères, 1 majuscule et 1 chiffre.';
                }
            } else {
                $warningRegistrationMessage = 'Le nom choisi doit comporter au moins 2 caractères et commençer par une lettre.';
            }
        }
        
        $view = new View();

        return $view->render('view/registrationView.php', ['title'=>$title, 'warningRegistrationMessage'=>$warningRegistrationMessage]);
    }

    public function adminPage(){
        $title = 'Administration';

        //Affichage de la page d'erreur
        $view = new View();

        return $view->render('view/adminView.php', ['title'=>$title]);
    }

    
}