<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Top Series</title>
    <link rel="stylesheet" href="css/style.css"> 
</head>
<body>
    <h1>Mi web de series</h1>
    <header>
        <nav>
            <ul>
                <li><a href="../ListTopSeries.php">Todas las series</a></li>
                <li><a href="../MisPuntuaciones.php">Mis puntuaciones</a></li>
                <li><a href="../usuario/PerfilGeneralUsuario.php">Mi perfil</a></li>
                <li><a href="../logout.php">Salir</a></li>
            </ul>
        </nav>
        <!-- si el usuario es administrador se verá otro nav, mirar si lo puedo manejar aqui-->
    </header>