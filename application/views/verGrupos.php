<?php if($this->session->userdata('nivel')==2) {?>
	<body>
		<?php if ($grupos!=FALSE){?>
		<div class="container">
			<h5>Ver Grupos</h5>
		    <form action="<?php echo base_url();?>index.php/Welcome/verGrupo" method="post">
		        <div class="input-field col s12">
		            <select id="grupo" name="grupo">
		                <?php echo form_error('grupo');?>
		                <option value="" disabled selected>Elige un Grupo</option>
		                <?php foreach($grupos->result() as $fila) { ?>
		                    <option value="<?=$fila->idGrupo?>"><?=$fila ->nombre?></option><?php 
		                }?>
		            </select>
		        </div>
		        <input type="submit" id="button" class="btn-flat" value="enviar" class="boton">
		    </form>    
		</div>
		<?php }?>
		<br>
		<div class="container">
			<h5>Dar de Alta un grupo</h5>
		    <form class="registro" action="<?php echo base_url();?>index.php/Welcome/ingresaGrupo" method="post">
		        <div class="campo">
		          	<label for="nombre">Nombre del Grupo: </label>
		          	<?php echo form_error('nombre');?>
		          	<input type="text" id="nombre" name="nombre" placeholder="tu nombre">
		        </div>
		        <div class="campo">
		            <label for="numAlumnos">Número de Alumnos (capacidad): </label>
		            <?php echo form_error('numAlumnos');?>
		            <input type="number" id="numAlumnos" name="numAlumnos" placeholder="cantidad de alumnos">
		        </div>
		        <input type="submit" id="button" class="btn-flat" value="enviar" class="boton">
		    </form>    
		</div>
	</body>
<?php }
else
    redirect('/Welcome/index/', 'location');
?>