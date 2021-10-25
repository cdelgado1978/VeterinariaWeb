<?php
require('connection.php');


$nombre = isset($_POST['Nombre']) ? $_POST['Nombre'] : true;
$TipoAnimalId = isset($_POST['TipoAnimalId']) ? $_POST['TipoAnimalId'] : 0;


$qry = "update raza set Nombre = '$nombre', TipoAnimalId = '$TipoAnimalId' where Id = '$id'";

$executeQry = sqlsrv_query($conn, $qry);

if(!$executeQry) {
    echo "Error: No se pudo actulizar los datos";
} else {
    header("Location: raza.php");
}
?>