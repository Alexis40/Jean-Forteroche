<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, user-scalable=no">
        <title><?= $title ?></title>
        <link href="public/css/style.css" rel="stylesheet" />
        <link rel="shortcut icon" type="image/png" href="public/images/favicon.png"/>
    </head>

    <body>
        <header>
            <a href="index.php?page=homePage"><img class='logoHeader' src="public/images/LogoJF.png" alt="Jean Forteroche"/></a>
            <nav class="nav-header">
                <ul>
                    <li><a href="index.php?page=homePage">Accueil</a></li>
                    <li><a href="index.php?page=bookPage">Billet simple pourl'Alaska</a></li>
<!-- CES CONDITIONS PERMETTENT D'ASSURER LA GESTION DES DIFFÉRENTS AFFICHAGES DE LA SECTION MEMBRE EN FONCTION DU TYPE DE MENBRE CONNECTÉ-->
                    <?php if((!empty($member)) && ($member->getType()=='membre')):  ?>
                        <li class="logout"><a href="#">Bonjour <?= $member->getPseudo()?></a>
                            <ul class="menuMember">
                                <li><a href="index.php?page=deconnexionPage">Deconnexion</a></li>
                            </ul>
                        </li>
                    <?php elseif((!empty($member)) && ($member->getType()=='admin')): ?>
                        <li class="logout"><a href="#">Bonjour <?= $member->getPseudo()?></a>
                            <ul class="menuMember">
                                <li><a href="index.php?page=deconnexionPage">Deconnexion</a></li>
                                <li><a href="index.php?page=adminChaptersPage">Administration</a></li>
                            </ul>
                        </li>
                    <?php else : ?>
                        <li class="menuMemberOnClick"><a href="#">Espace membre</a>
                            <ul class="menuMember">
                                <li><a href="index.php?page=loginPage">Connexion</a></li>
                                <li><a href="index.php?page=registrationPage">Inscription</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>

                    <li><div class="triangle"></div></li>
                </ul>
            </nav>
        </header>

        <div id="content">
            <?= $content ?>
        </div>
       
        <footer>
            <div id="nav-footer">
                <nav class="plan">
                <p class="titleFooter">Plan du site</p>
                    <ul>
                        <li><a href="index.php?page=homePage">Accueil</a></li>
                        <li><a href="index.php?page=bookPage">Billet simple pour l'Alaska</a></li>
                        <li><a href="index.php?page=loginPage">Connexion</a></li>
                    </ul>
                </nav>
                <nav class="social">
                <p class="titleFooter">Réseaux sociaux</p>    
                    <ul>
                        <li><a href="https://www.facebook.com/">Facebook</a></li>
                        <li><a href="https://twitter.com/">Twitter</a></li>
                        <li><a href="https://www.instagram.com/?hl=fr">Instagrame</a></li>
                        <li><a href="https://www.pinterest.fr/">Pinterest</a></li>
                    </ul>
                </nav>
            </div>
            <h4 class="copyright">Ce site est un projet dans le cadre d'une formation chez Openclassroom. Tout ce qu'il contient, 
            commentaires, contenus et
                avis sont fictifs. Jean Forteroche n'est pas réellement un écrivain, et si c'est le cas vous ne trouverez 
                aucune information le concernant sur ce site. </h4>
        </footer>

        
        <script src="public/JavaScript/Slider.js"></script>
        <script src="public/JavaScript/SpaceMember.js"></script>
        <script src="public/JavaScript/main.js"></script>
    </body>
</html>
    