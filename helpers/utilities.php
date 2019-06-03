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
}