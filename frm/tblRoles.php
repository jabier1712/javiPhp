<?php include '../conexion/conec.php'; ?>
<table class="striped">
    <thead>
      <tr>
          <th>No.</th>
          <th>Rol</th>
          <th>Accion</th>
      </tr>
    </thead>

    <tbody>
    	<?php 
    		$contar = 1;
    		$selRol = mysqli_query($con,"SELECT rolId,rol FROM roles");

    		while($datRol = mysqli_fetch_assoc($selRol)){
    	?>
				<tr>
	            <td><?php echo $contar++?></td>
	            <td><?php echo $datRol["rol"] ?></td>
	            <td>
	            	
	            	<a class="waves-effect waves-light btn-small  blue lighten-1" onclick="abrirModal(<?php echo $datRol["rolId"] ?>)">
						<i class="material-icons left">edit</i>Edit
					</a>
					<a class="waves-effect waves-light btn-small red lighten-1" onclick="eliminar(<?php echo $datRol["rolId"] ?>);">
						<i class="material-icons left">delete</i>Del
					</a>
	            </td>
	          </tr>
    	<?php
    		}
    	?>
    </tbody>
</table>