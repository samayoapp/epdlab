<?php

class Equipo{
    private $id;
    private $proyecto_id;
    private $nombre;
    private $marca;
    private $modelo;
    private $serie;
    private $fabricante;
    private $descripcion;
    private $fecha_crea;
    private $imagen;

    private $db;
   
    //CONSTRUCTOR

    public function __construct() {
        $this->db = Database::connect();
    }

    //GETTERS

    public function getId(){
        return $this->id;
    }

    public function getProyecto_id(){
        return $this->proyecto_id;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getMarca(){
        return $this->marca;
    }

    public function getModelo(){
        return $this->modelo;
    }

    public function getSerie(){
        return $this->serie;
    }

    public function getFabricante(){
        return $this->fabricante;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function getFecha_crea(){
        return $this->fecha_crea;
    }

    public function getImagen(){
        return $this->imagen;
    }

        
    // SETTERS

    public function setId($id){
        $this->id = $id;
    }

    public function setProyecto_id($proyecto_id){
        $this->proyecto_id = $proyecto_id;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setMarca($marca){
        $this->marca = $marca;
    }

    public function setModelo($modelo){
        $this->modelo = $modelo;
    }

    public function setSerie($serie){
        $this->serie = $serie;
    }

    public function setFabricante($fabricante){
        $this->fabricante = $fabricante;
    }

    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    public function setFecha_crea($fecha_crea){
        $this->fecha_crea = $fecha_crea;
    }

    public function setImagen($imagen){
        $this->imagen = $imagen;
    }
  
    // OTROS MÉTODOS - ACCIONES

    public function getAll(){
        $sql = "SELECT * FROM equipos ORDER BY id DESC;";
        $equipos = $this->db->query($sql);

        return $equipos;
    }

}//FIN DE CLASE
    



