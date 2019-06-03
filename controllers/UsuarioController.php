<?php
require_once 'models/usuario.php';

class usuarioController{

    public function index(){
        echo "Controlador Usuarios, Acción index.";
    }

    public function registro(){
        require_once 'views/usuarios/registro.php';
    }

    public function ingreso(){
        require_once 'views/usuarios/ingreso.php';
    }

    public function save(){
        if(isset($_POST)){

            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;
            $rol = isset($_POST['rol']) ? $_POST['rol'] : false;

            if($nombre && $apellidos && $email && $password && $rol){

                $usuario = new Usuario();
                $usuario->setNombre($nombre);
                $usuario->setApellidos($apellidos);
                $usuario->setEmail($email);
                $usuario->setPassword($password);
                $usuario->setRol($rol);

                $save = $usuario->save();

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
        header("Location:".base_url.'usuario/registro');
    }

    public function login(){
        if(isset($_POST)){
            //Identificar al usuario
            //Consulta a la base de datos
            $usuario = new Usuario();
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);
            
            $identity = $usuario->login();

            //Crear una sesion
            if($identity && is_object($identity)){
                $_SESSION['identity'] = $identity;

                if($identity->rol == 'admin'){
                    $_SESSION['admin'] = true;
                }
            }else{
                $_SESSION['error_login'] = 'Identificacion Fallida';
            }

        }
        header("Location:".base_url);
    }

    public function logout(){
        if(isset($_SESSION['identity'])){
            unset($_SESSION['identity']);
        }
        if(isset($_SESSION['admin'])){
            unset($_SESSION['admin']);
        }
        header("Location:".base_url);
    }

} // FIN CLASE