<?php
include_once 'controllers/memberAreaCtrl.php';

?>
<link href="../assets/css/memberArea.css" rel="stylesheet" type="text/css"/>
<div class="container text-center formDelete">
    <div class="row">
        <div class="col-md-12">
            <h1>Bienvenu <?= $_SESSION["isConnected"] ?></h1>
        </div>
    </div>
</div>
<div class="container text-center formDelete">
    <div class="row">
        <div class="col-md-12">
            <form action="/?page=memberArea" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <label class="control-label spaceInput" for="delete">Entrez votre mail pour supprimer votre compte :</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="mail" id="delete"/>
                    </div>
                    <div class="col-md-1">
                        <input type="submit" id="btnDelete" name="deleteMember" value="supprimer"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container text-center eventsForm">
    <div class="row">
        <div class="col-md-12">
            <form action="/?page=memberArea" method="POST">
                <div class="row">
                    <h2>Créez votre propre évenement sur le calendrier</h2>
                    <div class="col-md-5">
                        <label class="control-label spaceInput" for="start" >Indiquez la date du début de l événément :</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="mail" id="start" placeholder="JJ/MM/AAAA"/>
                    </div>
                    <div class="col-md-5">
                        <label class="control-label spaceInput" for="end" >Indiquez la date de fin de l événément :</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="mail" id="end" placeholder="JJ/MM/AAAA"/>
                    </div>
                    <div class="col-md-5">
                        <label class="control-label spaceInput" for="describe" >Description de l'évenement :</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="mail" id="describe" placeholder="Décrivez en quelque mot la nature de l'évenement"/>
                    </div>
                    <div class="col-md-5">
                        <label class="control-label spaceInput" for="locate" >Indiquez la localité de l événément :</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="mail" id="locate" placeholder="Adresse ou se déroule l'évenement"/>
                    </div>
                    <div class="col-md-5">
                        <label class="control-label spaceInput" for="contrib" >Indiquez le montant de la contributiont :</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="mail" id="contrib" placeholder="Entrée payante si oui combien? "/>
                    </div>
                    <div class="col-md-2">
                        <input type="submit" id="btnregister" name="create" value="Enregistrer"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
