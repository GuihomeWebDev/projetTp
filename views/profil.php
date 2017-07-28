<?php
include_once 'configuration.php';
include_once 'controllers/profilCtrl.php';
include_once 'models/users.php';
?>
<h1>Espace personnel</h1>
<div class="container text-center formDelete">
    <div class="row">
        <div class="col-md-12">
            <h2>Bienvenue <?= $_SESSION["isConnected"] ?></h2>
        </div>
    </div>
</div>
<div class="container">
    <form action="profile.html" method="POST" class="login row">
        <div class="row">
            <div class="col-md-5">
                <label for="InputEmail1">Modifier votre email</label>
                <input type="email" class="form-control" id="mail" name="mail" value="<?= $user->mail ?>">
            </div>
        </div> 
        <div class="row">
            <div class="col-md-5">
                <label for="oldPassword">Mot de passe actuel</label>
                <input type="password" class="form-control" id="oldPassword" name="oldPassword" placeholder="Mot de passe">
            </div>            
        </div>
        <div class="row">
            <div class="col-md-5">
                <label for="newPassword">Nouveau mot de passe</label>
                <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Mot de passe">
            </div>            
        </div>
        <div class="row">
            <div class="col-md-5">
                <label for="confirmPassword">Confirmer votre mot de passe</label>
                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Mot de passe">
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <label for="InputLogin">Modifier votre login</label>
                <input type="text" class="form-control" id="Login" name="login" value="<?= $user->login ?>">
            </div>
        </div>  
        <div class="form-group">
            <div class="col-md-5">
                <span id="helpBlock" class="help-block text-warning">Saisisser votre mot de passe actuel pour valider les modifications</span>
                <input type="submit" class="btn btn-warning"id="modifyProfil" name="modifyProfil" value="Enregistrer les modifications"/>                
            </div>
        </div>
    </form>
</div>
<div class="container">
    <div class="row">
        <form action="profile.html" method="POST" class="delete">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="label del " for="delete">Pour supprimer votre compte :</label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <input type="text" name="mail" placeholder="Entrez votre email" id="delete" aria-describedby="helpBlock"/>
                </div>
                <div class="col-md-3">
                    <input type="submit" id="btnDelete" class="btn btn-danger" name="deleteMember" value="Supprimer votre compte"/>
                    <span id="helpBlock" class="help-block text-danger">ATTENTION action irréversible!!</span>
                </div>
            </div>
        </form>
    </div>
</div>
