<?php


session_start(); 

// aqui hacer la comprobacion de si es usuario normal u administrador pasar la info al a bbdd y verificar
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nombre']) && !empty(trim($_POST['nombre']))) {
        $_SESSION['nombre_usuario'] = trim($_POST['nombre']);
        echo "Nombre guardado: " . htmlspecialchars($_SESSION['nombre_usuario']); 
        header("Location: ../Login.php"); 
        exit();
    } else {
        $error = "Introduce un nombre por favor o contraseña";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Top Series</title>
</head>
<body>
    <div class="contenedor">
    <h1>Bienvenido al Top Series</h1>
    <form method="POST" action="">
        <label for="nombre">Nombre Usuario: </label><br>
        <input type="text" name="nombre" id="nombre"><br>
        <label for="password">Contraseña: </label><br>
        <input type="text" name="password" id="password"><br>
        <input type="submit" value="Enviar">
        <input type="reset" value="Restablecer">
    </form>
    <?php //  $error = "Introduce un nombre por favor";
    if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    </div>
</body>
</html>
