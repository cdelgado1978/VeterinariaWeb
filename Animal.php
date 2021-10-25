<?php
require('connection.php');

$qryAnimales = "select anl.*, tanl.Nombre TipoAnimal, r.Nombre Raza, cte.Nombre + ' ' + cte.Apellidos FullName
                    from animales anl
                        inner join tipo_Animal tanl on anl.TipoID = tanl.Id
                        inner join raza r on anl.razaId = r.id
                        inner join clientes cte on anl.clienteId = cte.id
                ";

$executeQry = sqlsrv_query($conn, $qryAnimales);

$qryTipoAnimal = "select * from Tipo_Animal";
$executeQryTAnimal = sqlsrv_query($conn, $qryTipoAnimal);

$qryRaza = "select * from Raza";
$executeQryRaza = sqlsrv_query($conn, $qryRaza);

$qryCte = "select * from Clientes";
$executeQryCte = sqlsrv_query($conn, $qryCte);

$id = 0;
if (isset($_GET['Id'])) {
    $id = $_GET['Id'];
    $qryAnimal = "select anl.*, tanl.Nombre TipoAnimal, r.Nombre Raza, cte.Nombre + ' ' + cte.Apellidos FullName
                from animales anl
                    inner join tipo_Animal tanl on anl.TipoID = tanl.Id
                    inner join raza r on anl.razaId = r.id
                    inner join clientes cte on anl.clienteId = cte.id
                    where anl.Id = $id";
    $executeQryAnimal = sqlsrv_query($conn, $qryAnimal);
    $animal = sqlsrv_fetch_array($executeQryAnimal);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animal</title>
    <link href="style/bootstrap.min.css" rel="stylesheet" />
    <link href="style/main.css" rel="stylesheet" />
    <link rel="stylesheet" href="style/datatables-bs4/css/dataTables.bootstrap4.min.css">
</head>

<body>
    <nav>
        <?php include $root . '/includes/navbar.php'; ?>
    </nav>
    <div class="container">
        <h2>Animal</h2>
        <hr>
        <div class="row">
            <div class="col-md-12 mb-4">
                <?php

                if ($id >= 1) {

                    echo "<form action='AnimalUpdate.php' method='post'>";
                    echo "    <input type='hidden' name='Id' value='$animal[ID]'/>";
                    echo "    <div class='form-group col-md-6'>";
                    echo "        <label>Nombre</label>";
                    echo "        <input type='text' name='Nombre' class='form-control' value='$animal[Nombre]'  placeholder='Nombre de Municipio'>";
                    echo "    </div>";
                    echo "    <div class='form-group col-md-6'>";
                    echo "        <label>Edad</label>";
                    echo "        <input type='text' name='Edad' class='form-control' value='$animal[Edad]'>";
                    echo "    </div>";
                    echo "    <div class='form-group col-md-6'>";
                    echo "        <label>Direccion</label>";
                    echo "        <input type='text' name='Direccion' class='form-control' value='$animal[Direccion]' >";
                    echo "    </div>";
                    echo "    <div class='form-group col-md-6'>";
                    echo "    <label>Tipo Animal</label>";
                    echo "    <select class='form-control' id='tipoAnimal' name='TipoAnimalId'>";
                    while ($tAnimal = sqlsrv_fetch_array($executeQryTAnimal)) {
                        echo "                    <option value='$tAnimal[Id]'>$tAnimal[Nombre]</option>";
                    }
                    echo "    </select>";
                    echo "</div>";
                    echo "    <div class='form-group col-md-6'>";
                    echo "    <label>Raza</label>";
                    echo "    <select class='form-control' id='raza' name='RazaId'>";
                    while ($raza = sqlsrv_fetch_array($executeQryRaza)) {
                        echo "                    <option value='$raza[Id]'>$raza[Nombre]</option>";
                    }
                    echo "    </select>";
                    echo "</div>";
                    echo "    <div class='form-group col-md-6'>";
                    echo "    <label>Cliente</label>";
                    echo "    <select class='form-control' id='raza' name='RazaId'>";
                    while ($cte = sqlsrv_fetch_array($executeQryCte)) {
                        echo "                    <option value='$cte[Id]'>$cte[Nombre] $cte[Apellidos]</option>";
                    }
                    echo "    </select>";
                    echo "</div>";
                    echo "    <hr />";
                    echo "        <div class='form-group col-md-6''>";
                    echo "            <button type='submit' class='btn btn-primary'>Guardar</button>";
                    echo "            <a href='/Animal.php' class='btn btn-danger'>Cancelar</a>";
                    echo "        </div>";
                    echo "    </form>";
                } else {
                    echo "<form method='POST' action='AnimalAgregar.php'>";
                    echo "        <div class='form-group col-md-6'>";
                    echo "            <label>Animal</label>";
                    echo "            <input class='form-control' id='Nombre' name='Nombre' placeholder='Nombre'>";
                    echo "        </div>";
                    echo "    <div class='form-group col-md-6'>";
                    echo "    <label>Tipo Animal</label>";
                    echo "    <select class='form-control' id='tipoAnimal' name='TipoAnimalId'>";
                    while ($tAnimal = sqlsrv_fetch_array($executeQryTAnimal)) {
                        echo "                    <option value='$tAnimal[Id]'>$tAnimal[Nombre]</option>";
                    }
                    echo "    </select>";
                    echo "</div>";
                    echo "    <div class='form-group col-md-6'>";
                    echo "    <label>Raza</label>";
                    echo "    <select class='form-control' id='raza' name='RazaId'>";
                    while ($raza = sqlsrv_fetch_array($executeQryRaza)) {
                        echo "                    <option value='$raza[Id]'>$raza[Nombre]</option>";
                    }
                    echo "    </select>";
                    echo "</div>";
                    echo "    <div class='form-group col-md-6'>";
                    echo "    <label>Cliente</label>";
                    echo "    <select class='form-control' id='raza' name='RazaId'>";
                    while ($cte = sqlsrv_fetch_array($executeQryCte)) {
                        echo "                    <option value='$cte[Id]'>$cte[Nombre] $cte[Apellidos]</option>";
                    }
                    echo "    </select>";
                    echo "</div>";
                    echo "        <div class='form-group col-md-6'>";
                    echo "            <button type='submit' class='btn btn-primary'>Guardar</button>";
                    echo "        </div>";
                    echo "    </form>";
                }
                ?>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-md-12">
                <table class='table datatable table-bordered table-striped'>
                    <thead>
                        <th class='col-md-1'>Id</th>
                        <th class='col-md-4'>Nombre</th>
                        <th class='col-md-4'>Tipo Animal</th>
                        <th class='col-md-4'>Raza</th>
                        <th class='col-md-4'>Direccion</th>
                        <th class='col-md-4'>Cliente</th>
                        <th class='col-md-4'>Accion</th>
                    </thead>
                    <tbody>
                        <?php

                        while ($animales = sqlsrv_fetch_array($executeQry)) {
                            $id = $animales['ID'];
                            echo "<tr>";
                            echo "<td>" . $animales['ID'] . "</td>";
                            echo "<td>" . $animales['Nombre'] . "</td>";
                            echo "<td>" . $animales['TipoAnimal'] . "</td>";
                            echo "<td>" . $animales['Raza'] . "</td>";
                            echo "<td>" . $animales['Direccion'] . "</td>";
                            echo "<td>" . $animales['FullName'] . "</td>";
                            echo "<td><a href='Animal.php?Id=$id'>Editar</a></td>";
                            echo "</tr>";
                        };
                        
                        ?>
                    </tbody>
                </table>
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