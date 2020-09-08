<?php
	/* require_once "../conexion/conexion.php"; */
	//error_reporting(0);

	$pais=$_POST['pais'];
	$etapa=1;

	$comparar="SELECT idpais_etapa from pais_etapa where idpais='$pais' and idetapa='$etapa'";
	$rcompara=mysqli_query($conexion,$comparar);
	$result=mysqli_num_rows($rcompara);

	if ($result>0) {
			$fila=mysqli_fetch_array($rcompara);
			$idpais_etapa=$fila['idpais_etapa'];

			$oc=$_POST['oc'];
			$nit=$_POST['cliente'];
			$finicio=$_POST['finicio'];
			$estatus='EN PROCESO';
			$visible='SI';
			$descripcion='';
			$oc=strtoupper($oc);
			/*$pais=strtoupper($pais);
			comprobar OC antes de ingresar */
			$comprobar="SELECT * from oc where oc = '$oc'";
			
			$r=mysqli_query($conexion,$comprobar);
			$f=mysqli_num_rows($r);
			if ($f>0) {
				
				$alertProceso = "<div class='alert bg-warning text-white text-center'>
				Al parecer hubo un error en la incersion de la orden de compra!
				</div>";

			}
			else{
				$sql="INSERT INTO oc(oc,nit ,finicio, estado,idpais_etapa,visible,descripcion)
				VALUES ('$oc','$nit','$finicio','$estatus','$idpais_etapa','$visible','$descripcion')";
				$resultado=mysqli_query($conexion,$sql);
			}
		
	}

	if($resultado) {
		$alertProceso = "
		<div class='alert bg-success text-white text-center'>
			Se ha ingresado correctamente su orden de compra. <a href='workspace.php?funcion=exportaciones' class='text-decoration-none text-white'>¡Actualice la pagina!<br><i style='border: none; background-color: transparent;'class='fas fa-sync-alt fa-'></i></a>
		</div>";
		
		
	} else {
		$alertProceso = "
		<div class='alert bg-danger text-white text-center'>
			Al parecer hubo un error en la incersion de la orden de compra!
		</div>";
		
		
	} 	
	
	
	?>
