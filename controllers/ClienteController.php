<?php
require_once 'models/cliente.php';

class clienteController{

    public function index(){
        echo "Controlador de Clientes, Acción index.";
    }

    public function gestionar(){
        $cliente = new Cliente();
        $clientes = $cliente->getAll();

        require_once 'views/clientes/gestionar.php';
    }

    public function registro(){
        require_once 'views/clientes/registro.php';
    }
/*
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

    */

    public function save(){
        if(isset($_POST)){
            Utilities::isAdmin();

            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;
            $empresa = isset($_POST['empresa']) ? $_POST['empresa'] : false;
            $ciudad = isset($_POST['ciudad']) ? $_POST['ciudad'] : false;
            $vendedor = isset($_POST['vendedor']) ? $_POST['vendedor'] : false;

            if($nombre && $apellidos && $email && $password && $empresa && $ciudad && $vendedor){

                $admin_id = $_SESSION['identity']->id;

                $cliente = new Cliente();
                $cliente->setAdmin_id($admin_id);
                $cliente->setNombre($nombre);
                $cliente->setApellidos($apellidos);
                $cliente->setEmail($email);
                $cliente->setPassword($password);
                $cliente->setEmpresa($empresa);
                $cliente->setCiudad($ciudad);
                $cliente->setVendedor($vendedor);

                $save = $cliente->save();

                if($save){
                    $_SESSION['register'] = "complete";
                }else{
                    $_SESSION['register'] = "failed";
                }
            }else{
                $_SESSION['register'] = "failed";
            }
        }else{
            $_SESSION['register'] = "failed";
        }
        header("Location:".base_url.'cliente/gestionar');
    }

} // FIN CLASE