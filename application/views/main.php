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
	<div class="section white">
		<div class="row container">
		  <h2 class="header">Dictados Rítmicos</h2>
		  <p class="grey-text text-darken-3 lighten-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</div>
	</div>
	<div class="parallax-container">
		<div class="parallax"><img src="<?php echo base_url();?>/img/image3.jpg"></div>
	</div>
	<div class="section white">
		<div class="row container">
		  <h2 class="header">Dictados Armónicos</h2>
		  <p class="grey-text text-darken-3 lighten-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</div>
	</div>


</body>
