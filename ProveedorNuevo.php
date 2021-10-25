<?php
require('connection.php');

$name = isset($_POST['Nombre']) ? $_POST['Nombre'] : false;
$direccion = isset($_POST['Direccion']) ? $_POST['Direccion'] : false;
$telefono = isset($_POST['Telefono']) ? $_POST['Telefono'] : false;

$qry = "insert into Proveedor (nombre, Direccion, telefono) values ('$name','$direccion','$telefono')";

$executeQry = sqlsrv_query($conn, $qry);

if(!$executeQry) {
  echo "Error: No se pudo actulizar los datos";
} else {
  header("Location: Proveedor.php");
}
?>