<?php
session_start();
include_once 'configuration.php';
include_once 'class/database.php';
include_once 'models/users.php';
include_once 'models/events.php';
include_once 'controllers/indexCtrl.php';
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Bikers events</title>
        <link href="/assets/library/bootstrap/css/bootstrap.css" rel="stylesheet"/>              
        <link href="assets/library/jasny-bootstrap/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css"/>        
        <link href="assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>        
        <link href="/assets/css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Accueil</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <?php
                        if (isset($_SESSION['isConnected'])) {
                            ?>
                            <li><a href="?page=calendar">Calendrier évenements</a></li>
                            <li><a  href="?page=gallery">Galerie</a></li>
                            <li><a  href="/?page=memberArea">Espace membre</a></li>
                            <li><a  href="/?action=logOut">Déconnexion</a></li>
                            <?php
                        } else {
                            ?>
                            <li><a href="?page=calendar">calendrier évenements</a></li>
                            <li><a  href="?page=gallery">galerie</a></li>
                            <li><a  href="?page=addUser">inscription</a></li>
                            <li><a  href="?page=user">connexion</a></li>
                        </ul>
                    <?php } ?>
                </div>
            </div>
        </nav>
        <div class="container-fluid" id="content">
            <?php
//            on verifie si page passe dans l url
            if (isset($_GET['page'])) {
                //avec la fonction strcmp on verifie l'égalité entre les 2 chaines de carractere passés en GET
                if (strcmp($_GET['page'], 'gallery') == 0) {
                    //si l' égalité est vérifiée on inclu la page
                    include_once 'views/gallery.php';
                }
                if (!strcmp($_GET['page'], 'user')) {
                    include_once 'views/user.php';
                }
                if (!strcmp($_GET['page'], 'hellsWeek')) {
                    include_once 'views/hellsWeek.php';
                }
                if (!strcmp($_GET['page'], 'calendar')) {
                    include_once 'views/calendar.php';
                }
                if (!strcmp($_GET['page'], 'addUser')) {
                    include_once 'views/addUser.php';
                }
                if (!strcmp($_GET['page'], 'memberArea')) {
                    include_once 'views/memberArea.php';
                }
            }
// sinon retour à la page d'acceuil
            else {
                include_once 'views/accueil.php';
            }
            ?>
        </div>
        <script src="assets/library/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="assets/library/jasny-bootstrap/js/jasny-bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/library/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>         

    </body>
</html>

