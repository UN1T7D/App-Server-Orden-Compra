<?php
/* require_once "../conexion/conexion.php"; */
error_reporting();
$id=$_POST['id'];
$etapa=$_POST['etapa'];
$codigo=$_POST['codigo'];

$codigo=strtoupper($codigo);

$sql="UPDATE etapas SET netapas='$etapa', codigo='$codigo' WHERE idetapa='$id'";
$resultado=mysqli_query($conexion,$sql);


if($resultado) {
	$alertProceso = "<div class='alert bg-success text-center'>
						Se actualizo correctamente el cliente <a href='workspace.php?funcion=etapa' class='text-decoration-none text-white'>¡Actualice la pagina!<br><i style='border: none; background-color: transparent;'class='fas fa-sync-alt fa-'></i></a>
					</div>";
} else {
	$alertProceso = "<div class='alert bg-danger text-center'>
						No se actualizo el cliente, vuelve a intentarlo
					  </div>";
} 