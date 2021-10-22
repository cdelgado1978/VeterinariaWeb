<?php

    // $db = new PDO('mysql:host=localhost;dbname=desarrolloweb', 'root', '');
    // echo "Conexion Ok";

    $serverName = "ENMANUEL-PC";
    $connInfo = array("Database" => "Veterinaria");
    $conn = sqlsrv_connect( $serverName, $connInfo);


    $root = '/Users/uuser/Documents/GitHub/VeterinariaWeb';
    
    if( !$conn ) {
        
        echo "Conexión no se pudo establecer.<br />";
        die( print_r( sqlsrv_errors(), true));
   }
