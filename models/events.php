<?php

//déclaration de la class events qui hérite de la classe database
class events extends database {

//déclaration des attributs de la class reprenant les champs de la table events
    public $id = 0;
    public $name = '';
    public $startDate = '01-01-2017';
    public $startTime = '';
    public $endDate = '01-01-2017';
    public $description = '';
    public $location = '';
    public $contribution = 0;
    public $idUsers = 0;
    public $groupName = '';

    /**
     * declaration de la methode magique contruct qui permet d instancier l objet events et egalement de se connecter à la base de donnée.
     */
    public function __construct() {
        parent::__construct();
        $this->connectDB();
    }

    /**
     * déclaration de la méthode removeEvents qui permet de supprimer une ligne dans la table
     * 
     */
    public function removeEvents() {
        $delete = 'DELETE FROM `JLpeLJpmTp_events` WHERE `id` = :id AND `idUsers` = :idUsers';                 
        $queryPrepare = $this->pdo->prepare($delete);
        $queryPrepare->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryPrepare->bindValue(':idUsers', $this->idUsers, PDO::PARAM_INT);
        return $queryPrepare->execute();
         
    }

    /**
     * déclaration de la methode addEvents qui permet de créer un evenement dans la table events
     * 
     */
    public function addEvents() {
        //requete SQL qui permet d'ajouter une ligne dans la table nommé avec un préfix  JLpeLJpmTp_events 
        $insert = 'INSERT INTO `JLpeLJpmTp_events` (`name`,`startDate`, `startTime`,`endDate`,`description`,`location`,`contribution`,`idUsers`) VALUES (:name,STR_TO_DATE(:startDate,\'%d-%m-%Y\'),:startTime,STR_TO_DATE(:endDate,\'%d-%m-%Y\'),:description,:location,:contribution, :idUsers)';
        //préparation de la requete sql         
            $queryPrepare = $this->pdo->prepare($insert);
            //liaison de la valeur entrée par  l'utilisiteur est stoké dans le marqueur nominatif et envoyé dans le champs de la table
            $queryPrepare->bindValue(':name', $this->name, PDO::PARAM_STR);
            $queryPrepare->bindValue(':startDate', $this->endDate, PDO::PARAM_STR);
            $queryPrepare->bindValue(':startTime', $this->startTime, PDO::PARAM_STR);
            $queryPrepare->bindValue(':endDate', $this->endDate, PDO::PARAM_STR);
            $queryPrepare->bindValue(':description', $this->description, PDO::PARAM_STR);
            $queryPrepare->bindValue(':location', $this->location, PDO::PARAM_STR);
            $queryPrepare->bindValue(':contribution', $this->contribution, PDO::PARAM_STR);
            $queryPrepare->bindValue(':idUsers', $this->idUsers, PDO::PARAM_INT);
            //la methode retourne un boolean qui verifie si la requete a été executé ou pas.
            return $queryPrepare->execute();        
    }

    /**
     * déclaration de la méthode editEvents qui permet de modifier les lignes ajouter dans la table
     * 
     */
    public function editEvents() {
        $update = 'UPDATE `JLpeLJpmTp_events` SET `name`=:name,`startDate`=STR_TO_DATE(:startDate,\'%d-%m-%Y\'),`startTime`=:startTime,`endDate`=STR_TO_DATE(:endDate,\'%d-%m-%Y\'),`description`=:description,`location`=:location,`contribution`=:contribution WHERE `id`=:id AND `idUsers` = :idUsers';
               
        $queryPrepare = $this->pdo->prepare($update);
        $queryPrepare->bindValue(':name', $this->name, PDO::PARAM_STR);
        $queryPrepare->bindValue(':startDate', $this->startDate, PDO::PARAM_STR);
        $queryPrepare->bindValue(':startTime', $this->startTime, PDO::PARAM_STR);
        $queryPrepare->bindValue(':endDate', $this->endDate, PDO::PARAM_STR);
        $queryPrepare->bindValue(':description', $this->description, PDO::PARAM_STR);
        $queryPrepare->bindValue(':location', $this->location, PDO::PARAM_STR);
        $queryPrepare->bindValue(':contribution', $this->contribution, PDO::PARAM_INT);
        $queryPrepare->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryPrepare->bindValue(':idUsers', $this->idUsers, PDO::PARAM_INT);
        return $queryPrepare->execute();       
        
    }

