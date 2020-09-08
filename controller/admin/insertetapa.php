<?php
/* require_once "../conexion/conexion.php"; */
error_reporting();
$nombre=$_POST['etapa'];
$codigo=$_POST['codigo'];
$rol=$_POST['rol'];

$codigo=strtoupper($codigo);



//comprobar antes de ingresar
$comprobar="SELECT * from etapas where codigo = '$codigo'";

$r=mysqli_query($conexion,$comprobar);
$f=mysqli_num_rows($r);
if ($f==0) {
	$q="INSERT INTO etapas(netapas, codigo, idrol)
					VALUES ('$nombre','$codigo','$rol')";
				$resultado=mysqli_query($conexion,$q);


	if($resultado) {
		$alertProceso = "<div class='alert bg-success text-center'>
							Se inserto correctamente la etapa <a href='workspace.php?funcion=etapa' class='text-decoration-none text-white'>¡Actualice la pagina!<br><i style='border: none; background-color: transparent;'class='fas fa-sync-alt fa-'></i></a>
						</div>";
	} else {
		$alertProceso = "<div class='alert bg-danger text-center'>
							No se ingreso la etapa, vuelve a intentarlo							
	  					</div>";
	} 
}
else{
	$alertProceso = "<div class='alert bg-success text-center'>
						El codigo: $codigo, ya esta registrado VERIFIQUE! <a href='workspace.php?funcion=etapa' class='text-decoration-none text-white'>¡Actualice la pagina!<br><i style='border: none; background-color: transparent;'class='fas fa-sync-alt fa-'></i></a>
						</div>";
	
}

 