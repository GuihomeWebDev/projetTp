<?php

      try{
    $DB = new PDO('mysql:host=localhost;dbname=biker','tpGuihome','LkyYugiwShCvwYz5',array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'));
}
catch(PDOException $e){
    echo 'Base de donnée en vacance';
    exit();
}
    


    
