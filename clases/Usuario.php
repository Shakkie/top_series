<?php 
class Usuario{
    private $id;
    private $nombre;
    private $email;
    private $password;
    private $rol; // puede ser administrador o usuario comun
    


    public function __construct($id,$nombre,$email,$password,$rol){
        $this->id=$id;
        $this->nombre=$nombre;
        $this->email=$email;
        $this->password=$password;
        $this->rol=$rol;
    }

    // getter y setters
    public function getId() {return $this->id;}

    public function getNombre() {return $this->nombre;}

	public function getEmail() {return $this->email;}

	public function getPassword() {return $this->password;}

	public function getRol() {return $this->rol;}

    public function setId($id): void {$this->id=$id;}

	public function setNombre( $nombre): void {$this->nombre = $nombre;}

	public function setEmail( $email): void {$this->email = $email;}

	public function setPassword( $password): void {$this->password = $password;}

	public function setRol( $rol): void {$this->rol = $rol;}

	
    
}