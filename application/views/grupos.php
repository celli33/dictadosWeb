<?php if($this->session->userdata('nivel')==2) {?>
	<body>
		<div class="container">
			<h5>Dar de alta un alumno</h5>
	    <form class="registro" action="<?php echo base_url();?>index.php/Welcome/ingresaAlumno" method="post">
	    		<div class="input-field col s12">
	            <select id="alumno" name="alumno">
	                <?php echo form_error('alumno');?>
	                <option value="" disabled selected>Elige a quien dar de alta para ser alumno del grupo</option>
	                <?php foreach($alumnos->result() as $fila) { ?>
	                    <option value="<?=$fila->idPersona?>"><?=$fila ->nombre." - ".$fila ->usuario?></option><?php 
	                }?>
	            </select>
	        </div>	        
	        <input type="submit" id="button" class="btn-flat" value="enviar" class="boton">
	        <div class="form-group">
		     		<input style="visibility:hidden" type="text" readonly id="idGrupo" name="idGrupo" value="<?php echo $idGrupo;?>">
		   		</div>
	    </form>    
  	</div>
  	<div class="container">
			<h5>Alumnos inscritos</h5>
	  	<?php if ($grupo!=FALSE){
				$i=0;			
				foreach($grupo->result() as $row) { ?>
				 	<form id="form<?php echo $i;?>" name="form<?php echo $i;?>" class="col s12">
				 			<div class="row">
				        <div class="col s3">
				          Nombre:
				          <div class="input-field inline">
				            <input name="nombre<?php echo $i;?>" id="nombre<?php echo $i;?>" readonly type="text" value="<?php echo $row->nombre;?>">				            
				          </div>
				        </div>	
				        <div class="col s3">
				          Usuario:
				          <div class="input-field inline">
				            <input name="usuario<?php echo $i;?>" id="usuario<?php echo $i;?>" readonly type="text" value="<?php echo $row->usuario;?>">				            
				          </div>
				        </div>
				        <div class="col s3">
				          Dictados:
				          <div class="input-field inline">
				            <input name="numDictados<?php echo $i;?>" size="15" id="numDictados<?php echo $i;?>" readonly type="text" value="<?php echo $row->numDictados;?>">		
				          </div>
				        </div> 
				        <div class="col s3">
				          Promedio:
				          <div class="input-field inline">
				            <input name="numDictados<?php echo $i;?>" size="15" id="numDictados<?php echo $i;?>" readonly type="text" value="<?php echo $row->numDictados;?>">		
				          </div>
				        </div> 
				     	</div>
				 </form>
				<?php  $i++;}
			}?>
		</div>
	</body>
<?php }
else
    redirect('/Welcome/index/', 'location');
?>