<?php
//Inclusion du model et du controller
include_once 'class/database.php';
include_once 'models/users.php';
include_once 'controllers/userCtrl.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
        <script src="../assets/library/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="assets/js/script.js" type="text/javascript"></script>
        <title>Index</title>
    </head>
    <body>
        <?php
        //Affichage du message de bienvenue si la connexion est réussie
        if ($isOk)
        {
            ?>
            <p>Bienvenue <?php echo $user->login ?></p>
            <?php
        }
        ?>
        <form action="index.php" method="POST">
            <p>
                <label for="login">Nom d'utilisateur :</label>
                <input type="text" name="login" id="login"/>
                <span id="success">C'est ok</span>
                <span id="error">C'est pas ok</span>
            </p>
            <p>
                <label for="password">Mot de passe :</label>
                <input type="password" name="password" id="password"/>
            </p>
            <p>
                <input type="submit" name="connection" value="Connexion"/>
            </p>
        </form>
    </body>
</html>