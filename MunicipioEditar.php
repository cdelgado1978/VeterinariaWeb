<?php
require('connection.php');

if (isset($_GET['Id'])) {
  $id = $_GET['Id'];
}

$qry = "select * from municipio where Id = '$id'";
$qryProv = "select * from provincia";
$executeQry = sqlsrv_query($conn, $qry);
$execQryProv = sqlsrv_query($conn, $qryProv);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Provincias</title>

  <link href="style/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
  <div class="col-md-4">
    <form method="POST" action="municipioUpdate.php">
      <?php

      $registro = sqlsrv_fetch_array($executeQry);
      

      echo  "
      <input type='hidden' name='Id' value='".$registro['Id']."'>
      <div class='form-group'>
        <label>Nombre de Municipio</label>
        <input class='form-control' id='Nombre' name='Nombre' placeholder='Nombre' value='".$registro['Nombre']."'>
      </div>
      <div class='form-group'>
        <label>Provincia</label>
        <select class='form-control' id='ProvinciaId' name='ProvinciaId' value=".$registro['ProvinciaId'].">";
        while ($provincia = sqlsrv_fetch_array($execQryProv)) {
          echo "<option value='".$provincia["Id"]."'>".$provincia['Nombre']."</option>";
        }
        echo "</select>
      </div>
      <button type='submit' class='btn btn-primary'>Guardar</button>"
      ?>
    </form>
  </div>
  <script src="js/jquery-3.6.0.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>