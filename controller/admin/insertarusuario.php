<?php
/* require_once "../conexion/conexion.php"; */
error_reporting();
$nombre=$_POST['nombre'];
$usuario=$_POST['usuario'];
$pwd=$_POST['pwd'];
$rol=$_POST['rol'];


$pwdencriptado=md5($pwd);
date_default_timezone_set("America/El_Salvador");
$registro =date("Y-m-d H:i:s");


	//comprobar OC antes de ingresar
$comprobar="SELECT * from usuarios where usuario = '$usuario'";

$r=mysqli_query($conexion,$comprobar);
$f=mysqli_num_rows($r);
if ($f>0) {
	echo "<script language='javascript'>
	alert('$usuario Ya esta en uso intente con otro.')
	location.href='../vista/principal.php';
	</script>";
}
elseif (!empty($nombre) && !empty($usuario) && !empty($pwd) && !empty($rol)) {
	$sql="INSERT INTO usuarios(nombre_user, usuario, pwd,idrol)
	VALUES ('$nombre','$usuario','$pwdencriptado','$rol')";
	$resultado=mysqli_query($conexion,$sql);
	
}else{
	echo "<script language='javascript'>
	alert('Porfavor llenar todos los campos')
	location.href='../vista/usuarios.php';
	</script>";
}
if($resultado) {
	$alertProceso = "<div class='alert bg-success text-center'>
						Se inserto correctamente el usuario <a href='workspace.php?funcion=usuarios' class='text-decoration-none text-white'>¡Actualice la pagina!<br><i style='border: none; background-color: transparent;'class='fas fa-sync-alt fa-'></i></a>
					</div>";
} else {
	$alertProceso = "<div class='alert bg-danger text-center'>
						No se ingreso el usuario, vuelve a intentarlo
					  </div>";
} 