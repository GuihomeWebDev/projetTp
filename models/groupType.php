<?php
class groupType extends database {
//déclaration des attributs de la class reprenant les champs de la table events
    public $id = 0;
    public $name = '';
    /**
     * declaration de la methode magique contruct qui permet d instancier l objet events et egalement de se connecter à la base de donnée.
     */
    public function __construct() {
        parent::__construct();
        $this->connectDB();
        }
        /**
         * Affiche les différents types de groupes dans un select
         * 
         */
        public function getGroupType(){
        $add = 'SELECT `id`,`name` FROM  `JLpeLJpmTp_groupType`';
        $query = $this->pdo->query($add);
        return $query != false ? $query->fetchALL(PDO::FETCH_OBJ) : false;
    }
}