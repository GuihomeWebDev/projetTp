<?php

//Si on lance l'appel AJAX
if (isset($_POST['verifLogin'])) {
    //on inclut le modèle car on n'appelle pas la page index.php
    include_once '../models/users.php';
    //On instancie la classe user
    $user = new users();
    //on pass à l'attribut login ce que l'AJAX à mis en POST
    $user->login = $_POST['verifLogin'];
    //on stock le résultat. Soit 0 ou 1
    $result = $user->checkUser();
    //Avec le echo on passe à data dans l'appel AJAX le JSON
    echo json_encode(array('response' => $result));
} else { //On est dans un cas sans AJAX
//Déclaration des variables
    $isOk = 0;

//Instanciation de l'objet user
    $user = new users();

//On vérifie que l'on a bien appuyé sur le bouton connexion
    if (isset($_POST['connection'])) {
        //On stocke la valeur de $_POST['login'] dans l'attribut login de l'objet user en sécurisant (strip_tags)
        $user->login = strip_tags($_POST['login']);
        //On stocke la valeur de $_POST['mail'] dans l'attribut mail de l'objet user en sécurisant (strip_tags)
        $user->mail = strip_tags($_POST['mail']);
        //On utilise notre méthode getHashByUser pour récupérer le hash stocké dans notre base
        $user->getHashByUser();
        //On vérifie que le mot de passe saisi et le mot de passe présent dans la base sont les même grâce ) password_verify
        $isOk = password_verify($_POST['password'], $user->password);
    }
}
?>