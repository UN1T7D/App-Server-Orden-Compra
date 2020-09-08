<?php
	/* require_once "../conexion/conexion.php"; */
	error_reporting(0);
	$id=$_POST['id'];
	$estado='CANCELADO';
	$visible='NO';
	date_default_timezone_set("America/El_Salvador");
	$registro =date("Y-m-d");
	$sql = "UPDATE oc SET estado='$estado',visible='$visible',ffin='$registro' WHERE oc='$id'";
	$resultado = mysqli_query($conexion, $sql);	

	if($resultado) {
		$alertProceso = "
		<div class='alert bg-success text-white text-center'>
			Se ha camcelado correctamente su orden de compra. <a href='workspace.php?funcion=exportaciones' class='text-decoration-none text-white'>¡Actualice la pagina!<br><i style='border: none; background-color: transparent;'class='fas fa-sync-alt fa-'></i></a>
		</div>";
		
		
	} else {
		$alertProceso = "
		<div class='alert bg-danger text-white text-center'>
			Al parecer hubo un error en la cancelacion de la orden de compra!
		</div>";
		
		
	} 	
	
	?>