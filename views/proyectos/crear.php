<h1>Crear Nuevo Proyecto</h1>

<form action="<?=base_url?>proyecto/save" method="POST" class="formulario">

    <label for="nombre">Nombre del Proyecto</label>
    <input type="text" name="nombre" />

    <label for="ciudad">Ciudad en la que descansa el proyecto</label>
    <input type="text" name="ciudad" />

    <label for="descripcion">Descripción</label>
    <textarea rows="4" cols="50" name="descripcion">Datos relevantes sobre el proyecto</textarea>
   
    <label for="cliente">Asigne a cliente:</label>
    <?php $clientes = Utilities::showClientes(); ?>
        <select name="cliente">
            <?php while($cli = $clientes->fetch_object()): ?>
                <option value="<?=$cli->id?>"> 
                    <?=$cli->nombre?>
                </option>
            <?php endwhile; ?>
        </select>

    <input type="submit" value="Guardar Proyecto" />
</form>



