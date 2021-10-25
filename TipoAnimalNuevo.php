<?php
require('connection.php');

if (isset($_GET['Id'])) {
  $id = $_GET['Id'];
}

$qry = "select * from Tipos_Animal where Id = '$id'";

$executeQry = sqlsrv_query($conn, $qry);

if(!$executeQry) {
  echo "Error: No se pudo actulizar los datos";
} else {
  header("Location: TipoAnimal.php");
}
?>