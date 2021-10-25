<?php
require('connection.php');
$qryRazas = "select * from raza";
$executeQry = sqlsrv_query($conn, $qryRazas);

$qryTipoAnimales = "select * from tipo_animal";
$executeQryTAnimal = sqlsrv_query($conn, $qryTipoAnimales);

$id = 0;
if (isset($_GET['Id'])) {
    $id = $_GET['Id'];
    $qryRaza = "select * from raza where id=$id";
    $executeQryRaza = sqlsrv_query($conn, $qryRaza);
    $raza = sqlsrv_fetch_array($executeQryRaza);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raza</title>
    <link href="style/bootstrap.min.css" rel="stylesheet" />
    <link href="style/main.css" rel="stylesheet" />
    <link rel="stylesheet" href="style/datatables-bs4/css/dataTables.bootstrap4.min.css">
</head>

<body>
    <nav>
        <?php include $root . '/includes/navbar.php'; ?>
    </nav>
    <div class="container">
        <h2>Raza</h2>
        <hr>
        <div class="row">
            <div class="col-md-6 mb-4">

            <?php
                if ($id >= 1) {
                    echo "<form action='razaUpdate.php' method='post'>";
                    echo " <input type='hidden' name='Id' value='$raza[Id]'/>";
                    echo "  <div class='form-group'>";
                    echo "     <label>Nombre</label>";
                    echo "     <input type='text' name='Nombre' class='form-control' value='$raza[Nombre]'  placeholder='Nombre Raza'>";
                    echo "  </div>";
                    echo "        <div class='form-group col-md-6'>";
                    echo "                <label>Tipo Animal</label>";
                    echo "                <select class='form-control' id='TipoAnimal' name='TipoAnimalId'>";
                                        while ($tipoAnimal = sqlsrv_fetch_array($executeQryTAnimal)) {
                    echo "                        <option value='$tipoAnimal[Id]'>$tipoAnimal[Nombre]</option>";
                                        }
                    echo "        </select>";
                    echo "        </div>";
                    echo "  <hr />";
                    echo "  <div class='form-group'>";
                    echo "     <button type='submit' class='btn btn-primary'>Guardar</button>";
                    echo "     <a href='/Provincia.php' class='btn btn-danger'>Cancelar</a>";
                    echo "  </div>";
                    echo "</form>";
                 } else {
                    echo "<form method='POST' action='razaAgregar.php'>";
                    echo "        <div class='form-group col-md-6'>";
                    echo "            <label>Raza</label>";
                    echo "            <input class='form-control' id='Nombre' name='Nombre' placeholder='Nombre'>";
                    echo "        </div>";
                    echo "        <div class='form-group col-md-6'>";
                    echo "                <label>Tipo Animal</label>";
                    echo "                <select class='form-control' id='TipoAnimal' name='TipoAnimalId'>";
                                        while ($tipoAnimal = sqlsrv_fetch_array($executeQryTAnimal)) {
                    echo "                        <option value='$tipoAnimal[Id]'>$tipoAnimal[Nombre]</option>";
                                        }
                    echo "        </select>";
                    echo "        </div>";
                    echo "        <div class='form-group col-md-6'>";
                    echo "            <button type='submit' class='btn btn-primary'>Guardar</button>";
                    echo "        </div>";
                    echo "    </form>";
                }
                ?>
            </div>
        </div>
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

                while ($razas = sqlsrv_fetch_array($executeQry)) {
                    $id = $razas['Id'];
                    echo "<tr>";
                    echo "<td>" . $razas['Id'] . "</td>";
                    echo "<td>" . $razas['Nombre'] . "</td>";
                    echo "<td><a href='raza.php?Id=$id'>Editar</a></td>
            </tr>";
                };

                ?>

            </div>
        </div>
    </div>

    <footer>
        <?php include $root . '/includes/footer.php'; ?>
    </footer>

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