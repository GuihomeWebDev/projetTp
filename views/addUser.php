<?php
//Inclusion du model et du controller
include_once 'class/database.php';
include_once 'models/users.php';
include_once 'models/groupType.php';
include_once 'models/group.php';
include_once 'controllers/addUserCtrl.php';
?>
        <h1>Création de compte</h1>
        <form action="inscription.html" method="POST">
            <label for="login">Nom d'utilisateur :</label>
            <input type="text" name="login" id="login" required/>
            <label for="mail">Mail :</label>
            <input type="mail" name="mail" id="mail" required/>
            <label for="password">Mot de passe :</label>
            <input type="password" name="password" id="password" required/>
            <label for="confirmPassword">Confirmer le mot de passe :</label>
            <input type="password" name="confirmPassword" id="confirmPassword" required/>
            <label for="groupType">selectionner votre type de groupe:</label>
            <select name="groupType"  id="groupType" required>               
                <?php foreach ($select as $groupType) { ?>
                    <option value="<?= $groupType->id ?>"><?= $groupType->name ?></option>
                    <?php }
                ?>
            </select>
            <label for="groupName">indiquer le nom de votre groupe :</label>
            <input type="text" name="groupName" id="groupName" value="<?=$group->name?>" required/>
            <input class="btn btn-success" type="submit" name="save" id="input" value="Valider inscription"/>
        </form>
        <?php
//En cas d'erreur, on affiche un message
if ($userError) {
    ?>
    <p>Erreur</p>
    <?php
}
?>
    