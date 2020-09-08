<?php
/* require_once "../conexion/conexion.php"; */
error_reporting();
$id=$_POST['id'];
$nombre=$_POST['nombre'];
$nit=$_POST['nit'];
$contacto=$_POST['contacto'];


$sql="UPDATE clientes SET ncliente='$nombre', nit='$nit',contacto='$contacto' WHERE nit='$id'";
$resultado=mysqli_query($conexion,$sql);


if($resultado) {
	$alertProceso = "<div class='alert bg-success text-center'>
						Se actualizo correctamente el cliente <a href='workspace.php?funcion=clientes' class='text-decoration-none text-white'>¡Actualice la pagina!<br><i style='border: none; background-color: transparent;'class='fas fa-sync-alt fa-'></i></a>
					</div>";
} else {
	$alertProceso = "<div class='alert bg-danger text-center'>
						No se actualizo el cliente, vuelve a intentarlo
					  </div>";
} 