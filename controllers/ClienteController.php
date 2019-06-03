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

} // FIN CLASE