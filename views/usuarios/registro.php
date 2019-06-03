<h1>Registre un Usuario Aquí</h1>

<?php if(isset($_SESSION['register']) && $_SESSION['register'] == 'complete'): ?>
    <strong class="alerta alerta-exito">Registro Completado Correctamente</strong>
<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
    <strong class="alerta alerta-error">Registro Fallido, introduce bien los datos.</strong>
<?php endif; ?>
<?php Utilities::deleteSession('register'); ?>

<div id="formulario">
    <form action="<?=base_url?>usuario/save" method="POST">

        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" />
        
        <label for="apellidos">Apellidos</label>
        <input type="text" name="apellidos" />
        
        <label for="email">Email</label>
        <input type="email" name="email" />

        <label for="password">Contraseña</label>
        <input type="password" name="password" />
                
        <label for="rol">Permisos</label>
        <select name="rol">
            <option value="basic">Básico</option>
            <option value="admin">Administrador</option>
        </select>
        
        <input type="submit" name="submit" value="Registrar" />

    </form>

</div>        

