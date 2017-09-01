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
    /**
     * Ajoute le nom d'un group dans la table et le lie avec l'id group pour qu'il corresponde à une catégorie de group
     * dans la table group_type
     */
    public function addGroup() {
        //requete SQL qui permet d'ajouter une ligne dans la table nommé avec un préfix  JLpeLJpmTp_group 
        $insert = 'INSERT INTO `JLpeLJpmTp_group` (`name`, `id_groupType`) VALUES (UPPER(:name),:id_groupType)';
        //préparation de la requete sql 
        $queryPrepare = $this->pdo->prepare($insert);
        //liaison de la valeur entrée par  l'utilisiteur est stoké dans le marqueur nominatif et envoyé dans le champs de la table
        $queryPrepare->bindValue(':name', $this->name, PDO::PARAM_STR);
        $queryPrepare->bindValue(':id_groupType', $this->id_groupType, PDO::PARAM_INT);
        //la methode retourne un boolean qui verifie si la requete a été executé ou pas.
        return $queryPrepare->execute();
    }
    /**
     * Permet de récupérer l' id utilisateur
     * 
     */
    public function lastInsertId() {
        return $this->pdo->lastInsertId();
    }
    /**
     * Affiche la liste des groupes dans un select
     * 
     */
    public function getGroupList() {
        
        $query = 'SELECT `name`, `id` FROM `JLpeLJpmTp_group` WHERE `id_groupType`=:id_groupType';
        $queryPrepare = $this->pdo->prepare($query);
        $queryPrepare->bindValue(':id_groupType', $this->id_groupType, PDO::PARAM_INT);
        $queryPrepare->execute();
        return $queryPrepare != FALSE ? $queryPrepare->fetchALL(PDO::FETCH_OBJ) : FALSE;
    }
    /**
     * Vérifi si un group crée existe deja 
     * 
     */
    public function checkifexist() {
        $idExist = 0;
        $check = 'SELECT `id` FROM `JLpeLJpmTp_group` WHERE `name`= UPPER(:name) AND `id_groupType`=:id_groupType';
        $queryPrepare = $this->pdo->prepare($check);
        $queryPrepare->bindValue(':name', $this->name, PDO::PARAM_INT);
        $queryPrepare->bindValue(':id_groupType', $this->id_groupType, PDO::PARAM_INT);
        $queryPrepare->execute();
        if ($queryPrepare != FALSE) {
            $result = $queryPrepare->fetch(PDO::FETCH_OBJ);
            $idExist = $result != false ? $result->id : 0;
        }
        return $idExist;
    }
    
}
