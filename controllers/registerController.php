<?php

//Instanciation de la classe departments
$departments = new departments();
//appel de la méthode getDepartmentsList pour pouvoir construire la liste déroulante
$departmentsList = $departments->getDepartmentsList();

//Instanciation de la classe user
$users = new users();

//Si on appui sur le bouton modifier dans la page index
if (isset($_GET['modifyId'])) {
    //on passe à l'attribut la valeur de l'id de l'utilisateur à modifier
    $users->id = $_GET['modifyId'];
    //on récupère les infos de l'utilisateur
    $users->getUserById();
}

$regexName = '/^[a-z]([a-zàéèëêù\'ïîâäöôç\- ])+$/i';
$regexDate = '/((0[1-9])|([1-2][0-9])|(3[0-1]))\/((0[1-9])|(1[0-2]))\/((19[0-9]{2})|(20(([0-4][0-9])|(50))))/';
$regexPhone = '/^0[1-79](\.\d{2}){4}$/i';
$regexPostalCode = '/^(([1-9][0-9])|(2[a-b])|(0[1-9]))\d{3}$/i';
//déclaration d'un tableau d'erreur
$errorList = array();
$message = '';
if (isset($_POST['register'])) {
    if (!empty($_POST['lastName'])) {
        $users->lastName = strip_tags($_POST['lastName']);
        if (!preg_match($regexName, $users->lastName)) {
            $errorList['lastName'] = REGISTER_ERROR_LASTNAME;
        }
    } else {
        $errorList['lastName'] = REGISTER_EMPTY_VALUE;
    }
    if (!empty($_POST['firstName'])) {
        $users->firstName = strip_tags($_POST['firstName']);
        if (!preg_match($regexName, $users->firstName)) {
            $errorList['firstName'] = REGISTER_ERROR_FIRSTNAME;
        }
    } else {
        $errorList['firstName'] = REGISTER_EMPTY_VALUE;
    }
    if (!empty($_POST['birthDate'])) {
        $users->birthDate = strip_tags($_POST['birthDate']);
        if (!preg_match($regexDate, $users->birthDate)) {
            $errorList['birthDate'] = REGISTER_ERROR_BIRTHDATE;
        }
    } else {
        $errorList['birthDate'] = REGISTER_EMPTY_VALUE;
    }
    if (!empty($_POST['address'])) {
        $users->address = strip_tags($_POST['address']);
    } else {
        $errorList['address'] = REGISTER_EMPTY_VALUE;
    }
    if (!empty($_POST['postalCode'])) {
        $users->postalCode = strip_tags($_POST['postalCode']);
        if (!preg_match($regexPostalCode, $users->postalCode)) {
            $errorList['postalCode'] = REGISTER_ERROR_POSTALCODE;
        }
    } else {
        $errorList['postalCode'] = REGISTER_EMPTY_VALUE;
    }
    if (!empty($_POST['phoneNumber'])) {
        $users->phoneNumber = strip_tags($_POST['phoneNumber']);
        if (!preg_match($regexPhone, $users->phoneNumber)) {
            $errorList['phoneNumber'] = REGISTER_ERROR_PHONENUMBER;
        }
    } else {
        $errorList['phoneNumber'] = REGISTER_EMPTY_VALUE;
    }
    if (!empty($_POST['serviceName'])) {
        $users->id_tppdo1_departments = strip_tags($_POST['serviceName']);
        if (!is_numeric($users->id_tppdo1_departments)) {
            $errorList['serviceName'] = REGISTER_ERROR_SERVICENAME;
        }
    } else {
        $errorList['serviceName'] = REGISTER_EMPTY_VALUE;
    }
    if (!empty($_POST['id'])) {
        $users->id = strip_tags($_POST['id']);
    }
//On compte le nombre de lignes pour savoir si il y a eu une erreur dans la saisie
    if (count($errorList) == 0) {
//Dans le cas où on enregistre un nouvel utilisateur l'id sera = à 0
        if ($_POST['id'] == 0) {
//Si PDO renvoie une erreur on le signale à l'utilisateur
            if (!$users->addUser()) {
                $message = REGISTER_ERROR_SEND;
            } else {
                $message = REGISTER_SUCCESS_SEND;
            }
        } else if (!is_numeric($_POST['id'])) {
            $message = REGISTER_ERROR;
        } else {
            if ($users->modifyUser()) {
                $message = REGISTER_SUCCESS_MODIFY;
            } else {
                $message = REGISTER_ERROR_MODIFY;
            }
        }
    }
}