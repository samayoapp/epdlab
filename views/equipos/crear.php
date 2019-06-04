<h1>AGREGAR UN NUEVO EQUIPO</h1>

<!--
private $id;
            private $proyecto_id;
        private $nombre;
        private $marca;
        private $modelo;
        private $serie;
        private $fabricante;
        private $descripcion;
    private $fecha_crea;
    private $imagen;
-->

<form action="<?=base_url?>equipo/save" method="POST" class="formulario" enctype="multipart/form-data">

    <label for="proyecto">Proyecto al que Pertenece</label>

        <?php $proyectos = Utilities::showProyectosByAdminId(); ?>
        <select name="proyecto">
            <?php while($pro = $proyectos->fetch_object()): ?>
                <option value="<?=$pro->id?>"> 
                    <?=$pro->nombre?>
                </option>
            <?php endwhile; ?>
        </select>

    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" />

    <label for="marca">Marca</label>
    <input type="text" name="marca" />

    <label for="modelo">Modelo</label>
    <input type="text" name="modelo" />

    <label for="serie">Serie</label>
    <input type="text" name="serie" />

    <label for="fabricante">Faricante</label>
    <input type="text" name="fabricante" />

    <label for="descripcion">Descripción</label>
    <textarea rows="4" cols="50" name="descripcion" placeholder="Datos importantes del equipo"></textarea>
   
    <label for="imagen">Imagen</label>
    <input type="file" name="imagen" />

    <input type="submit" value="Agregar Equipo" />
</form>



