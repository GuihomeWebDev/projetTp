<?php
if(isset($_POST['timestamp'])){
    include_once '../configuration.php';
    include_once '../class/database.php';
    include_once '../models/events.php';
    $date = new events();
    $date->startDate = date('Y-m-d', $_POST['timestamp']);
    $events = $date->getEventsByDate();
    echo json_encode(array('events'=>$events));
} else {   
function getAll($year) {
    $r = array();
    $date = new DateTime($year . '-01-01');
    while ($date->format('Y') <= $year) {
        // Ce que je veux => $r[ANEEE][MOIS][JOUR] = JOUR DE LA SEMAINE
        $y = $date->format('Y');
        $m = $date->format('n');
        $d = $date->format('j');
        $w = str_replace('0', '7', $date->format('w'));
        $r[$y][$m][$d] = $w;
        $date->add(new DateInterval('P1D'));
    }
    return $r;
}

$daysWeek = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
$months = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];

$date = new events();
$year = date('Y');
$events = $date->getEvents();
$dates = getAll($year);

}