<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nomina";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$puesto = $_POST['puesto'];
$salario_base = $_POST['salario_base'];
$fecha_contratacion = $_POST['fecha_contratacion'];

$sql = "INSERT INTO empleados (nombre, apellido, puesto, salario_base, fecha_contratacion) VALUES ('$nombre', '$apellido', '$puesto', '$salario_base', '$fecha_contratacion')";

if ($conn->query($sql) === TRUE) {
    echo "Empleado agregado exitosamente. <a href='empleados.php'>Ver empleados</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
