<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="public/css/style.css" rel="stylesheet" />
    </head>

    <body>
        <header>
            <a href="index.php?page=home"><img class='logoHeader' src="public/images/LogoJF.png" alt="Jean Forteroche"/></a>
            <nav class="nav-header">
                <ul>
                    <li><a href="index.php?page=home">Accueil</a></li>
                    <li><a href="index.php?page=book">Billet simple pourl'Alaska</a></li>
                    <li class="menuMemberOnClick"><a href="#">Espace membre<div class="triangle"></div></a>

                        <ul class="menuMember">
                            <li><a href="index.php?page=login">Connexion</a></li>
                            <li><a href="#">Deconnexion</a></li>
                            <li><a href="index.php?page=registration">Inscription</a></li>
                           
                        </ul>
                    </li>
                </ul>
            </nav>
        </header>

        <div id="content">
            <?= $content ?>
        </div>
       
        <footer>
            <div id="nav-footer">
                <nav class="plan">
                    <ul>
                        <h3>Plan du site</h3>
                        <li><a href="#"></a>Accueil</li>
                        <li><a href="#"></a>Billet simple pour l'Alaska</li>
                        <li><a href="#"></a>Connexion</li>
                    </ul>
                </nav>
                <nav class="social">
                    <ul>
                        <h3>Reseaux socios</h3>
                        <li><a href="#"></a>Facebook</li>
                        <li><a href="#"></a>Twiter</li>
                        <li><a href="#"></a>Instagramme</li>
                        <li><a href="#"></a>Pinterest</li>
                    </ul>
                </nav>
            </div>
            <h4 class="copyright">Ce site est un projet dans le cadre d'une formation chez Openclassroom. Tout ce qu'il contient, commentaire, contenus, 
                avis sont fictif. Jean Forteroche n'est pas réeellement un ecrivain, et si c'est le cas vous ne trouverez 
                aucune information le concernant sur ce site. </h4>
        </footer>

        <script src="public/JavaScript/blogJeanForteroche.js"></script>
    </body>
</html>
    