<?php
	/* include('../conexion/conexion.php'); */
	error_reporting(0);
	$id=$_POST['id'];
	
	$sql = "DELETE FROM usuarios WHERE usuario = '$id'";
	$resultado = mysqli_query($conexion, $sql);	

	if($resultado) {
		$alertProceso = "<div class='alert bg-success text-center'>
				  Se elimino correctamente el usuario <a href='workspace.php?funcion=usuarios' class='text-decoration-none text-white'>¡Actualice la pagina!<br><i style='border: none; background-color: transparent;'class='fas fa-sync-alt fa-'></i></a>
				</div>";
	  } else {
		$alertProceso = "<div class='alert bg-danger text-center'>
				  No se elimino el usuario, vuelve a intentarlo 
				  </div>";
	  }