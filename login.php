<?php
session_start();
include_once 'clases/ConexionBD.php'; 
include_once 'clases/Usuario.php'; 

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (!empty($email) && !empty($password)) {
        // verificar
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
 
    <title>Top Series - Login</title>
</head>
<body>
    <div class="contenedor">
        <h1>Bienvenido a Top Series</h1>
        <form method="POST" action="" class="formulario">
            <div class="mb-3">
                <label for="email" class="form-label">Email </label>
                <input type="email"name="email" class="form-control" id="email" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña </label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary" >Iniciar Sesión</button>
        </form>
       
        <?php if (!empty($error)): ?>
            <p style='color:red;'><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
    </div>
</body>
</html>


