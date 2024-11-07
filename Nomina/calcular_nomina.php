<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nomina";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql_empleados = "SELECT * FROM empleados";
$result_empleados = $conn->query($sql_empleados);

while ($row_empleado = $result_empleados->fetch_assoc()) {
    $empleado_id = $row_empleado['id'];
    $salario_base = $row_empleado['salario_base'];

    $sql_deducciones = "SELECT SUM(porcentaje) AS total_deducciones FROM deducciones";
    $result_deducciones = $conn->query($sql_deducciones);
    $row_deducciones = $result_deducciones->fetch_assoc();
    $total_deducciones = $row_deducciones['total_deducciones'];

    $sql_percepciones = "SELECT SUM(monto) AS total_percepciones FROM percepciones";
    $result_percepciones = $conn->query($sql_percepciones);
    $row_percepciones = $result_percepciones->fetch_assoc();
    $total_percepciones = $row_percepciones['total_percepciones'];

    $salario_bruto = $salario_base + $total_percepciones;
    $salario_neto = $salario_bruto - ($salario_bruto * ($total_deducciones / 100));

    $sql_pagos = "INSERT INTO pagos (empleado_id, fecha_pago, salario_bruto, salario_neto) VALUES ($empleado_id, NOW(), $salario_bruto, $salario_neto)";

    if ($conn->query($sql_pagos) === TRUE) {
        echo "Pago registrado para el empleado ID: $empleado_id <br>";
    } else {
        echo "Error: " . $sql_pagos . "<br>" . $conn->error;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcular Nómina</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Calcular Nómina</h1>
    </header>
    <main>
        <h2>Empleados</h2>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Puesto</th>
                    <th>Salario</th>
                    <th>Calcular</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($empleado = $empleados->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($empleado['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($empleado['puesto']); ?></td>
                        <td><?php echo "$" . number_format($empleado['salario'], 2); ?></td>
                        <td><a href="generar_recibo.php?id=<?php echo $empleado['id']; ?>">Generar Recibo</a></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </main>
</body>
</html>