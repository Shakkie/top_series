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
 include_once 'includes/header.php'; 
?>
<div class="top_series">
    <h2>Top Series</h2>
    
    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Descripción</th>
                <th>Año de Estreno</th>
                <th>Puntuación</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($puntuaciones)): ?>
                <?php foreach ($puntuaciones as $titulo => $puntuacion): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($titulo); ?></td>
                        <td><?php echo htmlspecialchars($descripcion); ?></td>
                        <td><?php echo htmlspecialchars($anio_estreno); ?></td>
                        <td><?php echo htmlspecialchars($puntuacion); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">No hay series puntuadas disponibles.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

