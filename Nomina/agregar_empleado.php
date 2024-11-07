<?php
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $puesto = $_POST['puesto'];
    $salario = $_POST['salario'];

    $stmt = $conn->prepare("INSERT INTO empleados (nombre, puesto, salario) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nombre, $puesto, $salario);

    if ($stmt->execute()) {
        echo "Empleado agregado exitosamente";
    } else {
        echo "Error al agregar empleado: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Empleado</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Agregar Empleado</h1>
    </header>
    <main>
        <form action="agregar_empleado.php" method="post">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="puesto">Puesto:</label>
                <input type="text" id="puesto" name="puesto" required>
            </div>
            <div class="form-group">
                <label for="salario">Salario:</label>
                <input type="text" id="salario" name="salario" required>
            </div>
            <button type="submit" class="button">Agregar Empleado</button>
        </form>
    </main>
</body>
</html>
