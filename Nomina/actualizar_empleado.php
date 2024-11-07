<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nomina";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$puesto = $_POST['puesto'];
$salario_base = $_POST['salario_base'];
$fecha_contratacion = $_POST['fecha_contratacion'];

$sql = "UPDATE empleados SET nombre='$nombre', apellido='$apellido', puesto='$puesto', salario_base='$salario_base', fecha_contratacion='$fecha_contratacion' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Empleado actualizado exitosamente. <a href='empleados.php'>Ver empleados</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
