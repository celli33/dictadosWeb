<?php if($this->session->userdata('nivel')==2) {?>
  <nav class="nav-extended" >
      <div class="nav-background">
        <div class="pattern active" style="background-image: url('<?php echo base_url();?>/img/nav.png');" ></div>
      </div>
      <div class="nav-wrapper container">
      <a href="#" itemprop="url" class="brand-logo site-logo">Dictados Musicales</a>

      <a href="#" data-activates="nav-mobile" class="button-collapse top-nav full hide-on-large-only"><i class="material-icons">menu</i></a>

      <ul class="right hide-on-med-and-down">
        <li><a href="<?php echo base_url();?>index.php/Welcome/maestro" class="waves-effect waves-light">Inicio</a></li>
        <li><a href="<?php echo base_url();?>index.php/Welcome/verGrupos" class="waves-effect waves-light">Ver Grupos</a></li>
        <li><a href="#" class="waves-effect waves-light"><i class="material-icons">search</i></a></li>
        <li><a href="<?php echo base_url();?>index.php/Welcome/cerrarSesion" class="waves-effect waves-light">Cerrar Sesión</a></li>
      </ul>
    </div>
    <div class="nav-header center">
      <h1>Bienvenid@ Maestr@ <?php echo $this->session->userdata('nombre')?></h1>
      <div class="tagline">Vamo a reprobarlos :v (Luego lo quitan) xD</div>
    </div>
  </nav>

  <ul class="side-nav" id="nav-mobile">
    <li><div class="user-view">
      <div class="background">
        <img src="<?php echo base_url();?>img/fondo.jpg">
      </div>
      <a href="#!user"><img class="circle" src="<?php echo base_url();?>img/doe.jpg"></a>
      <a href="#!name"><span class="white-text name"><?php echo $this->session->userdata('nombre')?></span></a>
      <a href="#!email"><span class="white-text email"><?php echo $this->session->userdata('correo')?></span></a>
    </div></li>
    <li><a href="<?php echo base_url();?>index.php/Welcome/maestro" class="waves-effect waves-teal"><i class="material-icons left">home</i>Inicio</a></li>
    <li><a href="<?php echo base_url();?>index.php/Welcome/verGrupos" class="waves-effect waves-teal"><i class="material-icons left">people</i>Ver Grupos</a></li>
    <li><a href="<?php echo base_url();?>index.php/Welcome/cerrarSesion" class="waves-effect waves-teal"><i class="material-icons left">exit_to_app</i>Cerrar Sesión</a></li>
    <li><a href="#" class="waves-effect waves-teal"><i class="material-icons left">search</i>Buscar</a></li>
  </ul>
<?php }
else
    redirect('/Welcome/index/', 'location');
?>