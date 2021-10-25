<?php
require('connection.php');

$name = isset($_POST['name']) ? $_POST['name'] : false;

$qry = "insert into provincia (nombre) values ('$name')";

$executeQry = sqlsrv_query($conn, $qry);

header("Location: provincia.php");

?>
