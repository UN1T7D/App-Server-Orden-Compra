<?php
/* require_once "../../configuration/conexion.php"; */
error_reporting();
$id=$_POST['id'];
$nombre=$_POST['pais'];


$sql="UPDATE pais SET npais='$nombre' WHERE idpais='$id'";
$resultado=mysqli_query($conexion,$sql);


if($resultado) {
	$alertProceso = "<div class='alert bg-success text-center'>
						Se actualizo correctamente el pais <a href='workspace.php?funcion=crearpais' class='text-decoration-none text-white'>¡Actualice la pagina!<br><i style='border: none; background-color: transparent;'class='fas fa-sync-alt fa-'></i></a>
					</div>";
} else {
	$alertProceso = "<div class='alert bg-danger text-center'>
						No se actualizo el pais, vuelve a intentarlo
					  </div>";
} 
?>