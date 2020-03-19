


<h2>Créer votre espace membre.</h2>
<p>Pour créer votre espace membre vous devez choisir un pseudonyme qui contient au moins 2 caractères. Votre mot de passe doit comporter 5 caractères minimum, une majuscule et un chiffre.</p>
<form action="" method="post">
    <table>
        <tr>
            <td class="tdAlign"><label for="chooseUsername">Entrez un pseudo : </label></td>
            <td><input type="text" id="chooseUsername" name="chooseUsername" ></td>
        </tr>
        <tr>
            <td class="tdAlign"><label for="choosePassword">Choisissez un mot de passe : </label></td>
            <td><input type="password" id="choosePassword" name="choosePassword"></td>
        </tr>
        <tr>
            <td class="tdAlign"><label for="confirmPassword">confirmez votre mot de passe : </label></td>
            <td><input type="password" id="confirmPassword" name="confirmPassword"></td> 
        </tr>
    </table>
    </br>
    <input type="submit" value="Soumettre">
</form>

<?php
 if(!empty($message)){
     echo $message;
 }
?>



