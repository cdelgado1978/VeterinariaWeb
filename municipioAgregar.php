<?php
require('connection.php');

$nombre = isset($_POST['Nombre']) ? $_POST['Nombre'] : true;
$provinciaId = isset($_POST['ProvinciaId']) ? $_POST['ProvinciaId'] : 0;

$qry = "insert into municipio (Nombre, ProvinciaId) values ('$nombre', $provinciaId)";

$executeQry = sqlsrv_query($conn, $qry);

if(!$executeQry) {
    echo "Error: No se pudo actulizar los datos";
} else {
    header("Location: municipio.php");
}

?>