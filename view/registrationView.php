


<h2>Créer votre espace membre.</h2>
<p>Pour créer votre espace membre vous devez choisir un pseudonyme qui contient au moins 2 caractères. Votre mot de passe doit comporter 5 caractères minimum, une majuscule et un chiffre.</p>
<form action="" method="post">
    <div class='form'>
        <div class='field'>
            <label for="chooseUsername">Entrez un pseudo : </label>
            <input type="text" id="chooseUsername" name="chooseUsername" >
        </div>
        <div class='field'>
            <label for="choosePassword">Choisissez un mot de passe : </label>
            <input type="password" id="choosePassword" name="choosePassword">
        </div>
        <div class='field'>
            <label for="confirmPassword">confirmez votre mot de passe : </label>
            <input type="password" id="confirmPassword" name="confirmPassword">
        </div>       
        <div class='formSubmit'>
            <input type="submit" value="Soumettre">
        </div>  
    </div>
</form>

<p class='warningMessage'>
    <?php
    if(!empty($message)){
        echo $message;
    }
    ?>
</p>




