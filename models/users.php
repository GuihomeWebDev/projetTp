<?php

class users extends database {

    //Déclaration de mes attributs de class
    public $mail = '';
    public $login = '';
    public $password = '';
    public $id = 0;
    public $id_group = 0;

    /**
     * Déclaration de la méthode magique construct.
     * Le constructeur de la classe est appelé avec le mot clé new.
     */
    public function __construct() {
        parent::__construct();
        $this->connectDB();
    }

    /**
     * Fonction permettant l'ajout d'un utilisateur
     */
    public function addUser() {
        $isOk = FALSE;
        $insert = 'INSERT INTO `JLpeLJpmTp_users` (`login`,`password`,`mail`,`id_group`) VALUES(:login, :password, :mail, :id_group)';
        $queryPrepare = $this->pdo->prepare($insert);
        $queryPrepare->bindValue(':login', $this->login, PDO::PARAM_STR);
        $queryPrepare->bindValue(':password', $this->password, PDO::PARAM_STR);
        $queryPrepare->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $queryPrepare->bindValue(':id_group', $this->id_group, PDO::PARAM_INT);
        if ($queryPrepare->execute()) {
            $this->id = $this->pdo->lastInsertId();
            $isOk = TRUE;
        }
        return $isOk;
    }

    /**
     * Fonction permettant de récupérer le hash en fonction du password
     */
    public function getHashByUser() {
        $isOk = FALSE;
        $select = 'SELECT `password`,`id` FROM `JLpeLJpmTp_users` WHERE `login` = :login';
        $queryPrepare = $this->pdo->prepare($select);
        $queryPrepare->bindValue(':login', $this->login, PDO::PARAM_STR);
        //Si la requête s'éxecute sans erreur
        if ($queryPrepare->execute()) {
            //On récupère le hash
            $result = $queryPrepare->fetch(PDO::FETCH_OBJ);
            //Si resulte est un objet (donc si on a récupéré et stocké notre résultat dans result)
            if (is_object($result)) {
                //On donne à l'attribut de notre objet créé dans le controller la valeur de l'attribut password de notre objet resultat
                $this->password = $result->password;
                $this->id = $result->id;
                //On passe notre variable à true, pour dire qu'il n'y a pas d'erreur
                $isOk = true;
            }
        }
        //Si $isOk est à false, aucune condition n'est remplie, il y a une erreur, on pourra afficher un message
        //Si elle est à true, toutes les conditions sont remplies est on pourra éxécuter la suite
        return $isOk;
    }

    /**
     * Fonction permettant de compter le nombre de personnes ayant le login donné
     * Retourne le nombre de lignes trouvées
     * 0 -> aucun utilisateur avec ce nom n'existe, on peut créer le nouvel utilisateur
     * 1 -> un utilisateur avec ce nom existe, on ne crée pas le nouvel utilisateur
     * @return INT
     */
    public function checkUser() {
        $select = 'SELECT COUNT(*) AS `exists` FROM `JLpeLJpmTp_users` WHERE `login` = :login';
        $queryPrepare = $this->pdo->prepare($select);
        $queryPrepare->bindValue(':login', $this->login, PDO::PARAM_STR);
        $queryPrepare->execute();
        $result = $queryPrepare->fetch(PDO::FETCH_OBJ);
        return $result->exists;
    }

    public function deleteMember() {
        $delete = 'DELETE FROM `JLpeLJpmTp_users` WHERE `mail` = :mail AND `id` = :id';
        $queryPrepare = $this->pdo->prepare($delete);
        $queryPrepare->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $queryPrepare->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryPrepare->execute();
    }

    public function getUserById() {
        $isOk = false;
        $display = 'SELECT `password`,`id`,`mail`,`login` FROM `JLpeLJpmTp_users` WHERE `id` = :id';
        $queryPrepare = $this->pdo->prepare($display);
        $queryPrepare->bindValue(':id', $this->id, PDO::PARAM_INT);
        //hydratation de l'objet 
        if ($queryPrepare->execute()) {
            $result = $queryPrepare->fetch(PDO::FETCH_OBJ);
            $this->id = $result->id;
            $this->mail = $result->mail;
            $this->login = $result->login;
            $this->password = $result->password;
            $isOk = true;
        }
        return $isOk;
    }

    public function editProfil() {
        $update = 'UPDATE `JLpeLJpmTp_users` SET `login`= :login,`mail`= :mail,`password`= :password WHERE `id`= :id';
        $queryPrepare = $this->pdo->prepare($update);
        $queryPrepare->bindValue(':login', $this->login, PDO::PARAM_STR);
        $queryPrepare->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $queryPrepare->bindValue(':password', $this->password, PDO::PARAM_STR);
        $queryPrepare->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryPrepare->execute();
    }

}
