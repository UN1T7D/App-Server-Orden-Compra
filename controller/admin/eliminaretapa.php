<?php
	require_once "../../configuration/conexion.php";
	error_reporting(0);
	$id=$_POST['id'];
    #verificar si la oc a elminar no contiene una oc pendiente
	$verificar="SELECT * FROM pais_etapa where idetapa='$id'";

	$veri=mysqli_query($conexion,$verificar);
	$row=mysqli_num_rows($veri);
	if ($row>0) {
        $alertProceso = "<div class='alert bg-danger text-center'>
        No se puede eliminar la etapa, porque esta asignada a Pais <-> Etapa. 
        </div>";
	}else{
	
		$sql = "DELETE FROM etapas WHERE idetapa = '$id'";
        $resultado = mysqli_query($conexion, $sql);	

        if($resultado) {
            $alertProceso = "<div class='alert bg-success text-center'>
                    Se elimino correctamente la etapa <a href='workspace.php?funcion=etapa' class='text-decoration-none text-white'>¡Actualice la pagina!<br><i style='border: none; background-color: transparent;'class='fas fa-sync-alt fa-'></i></a>
                    </div>";
        } else {
            $alertProceso = "<div class='alert bg-danger text-center'>
                    No se elimino el usuario, vuelve a intentarlo 
                    </div>";
        }
    }