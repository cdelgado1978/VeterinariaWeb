<?php
require('connection.php');
$qryProveedores = "select * from Proveedor";
$executeQry = sqlsrv_query($conn, $qryProveedores);

$id = 0;
if (isset($_GET['Id'])) {
    $id = $_GET['Id'];
    $qryProveedor = "select * from Proveedor where id=$id";
    $executeQryProveedor = sqlsrv_query($conn, $qryProveedor);
    $Proveedor = sqlsrv_fetch_array($executeQryProveedor);
    // die(print_r($Proveedor));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proveedores</title>
    <link href="style/bootstrap.min.css" rel="stylesheet" />
    <link href="style/main.css" rel="stylesheet" />
    <link rel="stylesheet" href="style/datatables-bs4/css/dataTables.bootstrap4.min.css">
</head>

<body>
    <nav>
        <?php include $root . '/includes/navbar.php'; ?>
    </nav>
    <div class="container">
        <h2>Proveedores</h2>
        <hr>
        <div class="row">
            <div class="col-md-6 mb-4">
                <?php
                if ($id >= 1) {
                    echo "<form action='ProveedorUpdate.php' method='post'>";
                    echo " <input type='hidden' name='Id' value='$Proveedor[ID]'/>";
                    echo "  <div class='form-group'>";
                    echo "     <label>Nombre</label>";
                    echo "     <input type='text' name='Nombre' class='form-control' value='$Proveedor[Nombre]'  placeholder='Nombre Proveedor'>";
                    echo "  </div>";
                    echo "  <div class='form-group'>";
                    echo "     <label>Direccion</label>";
                    echo "     <input type='text' name='Direccion' class='form-control' value='$Proveedor[Direccion]'  placeholder='Direccion'>";
                    echo "  </div>";
                    echo "  <div class='form-group'>";
                    echo "     <label>Telefono</label>";
                    echo "     <input type='phone' name='Telefono' class='form-control' value='$Proveedor[Telefono]'  placeholder='Telefono'>";
                    echo "  </div>";
                    echo "  <hr />";
                    echo "  <div class='form-group'>";
                    echo "     <button type='submit' class='btn btn-primary'>Guardar</button>";
                    echo "     <a href='/Proveedor.php' class='btn btn-danger'>Cancelar</a>";
                    echo "  </div>";
                    echo "</form>";
                } else {
                    echo "<form action='ProveedorNuevo.php' method='post'>";
                    echo "  <div class='form-group'>";
                    echo "     <label>Nombre</label>";
                    echo "     <input type='text' name='name' class='form-control' placeholder='Nombre Tipo Animal'>";
                    echo "  </div>";
                    
                    echo "  <div class='form-group'>";
                    echo "     <label>Direccion</label>";
                    echo "     <input type='text' name='Direccion' class='form-control'   placeholder='Direccion'>";
                    echo "  </div>";
                    echo "  <div class='form-group'>";
                    echo "     <label>Telefono</label>";
                    echo "     <input type='phone' name='Telefono' class='form-control'   placeholder='Telefono'>";
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
                <th class='col-md-4'>Direccion</th>
                <th class='col-md-4'>Telefono</th>
                <th class='col-md-4'>Accion</th>
            </thead>
            <tbody>";

                while ($proveedors = sqlsrv_fetch_array($executeQry)) {
                    $id = $proveedors['ID'];
                    echo "<tr>";
                    echo "<td>" . $proveedors['ID'] . "</td>";
                    echo "<td>" . $proveedors['Nombre'] . "</td>";
                    echo "<td>" . $proveedors['Direccion'] . "</td>";
                    echo "<td>" . $proveedors['Telefono'] . "</td>";
                    echo "<td><a href='proveedor.php?Id=$id'>Editar</a></td>
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