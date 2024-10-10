<?php 

class Series {
    private $titulo;
    private $ISAN; // 8 digitos
    private $descripcion;
    private $anio_estreno;
    private $puntuacion; // 1 al 5; estrellas como la profe

    public function __construct($titulo, $ISAN,$descripcion,$anio_estreno,$puntuacion)
    {
        $this->titulo = $titulo;
        $this->ISAN = $ISAN;
        $this->descripcion = $descripcion;
        $this->anio_estreno = $anio_estreno;
        $this->puntuacion = $puntuacion;

    }
// comentario
    public function getTitulo() {return $this->titulo;}

	public function getISAN() {return $this->ISAN;}

	public function getDescripcion() {return $this->descripcion;}

	public function getAnioEstreno() {return $this->anio_estreno;}

	public function getPuntuacion() {return $this->puntuacion;}

	public function setTitulo( $titulo): void {$this->titulo = $titulo;}

	public function setISAN( $ISAN): void {$this->ISAN = $ISAN;}

	public function setDescripcion( $descripcion): void {$this->descripcion = $descripcion;}

	public function setAnioEstreno( $anio_estreno): void {$this->anio_estreno = $anio_estreno;}

	public function setPuntuacion( $puntuacion): void {$this->puntuacion = $puntuacion;}

	

}