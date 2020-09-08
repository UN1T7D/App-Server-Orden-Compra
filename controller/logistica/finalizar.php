<?php 
	/* require_once "../conexion/conexion.php"; */
	/* error_reporting(1); */
	$etapaActual=$_POST['idpais_etapa'];
	$idOrden=$_POST['id'];
	$idpais = $_POST['idpais'];

	/* CON ESTA CONSULTA CONOCEREMOS EL NUMERO TOTAL DE ETAPAS QUE TIENE UN PAIS PARA LOGRAR CULMINAR UN PROCESO DE ORDEN DE COMPRA */
	$consulta = "SELECT COUNT(idpais_etapa) AS numeroEtapas FROM pais_etapa WHERE idpais = ?";
	$prepare = $conexion->prepare($consulta);
	$prepare->bind_param("i",$idpais);
	$prepare->execute();
	$resultado = $prepare->get_result();
	$row = mysqli_fetch_array($resultado);
	$numeroEtapas = $row["numeroEtapas"];

	
	/* ACCION PARA CONOCER LAS ETAPAS DEL PAIS */

	$contador = 1; //CONTADOR PARA CONOCER LA UBICACION DE LA SIGUIENTE ETAPA PARA ACTUALIAR
	$contadorAux = 0; //YA CONOCIDA LA HUBICACION DE LA ETAPA CON SU CORRELATIVO, ESTA VARIABLE SUMARA 1 PARA LA SIGUIENTE ACTUALIZACION
	$contadorAux2 = 1;//PARA CONOCER LA NUEVA POSICION DE LA ETAPA A ACTUALIZAR
	$finalizado ;//PARA CONOCER LA POSICION DE LA FINALIZACION DE LA ETAPA POR PAIS
	$siguienteEtapa ;
	$consulta2 = "SELECT idpais_etapa FROM pais_etapa WHERE idpais = ?";
	$prepare2 = $conexion->prepare($consulta2);
	$prepare2->bind_param("i",$idpais);
	$prepare2->execute();
	$resultado2 = $prepare2->get_result();
	while ($row2 = mysqli_fetch_array($resultado2)) {
		
		$etapaCompara = $row2["idpais_etapa"];

		if ($contador == 2) {
			
			$finalizado = $etapaCompara;

		}

		if ($etapaActual == $etapaCompara) {
			
			$contadorAux = $contador+1;
			/* break; */
		}

		$contador++;
	}	

	

	if ($contadorAux < $numeroEtapas) {		//SI ETAPA SIGUIENTE ES MENOR A EL NUMERO DE ETAPAS
		
		$consulta3 = "SELECT idpais_etapa FROM pais_etapa WHERE idpais = ?";
		$prepare3 = $conexion->prepare($consulta3);
		$prepare3->bind_param("i",$idpais);
		$prepare3->execute();
		$resultado3 = $prepare3->get_result();
		while ($row3 = mysqli_fetch_array($resultado3)) {
			
			if ($contadorAux == $contadorAux2) {

				$siguienteEtapa = $row3["idpais_etapa"];
				$consulta4 = "UPDATE oc SET idpais_etapa = ? WHERE oc = ?";
				$prepapre4 = $conexion->prepare($consulta4);
				$prepapre4->bind_param("is",$siguienteEtapa, $idOrden);
				$prepapre4->execute();
				$resultado4 = $prepapre4->get_result();
				if ($prepapre4) {
					$alertProceso = "<div class='alert bg-success text-center'>
										Se actualizo correctamente la orden de compra <a href='workspace.php?funcion=exportacioneslogistica' class='text-decoration-none text-white'>¡Actualice la pagina!<br><i style='border: none; background-color: transparent;'class='fas fa-sync-alt fa-'></i></a>
									</div>";
				} else {
					$alertProceso = "<div class='alert bg-danger text-center'>
										No se pudo actualizar la orden de compra en la siguiente etapa!
									</div>";
				}

				/* break; */
			}
			
			$contadorAux2++;
		}
		
		
	 }elseif ($contadorAux == $numeroEtapas) {

		
		$estado = "FINALIZADO";
		$visible = "SI";
		date_default_timezone_set('America/El_Salvador');
		$año=date('Y');
		$fecha=date('Y-m-d');
		$consulta4="UPDATE oc SET idpais_etapa = ?, estado = ?, visible = ?, ffin = ? WHERE oc = ?";
		$prepare4 = $conexion->prepare($consulta4);
		$prepare4->bind_param("issss",$finalizado, $estado, $visible, $fecha, $idOrden);
		$prepare4->execute();

		if ($prepare4) {
			$alertProceso = "<div class='alert bg-success text-center'>
								Se actualizo correctamente la orden de compra a finalizada <a href='workspace.php?funcion=exportacioneslogistica' class='text-decoration-none text-white'>¡Actualice la pagina!<br><i style='border: none; background-color: transparent;'class='fas fa-sync-alt fa-'></i></a>
							</div>";
		} else {
			$alertProceso = "<div class='alert bg-danger text-center'>
								No se pudo actualizar la orden de compra en la siguiente etapa! La finalizacion
								</div>";
		}

		
		 
	}
		
		
	