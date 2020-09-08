<?php
	/* include('../conexion/conexion.php'); */
	error_reporting(0);
	$id=$_POST['id'];
	
	$sql = "DELETE FROM pais_etapa WHERE idpais_etapa = '$id'";
	$resultado = mysqli_query($conexion, $sql);	

	if($resultado) {
		$alertProceso = "<div class='alert bg-success text-center'>
				  Se elimino correctamente la asignacion <a href='workspace.php?funcion=asignar' class='text-decoration-none text-white'>¡Actualice la pagina!<br><i style='border: none; background-color: transparent;'class='fas fa-sync-alt fa-'></i></a>
				</div>";
	  } else {
		$alertProceso = "<div class='alert bg-danger text-center'>
				  No se elimino la asignacion, vuelve a intentarlo 
				  </div>";
	  }