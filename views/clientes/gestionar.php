<h1>Gestionar Clientes</h1>

<a href="<?=base_url?>cliente/registro" class="boton boton-peque">Agregar Nuevo Cliente</a>

<table border="1">
    <tr>
        <th>NOMBRE</th>
        <th>APELLIDOS</th>
        <th>EMPRESA</th>
        <th>EMAIL</th>
        <th>VENDEDOR</th>
        <th>GESTIONADOR</th>
        <th>FECHA REGISTRO</th>
    </tr>
    <?php while($cli = $clientes->fetch_object()) : ?>
        <tr>
            <td><?=$cli->nombre;?></td>
            <td><?=$cli->apellidos;?></td>
            <td><?=$cli->empresa;?></td>
            <td><?=$cli->email;?></td>
            <td><?=$cli->vendedor;?></td>
            <td><?=$cli->admin_id;?></td>
            <td><?=$cli->fecha_reg;?></td>
        </tr>
    <?php endwhile; ?>

</table>

