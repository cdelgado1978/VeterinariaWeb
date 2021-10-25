<?php

    // $db = new PDO('mysql:host=localhost;dbname=desarrolloweb', 'root', '');
    // echo "Conexion Ok";

    // $serverName = "ENMANUEL-PC";
    $serverName = ".\SqlServer2k17";
    // $serverName = "DESKTOP-25FO5IC\SQLEXPRESS";
    $connInfo = array("Database" => "Veterinaria");
    $conn = sqlsrv_connect( $serverName, $connInfo);


    // $root = '/Users/uuser/Documents/GitHub/VeterinariaWeb';
    $root = '/Fuentes/UAPA/Programacion Web/VeterinariaWeb';
    // $root = '/laragon/www/VeterinariaWeb';

    if( !$conn ) {
        
        echo "Conexión no se pudo establecer.<br />";
        die( print_r( sqlsrv_errors(), true));
   }
