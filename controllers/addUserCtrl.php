<?php

if (isset($_POST['selectedGroup'])) {
    include_once '../configuration.php';
    include_once '../class/database.php';
    include_once '../models/group.php';
    $group = new group();
    $group->id_groupType = $_POST['selectedGroup'];
    echo json_encode(array('response' => $group->getGroupList()));
    //utilisation sans ajax dans le else
} else {
//Instanciation de l'objet user
    $user = new users();
    $errors = array();
    $group = new groupType();
    $groupName = new group();
    $select = $group->getGroupType();
    $emailHelper = '';
    $passwordHelper = '';
    $confirmPwdHelper = '';
    $userExist = 0;
    $message = '';
    /*
     * Pour enregistrer un nouvel utilisateur, on nettoie les champs puis
     * on les stocks dans l'objet user.
     * Si tout est correcte, on vérifie que le pseudonyme ainsi que l'email
     * n'existent pas. Si c'est bien le cas, alors on ajoute l'utilisateur 
     */
    if (isset($_POST['save'])) {
        if (!empty($_POST['groupType'])) {
            $groupName->id_groupType = strip_tags($_POST['groupType']);
            if (isset($_POST['groupName'])) {
                if ($_POST['groupName'] != 0) {
                    $user->id_group = strip_tags($_POST['groupName']);
                } else {
                    $idGroup = $groupName->checkifexist();
                    if ($idGroup == 0) {
                        if (!empty($_POST['createGroup'])) {
                            $createGroup = strip_tags($_POST['createGroup']);
                            $groupName->name = $createGroup;
                            $groupName->addGroup();
                            $user->id_group = $groupName->lastInsertId();
                        } else {
                            $errors['createGroup'] = 'Un nom de groupe doit être renseigné';
                        }
                    } else {
                        $user->id_group = $idGroup;
                    }
                }
            }
        }
        if (!empty($_POST['login'])) {
            $user->login = strip_tags($_POST['login']);
            $loginHelper = 'has-success';
        } else {
            $errors['login'] = 'Ce nom  existe déjà ';
            $loginHelper = 'has-error';
        }
        if (!empty($_POST['mail'])) {
            $mail = filter_input(INPUT_POST, 'mail', FILTER_VALIDATE_EMAIL);
            if ($mail != FALSE) {
                $user->mail = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL);
                $mailHelper = 'has-success';
            } else {
                $user->mail = strip_tags($_POST['mail']);
                $errors['mail'] = ' Format Email non valide ';
                $mailHelper = 'has-error';
            }
        } else {
            $errors['mail'] = 'mauvais format mail';
            $mailHelper = 'has-error';
        }
        if (!empty($_POST['password'])) {
            if (strlen($_POST['password']) >= 6) {
                $passwordHelper = 'has-success';
                if (!empty($_POST['confirmPwd'])) {
                    if (strcmp($_POST['password'], $_POST['confirmPwd']) === 0) {
                        $user->password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                        $confirmPwdHelper = 'has-success';
                    } else {
                        $errors['confirmPwd'] = 'Le mot de passe doit être identique';
                        $confirmPwdHelper = 'has-error';
                    }
                } else {
                    $errors['confirmPwd'] = 'Veuillez remplir ce champ';
                    $confirmPwdHelper = 'has-error';
                }
            } else {

                $errors['confirmPwd'] = 'Mot de passe trop court';
                $passwordHelper = 'has-error';
            }
        } else {
            $errors['password'] = 'Mot de passe non valide';
            $passwordHelper = 'has-error';
        }
        if (count($errors) == 0) {
            $userExist = $user->checkUser();
            if ($userExist == 3) {
                $message = 'Le compte existe déjà';
            } elseif ($userExist == 2) {
                $message = 'L\'email existe déjà';
            } elseif ($userExist == 1) {
                $message = 'Le login existe déjà';
            } else {
                if ($user->addUser()) {
                    $_SESSION["isConnected"] = $user->login;
                    $_SESSION['idUser'] = $user->id;
                    header("Location: http://projetTP/espaceMembre.html");
                    exit;
                }
            }
        }
    } else {
        $groupName->id_groupType = 1;
        $groupList = $groupName->getGroupList();
    }
}