<?php
//instanciation de l objet event
$event = new events();
//verifis que l utilisateur à appuyé sur le bouton supprimer et que les données attendues soient bien numérique
if (isset($_GET['deleteId']) && isset($_GET['userId'])  && is_numeric($_GET['deleteId']) &&  is_numeric($_GET['userId']))
{
    //recupere dans les proprietés id et idUser les informations passées en GET
    $event->idUser = $_GET['userId'];
    $event->id = $_GET['deleteId'];
    if(!$event->removeEvents()){
        $errorMessage = 'La suppression a échouée';
    }
}
$eventsList = $event->getEvents();
