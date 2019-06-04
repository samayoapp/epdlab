<h1>Gestionar Proyectos</h1>

<a href="<?=base_url?>proyecto/crear" class="boton boton-peque">Crear Nuevo Proyecto</a>

<table border="1">
    <tr>
        <th>NOMBRE</th>
        <th>CIUDAD</th>
        <th>DESCRIPCIÓN</th>
        <th>FECHA</th>
    </tr>
    <?php while($pro = $proyectos->fetch_object()) : ?>
        <tr>
            <td>
                <a href="<?=base_url?>proyecto/ver&=<?=$pro->id?>"><?=$pro->nombre;?></a>
            </td>
            <td><?=$pro->ciudad;?></td>
            <td><?=$pro->descripcion;?></td>
            <td><?=$pro->fecha_crea;?></td>
        </tr>
    <?php endwhile; ?>

</table>

<a href="<?=base_url?>equipo/editar?=<?=$equi->id?>" class="boton boton-blue">Editar</a>


<!--

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

-->

