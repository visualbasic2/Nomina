<?php
require 'conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM empleados WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $empleado = $result->fetch_assoc();

    // Lógica para generar recibo
    echo "<h1>Recibo de Nómina</h1>";
    echo "<p>Nombre: " . $empleado['nombre'] . "</p>";
    echo "<p>Puesto: " . $empleado['puesto'] . "</p>";
    echo "<p>Salario: $" . number_format($empleado['salario'], 2) . "</p>";
    // Agregar otros detalles del recibo
}
?>
