<body>
  <div class="container">
    <form class="registro" action="<?php echo base_url();?>index.php/Welcome/ingresaMaestro" method="post">
        <div class="input-field col s12">
            <select id="maestro" name="maestro">
                <?php echo form_error('maestro');?>
                <option value="" disabled selected>Elige a quien dar de alta para ser un maestro</option>
                <?php foreach($personas->result() as $fila) { ?>
                    <option value="<?=$fila->idPersona?>"><?=$fila ->nombre." - ".$fila ->usuario?></option><?php 
                }?>
            </select>
        </div>
        <input type="submit" id="button" class="btn-flat" value="enviar" class="boton">
    </form>    
  </div><!--container-->
</body>
