<?php 
//si utilisation de l ajax...
if(isset($_POST['timestamp'])){
    //on inclut la config de connextion et le model
    include_once '../configuration.php';
    include_once '../class/database.php';
    include_once '../models/events.php';
    //on instancie l'objet
    $date = new events();
    // on tranforme le timestamp en date
    $date->startDate = date('Y-m-d', $_POST['timestamp']);
    //on stock dans events l'execution de la methode getEventsByDate();
    $events = $date->getEventsByDate();
    //on affiche le json plcé dans un tableau
    echo json_encode(array('events'=>$events,'groupName' => 'name'));    
} else {   
    //execution sans ajax...
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