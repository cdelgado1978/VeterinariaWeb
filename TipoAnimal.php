<?php
require('connection.php');
$qryTipoAnimales = "select * from tipo_animal";
$executeQry = sqlsrv_query($conn, $qryTipoAnimales);

$id = 0;
if (isset($_GET['Id'])) {
    $id = $_GET['Id'];
    $qryTipoAnimale = "select * from tipo_animal where id=$id";
    $executeQryTAnimal = sqlsrv_query($conn, $qryTipoAnimale);
    $tipoAnimal = sqlsrv_fetch_array($executeQryTAnimal);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipo Animal</title>
    <link href="style/bootstrap.min.css" rel="stylesheet" />
    <link href="style/main.css" rel="stylesheet" />
    <link rel="stylesheet" href="style/datatables-bs4/css/dataTables.bootstrap4.min.css">
</head>

<body>
    <nav>
        <?php include $root . '/includes/navbar.php'; ?>
    </nav>
    <div class="container">
        <h2>Tipo Animal</h2>
        <hr>
        <div class="row">
            <div class="col-md-6 mb-4">
                <?php
                if ($id >= 1) {
                    echo "<form action='TipoAnimalUpdate.php' method='post'>";
                    echo " <input type='hidden' name='Id' value='$tipoAnimal[Id]'/>";
                    echo "  <div class='form-group'>";
                    echo "     <label>Nombre</label>";
                    echo "     <input type='text' name='Nombre' class='form-control' value='$tipoAnimal[Nombre]'  placeholder='Nombre Tipo Animal'>";
                    echo "  </div>";
                    echo "  <hr />";
                    echo "  <div class='form-group'>";
                    echo "     <button type='submit' class='btn btn-primary'>Guardar</button>";
                    echo "     <a href='/Provincia.php' class='btn btn-danger'>Cancelar</a>";
                    echo "  </div>";
                    echo "</form>";
                } else {
                    echo "<form action='TipoAnimalNuevo.php' method='post'>";
                    echo "  <div class='form-group'>";
                    echo "     <label>Nombre</label>";
                    echo "     <input type='text' name='name' class='form-control' placeholder='Nombre Tipo Animal'>";
                    echo "  </div>";
                    echo "  <hr />";
                    echo "  <div class='form-group'>";
                    echo "     <button type='submit' class='btn btn-primary'>Guardar</button>";
                    echo "  </div>";
                    echo "</form>";
                }
                ?>
            </div>

        </div>
        <hr />
        <div class="row">
            <div class="col-md-12">
                <?php

                echo "<table class='table datatable table-bordered table-striped'>
            <thead>
                <th class='col-md-1'>Id</th>
                <th class='col-md-4'>Nombre</th>
                <th class='col-md-4'>Accion</th>
            </thead>
            <tbody>";

                while ($tipoAnimal = sqlsrv_fetch_array($executeQry)) {
                    $id = $tipoAnimal['Id'];
                    echo "<tr>";
                    echo "<td>" . $tipoAnimal['Id'] . "</td>";
                    echo "<td>" . $tipoAnimal['Nombre'] . "</td>";
                    echo "<td><a href='TipoAnimal.php?Id=$id'>Editar</a></td>
            </tr>";
                };

                ?>

            </div>
        </div>
    </div>


    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/datatables/jquery.dataTables.min.js"></script>
    <script src="js/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(function() {
            $(".datatable").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
            });

        });
    </script>
</body>

</html>