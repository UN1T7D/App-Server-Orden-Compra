<?php
	/* require_once "../conexion/conexion.php"; */
	//error_reporting(0);
    $pais=$_POST['pais'];
    $str=strtoupper($pais);
    $comprobar="SELECT * from pais where npais='$str'";
    $resultado=mysqli_query($conexion,$comprobar);
    $f=mysqli_num_rows($resultado);

    if ($f==1) {
        $alertProceso = "
		<div class='alert bg-danger text-white text-center'>
			No se puede registrar un pais 2 veces. <a href='workspace.php?funcion=crearpais' class='text-decoration-none text-white'>¡Actualice la pagina!<br><i style='border: none; background-color: transparent;'class='fas fa-sync-alt fa-'></i></a>
        </div>";
    }else{
        
        $sql="INSERT INTO pais(npais)VALUES ('$str')";
        $resultado=mysqli_query($conexion,$sql);
        if($resultado) {
            $alertProceso = "
            <div class='alert bg-success text-white text-center'>
                Se ha ingresado correctamente su pais. <a href='workspace.php?funcion=crearpais' class='text-decoration-none text-white'>¡Actualice la pagina!<br><i style='border: none; background-color: transparent;'class='fas fa-sync-alt fa-'></i></a>
            </div>";
            
            
        } else {
            $alertProceso = "
            <div class='alert bg-danger text-white text-center'>
                Al parecer hubo un error en la incersion de la orden de compra!
            </div>";
            
            
        } 	
    }     
	
	
	?>
