<h2>Connexion à votre espace membre</h2>
<p class='warningMessage'>
    <?php
    if(!empty($warningConnexionMessage)){
        echo $warningConnexionMessage;
    }
    ?>
</p>
        

<form action="index.php?page=connexion" method="post">
    <div class='form'>

            <div class='field'>
                <label for="connectPseudo">Pseudo : </label>
                <input type="text" id="connectPseudo" name="connectPseudo" value="<?=$pseudo?>">
            </div>
        
            <div class='field'>
                <label for="connectPassword">Mot de passe : </label>
                <input type="password" id="connectPassword" name="connectPassword">
            </div>

            <div class='formSubmit'>
                <input type="submit" value="Connexion">
            </div>

    </div>
</form>

