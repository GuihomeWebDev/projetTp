<?php
//Inclusion du model et du controller
include_once 'configuration.php';
include_once 'class/database.php';
include_once 'models/users.php';
include_once 'controllers/userCtrl.php';
?>
<link href="../assets/css/user.css" rel="stylesheet" type="text/css"/>
<h1>Espace connection</h1>
<form action="connexion.html" method="POST">
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
        <input class="btn btn-success"type="submit" name="connection" value="Connexion"/>
    </p>
</form>
<script src="../assets/js/ajax.js" type="text/javascript"></script>
</body>
</html>