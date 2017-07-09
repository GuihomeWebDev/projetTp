<?php
//intanciation de user
$user = new users();
//recuperation de id user 
$user->id = $_SESSION['userId'];
//si le boutton suppression et cliqué par l'utilisateur
if (isset($_POST['deleteMember']))
{//on verifi que le champ mail n'est pas vide
    if (!empty($_POST['mail']))
    {//on vérifie que le format mail est valide 
        $user->mail = filter_input(INPUT_POST, 'mail', FILTER_VALIDATE_EMAIL);
        //on execute la fonction deleteMember
        $user->deleteMember();
        //une fois le compte supprimé on déconnecte l' utilisateur
        unset($_SESSION);
        session_destroy();
        header("Location: http://projetTP/");
    }
}
