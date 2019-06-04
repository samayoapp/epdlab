<?php
require_once 'models/equipo.php';

class equipoController{

    public function index(){
        echo "Controlador de Equipos, Acción index.";
    }

    public function gestionar(){
        Utilities::isAdmin();

        $equipo = new Equipo();
        $equipos = $equipo->getAll();

        require_once 'views/equipos/gestionar.php';
    }

    public function crear(){
        Utilities::isAdmin();


        require_once 'views/equipos/crear.php';
    }

    /*  private $id;
            private $proyecto_id;
            private $nombre;
            private $marca;
            private $modelo;
            private $serie;
            private $fabricante;
            private $descripcion;
        private $fecha_crea;
            private $imagen;
    */

    public function save(){
        Utilities::isAdmin();

        if(isset($_POST)){

            $proyecto_id = isset($_POST['proyecto']) ? $_POST['proyecto'] : false;
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $marca = isset($_POST['marca']) ? $_POST['marca'] : false;
            $modelo = isset($_POST['modelo']) ? $_POST['modelo'] : false;
            $serie = isset($_POST['serie']) ? $_POST['serie'] : false;
            $fabricante = isset($_POST['fabricante']) ? $_POST['fabricante'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            //$imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;


            if($proyecto_id && $nombre && $marca && $modelo && $serie && $fabricante && $descripcion){

                $admin_id = $_SESSION['identity']->id;
                
                $equipo = new Equipo();
                $equipo->setProyecto_id($proyecto_id);
                $equipo->setNombre($nombre);
                $equipo->setMarca($marca);
                $equipo->setModelo($modelo);
                $equipo->setSerie($serie);
                $equipo->setFabricante($fabricante);
                $equipo->setDescripcion($descripcion);

                //Guardar la Imagen
                $archivo = $_FILES['imagen'];
                $filename = $archivo['name'];
                $mimetype = $archivo['type'];

                if($mimetype == "image/jpg"  || $mimetype == "image/jpeg" || $mimetype == "image/png" || $mimetype == "image/gif"){
                    
                    if(!is_dir('uploads/images')){
                        mkdir('uploads/images', 0777, true);
                    }

                    $equipo->setImagen($filename);
                    move_uploaded_file($archivo['tmp_name'], 'uploads/images/'.$filename);
                }

                $save = $equipo->save();
                if($save){
                    $_SESSION['equipo'] = "complete";
                }else{
                    $_SESSION['equipo'] = "Failed";
                }
            }else{
                $_SESSION['equipo'] = "Failed";
            }
        }else{
            $_SESSION['equipo'] = "Failed";
        }
        header("Location:".base_url."equipo/gestionar");
    }

    public function editar(){

    }

    public function eliminar(){
        Utilities::isAdmin();

        if(isset($_GET['id'])){
            $id = $_GET['id'];

            $equipo = new Equipo();
            $equipo->setId($id);

            $delete = $equipo->delete();

            if($delete){
                $_SESSION['delete'] = 'complete';
            }else{
                $_SESSION['delete'] = 'failed';
            }
        }else{
            $_SESSION['delete'] = 'failed';
        }
        header("Location:".base_url.'equipo/gestionar');
    }

} // FIN CLASE