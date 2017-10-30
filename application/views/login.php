<body>
  <div class="container">
    <form class="registro" action="<?php echo base_url();?>index.php/Welcome/iniciarSesion" method="post">
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
