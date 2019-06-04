<h1>Gestion de Equipos</h1>

<a href="<?=base_url?>equipo/agregar" class="boton boton-peque">
Agregar nuevo EQUIPO al Proyecto
</a>

<table border="1">
    <tr>
        <th>NOMBRE</th>
        <th>MARCA</th>
        <th>MODELO</th>
        <th>SERIE</th>
    </tr>
    <?php while($equi = $equipos->fetch_object()) : ?>
        <tr>
            <td><?=$equi->nombre;?></td>
            <td><?=$equi->marca;?></td>
            <td><?=$equi->modelo;?></td>
            <td><?=$equi->serie;?></td>
        </tr>
    <?php endwhile; ?>

</table>