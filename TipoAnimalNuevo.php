<?php
require('connection.php');

$name = isset($_POST['Nombre']) ? $_POST['Nombre'] : false;

$qry = "insert into Tipos_Animal (nombre) values ('$name')";

$executeQry = sqlsrv_query($conn, $qry);

if(!$executeQry) {
  echo "Error: No se pudo actulizar los datos";
} else {
  header("Location: TipoAnimal.php");
}
?>