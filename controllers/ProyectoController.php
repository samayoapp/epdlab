<?php
require_once 'models/proyecto.php';

class proyectoController{

    public function index(){
        echo "Controlador de Proyectos, Acción index.";
    }

    public function gestionar(){
        Utilities::isAdmin();
        $admin_id = $_SESSION['identity']->id;

        $proyecto = new Proyecto();
        $proyecto->setAdmin_id($admin_id);
        $proyectos = $proyecto->getAll();

        require_once 'views/proyectos/gestionar.php';
    }

    public function crear(){
        require_once 'views/proyectos/crear.php';
    }
    
    public function save(){
        Utilities::isAdmin();

        if(isset($_POST)){
            $cliente_id = isset($_POST['cliente']) ? $_POST['cliente'] : false;
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $ciudad = isset($_POST['ciudad']) ? $_POST['ciudad'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;

            if($cliente_id && $nombre && $ciudad && $descripcion){

                $admin_id = $_SESSION['identity']->id;
                
                $proyecto = new Proyecto();
                $proyecto->setAdmin_id($admin_id);
                $proyecto->setCliente_id($cliente_id);
                $proyecto->setNombre($nombre);
                $proyecto->setCiudad($ciudad);
                $proyecto->setDescripcion($descripcion);

                $save = $proyecto->save();
                if($save){
                    $_SESSION['proyecto'] = "complete";
                }else{
                    $_SESSION['proyecto'] = "Failed";
                }
            }else{
                $_SESSION['proyecto'] = "Failed";
            }
        }else{
            $_SESSION['proyecto'] = "Failed";
        }
        header("Location:".base_url."proyecto/gestionar");
    }
} // FIN CLASE
