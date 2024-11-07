<?php
require 'conexion.php';

$result = $conn->query("SELECT * FROM empleados");
$empleados = $result->fetch_all(MYSQLI_ASSOC);
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleados</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Empleados</h1>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Puesto</th>
                    <th>Salario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($empleados as $empleado): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($empleado['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($empleado['puesto']); ?></td>
                        <td><?php echo "$" . number_format($empleado['salario'], 2); ?></td>
                        <td>
                            <a href="editar_empleado.php?id=<?php echo $empleado['id']; ?>">Editar</a>
                            <a href="eliminar_empleado.php?id=<?php echo $empleado['id']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>
</html>
