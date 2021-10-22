<?php
require('connection.php');
$qryProvincias = "select * from provincia";
$executeQry = sqlsrv_query($conn, $qryProvincias);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Provincias</title>
    <link href="/style/bootstrap.min.css" rel="stylesheet" />
    <link href="/style/main.css" rel="stylesheet" />

</head>

<body>
    <nav>
        <?php include $root . '/includes/navbar.php'; ?>
    </nav>
    <div class="container">
        <h2>Provincia</h2>
        <hr>
        <div class="row col-md-6 mb-4">

        <button type='submit' class='btn btn-primary'>Agregar Provincia</button> 
            <!-- <form method="POST" action="provinciaUpdate.php">
                <?php
                echo  "<div class='form-group'>
                            <label>Nombre de Provincia</label>
                            <input class='form-control' id='Nombre' name='Nombre' placeholder='Nombre'>
                        </div>
                        <button type='submit' class='btn btn-primary'>Guardar</button>"
                ?>
            </form> -->
        </div>

        <div class="col-md-6">
            <?php

            echo "<table class='table display'>
            <thead>
                <th class='col-md-1'>Id</th>
                <th class='col-md-4'>Nombre</th>
                <th class='col-md-4'>Accion</th>
            </thead>
            <tbody>";

            // foreach ($provincias as $provincia) {
            while ($provincia = sqlsrv_fetch_array($executeQry)) {
                $id = $provincia['Id'];
                echo "<tr>";
                echo "<td>" . $provincia['Id'] . "</td>";
                echo "<td>" . $provincia['Nombre'] . "</td>";
                echo "<td><a href='provinciaEditar.php?Id=$id'>Editar</a></td>
            </tr>";
            };

            ?>

        </div>
    </div>

    <footer>
        <?php include $root . '/includes/footer.php'; ?>
    </footer>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Nuevo
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>


    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</body>

</html>