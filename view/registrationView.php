<h2>Créer votre espace membre.</h2>
    <p class="explain">Pour créer votre espace membre vous devez choisir un pseudonyme qui contient au moins 2 caractères. 
    Votre mot de passe doit comporter 5 caractères minimum, une majuscule et un chiffre.</p>
    <form class="connexionForm" method="post">
        <div class='writeField'>
            <p class="connexionFormField" ><label for="chooseUsername">Entrez un pseudo : </label></p>
            <input type="text" id="chooseUsername" name="chooseUsername" >
        </div>
        <div class='writeField'>
            <p class="connexionFormField"><label for="choosePassword">Choisissez un mot de passe : </label></p>
            <input type="password" id="choosePassword" name="choosePassword">
        </div>
        <div class='writeField'>
            <p class="connexionFormField"><label for="confirmPassword">Confirmez votre mot de passe : </label></p>
            <input type="password" id="confirmPassword" name="confirmPassword">
        </div>       
        <div class='submitField'>
            <input class="submitButton" type="submit" value="Envoyer">
        </div>  
    </form>

<p class='warningMessage'>
    <?php
    if(!empty($warningRegistrationMessage)){
        echo $warningRegistrationMessage;
    }
    ?>
</p>




