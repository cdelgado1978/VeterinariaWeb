<?php
require('connection.php');
$qryRaza = "select * from raza";
$executeQry = sqlsrv_query($conn, $qryRaza);

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

</head>

<body>
    <nav>
        <?php include $root . '/includes/navbar.php'; ?>
    </nav>
    <div class="container">

        <div class="row col-md-6 mb-4">

            <button type='submit' class='btn btn-primary'>Agregar Raza</button>

            <!-- <form method="POST" action="provinciaUpdate.php">
                <?php
                echo  "<div class='form-group'>
                            <label>Raza</label>
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

            while ($raza = sqlsrv_fetch_array($executeQry)) {
                $id = $raza['Id'];
                echo "<tr>";
                echo "<td>" . $raza['Id'] . "</td>";
                echo "<td>" . $raza['Nombre'] . "</td>";
                echo "<td><a href='provinciaEditar.php?Id=$id'>Editar</a></td>
            </tr>";
            };

            ?>

        </div>
    </div>

    <footer>
        <?php include $root . '/includes/footer.php'; ?>
    </footer>

    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>