<?php 
/*CREATE DATABASE peliculas;

USE peliculas;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL,
    role ENUM('admin', 'user') DEFAULT 'user'
);

CREATE TABLE peliculas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descripcion TEXT,
    ano INT,
    director VARCHAR(255),
    genero VARCHAR(100),
    puntuacion_promedio FLOAT DEFAULT 0
);

CREATE TABLE puntuaciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    id_pelicula INT,
    puntuacion INT CHECK(puntuacion >= 1 AND puntuacion <= 10),
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
    FOREIGN KEY (id_pelicula) REFERENCES peliculas(id),
    UNIQUE(id_usuario, id_pelicula)
);
 */
// para que nome de error especificar el puerto y el host
$host = '127.0.0.1'; // O 'localhost'
$dbname = 'tienda';
$user = 'root';
$pass = 'sanm1919';
$port = '3310'; //en alguna parte me debe estar redirigiendo al puerto al 3306

try {
    $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8";
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión exitosa";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}