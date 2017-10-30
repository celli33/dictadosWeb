<body>
  <div class="container">
    <form class="registro" action="<?php echo base_url();?>index.php/Welcome/registrarse" method="post">
        <div class="campo">
          <label for="nombre">Nombre: </label>
          <input type="text" id="nombre" name="nombre" placeholder="tu nombre">
        </div>
        <div class="campo">
            <label for="paterno">Apellido Paterno: </label>
            <input type="text" id="paterno" name="paterno" placeholder="tu apellido paterno">
        </div>
        <div class="campo">
            <label for="materno">Apellido Materno: </label>
            <input type="text" id="materno" name="materno" placeholder="tu apellido materno">
        </div>
        <div class="campo">
          <label for="usuario">Usuario: </label>
          <input type="text" id="usuario" name="usuario" placeholder="tu usuario">
        </div>
        <div class="campo">
            <label for="email">Email: </label>
            <input type="email" id="email" name="email" placeholder="tu email">
        </div>
        <div class="campo">
            <label for="contraseña">Contraseña: </label>
            <input type="password" id="contraseña" name="contraseña" placeholder="tu contraseña">
        </div>
        <input type="submit" id="button" class="btn-flat" value="enviar" class="boton">
    </form>    
  </div><!--container-->
</body>
