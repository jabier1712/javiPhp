<?php 
	include '../conexion/conec.php';
	$id = $_REQUEST["id"];

	switch ($id) {
		case 'INS-ROL':
			// verificar si ro exite
			$selExiste = mysqli_query($con,"SELECT count(rol) AS existe
				FROM roles WHERE rol='$_POST[rol]'
			")or die(mysqli_error($con));

			$datExiste = mysqli_fetch_assoc($selExiste);

			if($datExiste["existe"]==1){
				echo 2;
			} else {
				//insertar rol
				$ins = mysqli_query($con,"
					INSERT INTO roles (rol) VALUES ('$_POST[rol]')
				");

				echo 1;
			}
		break;

		case 'INS-UNI':
			// verificar si ro exite
			$selExiste = mysqli_query($con,"SELECT count(nombre) AS existe
				FROM unidad WHERE nombre='$_POST[unidad]'
			")or die(mysqli_error($con));

			$datExiste = mysqli_fetch_assoc($selExiste);

			if($datExiste["existe"]==1){
				echo 2;
			} else {
				//insertar rol
				$ins = mysqli_query($con,"
					INSERT INTO unidad (nombre) VALUES ('$_POST[unidad]')
				");

				echo 1;
			}
		break;

		case 'UPD-ROL':
			// verificar si ro exite
			$selExiste = mysqli_query($con,"SELECT count(rol) AS existe
				FROM roles WHERE rol<>'$_POST[rolId]'
			")or die(mysqli_error($con));

			$datExiste = mysqli_fetch_assoc($selExiste);

			if($datExiste["existe"]==1){
				echo 2;
			} else {
				//insertar rol
				$ins = mysqli_query($con,"
					UPDATE roles SET rol='$_POST[rol]' WHERE rolId='$_POST[rolId]'
				");

				echo 1;
			}
		break;

		case 'UPD-UNI':
			// verificar si ro exite
			$selExiste = mysqli_query($con,"SELECT count(nombre) AS existe
				FROM unidad WHERE nombre<>'$_POST[unidad]'
			")or die(mysqli_error($con));

			$datExiste = mysqli_fetch_assoc($selExiste);

			if($datExiste["existe"]==1){
				echo 2;
			} else {
				//insertar rol
				$ins = mysqli_query($con,"
					UPDATE unidad SET nombre='$_POST[unidad]' WHERE unidadId='$_POST[unidadId]'
				");

				echo 1;
			}
		break;

		case 'DEL-ROL':
			
				$del = mysqli_query($con,"
					DELETE FROM roles WHERE rolId='$_POST[rolId]'
				");

				echo 1;
			
		break;

		case 'DEL-UNI':
			
				$del = mysqli_query($con,"
					DELETE FROM unidad WHERE unidadId='$_POST[unidadId]'
				");

				echo 1;
			
		break;
		
		default:
			# code...
			break;
	}

?>