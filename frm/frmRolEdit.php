<?php include '../conexion/conec.php'; 
	$rolId = $_REQUEST["rolId"];

	$selRol = mysqli_query($con,"SELECT rolId,rol FROM roles
		WHERE rolId='$rolId'
	");

	$datRol = mysqli_fetch_assoc($selRol);
?>
	
<div class="modal-content">
  <h4>Agregar Rol</h4>
  	<div class="row">
  		<input type="hidden" name="rolId" id="rolId" value="<?php echo $datRol["rolId"] ?>">
		<div class="col s12">
			<input placeholder="Ingrese el rol" name="rol" id="rol" type="text" class="validate" value=" <?php echo $datRol["rol"] ?>">
			<label for="rol">Ingrese el nombre del Rol</label>
		</div>
	</div>
</div>
<div class="modal-footer">
  <a href="#!" class="waves-effect waves-green btn-flat" onclick="editarRol()">Actualizar</a>
  <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
</div>