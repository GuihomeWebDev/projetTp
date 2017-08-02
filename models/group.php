<?php
class group extends database {
//déclaration des attributs de la class reprenant les champs de la table events
    public $id = 0;
    public $name = '';
    public $id_groupType = 0;
    /**
     * declaration de la methode magique contruct qui permet d instancier l objet events et egalement de se connecter à la base de donnée.
     */
    public function __construct() {
        parent::__construct();
        $this->connectDB();
    }
    public function addGroup() {
        //requete SQL qui permet d'ajouter une ligne dans la table nommé avec un préfix  JLpeLJpmTp_events 
        $insert = 'INSERT INTO `JLpeLJpmTp_group` (`name`, `id_groupType`) VALUES (:name,:id_groupType)';
        //préparation de la requete sql 
        $queryPrepare = $this->pdo->prepare($insert);
        //liaison de la valeur entrée par  l'utilisiteur est stoké dans le marqueur nominatif et envoyé dans le champs de la table
        $queryPrepare->bindValue(':name', $this->name, PDO::PARAM_STR);
        $queryPrepare->bindValue(':id_groupType', $this->id_groupType, PDO::PARAM_INT);
        //la methode retourne un boolean qui verifie si la requete a été executé ou pas.
        return $queryPrepare->execute();
    }
    public function lastInsertId(){
        return $this->pdo->lastInsertId();
    }    
    }
