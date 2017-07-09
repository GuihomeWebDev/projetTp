<?php

//Inclusion du model et du controller
include_once 'class/database.php';
include_once 'models/users.php';
include_once 'controllers/addUserCtrl.php';
?>

<?php
//En cas d'erreur, on affiche un message
if ($userError)
{
    ?>
    <p>Erreur</p>
    <?php
}
?>
<form action="?page=addUser" method="POST">
    <label for="login">Nom d'utilisateur :</label>
    <input type="text" name="login" id="login"/>
    <label for="mail">Mail :</label>
    <input type="mail" name="mail" id="mail"/>
    <label for="password">Mot de passe :</label>
    <input type="password" name="password" id="password"/>
    <label for="confirmPassword">Confirmer le mot de passe :</label>
    <input type="password" name="confirmPassword" id="confirmPassword"/>
    <input type="submit" name="save" value="Enregistrer"/>
</form>
</body>
</html>