<?php
class Usuario
{
    private $nombre;
    private $email;
    private $password;
    private $rol; // puede ser administrador o usuario comun


    public function __construct($nombre, $email, $password, $rol)
    {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->password = $password;
        $this->rol = $rol;
    }

    // getter y setters
    public function getNombre()
    {
        return $this->nombre;
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
            $usuarios[$contador] = new Usuario($row[1], $row[2], $row[3], $row[4]);
            $contador++;
        }
        return $usuarios;
    }

    public function addUser($usuario)
    {
        $con = ConexionBD::getConnection();
        $sqlInsert = "insert into usuario (nombre, email, password, rol) values ( ?, ?, ?, ?)";
        $insert = $con->prepare($sqlInsert);
        $insert->bindValue(1, $usuario->getNombre());
        $insert->bindValue(2, $usuario->getEmailç());
        $insert->bindValue(3, $usuario->getPassword());
        $insert->bindValue(4, $usuario->getRol());
        $insert->execute();
    }
}
