<?php 

// el usuario tiene que comparar tu contraseña, y si son las mismas entra, puedo buscarlo por usuario, usuario y contraseña, con un select con where 

// por perplexity 
class ConexionBD {
    // para que no me error tengo que especificar el puerto y el host
    private static $host = '127.0.0.1';
    private static $dbname = 'TopSeries';
    private static $user = '';
    private static $pass = '';
    private static $port = '3310';
    private static $pdo = null; // se inicializa a null para que se pueda usar la funcion estática de la conexion
    // comprueba que no haya sido inicializada para iniciarla

    public static function getConnection() {
        if (self::$pdo === null) {
            try {
                $dsn = "mysql:host=" . self::$host . ";port=" . self::$port . ";dbname=" . self::$dbname . ";charset=utf8";
                self::$pdo = new PDO($dsn, self::$user, self::$pass);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // echo " conexion exitosa";
            } catch (PDOException $e) {
                throw new Exception("Error de conexión: " . $e->getMessage());
            }
        }
        return self::$pdo;
    }
}