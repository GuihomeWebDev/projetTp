<?php

//intanciation de user
$user = new users();
//recuperation de id user 
$user->id = $_SESSION['idUser'];


//si le boutton suppression et cliqué par l'utilisateur
if (isset($_POST['deleteMember'])) {//on verifi que le champ mail n'est pas vide
    if (!empty($_POST['mail'])) {//on vérifie que le format mail est valide 
        if (filter_input(INPUT_POST, 'mail', FILTER_VALIDATE_EMAIL)) {
            $user->mail = $_POST['mail'];
            //on execute la fonction deleteMember
            if ($user->deleteMember()) {
                //une fois le compte supprimé on déconnecte l' utilisateur
                unset($_SESSION);
                session_destroy();
                header("Location: http://projetTP/");
            }
        }
    }
}
$user->getUserById();

if (isset($_POST['modifyProfil'])) {
    if (!empty($_POST['oldPassword'])) {
        if (password_verify($_POST['oldPassword'], $user->password)) {
            if (!empty($_POST['newPassword'])) {
                if (!empty($_POST['confirmPassword'])) {
                    if (strcmp($_POST['newPassword'], $_POST['confirmPassword']) === 0) {
                        $user->password = password_hash($_POST['newPassword'], PASSWORD_BCRYPT);
                        if ($user->editProfil()) {
                            $message = 'Mofification du mot de passe est validée';
                        } else {
                            $message = 'modification du mot de passe à échouée';
                        }
                    }
                }
            }
        }
    }
}

if (isset($_POST['modifyProfil'])) {
    if (!empty($_POST['mail'])) {
        $user->mail = strip_tags($_POST['mail']);
    }
    if (!empty($_POST['login'])) {
        $user->login = strip_tags($_POST['login']);
    }
    if ($user->editProfil()) {
        $_SESSION['isConnected'] = $user->login;
    }
}