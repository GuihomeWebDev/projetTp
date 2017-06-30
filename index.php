<?php
include_once 'configuration.php';
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Bikers events</title>
        <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.min.css">
        <link href="assets/library/bootstrap/bootstrap.css" rel="stylesheet"/>
        <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
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
                        <li><a href="?page=calendar">calendrier évenements</a></li>
                        <li><a  href="?page=gallery">galerie</a></li>
                        <li><a  href="?page=addUser">inscription</a></li>
                        <li><a  href="?page=user">connexion</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid" id="content">
            <?php
//            on verifie si page passe dans l url
            if (isset($_GET['page']))
            {
                //avec la fonction strcmp on verifie l'égalité entre les 2 chaines de carractere passés en GET
                if (strcmp($_GET['page'], 'gallery') == 0)
                {
                    //si l' égalité est vérifiée on inclu la page
                    include_once 'views/gallery.php';
                }
                if (!strcmp($_GET['page'], 'users'))
                {
                    include_once 'views/user.php';
                }
                if (!strcmp($_GET['page'], 'hellsWeek'))
                {
                    include_once 'views/hellsWeek.php';
                }
                if (!strcmp($_GET['page'], 'fbf'))
                {
                    include_once 'views/fbf.php';
                }
                if (!strcmp($_GET['page'], 'calendar'))
                {
                    include_once 'views/calendar.php';
                }
                if (!strcmp($_GET['page'], 'addUser'))
                {
                    include_once 'views/addUser.php';
                }
            }
            // sinon retour à la page d'acceuil
            else
            {
                include_once 'views/accueil.php';
            }
            ?>
        </div>
        <script src="assets/library/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="assets/library/bootstrap/bootstrap.js" type="text/javascript"></script>
    </body>
</html>

