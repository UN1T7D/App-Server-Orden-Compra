<?php
/* require_once "../conexion/conexion.php"; */
error_reporting(0);

$idpais = $_POST["idpais"];

$consulta = "SELECT * FROM pais_etapa WHERE idpais = ?";
$prepare = $conexion->prepare($consulta);
$prepare->bind_param("i",$idpais);
$prepare->execute();
$resultPrepare = $prepare->get_result();
$contador = 0;
while ($rowprepare = mysqli_fetch_array($resultPrepare)) {
	
	if ($contador > 2) {
		
		$id=$_POST['id'];
		$pais_etapa=$_POST['pais_etapa'];

		try {
			//validar etapa
			$comparar="SELECT o.idpais_etapa,pa.idpais,pa.idetapa 
			FROM oc as o 
			inner join pais_etapa as pa ON
			o.idpais_etapa=pa.idpais_etapa
			where o.idpais_etapa='$pais_etapa'";

			$rcompara=mysqli_query($conexion,$comparar);
			$result=mysqli_num_rows($rcompara);
			if ($result>0) {
				while ($idpais_etapa=mysqli_fetch_array($rcompara)) {
					$idpais=$idpais_etapa['idpais'];
					$idetapa=3;

					$comprobar1="SELECT idpais_etapa, porcentaje from pais_etapa where idpais='$idpais' and idetapa='$idetapa'";
					$r=mysqli_query($conexion,$comprobar1);
					$resultado=mysqli_fetch_array($r);

					$idpaisetapa=$resultado['idpais_etapa'];
					$porcentaje=$resultado['porcentaje'];	

					$sql="UPDATE oc SET idpais_etapa='$idpaisetapa' WHERE oc='$id'";
					$resultado=mysqli_query($conexion,$sql);
				}
			}else {
				$alertProceso = "
				<div class='alert bg-warning text-white text-center'>
					Al parecer hubo un error en la inicialización del proceso de la orden de compras. Al parecer no tiene ninguna etapa para este proceso.
				</div>";

			}
			
			if($resultado) {
				$alertProceso = "
				<div class='alert bg-success text-white text-center'>
					Se ha inicializado correctamente su orden de compra, verifique en el apartado del proceso. <a href='workspace.php?funcion=exportacionesexpo' class='text-decoration-none text-white'>¡Actualice la pagina!<br><i style='border: none; background-color: transparent;'class='fas fa-sync-alt fa-'></i></a>
				</div>";
				

			} else {
				$alertProceso = "
				<div class='alert bg-danger text-white text-center'>
					Al parecer hubo un error en la inicialización del proceso de la orden de compras. Verifique bien los datos ingresados.
				</div>";
				
			} 	
			

		} catch (Exception $e) {
			echo "ERROR".$e->getMessage();
		}
			

	}else {

		$alertProceso = "
			<div class='alert bg-warning text-black text-center'>
				Al parecer hubo un error en la inicialización del proceso de la orden de compras. Al parecer no tiene ninguna etapa para este proceso.
			</div>";
		
	}

	$contador++;

}

?>
