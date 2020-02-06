<?php include '../conexion/conec.php'; 
	$unidadId = $_REQUEST["unidadId"];

	$selunidad = mysqli_query($con,"SELECT unidadId,nombre FROM unidad
		WHERE unidadId='$unidadId'
	");

	$datunidad = mysqli_fetch_assoc($selunidad);
?>
	
<div class="modal-content">
  <h4>Agregar unidad</h4>
  	<div class="row">
  		<input type="hidden" name="unidadId" id="unidadId" value="<?php echo $datunidad["unidadId"] ?>">
		<div class="col s12">
			<input placeholder="Ingrese el unidad" name="unidad" id="unidad" type="text" class="validate" value=" <?php echo $datunidad["nombre"] ?>">
			<label for="unidad">Ingrese el nombre del unidad</label>
		</div>
	</div>
</div>
<div class="modal-footer">
  <a href="#!" class="waves-effect waves-green btn-flat" onclick="editarRol()">Actualizar</a>
  <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
</div>