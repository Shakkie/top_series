<?php
session_start();
include_once 'clases/ConexionBD.php';
include_once 'clases/Usuario.php';
include_once 'clases/Serie.php';

if (!isset($_SESSION['email'])) {
    echo "Error: Usuario no autenticado";
    exit();
}

$email = $_SESSION['email'];
$con = ConexionBD::getConnection();

$userId = Serie::getUserId($con, $email);
if (!$userId) {
    echo "Error: Usuario no encontrado";
    exit();
}

if (isset($_POST['titulo'])) {
    $titulo = $_POST['titulo'];
} else {
    $titulo = null;
}

if (isset($_POST['puntuacion'])) {
    $puntuacion = $_POST['puntuacion'];
} else {
    $puntuacion = null;
}

if ($titulo && $puntuacion) {
    $isan = Serie::obtenerISANDeTitulo($titulo);
    if ($isan) {
        if (Serie::existePuntuacion($con, $isan, $userId)) {
            if (Serie::updatePuntuacion($con, $puntuacion, $isan, $userId)) {
                header("Location: MisPuntuaciones.php");
                exit();
            } else {
                echo "Error al actualizar la puntuacion";
            }
        } else {
            if (Serie::insertarPuntuacion($con, $isan, $userId, $puntuacion)) {
                header("Location: MisPuntuaciones.php");
                exit();
            } else {
                echo "Error al insertar la puntuacion";
            }
        }
    } else {
        echo "Error: Titulo no encontrado";
    }
} else {
    echo "Error: Datos incompletos";
}
