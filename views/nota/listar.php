<h3><?=$nota->getNombre();?></h3>
<h4><?=$nota->getContenido();?></h4>

<h1>Listado de Notas</h1>



<?php while($nota = $notas->fetch_object()): ?>

  <h2> <?=$nota->id?> -- <?=$nota->nombre?> </h2>
 
<?php endwhile; ?>


