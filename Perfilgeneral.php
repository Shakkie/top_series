<?php
session_start();
include_once 'clases/ConexionBD.php'; 
include_once 'clases/Usuario.php';


if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$email = $_SESSION['email'];
$usuario = Usuario::getUsuarioBD($email);

if (!$usuario) {
    echo "Error: Usuario no encontrado.";
    exit();
}

$pageTitle = 'Perfil de Usuario';
include_once 'includes/header.php'; 
?>

<div class="perfil_usuario">
    <h2>Perfil de Usuario</h2>
    <p><span>Nombre: </span><?php echo htmlspecialchars($usuario->getNombre()); ?></p>
    <p><span>Nombre de Usuario: </span><?php echo htmlspecialchars($usuario->getUserName()); ?></p>
    <p><span>Email: </span><?php echo htmlspecialchars($usuario->getEmail()); ?></p>
    <p><span>Rol: </span><?php echo htmlspecialchars($usuario->getRol()); ?></p>
</div>

<?php include_once 'includes/footer.php'; ?>

