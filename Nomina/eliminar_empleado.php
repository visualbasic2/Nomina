<?php
require 'conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM empleados WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Empleado eliminado exitosamente";
    } else {
        echo "Error al eliminar empleado: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
