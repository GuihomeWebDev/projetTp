<?php
//déclaration de la class events qui hérite de la classe database
class events extends database {
//déclaration des attributs de la class reprenant les champs de la table events
    public $id = 0;
    public $startDate = '01/01/2000';
    public $endDate = '01/01/2000';
    public $description = '';
    public $location = '';
    public $contribution = 0;
    public $idUser = 0;
/**
 * declaration de la methode magique contruct qui permet d instancier l objet events et egalement de se connecter à la base de donnée.
 */
    public function __construct()
    {
        parent::__construct();
        $this->connectDB();
    }
/**
 * déclaration de la methode addEvents qui permet de créer un evenement dans la table events
 * 
 */
    public function addEvents()
    {
        //requete SQL qui permet d'ajouter une ligne dans la table nommé avec un préfix  JLpeLJpmTp_events 
        $insert = 'INSERT INTO `JLpeLJpmTp_events` (`startDate`,`endDate`,`description`,`location`,`contribution`,`idUser`) VALUES (:startDate,:endDate,:description,:location,:contribution,:idUser)';
        //préparation de la requete sql 
        $queryPrepare = $this->pdo->prepare($insert);
        //liaison de la valeur entrée par  l'utilisiteur est stoké dans le marqueur nominatif et envoyé dans le champs de la table
        $queryPrepare->bindValue(':startDate', $this->endDate, PDO::PARAM_STR);
        $queryPrepare->bindValue(':endDate', $this->endDate, PDO::PARAM_STR);
        $queryPrepare->bindValue(':description', $this->description, PDO::PARAM_STR);
        $queryPrepare->bindValue(':location', $this->location, PDO::PARAM_STR);
        $queryPrepare->bindValue(':contribution', $this->contribution, PDO::PARAM_INT);
        $queryPrepare->bindValue(':idUser', $this->idUser, PDO::PARAM_INT);
        //la methode retourne un boolean qui verifi si la requete a été executé ou pas.
        return $queryPrepare->execute();
    }
/**
 * déclaration de la méthode editEvents qui permet de modifier les lignes ajouter dans la table
 * 
 */
    public function editEvents()
    {
        $insert = 'UPDATE `JLpeLJpmTp_events` SET `startDate`=:startDate,`endDate`=:endDate,`description`=:description,`location`=:location,`contribution`=:contribution,`idUser`=:idUser WHERE `id`=:id AND `idUser` = :idUser';
        $queryPrepare = $this->pdo->prepare($insert);
        $queryPrepare->bindValue(':startDate', $this->endDate, PDO::PARAM_STR);
        $queryPrepare->bindValue(':endDate', $this->endDate, PDO::PARAM_STR);
        $queryPrepare->bindValue(':description', $this->description, PDO::PARAM_STR);
        $queryPrepare->bindValue(':location', $this->location, PDO::PARAM_STR);
        $queryPrepare->bindValue(':contribution', $this->contribution, PDO::PARAM_INT);
        $queryPrepare->bindValue(':idUser', $this->idUser, PDO::PARAM_INT);
        return $queryPrepare->execute();
    }
/**
 * déclaration de la méthode removeEvents qui permet de supprimer une ligne dans la table
 * 
 */
    public function removeEvents()
    {
        $insert = 'DELETE FROM `JLpeLJpmTp_events` WHERE `id` = :id AND `idUser` = :idUser';
        $queryPrepare = $this->pdo->prepare($insert);
        $queryPrepare->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryPrepare->bindValue(':idUser', $this->idUser, PDO::PARAM_INT);
        return $queryPrepare->execute();
    }
/**
 * déclaration de la méthode getEvents qui permet d'afficher les lignes de la table
 * 
 */
    public function getEvents()
    {
        $insert = 'SELECT `id`,`startDate`,`endDate`,`description`,`location`,`contribution`,`idUser` FROM  `JLpeLJpmTp_events`';
        $query = $this->pdo->query($insert);
        return $query->fetchALL(PDO::FETCH_OBJ);
    }

}
