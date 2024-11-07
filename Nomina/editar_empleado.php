<?php
require 'conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM empleados WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $empleado = $result->fetch_assoc();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nombre = $_POST['nombre'];
        $puesto = $_POST['puesto'];
        $salario = $_POST['salario'];

        $stmt = $conn->prepare("UPDATE empleados SET nombre = ?, puesto = ?, salario = ? WHERE id = ?");
        $stmt->bind_param("sssi", $nombre, $puesto, $salario, $id);

        if ($stmt->execute()) {
            echo "Empleado actualizado exitosamente";
        } else {
            echo "Error al actualizar empleado: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Empleado</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Editar Empleado</h1>
    </header>
    <main>
        <form action="editar_empleado.php?id=<?php echo $empleado['id']; ?>" method="post">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($empleado['nombre']); ?>" required>
            </div>
            <div class="form-group">
                <label for="puesto">Puesto:</label>
                <input type="text" id="puesto" name="puesto" value="<?php echo htmlspecialchars($empleado['puesto']); ?>" required>
            </div>
            <div class="form-group">
                <label for="salario">Salario:</label>
                <input type="text" id="salario" name="salario" value="<?php echo htmlspecialchars($empleado['salario']); ?>" required>
            </div>
            <button type="submit" class="button">Actualizar Empleado</button>
        </form>
    </main>
</body>
</html>
