<h1>Empleados</h1>
<hr>

<body>
    <?php
    require('connection.php');
    $id = $_GET['id'];

    if ($id > 0) {
        $empleados = null;
        $statementEmpleados = $conexion->prepare('select * from empleados where id=:id');
        $statementEmpleados->execute(
            array(':id' => $id)
        );

        $empleados = $statementEmpleados->fetchAll();

    } else {
        $empleados = null;
        $statementEmpleados = $conexion->prepare('select * from empleados');
        $statementEmpleados-> execute();

        $empleados = $statementEmpleados-> fetchAll();

    }

    echo "<table>
            <thead>
                <th>Id</th>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Fecha Nacimiento</th>
            </thead>
            <tbody>";
                       
    foreach ($empleados as $empleado) {
        echo "<tr>";
        echo "<td>".$empleado['id']."</td>";
        echo "<td>".$empleado['code']."</td>";
        echo "<td>".$empleado['nombre']."</td>";
        echo "<td>".$empleado['apellidos']."</td>";
        echo "<td>".$empleado['fechaNacimiento']."</td>
            </tr>";

    };
  
    // echo "</tbody>
    //     </table>";

    ?>
</body>