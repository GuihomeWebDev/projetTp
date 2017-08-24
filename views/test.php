<?php 
//Instanciation de l'objet user
$user = new users();
$errors = array();
$group = new groupType();
$groupName = new group();
$select = $group->getGroupType();
$emailHelper = '';
$passwordHelper = '';
$confirmPwdHelper = '';
/*
 * Pour enregistrer un nouvel utilisateur, on nettoie les champs puis
 * on les stocks dans l'objet users.
 * Si tout est correcte, on vérifie que le pseudonyme ainsi que l'email
 * n'existent pas. Si c'est bien le cas, alors on ajoute l'utilisateur
 * dans la base et on lui crée ses dossier personnel
 */
if (isset($_POST['save'])) {
    if (!empty($_POST['groupName'])) {
        $groupName->id_groupType = $_POST['groupType'];
        $groupName->name = strip_tags($_POST['groupName']);
        $groupName->addGroup();
        $user->id_group = $groupName->lastInsertId();
    }
    if (!empty($_POST['login'])) {
        $user->login = strip_tags($_POST['login']);
        $loginHelper = 'has-success';
    } else {
        $errors['login'] = 'Ce nom  existe déjà ';
        $loginHelper = 'has-error';
    }
    if (!empty($_POST['mail'])) {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        if ($mail != FALSE) {
            $user->email = $mail;
            $mailHelper = 'has-success';
        } else {
            $user->mail = strip_tags($_POST['mail']);
            $errors['mail'] = 'Ce mail  existe déjà ';
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
            
            $errors['confirmPwd'] = 'Mot de passe non valide';
            $passwordHelper = 'has-error';
        }
    } else {
        $errors['password'] = 'Veuillez remplir ce champ';
        $passwordHelper = 'has-error';
    }   
   if (!$userError) {
        if ($user->addUser()) {
            $_SESSION["isConnected"] = $user->login;
            $_SESSION['idUser'] = $user->id;
            header("Location: http://projetTP/espaceMembre.html");
            exit;
        }
    }
}

