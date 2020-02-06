<?php include '../conexion/conec.php'; ?>
<table class="striped">
    <thead>
      <tr>
          <th>No.</th>
          <th>Unidad</th>
          <th>Accion</th>
      </tr>
    </thead>

    <tbody>
    	<?php 
    		$contar = 1;
    		$selRol = mysqli_query($con,"SELECT unidadId,nombre FROM unidad");

    		while($datRol = mysqli_fetch_assoc($selRol)){
    	?>
				<tr>
	            <td><?php echo $contar++?></td>
	            <td><?php echo $datRol["nombre"] ?></td>
	            <td>
	            	
	            	<a class="waves-effect waves-light btn-small  blue lighten-1" onclick="abrirModal(<?php echo $datRol["unidadId"] ?>)">
						<i class="material-icons left">edit</i>Edit
					</a>
					<a class="waves-effect waves-light btn-small red lighten-1" onclick="eliminar(<?php echo $datRol["unidadId"] ?>);">
						<i class="material-icons left">delete</i>Del
					</a>
	            </td>
	          </tr>
    	<?php
    		}
    	?>
    </tbody>
</table>