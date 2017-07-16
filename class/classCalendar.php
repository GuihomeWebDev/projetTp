<?php

class Date {

    var $days = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
    var $months = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];

    function getEvents($year) {
        global $DB;
        $req = $DB->query('SELECT `id`,`name`,`startDate`,`startTime`,`endDate`,`description`,`location`,`contribution`,`idUser` FROM `JLpeLJpmTp_events` WHERE YEAR(startDate)' . $year);
        $r = array();
        /**
         * Ce que je veux $r[TIMESTAMP][id] = title
         */
//        while ($d = $req->fetch(PDO::FETCH_OBJ)) {
//            $r[strtotime($d->startDate)][$d->id] = $d->name;
//        }
        return $r;
    }

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

}
