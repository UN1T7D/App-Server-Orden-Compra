<?php
	require_once "../../configuration/conexion.php";
	error_reporting(0);
	$id=$_POST['id'];

	#verificar si la oc a elminar no contiene una oc pendiente
	$verificar="SELECT * FROM oc where nit='$id'";

	$veri=mysqli_query($conexion,$verificar);
	$row=mysqli_num_rows($veri);
	if ($row>0) {
		echo "<script language='javascript'>
		alert('No se puede eliminar el Cliente, porque tiene OC activas o pendientes.')
		location.href='../vista/clientes.php';
		</script>";
	}
	else{
		$sql = "DELETE FROM clientes WHERE nit = '$id'";
		$resultado = mysqli_query($conexion, $sql);	
	}

	
	if($resultado) {
		$alertProceso = "<div class='alert bg-success text-center'>
				  Se elimino correctamente el cliente <a href='workspace.php?funcion=clientesexpo' class='text-decoration-none text-white'>¡Actualice la pagina!<br><i style='border: none; background-color: transparent;'class='fas fa-sync-alt fa-'></i></a>
				</div>";
	  } else {
		$alertProceso = "<div class='alert bg-danger text-center'>
				  No se elimino el usuario, vuelve a intentarlo 
				  </div>";
	  }