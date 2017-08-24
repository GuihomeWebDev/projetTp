<?php
//Inclusion du model et du controller
include_once 'class/database.php';
include_once 'models/users.php';
include_once 'models/groupType.php';
include_once 'models/group.php';
include_once 'controllers/addUserCtrl.php';
?>
        <h1>Création de compte</h1>
        <h2 class="<?= $userExist == 0 ? 'bg-success text-success' : 'bg-danger text-danger' ?>"><?= $message ?></h2>
        <form action="inscription.html" method="POST" class="form-horizontal">
            <div class="form-group">
                <label for="login" class="col-sm-2 control-label">Nom d'utilisateur :</label> 
                <div class="col-sm-8">
                <input type="text" name="login" id="login" value="<?php if (isset($_POST['login'])){echo $_POST['login'];} ?>" required/>
                <span id="login" class="help-block"><?= isset($errors['login']) ? $errors['login'] : '' ?></span>
                </div>
            </div>
            <div class="form-group">
                <label for="mail" class="col-sm-2 control-label">Mail :</label>
                <div class="col-sm-8">
                    <input type="mail" name="mail" id="mail" value="<?php if (isset($_POST['mail'])){echo $_POST['mail'];} ?>" required/>
                    <span id="email" class="help-block"><?= isset($errors['mail']) ? $errors['mail'] : '' ?></span>    
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Mot de passe :</label>
                <div class="col-sm-8">
                    <input type="password" name="password" id="password" value="<?php if (isset($_POST['password'])){echo $_POST['password'];} ?>" placeholder="6 caractères minimum" required/>
                    <span id="Password" class="help-block bg-danger"><?= isset($errors['password']) ? $errors['password'] : '' ?></span>
                </div>
            </div>
            <div class="form-group">
                <label for="confirmPassword" class="col-sm-2 control-label">Confirmer mot de passe :</label>
                <div class="col-sm-3">
                    <input type="password" name="confirmPwd" id="confirmPwd" required/>
                    <span class="confirmPwd" class="help-block bg-danger"><?= isset($errors['confirmPwd']) ? $errors['confirmPwd'] : '' ?></span>
                </div>
            </div>
            <div class="form-group">            
                <label for="groupType" class="col-sm-2 control-label">selectionner votre type de groupe:</label>
                <div class="col-sm-8">
                    <select name="groupType" id="groupType" required>               
                        <?php foreach ($select as $groupType) { ?>
                            <option value="<?= $groupType->id ?>"><?= $groupType->name ?></option>
                        <?php }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">   
                <label for="groupName" class="col-sm-2 control-label">indiquer le nom de votre groupe :</label>
                <div class="col-sm-8">                    
                    <select name="groupName" id="groupName" required> 
                    <?php foreach ($groupList as $group) { ?>
                            <option value="<?= $group->id ?>"><?= $group->name ?></option>
                        <?php }
                        ?>
                            <option value="0">Nouveau</option>
                    </select>
                </div>
             </div>
            <div class="form-group" id="inputCreateGroup">
                <label for="createGroup" class="col-sm-2 control-label">Créer le nom de votre group :</label>
                <div class="col-sm-3">
                    <input type="text" name="createGroup" id="createGroup" />
                    <span class="createGroup" class="help-block bg-danger"><?= isset($errors['createGroup']) ? $errors['createGroup'] : '' ?></span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-8">
                 <input class="btn btn-success" type="submit" name="save" id="input" value="Valider inscription"/>
                </div>
             </div>
        </form>