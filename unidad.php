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
		<h3 style="text-align: center;">Administrador de Unidades</h3>
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
		$.get("frm/frmUnidad.php", function(data){
		    $('#espacio').html(data);
		});
	}

	function tblRol(){
		$.get("frm/tblUnidades.php", function(data){
		    $('#tblRol').html(data);

			//swal ( "Oops" ,  "Something went wrong!" ,  "error" )
		});
	}
	function abrirModal(id){
		$.get("frm/frmEditUnidad.php?unidadId="+id+"", function(data){
		    $('#espacio').html(data);
		});
		$('#modal1').modal('open');
	}

	function guardarRol(){
		let unidad = $('#unidad').val();

		if(unidad==""){
			swal ( "Oops" ,  "Debe ingresar el rol" ,  "error" );
		} else {
			let url = "base/insert.php?id=INS-UNI";
			$.ajax({
				url: url,
				type: 'POST',
				data: {unidad:unidad},
				success : function(data){
				 if(data==1){
				 	swal ( "Guardado" ,  "Unidad guardado con exito" ,  "success" );
				 	tblRol();
				 	instance.close();
				 } else {
				 	swal ( "Oops" ,  "Nombre de la unidad ya existe" ,  "error" );
				 }
				}
			})
			
		}
	}

	function editarRol(){
		let unidad = $('#unidad').val();

		if(unidad==""){
			swal ( "Oops" ,  "Debe ingresar la unidad" ,  "error" );
		} else {
			let url = "base/insert.php?id=UPD-UNI";
			$.ajax({
				url: url,
				type: 'POST',
				data: $('#frmModales').serialize(),
				success : function(data){
				 if(data==1){
				 	swal ( "Guardado" ,  "Unidad actualizado con exito" ,  "success" );
				 	tblRol();
				 	instance.close();
				 } else {
				 	swal ( "Oops" ,  "Nombre de la unidad ya existe" ,  "error" );
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
		  	let url = "base/insert.php?id=DEL-UNI";
			$.ajax({
				url: url,
				type: 'POST',
				data: {unidadId:id},
				success : function(data){
				 if(data==1){
				 	swal ( "Eliminado" ,  "Unidad eliminado con exito" ,  "success" );
				 	tblRol();
				 	instance.close();
				 } else {
				 	swal ( "Oops" ,  "Unidad no puede ser eliminado" ,  "error" );
				 }
				}
			})
		  } else {
		    swal("Dato no eliminados");
		  }
		});
	}
</script>