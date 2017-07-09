
<?php
/**
 * fonction qui formate la date au format jours/mois/année et qui la restitue au format année-mois-jours et qui verifie que c'est bien une date
 * en cas d'erreur elle revoie false
 * @param string $testDate
 * @return mixed
 */
function isValidateDate($testDate)
{
    $d = DateTime::createFromFormat('d/m/Y', $testDate);
    return ($d && $d->format('d/m/Y') == $testDate) ? date_format(date_create_from_format('d/m/Y', $testDate), 'Y-m-d') : false;
}

//instanciation de l objet event
$event = new events();
//verifis que l utilisateur à appuyé sur le bouton supprimer et que les données attendues soient bien numérique
if (isset($_GET['deleteId']) && isset($_GET['userId']) && is_numeric($_GET['deleteId']) && is_numeric($_GET['userId']))
{
    //recupere dans les proprietés id et idUser les informations passées en GET
    $event->idUser = $_GET['userId'];
    $event->id = $_GET['deleteId'];
    if (!$event->removeEvents())
    {
        $errorMessage = 'La suppression a échouée';
    }
}
$eventsList = $event->getEvents();
if (!empty($_POST['startDate'])){
    $startDate = isValidateDate($_POST['startDate']);
    if(!$startDate){
        $errorList['startDate']='mauvais format date';
    }    else
    {
        $event->startDate = $startDate;
    }
}
        if (!empty($_POST['endDate'])){
            
        }
