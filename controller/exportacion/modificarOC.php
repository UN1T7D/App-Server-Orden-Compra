<?php
/* require_once "../../configuration/conexion.php"; */
error_reporting();
$id=$_POST['id'];
$estado=$_POST['estado'];
$visible=$_POST['visible'];

$sql="UPDATE oc SET estado='$estado',visible='$visible' WHERE oc='$id'";
$resultado=mysqli_query($conexion,$sql);
if($resultado) {
	$alertProceso = "<div class='alert bg-success text-center'>
						Se actualizo correctamente la Orden <a href='workspace.php?funcion=finalizadasexpo' class='text-decoration-none text-white'>¡Actualice la pagina!<br><i style='border: none; background-color: transparent;'class='fas fa-sync-alt fa-'></i></a>
					</div>";
} else {
	$alertProceso = "<div class='alert bg-danger text-center'>
						No se actualizo el cliente, vuelve a intentarlo
					  </div>";
} 

?>