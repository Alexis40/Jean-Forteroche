<?php

class Controller{

    public function homePage(){
        $title = 'Accueil';
        $chapterManager = new ChapterManager();
        $chaptersList = $chapterManager->getChapters();
        $view = new View();
        return $view->render('view/homeView.php', [ 'title'=>$title, 
                                                    'chaptersList'=>$chaptersList
                                                    ]);
    }

    public function chapterPage($warningMessage=null, $member=null){
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
        $view = new View();
        return $view->render('view/bookView.php', [ 'title'=>$title, 
                                                    'chapter'=>$chapter, 
                                                    'commentsList'=>$commentsList, 
                                                    'allChapter'=>$allChapter, 
                                                    'warningMessage'=>$warningMessage, 
                                                    'member'=>$member
                                                    ]);
    }

    public function addCommentAction(){
        $comment = new Comment($_REQUEST);
        $content = $comment->getCommentContent();
        $content= htmlspecialchars($content);
        $comment->setCommentContent($content);
        $commentManager = new CommentManager();
        $commentManager->postComment($comment);
        return $this->chapterPage('Votre commentaire a bien été ajouté', $member=null);
    }

    public function loginPage($pseudo=null, $warningConnexionMessage=null){
        $title = 'Login';
        $view = new View();
        return $view->render('view/loginView.php', ['title'=>$title, 
                                                    'pseudo'=>$pseudo, 
                                                    'warningConnexionMessage'=>$warningConnexionMessage
                                                    ]);
    }

    //CETTE FOONCTION EST APPELÉ QUAND ON APPUI SUR LE LIEN DE CONNEXION.
    public function connexionPage(){
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
                    return $this->homePage();
                }
            } else {
                $warningConnexionMessage = 'Mauvais identifiant ou mot de passe';
                return $this->loginPage($pseudo, $warningConnexionMessage);
            }
        }
    }

    //CETTE FONCTION EST APPELÉ QUAND ON APPUIS SUR LE LIEN DE DECONNEXION
    public function deconnexionPage(){
        $_SESSION = array();
        session_destroy();
        return $this->homePage();
    }
    //Enregistrement d'un nouveau membre.
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
                        $warningRegistrationMessage = 'Vous êtes maintenant enregistré(e), vous pouvez vous connecter.';
                        return $this->loginPage($newMember->getPseudo(), $warningRegistrationMessage);
                    } else {
                        $warningRegistrationMessage = 'Les mots de passe sont différents.';
                    }
                } else {
                    $warningRegistrationMessage = 'Le mot de passe doit comporter au moins 5 caractères, 1 majuscule et 1 chiffre.';
                }
            } else {
                $warningRegistrationMessage = 'Le nom choisi doit comporter au moins 2 caractères et commencer par une lettre.';
            }
        }
        $view = new View();
        return $view->render('view/registrationView.php',   [   'title'=>$title, 
                                                                'warningRegistrationMessage'=>$warningRegistrationMessage
                                                            ]);
    }
//---------------------------------LA SECTION ADMINISTRATION/CHAPITRE--------------------------------------
    public function adminChaptersPage($warningMessage=null){
        $title = 'Administration des chapitres';
        $chapterManager = new ChapterManager;
        $allChapters = $chapterManager->getAllChapters();
        $idLastChapter = $chapterManager->getLastIdChapter();
        $idChapter = $_GET['chapterId'] ?? $idLastChapter;
        $seeChapter = $chapterManager->getChapter($idChapter);
        $view = new View();
        return $view->renderAdmin('view/adminChaptersView.php', [   'title'=>$title, 
                                                                    'allChapters'=>$allChapters,
                                                                    'warningMessage'=>$warningMessage,
                                                                    'seeChapter'=>$seeChapter
                                                                ]);
    }

    public function deleteChapterAction(){
        $idDelChapter = $_REQUEST['idDelChapter'];
        $chapterManager = new ChapterManager();
        $chapterManager->deleteChapter($idDelChapter);
        $warningMessage = 'Le chapitre a bien été supprimé.';
        return $this->adminChaptersPage($warningMessage);
    }

    public function modifyChapterAction(){
        $chapterManager = new ChapterManager();
        $chapterToModify = $chapterManager->getChapter($_REQUEST['idModifyChapter']);
        return $this->adminCreateChapterPage($warningMessage=null, $chapterToModify);
    }

    public function updateChapterAction(){
        $updateChapter = new Chapter($_REQUEST);
        $chapterManager = new ChapterManager();
        $chapterManager->updateChapter($updateChapter);
        $warningMessage = 'Vous avez bien modifié le chapitre : ' . $updateChapter->getChapterName();
        return $this->adminChaptersPage($warningMessage);
    }

