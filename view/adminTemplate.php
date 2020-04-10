<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="public/css/style.css" rel="stylesheet" />
        <script src="https://cdn.tiny.cloud/1/19tjp0ohg1szdhtq86o2vj8pthuvs5op98vi3x5o741921ay/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
       
    </head>

    <body>
        <header>
            <p>Bienvenue dans votre espace administrateur <?= $member->getPseudo()?></p>
            <nav class="navAdminHeader">
                <a href="index.php?page=adminComments">Administration des commentaires</a>
                <a href="index.php?page=adminChapters">Administration des chapitres</a>
                <a href="index.php?page=homePage">Quitter votre espace d'administration</a>
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

    </body>
</html>
    