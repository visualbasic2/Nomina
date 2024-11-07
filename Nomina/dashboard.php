<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

$user_role = $_SESSION['role']; // Obtén el rol del usuario (si es administrador o operador)
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Barra de navegación -->
    <header>
        <h1>Bienvenido al Dashboard</h1>
        <nav>
            <ul>
                <li><a href="dashboard.php">Inicio</a></li>
                <li><a href="empleados.php">Consultar Empleados</a></li>
                <li><a href="agregar_empleado.php">Agregar Empleado</a></li>
                <?php if ($user_role == 'administrador') { ?>
                    <li><a href="calcular_nomina.php">Calcular Nómina</a></li>
                    <li><a href="generar_recibo.php">Generar Recibo</a></li>
                    <li><a href="editar_empleado.php">Editar Empleado</a></li>
                    <li><a href="eliminar_empleado.php">Eliminar Empleado</a></li>
                <?php } ?>
                <li><a href="logout.php">Cerrar sesión</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="dashboard-options">
            <h2>Opciones disponibles</h2>
            <div class="options-container">
                <div class="option">
                    <h3>Consultar Empleados</h3>
                    <p>Visualiza todos los empleados registrados en el sistema.</p>
                    <a href="empleados.php" class="button">Ir a Consultar</a>
                </div>
                <div class="option">
                    <h3>Agregar Empleado</h3>
                    <p>Registra nuevos empleados en el sistema.</p>
                    <a href="agregar_empleado.php" class="button">Ir a Agregar</a>
                </div>
                <?php if ($user_role == 'administrador') { ?>
                    <div class="option">
                        <h3>Calcular Nómina</h3>
                        <p>Calcula la nómina de los empleados para este período.</p>
                        <a href="calcular_nomina.php" class="button">Ir a Calcular</a>
                    </div>
                    <div class="option">
                        <h3>Generar Recibo</h3>
                        <p>Genera los recibos de nómina de los empleados.</p>
                        <a href="generar_recibo.php" class="button">Ir a Generar</a>
                    </div>
                    <div class="option">
                        <h3>Editar Empleado</h3>
                        <p>Modifica los datos de un empleado existente.</p>
                        <a href="editar_empleado.php" class="button">Ir a Editar</a>
                    </div>
                    <div class="option">
                        <h3>Eliminar Empleado</h3>
                        <p>Elimina empleados del sistema.</p>
                        <a href="eliminar_empleado.php" class="button">Ir a Eliminar</a>
                    </div>
                <?php } ?>
            </div>
        </section>
    </main>
</body>
</html>
