<?php
include_once 'configuration.php';
include_once 'controllers/profilCtrl.php';
include_once 'models/users.php';
?>
<link href="../assets/css/profil.css" rel="stylesheet" type="text/css"/>
<div class="container text-center formDelete">
    <div class="row">
        <div class="col-md-12">
            <h1>Bienvenue <?= $_SESSION["isConnected"] ?></h1>
        </div>
    </div>
</div>
<form action="/?page=profil" method="POST">
    <div class="row">
        <div class="col-md-5">
            <label class="label del" for="delete">Entrez votre mail pour supprimer votre compte :</label>
        </div>
        <div class="col-md-4">
            <input type="text" name="mail" id="delete"/>
        </div>
        <div class="col-md-3">
            <input type="submit" id="btnDelete" class="btn btn-danger" name="deleteMember" value="Supprimer votre compte"/>
        </div>
        <div class="col-md-3">
            <label class="danger" for="deleteMember">Attention cette action est irreversible</label>
        </div>
    </div>
</form>
<div class="container">
    <form class="login">
        <div class="row">
            <div class="col-md-offset-3 col-md-5">
                <label for="exampleInputEmail1">Modifier</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez votre adresse email">
            </div>
        </div>
        <div class="row">
            <div class="col-md-offset-3 col-md-5">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe">
            </div>
        </div>
        <div class="col-md-offset-3 col-md-5">
            <label for="exampleSelect1">Example select</label>
            <select class="form-control" id="exampleSelect1">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        </div>
    </form>
</div>