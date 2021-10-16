<?php

try{
    $conexion = new PDO('mysql:host=localhost;dbname=desarrolloweb', 'root', '');
    // echo "Conexion Ok";
}catch(PDOException $ex ){
    echo "Error: " . $ex->getMessage();
}
