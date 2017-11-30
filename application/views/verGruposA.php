<?php if($this->session->userdata('nivel')==3) {?>
	<body>		
  	<div class="container">
			<h5>Grupos en los cuales estas inscrito</h5>
	  	<?php if ($grupos!=FALSE){
				$i=0;			
				foreach($grupos->result() as $row) { ?>
				 	<form id="form<?php echo $i;?>" name="form<?php echo $i;?>" class="col s12">
				 			<div class="row">
				        <div class="col s3">
				          Nombre:
				          <div class="input-field inline">
				            <input name="nombre<?php echo $i;?>" id="nombre<?php echo $i;?>" readonly type="text" value="<?php echo $row->nombre;?>">				            
				          </div>
				        </div>
				        <div class="col s3">
				          Calificación:
				          <div class="input-field inline">
				            <input name="Calificacion<?php echo $i;?>" size="15" id="Calificacion<?php echo $i;?>" readonly type="text" value="<?php echo $row->Calificacion;?>">		
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