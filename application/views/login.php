<body>
  <div class="container">
    <form class="registro" action="<?php echo base_url();?>index.php/Welcome/iniciarSesion" method="post">
        <div class="campo">
            <label for="email">Email: </label>
            <?php echo form_error('email');?>
            <input type="email" id="email" class="validate" name="email" placeholder="tu email">
        </div>
        <div class="campo">
            <label for="contraseña">Contraseña: </label>
            <?php echo form_error('contraseña');?>
            <input type="password" id="contraseña" name="contraseña" placeholder="tu contraseña">
        </div>
        <input type="submit" id="button" class="btn-flat" value="enviar" class="boton">
    </form>    
  </div><!--container-->
</body>