    /**
     * déclaration de la méthode getEvents qui permet d'afficher les évènements
     * 
     */
    public function getEvents() {
        $add = 'SELECT `id`,`name`,`startDate`,`startTime`,`endDate`,`description`,`location`,`contribution`,`idUsers` FROM  `JLpeLJpmTp_events`';
        $query = $this->pdo->query($add);
        return $query != FALSE ? $query->fetchALL(PDO::FETCH_OBJ) : FALSE;
    }

    /**
     * déclaration de la méthode getEventsByDate permet d'afficher grace à une jointure tous les champs 
     * nécessaire au remplissage de la modal dans le calendrier 
     * 
     */
    public function getEventsByDate() {
        $display = 'SELECT `evt`.`name` AS `eventName`, DATE_FORMAT(`evt`.`startDate`, \'%d-%m-%Y\') AS `startDate`, `evt`.`startTime`, DATE_FORMAT(`evt`.`endDate`, \'%d-%m-%Y\') AS `endDate`, `evt`.`description`, `evt`.`location`, `evt`.`contribution`, `evt`.`idUsers`,`usr`.`login`, `grp`.`name` AS `groupName`, `grpT`.`name` AS `groupTypeName` FROM `JLpeLJpmTp_events` AS `evt` INNER JOIN `JLpeLJpmTp_users` AS `usr` ON `usr`.`id` = `evt`.`idUsers` INNER JOIN `JLpeLJpmTp_group` AS `grp` ON `grp`.`id` = `usr`.`id_group` INNER JOIN `JLpeLJpmTp_groupType` AS `grpT` ON `grpT`.`id` = `grp`.`id_groupType` WHERE `evt`.`startDate` = :startDate';
        $queryPrepare = $this->pdo->prepare($display);
        $queryPrepare->bindValue(':startDate', $this->startDate, PDO::PARAM_STR);
        $queryPrepare->execute();
        return $queryPrepare != FALSE ? $queryPrepare->fetchALL(PDO::FETCH_OBJ) : FALSE;
    }

    /**
     * déclaration de la méthode getEventsByUserId permet d'afficher la liste d'evenements par id de l'utilisateur
     * 
     */
    public function getEventsByUserId() {
        $display = 'SELECT `id`,`name`,`startDate`,`startTime`,`endDate`,`description`,`location`,`contribution`,`idUsers` FROM  `JLpeLJpmTp_events` WHERE `idUsers` = :idUsers';
        $queryPrepare = $this->pdo->prepare($display);
        $queryPrepare->bindValue(':idUsers', $this->idUsers, PDO::PARAM_INT);
        $queryPrepare->execute();
        return $queryPrepare != FALSE ? $queryPrepare->fetchALL(PDO::FETCH_OBJ) : FALSE;
    }

    /**
     * déclaration de la méthode getEventsById permet d'afficher la liste d'evenements par id 
     * 
     */
    public function getEventsById() {
        $display = 'SELECT `id`,`name`,DATE_FORMAT(`startDate`, \'%d-%m-%Y\') AS startDate, `startTime`,DATE_FORMAT(`endDate`, \'%d-%m-%Y\') AS endDate,`description`,`location`,`contribution`,`idUsers` FROM  `JLpeLJpmTp_events` WHERE `id` = :id';
        $queryPrepare = $this->pdo->prepare($display);
        $queryPrepare->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryPrepare->execute();
        return $queryPrepare != FALSE ? $queryPrepare->fetch(PDO::FETCH_OBJ) : FALSE;
    }

    }
