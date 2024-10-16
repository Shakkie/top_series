<?php
session_start();
include_once 'clases/ConexionBD.php'; 
include_once 'clases/Usuario.php'; 

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (!empty($email) && !empty($password)) {
        // Verifica usuario
        $usuario = Usuario::getVerificarUsuario($email, $password);
        
        if ($usuario) {
            var_dump($usuario);
            $_SESSION['email'] = $usuario['Email']; 
            $_SESSION['rol'] = $usuario['Rol'];
            
            
            header("Location: Perfilgeneral.php");
            exit();
        } else {
            $error = "Email o contraseña incorrectos.";
        }
    } else {
        $error = "Introduce email o contraseña.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Top Series - Login</title>
</head>
<body>
    <div class="contenedor">
        <h1>Bienvenido al Top Series</h1>
        <form method="POST" action="">
            <label for="email">Email: </label><br>
            <input type="email" name="email" id="email" ><br>
            <label for="password">Contraseña: </label><br>
            <input type="password" name="password" id="password" ><br>
            <input type="submit" value="Iniciar sesión">
            <input type="reset" value="Restablecer">
        </form>
        <?php if (!empty($error)): ?>
            <p style='color:red;'><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
    </div>
</body>
</html>

