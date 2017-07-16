<?php
include_once 'configuration.php';
include_once 'controllers/memberAreaCtrl.php';
include_once 'models/events.php';
?>
<link href="../assets/css/memberArea.css" rel="stylesheet" type="text/css"/>
<div class="container text-center formDelete">
    <div class="row">
        <div class="col-md-12">
            <h1>Bienvenue <?= $_SESSION["isConnected"] ?></h1>
        </div>
    </div>
</div>
<form action="/?page=memberArea" method="POST">
    <div class="row">
        <div class="col-md-5">
            <label class="label del" for="delete">Entrez votre mail pour supprimer votre compte :</label>
        </div>
        <div class="col-md-4">
            <input type="text" name="mail" id="delete"/>
        </div>
        <div class="col-md-3">
            <input type="submit" id="btnDelete" name="deleteMember" value="supprimer"/>
        </div>
    </div>
</form>
<div class="container tabEvent">
    <div class="row">
        <div class="tab">
            <button class="tablinks" onclick="eventManager(event, 'create')">Créer un évènement</button>
            <button class="tablinks" onclick="eventManager(event, 'update')">Modifier un évènement</button>
            <button class="tablinks" onclick="eventManager(event, 'erase')">Supprimer un évènement</button>
        </div>

        <div id="create" class="tabcontent">
            <h2>Créer un évènement </h2>
            <div class="row">
                <form action="/?page=memberArea" method="POST">
                    <div class="col-md-5">
                        <label class="label" for="name" > Intitulé :</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="name" id="name" placeholder="Nom de l'évènement"value="<?= $event->name ?>">
                    </div>
                    <div class="col-md-5">
                        <label class="label" for="startDate" > Date de début :</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" id="startDate"type="text" value="<?= $event->startDate ?>">
                    </div>
                    <div class="col-md-5">
                        <label class="label" for="startTime"> Heure de début :</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="startTime" id="startTime" data-mask="99:99:00" value="<?= $event->startTime ?>">
                    </div>
                    <div class="col-md-5">
                        <label class="label" for="endDate" >date de fin :</label>
                    </div>
                    <div class="col-md-5">      
                        <input type="text" id="endDate"type="text" value="<?= $event->endDate ?>">
                    </div>
                    <div class="col-md-5">
                        <label class="label" for="description" >Description:</label>
                    </div>
                    <div class="col-md-5">
                        <textarea type="text" name="description" id="description" placeholder="Déscription des féstivités" value="<?= $event->description ?>"></textarea>
                    </div>
                    <div class="col-md-5">
                        <label class="label" for="location" >Ville ou se situe l'évènement:</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="location" id="location" placeholder="Adresse" value="<?= $event->location ?>">
                    </div>
                    <div class="col-md-5">
                        <label class="label" for="contribution" >coût de l'entrée :</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="contribution" id="contribution" placeholder="coût de l'entrée" value="<?= $event->contribution ?>">
                    </div>
                    <div class="col-md-5">
                        <input type="submit" id="btnRegister" name="create" value="Enregistrer"/>
                    </div>
                </form>
            </div>
        </div>
        <div id="update" class="tabcontent">
            <h2>Modifier un évènement</h2>
            <div class="row">
                <div class="col-md-12">
                    <?php
                    if ($hasEvents) {
                        ?>
                        <form action="/?page=memberArea" method="POST">
                            <div class="col-md-5">
                                <label class="label" for="name" > Intitulé :</label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" name="name" id="name" placeholder="Nom de l'évènement"value="<?= $event->name ?>">
                            </div>
                            <div class="col-md-5">
                                <label class="label" for="startDate" > Date de début :</label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" id="startDateModify"type="text" value="<?= $event->startDate ?>">
                            </div>
                            <div class="col-md-5">
                                <label class="label" for="startTime"> Heure de début :</label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" name="startTime" id="startTime" data-mask="99:99:00" value="<?= $event->startTime ?>">
                            </div>
                            <div class="col-md-5">
                                <label class="label" for="endDate" >date de fin :</label>
                            </div>
                            <div class="col-md-5">      
                                <input type="text" id="endDateModify"type="text" value="<?= $event->endDate ?>">
                            </div>
                            <div class="col-md-5">
                                <label class="label" for="description" >Description:</label>
                            </div>
                            <div class="col-md-5">
                                <textarea type="text" name="description" id="description" placeholder="Déscription des féstivités" value="<?= $event->description ?>"></textarea>
                            </div>
                            <div class="col-md-5">
                                <label class="label" for="location" >Ville ou se situe l'évènement:</label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" name="location" id="location" placeholder="Adresse" value="<?= $event->location ?>">
                            </div>
                            <div class="col-md-5">
                                <label class="label" for="contribution" >coût de l'entrée :</label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" name="contribution" id="contribution" placeholder="coût de l'entrée" value="<?= $event->contribution ?>">
                            </div>
                            <div class="col-md-5">
                                <input type="submit" id="update" name="update" value="Modifier"/>
                            </div>
                        </form>
                    <?php } else {
                        ?>
                        <p>Vous n'avez créé aucun évènement</p>
                    <?php } ?>
                </div>
            </div>
        </div>

        <div id="erase" class="tabcontent">
            <h2>Supprimer un évènement</h2>
            <div class="row">
                <div class="col-md-12">
                    <?php
                    if ($hasEvents) {
                        ?>
                        <select>
                            <option>COUCOU</option>
                        </select>
                    <?php } else {
                        ?>
                        <p>Vous n'avez créé aucun évènement</p>
                    <?php } ?>
                </div>
            </div>
        </div> 
    </div>
</div>
<link href="../assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="../assets/js/jquery.ui.datepicker-fr.js" type="text/javascript"></script>
<script src="../assets/js/tabs.js" type="text/javascript"></script>  
<script>
                $(function () {
                    $("#endDate, #startDate, #endDateModify, #startDateModify").datepicker($.datepicker.regional[ "fr" ]);
                    $("#locale").on("change", function () {
                        $("#endDate, #startDate, #endDateModify, #startDateModify").datepicker("option",
                                $.datepicker.regional[ $(this).val() ]);
                    });
                });
</script>