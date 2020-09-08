<?php
/* require_once "../conexion/conexion.php"; */
error_reporting();
$nombre=$_POST['nombre'];
$nit=$_POST['nit'];
$contacto=$_POST['contacto'];
$idpais=$_POST['pais'];


//comprobar antes de ingresar
$comprobar="SELECT nit from clientes where nit = '$nit'";

$r=mysqli_query($conexion,$comprobar);
$f=mysqli_num_rows($r);
if ($f>0) {
	$alertProceso = "<div class='alert bg-success text-center'>
						$nit ya esta registrado VERIFIQUE!<a href='workspace.php?funcion=clientes' class='text-decoration-none text-white'>¡Actualice la pagina!<br><i style='border: none; background-color: transparent;'class='fas fa-sync-alt fa-'></i></a>
						</div>";
}
elseif (!empty($nombre) && !empty($nit) && !empty($idpais)) {
	$sql="INSERT INTO clientes(ncliente, nit, contacto,idpais)
					VALUES ('$nombre','$nit','$contacto','$idpais')";
	$resultado=mysqli_query($conexion,$sql);
	
}else{
	$alertProceso = "<div class='alert bg-success text-center'>
						Porfavor llenar todos los campos requeridos<a href='workspace.php?funcion=clientes' class='text-decoration-none text-white'>¡Actualice la pagina!<br><i style='border: none; background-color: transparent;'class='fas fa-sync-alt fa-'></i></a>
						</div>";
}


 if($resultado) {
		$alertProceso = "<div class='alert bg-success text-center'>
							Se inserto correctamente el cliente <a href='workspace.php?funcion=clientes' class='text-decoration-none text-white'>¡Actualice la pagina!<br><i style='border: none; background-color: transparent;'class='fas fa-sync-alt fa-'></i></a>
						</div>";
	} else {
		$alertProceso = "<div class='alert bg-danger text-center'>
							No se ingreso el cliente, vuelve a intentarlo
	  					</div>";
	} 