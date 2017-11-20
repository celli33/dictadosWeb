<?php if($this->session->userdata('nivel')==3) {?>
  <nav class="nav-extended" >
      <div class="nav-background">
        <div class="pattern active" style="background-image: url('<?php echo base_url();?>/img/nav.png');" ></div>
      </div>
      <div class="nav-wrapper container">
      <a href="#" itemprop="url" class="brand-logo site-logo">Dictados Musicales</a>

      <a href="#" data-activates="nav-mobile" class="button-collapse top-nav full hide-on-large-only"><i class="material-icons">menu</i></a>

      <ul class="right hide-on-med-and-down">
        <li><a href="<?php echo base_url();?>index.php/Welcome/alumno" class="waves-effect waves-light">Inicio</a></li>
        <li><a href="#" class="waves-effect waves-light">Iniciar Dictado</a></li>
        <li><a href="#" class="waves-effect waves-light">Examen de práctica</a></li>
        <li><a href="#" class="waves-effect waves-light"><i class="material-icons">search</i></a></li>
        <li><a href="<?php echo base_url();?>index.php/Welcome/cerrarSesion" class="waves-effect waves-light">Cerrar Sesión</a></li>
      </ul>
    </div>
    <div class="nav-header center">
      <h1>Bienvenid@ <?php echo $this->session->userdata('nombre')?></h1>
      <div class="tagline">Vamo a reprobar :v (Luego lo quitan) xD</div>
    </div>
  </nav>

  <ul class="side-nav" id="nav-mobile">
    <li><a href="#" class="waves-effect waves-blue"><i class="material-icons left">home</i>Inicio</a></li>
    <li><a href="#" class="waves-effect waves-blue"><i class="material-icons left">play_arrow</i>Iniciar Dictado</a></li>
    <li><a href="#" class="waves-effect waves-blue"><i class="material-icons left">description</i>Examen de práctica</a></li>
    <li><a href="#" class="waves-effect waves-blue"><i class="material-icons left">output</i>Cerrar Sesión</a></li>
    <li><a href="#" class="waves-effect waves-blue"><i class="material-icons left">search</i>Buscar</a></li>
  </ul>
<?php }
else
    redirect('/Welcome/index/', 'location');
?>