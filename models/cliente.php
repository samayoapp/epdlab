<?php

class Cliente{
    private $id;
    private $admin_id;
    private $nombre;
    private $apellidos;
    private $email;
    private $password;
    private $empresa;
    private $ciudad;
    private $vendedor;
    private $fecha_reg;
    
    private $db;
   
    //CONSTRUCTOR

    public function __construct() {
        $this->db = Database::connect();
    }

    //GETTERS

    

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of admin_id
     */ 
    public function getAdmin_id()
    {
        return $this->admin_id;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Get the value of apellidos
     */ 
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Get the value of empresa
     */ 
    public function getEmpresa()
    {
        return $this->empresa;
    }

    /**
     * Get the value of ciudad
     */ 
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * Get the value of vendedor
     */ 
    public function getVendedor()
    {
        return $this->vendedor;
    }

    /**
     * Get the value of fecha_reg
     */ 
    public function getFecha_reg()
    {
        return $this->fecha_reg;
    }

    // SETTERS

    
    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set the value of admin_id
     *
     * @return  self
     */ 
    public function setAdmin_id($admin_id)
    {
        $this->admin_id = $admin_id;

        return $this;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Set the value of apellidos
     *
     * @return  self
     */ 
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Set the value of empresa
     *
     * @return  self
     */ 
    public function setEmpresa($empresa)
    {
        $this->empresa = $empresa;

        return $this;
    }

    /**
     * Set the value of ciudad
     *
     * @return  self
     */ 
    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;

        return $this;
    }

    /**
     * Set the value of vendedor
     *
     * @return  self
     */ 
    public function setVendedor($vendedor)
    {
        $this->vendedor = $vendedor;

        return $this;
    }

    /**
     * Set the value of fecha_reg
     *
     * @return  self
     */ 
    public function setFecha_reg($fecha_reg)
    {
        $this->fecha_reg = $fecha_reg;

        return $this;
    }

    // OTROS MÉTODOS - ACCIONES

    public function getAll(){
        $sql = "SELECT * FROM clientes;";
        $clientes = $this->db->query($sql);
        return $clientes;
    }

    
    public function save(){
        $sql = "INSERT INTO clientes VALUES (null,'{$this->getAdmin_id()}', '{$this->getNombre()}', '{$this->getApellidos()}', '{$this->getEmail()}', '{$this->getPassword()}', '{$this->getEmpresa()}', '{$this->getCiudad()}', '{$this->getVendedor()}', CURDATE());";

        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }
}
    