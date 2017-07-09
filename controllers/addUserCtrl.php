<?php

//Déclaration de la variable $userError
$userError = false;

//Instanciation de l'objet user
$user = new users();

//On vérifie si l'on a bien appuyé sur le bouton Enregistrer
if (isset($_POST['save']))
{
    //Si la variable POST n'est pas vide
    if (!empty($_POST['login']))
    {
        //On stocke sa valeur dans l'attribut login de l'objet user en sécurisant (strip_tags)
        $user->login = strip_tags($_POST['login']);
        //On vérifie avec la méthode checkUser que le login n'existe pas
        //S'il existe, on passe $userError à true (nous permet d'afficher notre message d'erreur dans la vue)
        if ($user->checkUser())
        {
            $userError = true;
        }
    }
    else
    {
        //Si $_POST est vide, on passe $userError à true (nous permet d'afficher notre message d'erreur dans la vue)
        $userError = true;
    }
    if (!empty($_POST['mail']))
    {
        //On stocke sa valeur dans l'attribut mail de l'objet user en sécurisant (strip_tags)
        $user->mail = strip_tags($_POST['mail']);
        $email = filter_var($user->mail, FILTER_VALIDATE_EMAIL);
        if (!$email)
        {
            $userError = true;
        }
        else
        {
            //On vérifie avec la méthode checkUser que le mail n'existe pas
            //S'il existe, on passe $userError à true (nous permet d'afficher notre message d'erreur dans la vue)
            if ($user->checkUser())
            {
                $userError = true;
            }
        }
    }
    else
    {
        //Si $_POST est vide, on passe $userError à true (nous permet d'afficher notre message d'erreur dans la vue)
        $userError = true;
    }

    //On vérifie si les $_POST password et confirmPassword sont bien rempli et qu'ils sont bien identiques
    if (!empty($_POST['password']) && !empty($_POST['confirmPassword']) && $_POST['password'] == $_POST['confirmPassword'])
    {
        //Si tout va bien, on stocke dans l'attribut password de l'objet user, la version chiffrée du mot de passe
        //On chiffre le mot de passe avec la fonction password_hash qui prend en paramètre le mot de passe envoyée et la méthode de chiffrement (cf PHP.net)
        $user->password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    }
    else
    {
        //Si un des $_POST est vide ou que les mots de passes ne sont pas identiques, on passe $userError à true (nous permet d'afficher notre message d'erreur dans la vue)
        $userError = true;
    }
    //S'il n'y a pas d'erreur, on ajoute l'utilisateur
    if (!$userError)
    {
        if ($user->addUser())
        {
            $_SESSION["isConnected"] =  $user->login;
          
            header("Location: http://projetTP/?page=memberArea");
            exit;
        }
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link href="../assets/css/addUsers.css" rel="stylesheet" type="text/css"/>
        <title>title</title>
    </head>
    <body>

    </body>
</html>
