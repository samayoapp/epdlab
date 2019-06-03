<aside id="sidebar">

<?php if(isset($_SESSION['identity'])) : ?>

    <div>
        <h2>Bienvenido (a) <?=$_SESSION['identity']->nombre?> <?=$_SESSION['identity']->apellidos?></h2>

    </div>
    
    <div id="menu_log">
        <h3>Que desea hacer</h3>
        <!-- Botones -->
        <ul>
            <li>
                <a href="<?=base_url?>proyecto/gestionar" class="boton">Proyectos</a>
            </li>
            <li>
                <a href="<?=base_url?>usuario/registro" class="boton boton-red">Agregar Usuarios</a>
            </li>
            <li>
                <a href="ingresar_informes.php" class="boton boton-green">Agregar Informe</a>
            </li>
            <li>
                <a href="<?=base_url?>usuario/logout" class="boton boton-orange">Cerrar Sesión</a>
            </li>
        </ul>
    </div>
    <div class="clearfix"></div>
<?php endif; ?>
    

</aside>