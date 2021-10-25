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
  <link rel="stylesheet" href="style/datatables-bs4/css/dataTables.bootstrap4.min.css">
</head>

<body>
  <nav>
    <?php include $root . '/includes/navbar.php'; ?>
  </nav>
  <div class="container">
    <h2>Provincia</h2>
    <hr>
    <div class="row">
      <div class="row col-md-4 mb-4">
        <form action="provinciaNuevo.php" method="post">

          <div class="form-group">
            <label for="exampleInputPassword1">Nombre</label>
            <input type="text" name="name" class="form-control" placeholder="Nombre de Provincia">
          </div>
          <hr />
          <div class="form-group">

            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>


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

      // foreach ($provincias as $provincia) {
      while ($provincia = sqlsrv_fetch_array($executeQry)) {
        $id = $provincia['Id'];
        echo "<tr>";
        echo "<td>" . $provincia['Id'] . "</td>";
        echo "<td>" . $provincia['Nombre'] . "</td>";
        echo "<td><a href='provincia.php?Id=$id'>Editar</a></td>
            </tr>";
      };

      ?>

    </div>
    </div>
  </div>

  <footer>
    <?php include $root . '/includes/footer.php'; ?>
  </footer>

  <script src="/js/jquery-3.6.0.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/datatables/jquery.dataTables.min.js"></script>
<script src="/js/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>

<script>
	$(function () {
	  $(".datatable").DataTable({
		"responsive": true, "lengthChange": false, "autoWidth": false,
	  });

	});
</script>
</body>

</html>