<?php
include_once 'ConexionBD.php';
class Serie
{
    private $titulo; // puede repetirse
    private $ISAN; // 8 digitos -> no se puede repetir
    private $descripcion;
    private $anio_estreno;

    public function __construct($ISAN, $titulo, $descripcion, $anio_estreno)
    {
        $this->titulo = $titulo;
        $this->ISAN = $ISAN;
        $this->descripcion = $descripcion;
        $this->anio_estreno = $anio_estreno;
    }


    //Getter and Setters
    public function getTitulo()
    {
        return $this->titulo;
    }

    public function getISAN()
    {
        return $this->ISAN;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getAnioEstreno()
    {
        return $this->anio_estreno;
    }

    public function setTitulo($titulo): void
    {
        $this->titulo = $titulo;
    }

    public function setISAN($ISAN): void
    {
        $this->ISAN = $ISAN;
    }

    public function setDescripcion($descripcion): void
    {
        $this->descripcion = $descripcion;
    }

    public function setAnioEstreno($anio_estreno): void
    {
        $this->anio_estreno = $anio_estreno;
    }

    // Funciones grud de series
    public static function getSeriesBD()
    {
        $con = ConexionBD::getConnection();
        $sqlQuery = "select * from serie";
        $result = $con->prepare($sqlQuery);
        $result->execute();
        $series = [];
        $contador = 0;
        while ($row = $result->fetch(PDO::FETCH_NUM)) {
            $series[$contador] = new Serie($row[0], $row[1], $row[2], $row[3]);
            $contador++;
        }
        return $series;
    }

    public function addSerie()
    {
        $con = ConexionBD::getConnection();
        $sqlInsert = "insert into serie values ( ?, ?, ?, ?)";
        $insert = $con->prepare($sqlInsert);
        $insert->bindValue(1, $this->getISAN());
        $insert->bindValue(2, $this->getTitulo());
        $insert->bindValue(3, $this->getDescripcion());
        $insert->bindValue(4, $this->getAnioEstreno());
        $insert->execute();
    }

    // me tira como double y tiene que ser un int
    public function meanPuntuation()
    {
        $con = ConexionBD::getConnection();
        $sqlQuery = "select avg(Puntuacion) from puntuacion where ISAN = ?";
        $result = $con->prepare($sqlQuery);
        $result->bindValue(1, $this->getISAN());
        if($result->execute()){
            $row=$result->fetch(PDO::FETCH_NUM);
            if($row&&isset($row[0])){
                return (int)$row[0];
            }else{
                return "No puntuada";
            }
        }
        return false;
    }
    public static function obtenerISANDeTitulo($titulo) {
        $con = ConexionBD::getConnection();
        $sqlQuery = "select ISAN from serie where Titulo = ?";
        $stmt = $con->prepare($sqlQuery);
        $stmt->bindValue(1, $titulo);
        $stmt->execute();
        $serie = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($serie) {
            return $serie['ISAN'];
        } else {
            return null;
        }
    }

    public static function getUserId($con, $email) {
        $sqlUserId = "select ID from usuario where Email = ?";
        $stmt = $con->prepare($sqlUserId);
        $stmt->bindValue(1, $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            return $user['ID'];
        } else {
            return null;
        }
    }
    public static function insertarPuntuacion($con, $isan, $userId, $puntuacion)
    {
        $sqlInsert = "insert into puntuacion (ISAN, ID, Puntuacion) values (?, ?, ?)";
        $stmtInsert = $con->prepare($sqlInsert);
        $stmtInsert->bindValue(1, $isan);
        $stmtInsert->bindValue(2, $userId);
        $stmtInsert->bindValue(3, $puntuacion);
        return $stmtInsert->execute();
    }
    public static function existePuntuacion($con, $isan, $userId)
    {
        $sqlCheck = "select * from puntuacion where ISAN = ? and ID = ?";
        $stmtCheck = $con->prepare($sqlCheck);
        $stmtCheck->bindValue(1, $isan);
        $stmtCheck->bindValue(2, $userId);
        $stmtCheck->execute();
        return $stmtCheck->rowCount() > 0; 
    }

    public static function updatePuntuacion($con, $puntuacion, $isan, $userId) {
        $sqlUpdate = "update puntuacion set Puntuacion = ? where ISAN = ? and ID = ?";
        $stmt = $con->prepare($sqlUpdate);
        $stmt->bindValue(1, $puntuacion);
        $stmt->bindValue(2, $isan);
        $stmt->bindValue(3, $userId);
        return $stmt->execute();
    }
    
}
