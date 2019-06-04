<h1>Gestion de Equipos</h1>

<a href="<?=base_url?>equipo/crear" class="boton boton-peque">
Agregar nuevo EQUIPO al Proyecto
</a>

<table border="1">
    <tr>
        <th>NOMBRE</th>
        <th>MARCA</th>
        <th>MODELO</th>
        <th>SERIE</th>
        <th>ACCIONES</th>
    </tr>
    <?php while($equi = $equipos->fetch_object()) : ?>
        <tr>
            <td>
                <a href="<?=base_url?>equipo/ver&=<?=$equi->id?>"   ><?=$equi->nombre;?></a>
            </td>
            <td><?=$equi->marca;?></td>
            <td><?=$equi->modelo;?></td>
            <td><?=$equi->serie;?></td>
            <td>
                <a href="<?=base_url?>equipo/editar&id=<?=$equi->id?>" class="boton boton-blue">Editar</a>
                <a href="<?=base_url?>equipo/eliminar&id=<?=$equi->id?>" class="boton boton-red">Eliminar</a>
            </td>
        </tr>
    <?php endwhile; ?>

</table>