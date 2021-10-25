<?php
require('connection.php');

$name = isset($_POST['Nombre']) ? $_POST['Nombre'] : false;
$direccion = isset($_POST['Direccion']) ? $_POST['Direccion'] : false;
$telefono = isset($_POST['Telefono']) ? $_POST['Telefono'] : false;

$qry = "update Proveedor set Nombre = '$nombre', Direccion='$direccion', telefono='$telefono' where Id = '$id'";

$executeQry = sqlsrv_query($conn, $qry);

if(!$executeQry) {
    echo "Error: No se pudo actulizar los datos";
} else {
    header("Location: Proveedor.php");
}
?>