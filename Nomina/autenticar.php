<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nomina";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM usuarios WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        $_SESSION['username'] = $username;
        $_SESSION['rol'] = $row['rol'];
        header("Location: dashboard.php");
    } else {
        echo "Contraseña incorrecta. <a href='login.php'>Intentar de nuevo</a>";
    }
} else {
    echo "Usuario no encontrado. <a href='login.php'>Intentar de nuevo</a>";
}

$conn->close();
?>
