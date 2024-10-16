<?php

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Series</title>
    <link rel="stylesheet" href="css/style.css"> 
</head>
<body>
    <h1>Mi web de series</h1>
    <header>
        <nav>
            <ul>
                <li><a href="ListTopSeries.php">Todas las series</a></li>
                <li><a href="MisPuntuaciones.php">Mis puntuaciones</a></li>
                
                <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'administrador'): ?>
                    <li><a href="../administrador/series_admin/gestion_series.php">Gestionar series</a></li>
                    <li><a href="../administrador/gestion_user.php">Gestionar usuarios</a></li>
                <?php endif; ?>
                
                <li><a href="PerfilGeneral.php">Mi perfil</a></li>
                <li><a href="includes/logout.php">Salir</a></li>
            </ul>
        </nav>
    </header>

