<?php

    // $db = new PDO('mysql:host=localhost;dbname=desarrolloweb', 'root', '');
    // echo "Conexion Ok";

    $serverName = ".\SqlServer2k17";
    $connInfo = array("Database" => "Veterinaria");
    $conn = sqlsrv_connect( $serverName, $connInfo);

    if( !$conn ) {
        
        echo "Conexión no se pudo establecer.<br />";
        die( print_r( sqlsrv_errors(), true));
   }
