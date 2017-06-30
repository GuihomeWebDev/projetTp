<?php
//On inclut tous les fichiers nécessaires et dans le bon ordre.
include_once 'configuration.php';
include_once 'class/database.php';
include_once 'model/eventsListCtrl.php';
?>
<h1>Vos événements</h1>
<table class="table-striped table">
    <thead>
        <tr>
            <th>Date de  début</th>
            <th> Date de fin </th>
            <th> Déscription de l'évenement</th>
            <th>Localisation de l'évenement</th>
            <th>Participation</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($eventsList as $events)
        {
            ?>
            <tr>
                <td><?= $events->startDate ?></td>
                <td><?= $events->endDate ?></td>
                <td><?= $events->description ?></td>
                <td><?= $events->location ?></td>
                <td><?= $events->contribution ?></td>
                <td><div class="btn-group">
                        <a class="btn btn-danger" href="?deleteId=<?= $events->id ?>&userId=<?= $events->idUser ?>" title="delete">Effacer</a>                  
                        <a class="btn btn-warning" href="?modifyId=<?= $events->id ?>&userId=<?= $events->idUser ?>s" title="modify">Modifier</a>
                    </div>
                </td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>
</body>
</html>

