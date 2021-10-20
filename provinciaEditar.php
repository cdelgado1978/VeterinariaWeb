<?php
require('connection.php');

if (isset($_GET['Id'])) {
  $id = $_GET['Id'];
}

$qry = "select * from provincia where Id = '$id'";

$executeQry = sqlsrv_query($conn, $qry);

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
    <form method="POST" action="provinciaUpdate.php">
      <?php

      $registro = sqlsrv_fetch_array($executeQry);

      echo  "<div class='form-group'>
      <input type='hidden' name='Id' value='".$registro['Id']."'>
        <label>Nombre de Provincia</label>
        <input class='form-control' id='Nombre' name='Nombre' placeholder='Nombre' value='".$registro['Nombre']."'>
      </div>
      <button type='submit' class='btn btn-primary'>Guardar</button>"
      ?>
    </form>
  </div>
  <script src="js/jquery-3.6.0.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>