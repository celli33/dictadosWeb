<?php  header("Access-Control-Allow-Origin: http://localhost"); ?>
<body>

	<div class="parallax-container">
		<div class="parallax"><img src="<?php echo base_url();?>/img/image1.jpg"></div>
	</div>


	<div class="section white" id="notas-sueltas">
		<div class="row container">
		  <h2 class="header">Dictados Notas Sueltas</h2>
		  <p class="grey-text text-darken-3 lighten-3">El dictado de notas sueltas te ayuda a mejorar tu oído absoluto, ya qué al no estar atado a una tonalidad, puedes navegar sobre las notas sin problemas.</p>
			<h5>Instrucciones</h5>
			<p>Presiona en el boton abrir dictado. Cuando estés listo para iniciar presiona en iniciar dictado, luego comienza a escribir las notas según las escuches, al final puedes repetir el dictado o ver tu calificación.</p>
		</div>
		<div class="contenedor notasS" id="notasS">
			<div class="datos-dictado">
				<span class="notas-compas"></span>
				<span class="num-compas"></span>
				<span class="aciertos"></span>
			</div>
			<div class="pentagrama">
				<div class="clave">
					<img src="<?php echo base_url();?>img/gcleff2" alt="clave de sol">
				</div>
				<div class="line-space F6">
						<span class="line"><span class="nota notaF6"></span></span>
				</div>
				<div class="line-space E6">
						<span class="space"><span class="nota notaE6"></span></span>
				</div>
				<div class="line-space D6">
						<span class="line"><span class="nota notaD6"></span></span>
				</div>
				<div class="line-space C6">
						<span class="space"><span class="nota notaC6"></span></span>
				</div>
				<div class="line-space B5">
						<span class="line"><span class="nota notaB5"></span></span>
				</div>
				<div class="line-space A5">
						<span class="space"><span class="nota notaA5"></span></span>
				</div>
				<div class="line-space G5">
						<span class="line"><span class="nota notaG5"></span></span>
				</div>
				<div class="line-space F5">
						<span class="space"><span class="nota notaF5"></span></span>
				</div>
				<div class="line-space E5">
						<span class="line"><span class="nota notaE5"></span></span>
				</div>
				<div class="line-space D5">
						<span class="space"><span class="nota notaD5"></span></span>
				</div>
			</div><!---pentagrama-->
		</div><!--contenedor-->
		<a href="#notasS" class="button botonNotasSueltas"> abrir dictado de Práctica</a>
		<div class="Calificacion">
		</div>
	</div><!--section-->

	<div class="parallax-container">
		<div class="parallax"><img src="<?php echo base_url();?>/img/image2.jpg"></div>
	</div>



	<div class="section white" id="DicRitmico">
		<div class="row container">
		  <h2 class="header">Dictados Rítmicos</h2>
		  <p class="grey-text text-darken-3 lighten-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</div><!--row containier-->
		<div class="container ritmico clearfix">
			<form class="formRitmico clearfix" id="formRitmico">
				<h3 class="pasos">Compas 1</h3>
            <div class="imagen">
              <img class="img1" src="<?php echo base_url();?>img/ritmos/1-good.png" alt="imagen 1">
              <input type="checkbox" name="subject" value="" class="list"> opcion 1
            </div>
            <div class="imagen">
              <img class="img2" src="<?php echo base_url();?>img/ritmos/1-good.png" alt="imagen 2">
              <input type="checkbox" name="subject" value="" class="list"> opcion 2
            </div>
           <!--<div class="imagen">
              <img src="<?php echo base_url();?>img/03.jpg" alt="imagen 3">
              <input type="checkbox" name="subject" value="" class="list"> opcion 3
            </div>
            <div class="imagen">
              <img src="<?php echo base_url();?>img/4-feik.jpg" alt="imagen 4">
              <input type="checkbox" name="subject" value="" class="list"> opcion 4
            </div>-->
      </form>
		</div><!--container ritmico-->
		<div class="enviar clearfix" id="enviar">
			<a href="#formRitmico" class="button siguiente"> Siguiente</a>
			<a href="#formRitmico" class="button repetir">Repetir</a>
			<!--<a href="#" class="button limpiar">Limpiar</a>-->
		</div>

		<a href="#formRitmico"  class="button botonRitmico"> abrir dictado de Práctica</a>
		<div class="Calificacion">

		</div>
		<span class="datos">hola</span>
	</div><!--section white ritmicos-->


	<div class="parallax-container">
		<div class="parallax"><img src="<?php echo base_url();?>/img/image3.jpg"></div>
	</div>




	<div class="section white">
		<div class="row container">
		  <h2 class="header">Dictados Armónicos</h2>
		  <p class="grey-text text-darken-3 lighten-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</div><!--row container-->
			<div class="contenedor armonico" id="armonico">
				<div class="datos-dictadoAr">
					<span class="notas-compas-armonicoG "></span>
					<span class="num-compas-armonicoG"></span>
					<span class="aciertos-armonicoG"></span>
					<span class="notas-compas-armonicoF "></span>
					<span class="num-compas-armonicoF"></span>
					<span class="aciertos-armonicoF"></span>
				</div>
				<div class="pentagrama">
					<div class="clave">
						<img src="<?php echo base_url();?>img/gcleff2" alt="clave de sol">
					</div>
					<div class="line-space-ar F6">
							<span class="line"><span class="nota notaF6"></span></span>
					</div>
					<div class="line-space-ar E6">
							<span class="space"><span class="nota notaE6"></span></span>
					</div>
					<div class="line-space-ar D6">
							<span class="line"><span class="nota notaD6"></span></span>
					</div>
					<div class="line-space-ar C6">
							<span class="space"><span class="nota notaC6"></span></span>
					</div>
					<div class="line-space-ar B5">
							<span class="line"><span class="nota notaB5"></span></span>
					</div>
					<div class="line-space-ar A5">
							<span class="space"><span class="nota notaA5"></span></span>
					</div>
					<div class="line-space-ar G5">
							<span class="line"><span class="nota notaG5"></span></span>
					</div>
					<div class="line-space-ar F5">
							<span class="space"><span class="nota notaF5"></span></span>
					</div>
					<div class="line-space-ar E5">
							<span class="line"><span class="nota notaE5"></span></span>
					</div>
					<div class="line-space-ar D5">
							<span class="space"><span class="nota notaD5"></span></span>
					</div>
				</div><!---pentagrama-->
				<div class="pentagramaF">
					<div class="clave claveF">
						<img class="img-F"src="<?php echo base_url();?>img/fclef" alt="clave de fa">
					</div>
					<div class="llave">
						<img class="img-llave"src="<?php echo base_url();?>img/llave.png" alt="llave">
					</div>
					<div class="line-space-arF A4">
							<span class="line"><span class="nota notaA4"></span></span>
					</div>
					<div class="line-space-arF G4">
							<span class="space"><span class="nota notaG4"></span></span>
					</div>
					<div class="line-space-arF F4">
							<span class="line"><span class="nota notaF4"></span></span>
					</div>
					<div class="line-space-arF E4">
							<span class="space"><span class="nota notaE4"></span></span>
					</div>
					<div class="line-space-arF D4">
							<span class="line"><span class="nota notaD4"></span></span>
					</div>
					<div class="line-space-arF C4">
							<span class="space"><span class="nota notaC4"></span></span>
					</div>
					<div class="line-space-arF B3">
							<span class="line"><span class="nota notaB3"></span></span>
					</div>
					<div class="line-space-arF A3">
							<span class="space"><span class="nota notaA3"></span></span>
					</div>
					<div class="line-space-arF G3">
							<span class="line"><span class="nota notaG3"></span></span>
					</div>
					<div class="line-space-arF F3">
							<span class="space"><span class="nota notaF3"></span></span>
					</div>
				</div><!---pentagrama-->
			</div><!--contenedor-->
			<a href="#DicArmonico"  class="button botonArmonico"> abrir dictado de Práctica</a>
			<div class="Calificacion">

			</div>
	</div><!-- section white-->
</body>
