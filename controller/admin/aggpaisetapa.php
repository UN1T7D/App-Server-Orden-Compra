<?php
	/* require_once "../conexion/conexion.php"; */
	//error_reporting(0);
    $pais=$_POST['pais'];
    $etapa=$_POST['etapa'];
    $porcentaje=$_POST['porcentaje'];

    $comprobar="SELECT * from pais_etapa where idpais='$pais' and idetapa='$etapa'";
    $resultado=mysqli_query($conexion,$comprobar);
    $f=mysqli_num_rows($resultado);

    if ($f==1) {
        $alertProceso = "
		<div class='alert bg-danger text-white text-center'>
			No se puede asignar 2 veces. <a href='workspace.php?funcion=asignar' class='text-decoration-none text-white'>¡Actualice la pagina!<br><i style='border: none; background-color: transparent;'class='fas fa-sync-alt fa-'></i></a>
        </div>";
    }else{
        
        $sql="INSERT INTO pais_etapa(idetapa,idpais,porcentaje)VALUES ('$etapa','$pais','$porcentaje')";
        $resultado=mysqli_query($conexion,$sql);
        if($resultado) {
            $alertProceso = "
            <div class='alert bg-success text-white text-center'>
                Se ha ingresado correctamente su pais. <a href='workspace.php?funcion=asignar' class='text-decoration-none text-white'>¡Actualice la pagina!<br><i style='border: none; background-color: transparent;'class='fas fa-sync-alt fa-'></i></a>
            </div>";
            
            
        } else {
            $alertProceso = "
            <div class='alert bg-danger text-white text-center'>
                Al parecer hubo un error!
            </div>";
            
            
        } 	
    }     
	
	
	?>