<?php 


// para que nome de error especificar el puerto y el host
$host = '127.0.0.1'; // O 'localhost'
$dbname = 'tienda';
$user = 'root';
$pass = '';
$port = '3310'; //en alguna parte me debe estar redirigiendo al puerto al 3306

try {
    $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8";
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión exitosa";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}