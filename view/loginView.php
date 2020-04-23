
<h2 class="loginTitle">Connexion à votre espace membre</h2>
    <form class='connexionForm' action="index.php?page=connexionPage" method="post">
        <div class='writeField'>
            <p class="connexionFormField"><label for="connectPseudo">Pseudo : </label></p>
            <input type="text" id="connectPseudo" name="connectPseudo" value="<?=$pseudo?>">
        </div>

        <div class='writeField'>
            <p class="connexionFormField"><label for="connectPassword">Mot de passe : </label></p>
            <input type="password" id="connectPassword" name="connectPassword">
        </div>

        <div class='submitField'>
            <input class="submitButton" type="submit" value="Connexion">
        </div>
    </form>

<p class='warningMessage'>
    <?php
    if(!empty($warningConnexionMessage)){
        echo $warningConnexionMessage;
    }
    ?>
</p>