//---------------------------------LA SECTION ADMINISTRATION/COMMENTAIRES--------------------------------------
    public function adminCommentsPage($warningMessage=null){
        $title = 'Administration des commentaires';
        $commentManager = new CommentManager();
        $allcomments = $commentManager->getAllComments();
        $chapterManager = new ChapterManager();
        $allChapters = $chapterManager->getAllChapterWithID();
        $view = new View();
        return $view->renderAdmin('view/adminCommentsView.php', [   'title'=>$title, 
                                                                    'allComments'=>$allcomments,
                                                                    'allChapters'=>$allChapters, 
                                                                    'warningMessage'=>$warningMessage
                                                                ]);
    }
    
    public function reportAction(){
        $chapterManager = new ChapterManager();
        $reportId = $_GET['reportId'];
        $chapterManager->changeReport($reportId);
        $warningMessage = ('Le commentaire a bien été signalé.');
        return $this->chapterPage($warningMessage);
    }

    public function deleteCommentAction(){
        $idDelComment = $_REQUEST['idDelComment'];
        $commentManager = new CommentManager();
        $commentManager->deleteComment($idDelComment);
        $warningMessage = 'Le commentaire a bien été supprimé.';
        return $this->adminCommentsPage($warningMessage);
    }

    public function modifyReportAction(){
        $idModifyReport = $_REQUEST['idModifyReport'];
        $commentManager = new CommentManager();
        $commentManager->modifyReport($idModifyReport);
        $warningMessage = 'Le signalement a bien été supprimé.';
        return $this->adminCommentsPage($warningMessage);
    }
//---------------------------------LA SECTION ADMINISTRATION/CRÉATION DE CHAPITRE--------------------------------------
    public function adminCreateChapterPage($warningMessage=null){
        $title = 'Création d\'un chapitre';
        $chapterManager = new ChapterManager();
        if(isset($_REQUEST['idModifyChapter'])){
            $chapterToModify = $chapterManager->getChapter($_REQUEST['idModifyChapter']);
        } else {
            $chapterToModify=null;
        }
        $view = new View();
        return $view->renderAdmin('view/adminCreateChapterView.php',    [   'title'=>$title,
                                                                            'chapterToModify'=>$chapterToModify,
                                                                            'warningMessage'=>$warningMessage,
                                                                        ]);
    }
    public function addChapterAction(){
       if(preg_match("#[0-9]#", $_POST['chapterNumber'])){
        $addChapter = new Chapter($_REQUEST);
        $chapterManager = new ChapterManager();
        $chapterManager->addChapter($addChapter);
        $warningMessage = 'Le chapitre a bien été ajouté.';
        return $this->adminChaptersPage($warningMessage);
       } else {
        return $this->adminCreateChapterPage('Le numéro du chapitre doit être un chiffre.');
       }
    }

//---------------------------------LA SECTION ADMINISTRATION/CRÉATION DE CHAPITRE--------------------------------------
    public function wrongPage(){
        $title ='Page inexistante';
        $view = new View();
        return $view->renderAdmin('view/errorView.php',    [   'title'=>$title,
                                                            ]);
    }
}