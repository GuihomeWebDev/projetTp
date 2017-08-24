<?php
$page = '';
//gestion de la deconnection et desruction de séssion à partir de n importe quelle page
if(isset($_GET['page'])){
    $page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING);
}
if (isset($_GET['action']) && strcmp($_GET['action'], 'logOut') == 0)
{
    unset($_SESSION);
    session_destroy();
    header("Location: http://projetTP/");
}