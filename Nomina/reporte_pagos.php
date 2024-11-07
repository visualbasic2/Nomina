<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nomina";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT e.nombre, e.apellido, p.fecha_pago, p.salario_neto FROM pagos p JOIN empleados e ON p.empleado_id = e.id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Pagos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Reporte de Pagos</h1>
    </header>
    <nav>
        <ul>
            <li><a href="index.html">Inicio</a></li>
            <li><a href="empleados.php">Empleados</a></li>
            <li><a href="pagos.php">Pagos</a></li>
        </ul>
    </nav>
    <main>
        <h2>Lista de Pagos</h2>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Fecha de Pago</th>
                <th>Salario Neto</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>".$row["nombre"]."</td><td>".$row["apellido"]."</td><td>".$row["fecha_pago"]."</td><td>".$row["salario_neto"]."</td></tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No hay pagos registrados</td></tr>";
            }
            ?>
        </table>
    </main>
</body>
</html>

<?php
$conn->close();
?>
