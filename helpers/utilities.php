<?php

class Utilities{

    public static function deleteSession($name){
        if(isset($_SESSION[$name])){
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);
        }
        return $name;
    }

    public static function isAdmin(){
        if(!isset($_SESSION['admin'])){
            header("Location:".base_url);
        }else{
            return true;
        }
    }

    public static function showClientes(){
        require_once 'models/cliente.php';
        $cliente = new Cliente();
        $clientes = $cliente->getAll();
        return $clientes;
    }

    public static function showProyectos(){
        require_once 'models/proyecto.php';
        $proyecto = new Proyecto();
        $proyectos = $proyecto->getAll();
        return $proyectos;
    }

    public static function showProyectosByAdminId(){
        $admin_id = $_SESSION['identity']->id;
        require_once 'models/proyecto.php';
       
        $proyecto = new Proyecto();
        $proyecto->setAdmin_id($admin_id);
        $proyectos = $proyecto->getSomeByAdminId();
        return $proyectos;
    }
}