<?php
require('connection.php');

$nombre = $_POST['Nombre'];
$id = $_POST['Id'];

$qry = "update provincia set Nombre = $nombre 
        where Id = '$id'";

$executeQry = sqlsrv_query($conn, $qry);

if(!$executeQry) {
    echo "Error: No se pudo actulizar los datos";
}
?>