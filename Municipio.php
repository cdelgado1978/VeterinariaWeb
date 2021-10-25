<?php
require('connection.php');

$qryMunicipios = "select mun.*, pro.nombre provincia from municipio mun inner join provincia pro on mun.provinciaId = pro.Id";
$executeQry = sqlsrv_query($conn, $qryMunicipios);

$qryProv = "select * from provincia";
$executeQryProv = sqlsrv_query($conn, $qryProv);

$id = 0;
if (isset($_GET['Id'])) {
  $id = $_GET['Id'];
  $qryMunicipio = "select * from municipio where id=$id";
  $executeQryMun = sqlsrv_query($conn, $qryMunicipio);
  $municipo = sqlsrv_fetch_array($executeQryMun);

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Municipio</title>
    <link href="style/bootstrap.min.css" rel="stylesheet" />
    <link href="style/main.css" rel="stylesheet" />
    <link rel="stylesheet" href="style/datatables-bs4/css/dataTables.bootstrap4.min.css">
</head>

<body>
    <nav>
        <?php include $root . '/includes/navbar.php'; ?>
    </nav>
    <div class="container">
         <div class="row">
            <div class="col-md-12 mb-4">
            <?php 
        
            if($id>=1){

                echo "<form action='municipoUpdate.php' method='post'>";
            echo "    <input type='hidden' name='Id' value='$municipo[Id]'/>";
            echo "    <div class='form-group col-md-6'>";
            echo "        <label>Nombre</label>";
            echo "        <input type='text' name='Nombre' class='form-control' value='$municipo[Nombre]'  placeholder='Nombre de Municipio'>";
            echo "    </div>";
            echo "    <div class='form-group col-md-6'>";
            echo "    <label>Provincia</label>";
            echo "    <select class='form-control' id='provincia' name='ProvinciaId'>";
                        while ($provincia = sqlsrv_fetch_array($executeQryProv)) {
            echo "                    <option value='$provincia[provinciaId]'>$provincia[Nombre]</option>";
                        }
            echo "    </select>";
            echo "</div>";
            echo "    <hr />";
            echo "        <div class='form-group col-md-6''>";
            echo "            <button type='submit' class='btn btn-primary'>Guardar</button>";
            echo "            <a href='/municipio.php' class='btn btn-danger'>Cancelar</a>";
            echo "        </div>";
            echo "    </form>";
                
            } else {
                echo "<form method='POST' action='municipioAgregar.php'>";
                echo "        <div class='form-group col-md-6'>";
                echo "            <label>Municipio</label>";
                echo "            <input class='form-control' id='Nombre' name='Nombre' placeholder='Nombre'>";
                echo "        </div>";
                echo "        <div class='form-group col-md-6'>";
                echo "                <label>Provincia</label>";
                echo "                <select class='form-control' id='provincia' name='ProvinciaId'>";
                                    while ($provincia = sqlsrv_fetch_array($executeQryProv)) {
                echo "                        <option value='$provincia[provinciaId]'>$provincia[Nombre]</option>";
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
        <hr />
        <div class="row">
            <div class="col-md-12">
                <table class='table datatable table-bordered table-striped'>
                    <thead>
                        <th class='col-md-1'>Id</th>
                        <th class='col-md-4'>Nombre</th>
                        <th class='col-md-4'>Provincia</th>
                        <th class='col-md-4'>Accion</th>
                    </thead>
                    <tbody>
                        <?php
                        
                        while ($municipio = sqlsrv_fetch_array($executeQry)) {
                            $id = $municipio['Id'];
                            echo "<tr>";
                            echo "<td>" . $municipio['Id'] . "</td>";
                            echo "<td>" . $municipio['Nombre'] . "</td>";
                            echo "<td>" . $municipio['provincia'] . "</td>";
                            echo "<td><a href='municipio.php?Id=$id'>Editar</a></td>";
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