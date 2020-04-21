<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, user-scalable=no">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= $title ?></title>
        <link href="public/css/style.css" rel="stylesheet" />
        <script src="https://cdn.tiny.cloud/1/19tjp0ohg1szdhtq86o2vj8pthuvs5op98vi3x5o741921ay/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <link rel="shortcut icon" type="image/png" href="public/images/favicon.png"/>
       
    </head>

    <body>
        <header>
            <a class="welcomeSentence" href="index.php?page=homePage">Bienvenue dans votre espace administrateur <?= $member->getPseudo()?></a>
            <nav class="navAdminHeader">
                <a href="index.php?page=adminChaptersPage">Administration des chapitres</a>
                <a href="index.php?page=adminCommentsPage">Administration des commentaires</a>
                <a href="index.php?page=adminCreateChapterPage">Création des chapitres</a>
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
                        <li><a href="index.php?page=homePage">Accueil</a></li>
                        <li><a href="index.php?page=bookPage">Billet simple pour l'Alaska</a></li>
                        <li><a href="index.php?page=loginPage">Connexion</a></li>
                    </ul>
                </nav>
                <nav class="social">
                    <ul>
                        <h3>Réseaux sociaux</h3>
                        <li><a href="https://www.facebook.com/">Facebook</a></li>
                        <li><a href="https://twitter.com/">Twitter</a></li>
                        <li><a href="https://www.instagram.com/?hl=fr">Instagram</a></li>
                        <li><a href="https://www.pinterest.fr/">Pinterest</a></li>
                    </ul>
                </nav>
            </div>
            <h4 class="copyright">Ce site est un projet dans le cadre d'une formation chez Openclassroom. Tout ce qu'il contient, commentaires, contenus et
                avis sont fictifs. Jean Forteroche n'est pas réellement un écrivain, et si c'est le cas vous ne trouverez 
                aucune information le concernant sur ce site. </h4>
        </footer>

        <script src="public/JavaScript/SpaceAdmin.js"></script>
        <script src="public/JavaScript/mainAdmin.js"></script>
    </body>
</html>
    