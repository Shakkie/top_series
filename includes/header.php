<?php

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Series</title>
    <link rel="stylesheet" href="css/style.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
</head>
<body>
    <h1>Mi web de series</h1>
    <header>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="ListTopSeries.php">Todas las series</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="MisPuntuaciones.php">Mis puntuaciones</a>
                </li>

                <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'administrador'): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../administrador/series_admin/gestion_series.php">Gestionar series</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../administrador/gestion_user.php">Gestionar usuarios</a>
                    </li>
                <?php endif; ?>

                <li class="nav-item">
                    <a class="nav-link" href="PerfilGeneral.php">Mi perfil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="includes/logout.php">Salir</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
    </header>

