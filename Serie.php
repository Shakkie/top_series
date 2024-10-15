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
    // comentario hacer funciones separadas del grud, se llama a la funcion y hace la insercion de datos
    // la conexion es una clase estatica 

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
    public function getSeriesBD()
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

    public function meanPuntuation()
    {
        $con = ConexionBD::getConnection();
        $sqlQuery = "select avg(Puntuacion) from puntuacion where ISAN = ?";
        $result = $con->prepare($sqlQuery);
        $result->bindValue(1, $this->getISAN());
        $row = $result->fetch(PDO::FETCH_NUM);
        return $row[0];
    }
}
