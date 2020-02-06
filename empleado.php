<?php include 'conexion/conec.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>
		<link type="text/css" rel="stylesheet" href="materialize/css/sweetalert2.min.css"  media="screen,projection"/>
</head>
<body>
	<div class="row">
		<div class="col 6">
			<input placeholder="Ingrese el nombre" name="nombre" id="nombre" type="text" class="validate">
			<label for="unidad">Ingrese el nombre</label>
		</div>
		<div class="col 6">
			<input placeholder="Ingrese el apellido" name="apellido" id="apellido" type="text" class="validate">
			<label for="unidad">Ingrese el apellido</label>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col s12">
			<div class="input-field col s6">
			    <select>
			      <option value="" disabled selected>Seleccione Una Opcion</option>
			      <?php $selROl = mysqli_query($con,"SELECT * FROM roles");
			      		while($datRol = mysqli_fetch_assoc($selROl)){
			      ?>
						<option><?php echo $datRol["rol"]?></option>
			      <?php
			      		}
			       ?>
			    </select>
			    <label>Seleccione Rol</label>
			 </div>
				<div class="input-field col s6">
				    <select>
				      <option value="" disabled selected>Seleccione Una Opcion</option>
				      <?php $selROl = mysqli_query($con,"SELECT * FROM unidad");
				      		while($datRol = mysqli_fetch_assoc($selROl)){
				      ?>
							<option><?php echo $datRol["nombre"]?></option>
				      <?php
				      		}
				       ?>
				    </select>
				    <label>Seleccione Unidad</label>
				 </div>
		</div>
	</div>
</body>
</html>
<script src="materialize/js/jquery-3.4.1.min.js"></script>
<script src="materialize/js/materialize.js"></script>
<script src="materialize/js/sweetalert2.min.js"></script>
<script>
	$(document).ready(function(){
    $('select').formSelect();
  });
</script>