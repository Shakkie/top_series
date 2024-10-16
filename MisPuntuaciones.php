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
    echo "Error: Usuario no encontrado";
    exit();
}

$puntuaciones = $usuario->getPuntuations(); 

/* Es una lista con las series, una leve descripcion y el ultimo cuadro son las estrellas que se le va dando, al hacer click 
se puede ir cambiando la puntuacion, sobre la estrella */
$pageTitle = 'Mis puntuaciones';
include_once 'includes/header.php'; 
?>
<div class="mis_puntuaciones">
    <h2>Mis Puntuaciones</h2>
    <?php if (!empty($puntuaciones)): ?>
        <table>
            <thead>
                <tr>
                    <th>Título de la Serie</th>
                    <th>Puntuación</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach ($puntuaciones as $titulo => $puntuacion): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($titulo);?></td>
                        <td><?php echo htmlspecialchars($puntuacion); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No has puntuado ninguna serie aún</p>
    <?php endif; ?>
</div>
<?php
include_once 'includes/footer.php'; 
?>