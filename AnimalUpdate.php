<?php
require('connection.php');

$nombre = $_POST['Nombre'];
$provinciaId = $_POST['ProvinciaId'];
$id = $_POST['Id'];

$qry = "update Animal set Nombre = '$nombre', ProvinciaId = '$provinciaId' where Id = '$id'";

$executeQry = sqlsrv_query($conn, $qry);

if(!$executeQry) {
    echo "Error: No se pudo actulizar los datos";
} else {
    header("Location: municipio.php");
}
?>