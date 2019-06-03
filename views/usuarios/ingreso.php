<?php if(!isset($_SESSION['identity'])) : ?>
<div id="login">
        
        
        <img src="<?=base_url?>img/identify.png"/>
        <h2>IDENTIFÍQUESE</h2>
        <p>
            Si tiene un usuario y contraseña para revisar 
            un resumen de los resultados de las pruebas 
            de sus equipos, ingréselos aquí.
        </p>

            <div id="formulario_login">
            <form action="<?=base_url?>usuario/login" method="POST">
                <label for="email" >Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" 
                aria-describedby="emailHelp" placeholder="Ingrese su correo electrónico" 
                name="email" />

                <label for="password">Contraseña</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Ingrese su clave"/>
            </div>
                <button type="submit" class="boton">Ingresar</button>
            </form>


</div>
<?php endif; ?>