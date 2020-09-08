<?php
/* require_once "../../configuration/conexion.php"; */
error_reporting(1);
$id=$_POST['id'];
$porcentaje=$_POST['porcentaje'];


$sql="UPDATE pais_etapa SET porcentaje='$porcentaje' WHERE idpais_etapa='$id'";
$resultado=mysqli_query($conexion,$sql);


if($resultado) {
	$alertProceso = "<div class='alert bg-success text-center'>
						Se actualizo correctamente el porcentaje <a href='workspace.php?funcion=asignar' class='text-decoration-none text-white'>¡Actualice la pagina!<br><i style='border: none; background-color: transparent;'class='fas fa-sync-alt fa-'></i></a>
					</div>";
} else {
	$alertProceso = "<div class='alert bg-danger text-center'>
						No se actualizo el pais, vuelve a intentarlo
					  </div>";
} 
?>