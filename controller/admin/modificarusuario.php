<?php
/* require_once "../conexion/conexion.php"; */
error_reporting();
$id=$_POST['id'];
$rol=$_POST['rol'];

$sql="UPDATE usuarios SET idrol='$rol' WHERE usuario='$id'";
$resultado=mysqli_query($conexion,$sql);


if($resultado) {
  $alertProceso = "<div class='alert bg-success text-center'>
            Se actualizo correctamente el usuario <a href='workspace.php?funcion=usuarios' class='text-decoration-none text-white'>¡Actualice la pagina!<br><i style='border: none; background-color: transparent;'class='fas fa-sync-alt fa-'></i></a>
          </div>";
} else {
  $alertProceso = "<div class='alert bg-danger text-center'>
            No se actualizo el usuario, vuelve a intentarlo 
            </div>";
}