<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuario</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Registrar Usuario</h1>
    </header>
    <main>
        <form action="registrar_usuario.php" method="post" class="register-form">
            <div class="form-group">
                <label for="username">Usuario:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="rol">Rol:</label>
                <select id="rol" name="rol" required>
                    <option value="administrador">Administrador</option>
                    <option value="operador">Operador</option>
                </select>
            </div>
            <button type="submit" class="register-button">Registrar</button>
        </form>
    </main>
</body>
</html>
