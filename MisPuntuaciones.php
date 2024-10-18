<?php 
session_start();
include_once 'clases/ConexionBD.php'; 
include_once 'clases/Usuario.php';
include_once 'clases/Serie.php';

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
$series = Serie::getSeriesBD();

$pageTitle = 'Puntuar Series';
include_once 'includes/header.php'; 
?>
<div class="mis_puntuaciones">
    <h2>Puntuar Series</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Título de la Serie</th>
                <th scope="col">Puntuación Actual</th>
                <th scope="col">Estrellas</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($series as $serie): 
                $titulo = $serie->getTitulo(); 
                if (isset($puntuaciones[$titulo])) {
                    $puntuacionActual = $puntuaciones[$titulo];
                } else {
                    $puntuacionActual = 'No puntuado';
                }?>
                <tr>
                    <td title="<?php echo htmlspecialchars($serie->getDescripcion()); ?>"><?php echo htmlspecialchars($titulo); ?></td>
                    <td><?php echo htmlspecialchars($puntuacionActual); ?></td>
                    <td>
                        <form method="POST" action="actualizar_puntuacion.php" class="formulario_select">
                            <select name="puntuacion" class="form-select puntuar" aria-label="Seleccionar puntuación">
                                <option value="">Puntuar</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <input type="hidden" name="titulo" value="<?php echo htmlspecialchars($titulo); ?>">
                            <button type="submit" class="btn btn-primary mt-2">Actualizar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php
include_once 'includes/footer.php'; 
?>
