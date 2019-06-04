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

} // FIN CLASE