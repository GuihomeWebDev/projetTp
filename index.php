<?php
session_start();
include_once 'configuration.php';
include_once 'class/database.php';
include_once 'models/users.php';
include_once 'models/events.php';
include_once 'controllers/indexCtrl.php';
if ((isset($_SESSION['isConnected']) && $_SESSION['isConnected'] && (!strcmp($page, 'addUser') || !strcmp($page, 'user'))) || !isset($_SESSION['isConnected']) && !strcmp($page, 'memberArea')) {
    header('HTTP/1.1 403 Forbidden');
    header("Location: ?error=403");
    exit;
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Bikers events</title>
        <link href="/assets/library/bootstrap/css/bootstrap.css" rel="stylesheet"/>              
        <link href="assets/library/datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/library/datepicker/css/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/library/jasny-bootstrap/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="/assets/css/style.css" rel="stylesheet" type="text/css"/>
        <?php
        if (isset($_GET['page'])) {
            if (!strcmp($_GET['page'], 'user')) {
                ?><link href="../assets/css/user.css" rel="stylesheet" type="text/css"/><?php
            }
            if (!strcmp($_GET['page'], 'hellsWeek')) {
                ?><link href="../assets/css/hellsWeek.css" rel="stylesheet" type="text/css"/><?php
            }
            if (!strcmp($_GET['page'], 'neophite')) {
                ?><link href="../assets/css/neophite.css" rel="stylesheet" type="text/css"/><?php
            }
            if (!strcmp($_GET['page'], 'calendar')) {
                ?><link href="../assets/css/calendar.css" rel="stylesheet" type="text/css"/><?php
            }
            if (!strcmp($_GET['page'], 'addUser')) {
                ?><link href="../assets/css/addUsers.css" rel="stylesheet" type="text/css"/><?php
            }
            if (!strcmp($_GET['page'], 'memberArea')) {
                ?><link href="../assets/css/memberArea.css" rel="stylesheet" type="text/css"/><?php
            }
            if (!strcmp($_GET['page'], 'profil')) {
                ?><link href="../assets/css/profil.css" rel="stylesheet" type="text/css"/><?php 
            }
            ?>
            <?php }
            ?>
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
                        <a class="navbar-brand" href="/">Accueil</a>
                    </div>
                    <div id="navbar" class="collapse navbar-collapse">
                        <ul class="nav navbar-nav">
                            <?php
                            if (isset($_SESSION['isConnected'])) {
                                ?>
                                <li><a href="calendrier.html">Calendrier évenements</a></li>                            
                                <li><a href="neophite.html">Neophite</a></li>
                                <li><a href="espaceMembre.html">Gestion des évènements</a></li>                                                          
                                <li><a href="profile.html">Modifier votre profil</a></li>                                                          
                                <li><a href="/?action=logOut">Déconnexion</a></li>
                                <?php
                            } else {
                                ?>
                                <li><a href="calendrier.html">calendrier évenements</a></li>
                                <li><a  href="neophite.html">neophite</a></li>
                                <li><a  href="inscription.html">inscription</a></li>
                                <li><a  href="connexion.html">connexion</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container-fluid" id="content">
                <?php
//            on verifie si page passe dans l url
                if (isset($_GET['page'])) {
                    //avec la fonction strcmp on verifie l'égalité entre les 2 chaines de carractere passés en GET
                    if (strcmp($_GET['page'], 'neophite') == 0) {
                        //si l' égalité est vérifiée on inclu la page
                        include_once 'views/neophite.php';
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
                    if (!strcmp($_GET['page'], 'profil')) {
                        include_once 'views/profil.php';
                    }
                }
// sinon retour à la page d'acceuil
                else {
                    include_once 'views/accueil.php';
                }
                ?>
        </div>
        <script src="assets/library/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="../assets/js/ajax.js" type="text/javascript"></script>
        <script src="assets/library/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>         
        <script src="assets/library/jasny-bootstrap/js/jasny-bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/library/datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <script src="assets/library/datepicker/locales/bootstrap-datepicker.fr.min.js" type="text/javascript"></script>
        <script src="assets/js/groupRegistration.js" type="text/javascript"></script>
        <script>
            $(function () {
                //On le met à la fin pour accélérer le chargement de la page.
                //Configuration du plugin
                $('.datepicker').datepicker({
                    language: 'fr',
                    autoclose: true
                });

            });
        </script>
        </body>
</html>

