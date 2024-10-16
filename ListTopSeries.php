<?php 
session_start();
include_once 'clases/ConexionBD.php'; 
include_once 'clases/Usuario.php';
if (!isset($_SESSION['email'])) {
     header("Location: login.php");
     exit();
 }
/*Muestra la lista de todas las series, con sus puntuaciones en media por estrellas.
     */
    $email = $_SESSION['email'];
$usuario = Usuario::getUsuarioBD($email);
$puntuaciones = $usuario->getPuntuations();

$pageTitle = 'Top series';
 include_once 'includes/header.php'; 
?>
<div class="top_series">
    <h2>Top Series</h2>
    
    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Puntuación</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($puntuaciones)): ?>
                <?php foreach ($puntuaciones as $puntuacion): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($puntuacion['titulo']); ?></td>
                        <td><?php echo htmlspecialchars($puntuacion['puntuacion']); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="2">No hay series puntuadas disponibles.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php 
include_once 'includes/footer.php';
?>

