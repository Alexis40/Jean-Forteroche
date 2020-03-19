

<div class='connexionForm'>
    <h2>Connexion à votre espace membre</h2>
        <?php
            if(!empty($login)){
                echo 'Votre login/mot de passe n\'est pas correct';
            }
        ?>
    <form action="index.php?page=connexion" method="post">
        <table>
            <tr>
                <td class="tdAlign"><label for="alias">Pseudo : </label></td>
                <td><input type="text" id="alias" name="alias" value="<?=$login?>"></td>
            </tr>
            <tr>
                <td class="tdAlign"><label for="password">Mot de passe : </label></td>
                <td><input type="text" id="password" name="password"></td>
            </tr>
        </table>
        <input type="submit">
    </form>
</div>
