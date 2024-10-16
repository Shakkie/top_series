<?php 
class Usuario
{
    private $nombre;
    private $username;
    private $email;
    private $password;
    private $rol; // puede ser administrador o usuario comun


    public function __construct($nombre,$username, $email, $password, $rol)
    {
        $this->nombre = $nombre;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->rol = $rol;
    }

    // getter y setters
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getUsername(){
        return $this->username;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getRol()
    {
        return $this->rol;
    }

    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }
    public function setUsername($username): void{
        $this->username = $username;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function setPassword($password): void
    {
        $this->password = $password;
    }

    public function setRol($rol): void
    {
        $this->rol = $rol;
    }


    // Funciones CRUD
    public function getUsuariosBD()
    {
        $con = ConexionBD::getConnection();
        $sqlQuery = "select * from usuario";
        $result = $con->prepare($sqlQuery);
        $result->execute();
        $usuarios = [];
        $contador = 0;
        while ($row = $result->fetch(PDO::FETCH_NUM)) {
            $usuarios[$contador] = new Usuario($row[1], $row[2], $row[3], $row[4],$row[5]);
            $contador++;
        }
        return $usuarios;
    }
    // un usuario devuelve su informacion
    public static function getUsuarioBD($email){
        $con = ConexionBD::getConnection();
        $sqlQuery = "select nombre, nombre_usuario, email, rol from usuario where Email = ?";
        $result = $con->prepare($sqlQuery);
        $result->bindValue(1, $email);
        $result->execute();
        $usuario = $result->fetch(PDO::FETCH_ASSOC);
        return $usuario;

    }

    public function addUser()
    {
        $con = ConexionBD::getConnection();
        $sqlInsert = "insert into usuario (nombre, email, password, rol) values ( ?, ?, ?, ?)";
        $insert = $con->prepare($sqlInsert);
        $insert->bindValue(1, $this->getNombre());
        $insert->bindValue(2, $this->getEmail());
        $insert->bindValue(3, $this->getPassword());
        $insert->bindValue(4, $this->getRol());
        $insert->execute();
    }

    public function getPuntuations()
    {
        $con = ConexionBD::getConnection();
        $sqlQuery = "select titulo, puntuacion, descripcion, anio_estreno from puntuacion p natural join serie s inner join usuario u on p.ID = u.ID where u.Email = ?";
        $result = $con->prepare($sqlQuery);
        $result->bindValue(1, $this->getEmail());
        $result->execute();
        $puntuaciones = [];
        while ($row = $result->fetch(PDO::FETCH_NUM)) {
            $puntuaciones[$row[0]] = $row[1];
        }
        return $puntuaciones;
    }

    
}
