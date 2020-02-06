<?php include 'conexion/conec.php'; ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>TAREA</title>
		<!--Import Google Icon Font-->
      	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>
		<link type="text/css" rel="stylesheet" href="materialize/css/sweetalert2.min.css"  media="screen,projection"/>

		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	</head>

	<body>
		<h3 style="text-align: center;">Administrador de Roles</h3>
		<div class="fixed-action-btn">
			<a data-target="modal1"  class="btn-floating btn-large pink lighten-1 modal-trigger " onclick="cargar()">
			    <i class="large material-icons">done</i>
			  </a>
		</div>
			

		<div class="row">
			<div class="col s12">
				<div id="tblRol"></div>
			</div>
		</div>
		
    
	</body>
	<!-- Modal Structure -->
	<form id="frmModales">
		<div id="modal1" class="modal">
			<div id="espacio"></div>
		</div>

	</form>
</html>


<script src="materialize/js/jquery-3.4.1.min.js"></script>
<script src="materialize/js/materialize.js"></script>
<script src="materialize/js/sweetalert2.min.js"></script>

<script>
	window.onload=tblRol();
    $(document).ready(function(){
	    $('fixed-action-btn').floatingActionButton();
	});

	$(document).ready(function(){
		$('.modal').modal();
	});
	  
	function cargar(){
		$.get("frm/frmRol.php", function(data){
		    $('#espacio').html(data);
		});
	}

	function tblRol(){
		$.get("frm/tblRoles.php", function(data){
		    $('#tblRol').html(data);

			//swal ( "Oops" ,  "Something went wrong!" ,  "error" )
		});
	}
	function abrirModal(id){
		$.get("frm/frmRolEdit.php?rolId="+id+"", function(data){
		    $('#espacio').html(data);
		});
		$('#modal1').modal('open');
	}

	function guardarRol(){
		let rol1 = $('#rol').val();

		if(rol1==""){
			swal ( "Oops" ,  "Debe ingresar el rol" ,  "error" );
		} else {
			let url = "base/insert.php?id=INS-ROL";
			$.ajax({
				url: url,
				type: 'POST',
				data: {rol:rol1},
				success : function(data){
				 if(data==1){
				 	swal ( "Guardado" ,  "Rol guardado con exito" ,  "success" );
				 	tblRol();
				 	instance.close();
				 } else {
				 	swal ( "Oops" ,  "Nombre del rol ya existe" ,  "error" );
				 }
				}
			})
			
		}
	}

	function editarRol(){
		let rol1 = $('#rol').val();

		if(rol1==""){
			swal ( "Oops" ,  "Debe ingresar el rol" ,  "error" );
		} else {
			let url = "base/insert.php?id=UPD-ROL";
			$.ajax({
				url: url,
				type: 'POST',
				data: $('#frmModales').serialize(),
				success : function(data){
				 if(data==1){
				 	swal ( "Guardado" ,  "Rol actualizado con exito" ,  "success" );
				 	tblRol();
				 	instance.close();
				 } else {
				 	swal ( "Oops" ,  "Nombre del rol ya existe" ,  "error" );
				 }
				}
			})
			
		}
	}

	function eliminar(id){
		swal({
		  title: "Eliminar?",
		  text: "Los datos eliminados no podran ser recuperados",
		  icon: "warning",
		  showCancelButton: true,
		  confirmButtonText: 'ELIMINAR',
          cancelButtonText: 'CANCELAR',
          allowOutsideClick: false,
          buttonsStyling: true
		})
		.then((willDelete) => {
		  if (willDelete) {
		  	let url = "base/insert.php?id=DEL-ROL";
			$.ajax({
				url: url,
				type: 'POST',
				data: {rolId:id},
				success : function(data){
				 if(data==1){
				 	swal ( "Eliminado" ,  "Rol eliminado con exito" ,  "success" );
				 	tblRol();
				 	instance.close();
				 } else {
				 	swal ( "Oops" ,  "Rol no puede ser eliminado" ,  "error" );
				 }
				}
			})
		  } else {
		    swal("Dato no eliminados");
		  }
		});
	}
</script>