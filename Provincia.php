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

    <link href="style/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
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
        while($provincia = sqlsrv_fetch_array($executeQry)){
            $id=$provincia['Id'];
            echo "<tr>";
                echo "<td>" . $provincia['Id'] . "</td>";
                echo "<td>" . $provincia['Nombre'] . "</td>";
                echo "<td><a href='provinciaEditar.php?Id=$id'>Editar</a></td>
            </tr>";
        };

        ?>

</div>
        <script src="js/jquery-3.6.0.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

</body>
</html>