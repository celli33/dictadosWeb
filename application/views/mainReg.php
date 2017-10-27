<body>

  <div class="container">
    <form class="registro" action="index.html" method="post">
        <div class="campo">
          <label for="nombre">Nombre: </label>
          <input type="text" id="nombre" name="nombre" placeholder="tu nombre">
        </div>
        <div class="campo">
                <label for="apellido">Apellidos: </label>
                <input type="text" id="apellidos" name="apellidos" placeholder="tus apellidos">
        </div>
        <div class="campo">
                <label for="email">Email: </label>
                <input type="email" id="email" name="email" placeholder="tu email">
        </div>
        <div class="campo">
                <label for="password">Contraseña: </label>
                <input type="password" id="contraseña" name="contraseña" placeholder="tu contraseña">
        </div>
        <div class="error">

        </div>
    </form>
    <input type="button" id="button" class="btn-flat"value="enviar" class="boton">
  </div><!--container-->
</body>
