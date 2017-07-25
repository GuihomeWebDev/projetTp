<?php
//Inclusion du model et du controller
include_once 'class/database.php';
include_once 'models/users.php';
include_once 'models/groupType.php';
include_once 'models/group.php';
include_once 'controllers/addUserCtrl.php';
?>

<?php
//En cas d'erreur, on affiche un message
if ($userError) {
    ?>
    <p>Erreur</p>
    <?php
}
?>
<html>
    <head>
        <title>title</title>
        <link href="../assets/css/addUsers.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>    
        <form action="?page=addUser" method="POST">
            <label for="login">Nom d'utilisateur :</label>
            <input type="text" name="login" id="login"/>
            <label for="mail">Mail :</label>
            <input type="mail" name="mail" id="mail"/>
            <label for="password">Mot de passe :</label>
            <input type="password" name="password" id="password"/>
            <label for="confirmPassword">Confirmer le mot de passe :</label>
            <input type="password" name="confirmPassword" id="confirmPassword"/>
            <label for="groupType">selectionner votre type de groupe:</label>
            <select name="groupType"  id="groupType">               
                <?php foreach ($select as $groupType) { ?>
                    <option value="<?= $groupType->id ?>"><?= $groupType->name ?></option>
                    <?php }
                ?>
            </select>
            <label for="groupName">indiquer le nom de votre groupe :</label>
            <input type="text" name="groupName" id="groupName" value="<?=$group->name?>"/>
            <input type="submit" name="save" id="input"value="Enregistrer"/>
        </form>
    </body>
</html>
