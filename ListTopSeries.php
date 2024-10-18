<?php 
session_start();
include_once 'clases/ConexionBD.php'; 
include_once 'clases/Usuario.php';
include_once 'clases/Serie.php';
if (!isset($_SESSION['email'])) {
     header("Location: login.php");
     exit();
 }
/*Muestra la lista de todas las series, con sus puntuaciones en media por estrellas.
     */
    $email = $_SESSION['email'];
$usuario = Usuario::getUsuarioBD($email);
$series = Serie::getSeriesBD();



$pageTitle = 'Top series';
 include_once 'includes/header.php'; 
?>
<div class="top_series">
    <h2>Top Series</h2>
    <?php if (!empty($series)): ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Título</th>
                <th scope="col">Año de estreno</th>
                <th scope="col">Puntuación Media</th>¡
            </tr>
        </thead>
        <tbody>
                <?php foreach ($series as $serie): ?>
                    <tr>    <!-- la descripcion que salga como tittle pasando el mouse por el titulo de la serie -->
                        <td title="<?php echo htmlspecialchars($serie->getDescripcion()); ?>"><?php echo htmlspecialchars($serie->getTitulo()); ?></td>
                        <td><?php echo htmlspecialchars($serie->getAnioEstreno()); ?></td>
                        <td>
                            <?php $mediapuntuacion = $serie->meanPuntuation();?>
                            <?php echo htmlspecialchars($mediapuntuacion); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
        </tbody>
    </table>
            <?php else: ?>
                <tr>
                    <td colspan="2">No hay series puntuadas disponibles.</td>
                </tr>
            <?php endif; ?>
    
</div>
<?php 
include_once 'includes/footer.php';
?>

