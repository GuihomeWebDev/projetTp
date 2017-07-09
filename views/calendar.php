<?php
$monthsList = array('01' => 'janvier', '02' => 'février', '03' => 'mars', '04' => 'avril', '05' => 'mai', '06' => 'juin', '07' => 'juillet', '08' => 'août', '09' => 'septembre', '10' => 'octobre', '11' => 'novembre', '12' => 'décembre');
$year = 1900; // on initialise la var année par défaut on met la 1ere année
$month = 1;    // on initialise la var mois par défaut on met le 1er mois
// récuperation des données en POST
if (isset($_POST['years'])) {
    $year = $_POST['years'];
}
if (isset($_POST['months'])) {
    $month = $_POST['months'];
}
// on récupère le nbre de jrs ds le mois.
$NumberDaysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
// on récup le jr de la semaine du 1er jours du mois
$firstDayOfMonthInWeek = date('N', mktime(0, 0, 0, $month, 1, $year));
$start = 0;
if($firstDayOfMonthInWeek == 6){
    $start = 2;
}elseif ($firstDayOfMonthInWeek == 7) {
    $start = 3;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="/style.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/calendar.css" rel="stylesheet" type="text/css"/>
        <title>Calendrier</title>
    </head>
    <body>
        <form action="../views/calendar.php" method="POST">
            <!-- création de la liste déroulante pour les mois-->
            <select name="months">
                <?php
                // boucle pour parcourir le tabl des mois
                foreach ($monthsList as $monthNumber => $monthName) {
                    // création de la variable $selectMonth
                    $selectedMonth = '';
                    // je vérifie que l'année sélectionnée est = à l'année, pour que le mois selectionné reste affiché
                    if ($month == $monthNumber) {
                        $selectedMonth = 'selected';
                    }
                    ?>
                    <option  <?= $selectedMonth ?> value="<?= $monthNumber ?>"><?= $monthName ?></option>
                    <?php
                }
                ?>
            </select>
            <!--création de la liste déroulante pour les années-->
            <select name="years">
                <?php
                // boucle pour parcourir les années.
                for ($years = 2015; $years <= 2020; $years++) {
                    // création de la variable $selected
                    $selectedYear = '';
                    // je vérifie que l'année sélectionnée est = à l'année.
                    if ($year == $years) {
                        $selectedYear = 'selected';
                    }
                    ?>
                    <option  <?= $selectedYear ?> value="<?= $years ?>"><?= $years ?></option>
                    <?php
                }
                ?>
            </select>
            <input type="submit" value="Valider" />
        </form>
        <table>
            <thead>
                <tr>
                    <th>Vendredi</th>
                    <th>Samedi</th>
                    <th>Dimanche</th>
                </tr>
            </thead>
            <tbody>
                <tr>
               <?php
               $currentDay = 1;
               // on crée la boucle qui sert à créer une cellule par jrs.
                    for ($day = 1; $day <= $NumberDaysInMonth; $day++) {
                      $DayPosition = date('N', mktime(0, 0, 0, $month, $currentDay, $year));
                       // pour revenir a la ligne si multiple de 7.
                      if($day < $start){?><td></td>
                              <?php 
                      }elseif($DayPosition == 1){
                           ?></tr><tr><?php
                           $day += 4 -$DayPosition;
                           $currentDay += 5 -$DayPosition;
                       }elseif ($DayPosition != 5 && $DayPosition != 6 && $DayPosition != 7) {
                         $day += 4 -$DayPosition;
                         $currentDay += 5 -$DayPosition;
                       }
                       else{
                         ?>
                         <td><?= $currentDay;
                         $currentDay++;
                         ?></td>
                         <?php
                       }
                    }
                        ?>
                </tr>

            </tbody>
        </table>
    </body>
</html>
