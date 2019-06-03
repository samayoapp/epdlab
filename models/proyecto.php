<?php

class Proyecto{
    private $id;
    private $admin_id;
    private $cliente_id;
    private $nombre;
    private $ciudad;
    private $descripcion;
    private $fecha_crea;

    private $db;
   
    //CONSTRUCTOR

    public function __construct() {
        $this->db = Database::connect();
    }

    //GETTERS

    public function getId(){
        return $this->id;
    }

    public function getAdmin_id(){
        return $this->admin_id;
    }

    public function getCliente_id(){
        return $this->cliente_id;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getCiudad(){
        return $this->ciudad;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function getFecha_crea(){
        return $this->fecha_crea;
    }
    
    // SETTERS

    public function setId($id){
        $this->id = $id;
    }

    public function setAdmin_id($admin_id){
        $this->admin_id = $admin_id;
    }

    public function setCliente_id($cliente_id){
        $this->cliente_id = $cliente_id;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setCiudad($ciudad){
        $this->ciudad = $ciudad;
    }

    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    public function setFecha_crea($fecha_crea){
        $this->fecha_crea = $fecha_crea;
    }
    
    // OTROS MÉTODOS - ACCIONES

    public function getAll(){
        $sql = "SELECT * FROM proyectos WHERE admin_id = '{$this->getAdmin_id()}' ORDER BY id DESC;";
        $proyectos = $this->db->query($sql);
        return $proyectos;
    }

    public function save(){
        $sql = "INSERT INTO proyectos VALUES (null,'{$this->getAdmin_id()}', '{$this->getCliente_id()}', '{$this->getNombre()}', '{$this->getCiudad()}', '{$this->getDescripcion()}', CURDATE());";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }

}
    