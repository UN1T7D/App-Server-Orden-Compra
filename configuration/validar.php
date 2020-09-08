<?php
require_once "conexion.php";
error_reporting(0);
session_start();

$errorLogin=$_POST['ErrorLogin'];
$usuario=$_POST['usuario'];
$clave=$_POST['pwd'];
$_SESSION['usuario']=$usuario;


#activar el pwdencriptado para comparar
$pwdencriptado=md5($clave);

//conectar a la bd
$consulta="SELECT idrol FROM usuarios where usuario='$usuario' and pwd = '$pwdencriptado'";

$resultado=mysqli_query($conexion, $consulta);

//si encuentra datos sera 1 sino sera 0
$fila=mysqli_num_rows($resultado);

if ($fila > 0) {
    
   
    $row=mysqli_fetch_array($resultado); 
    $_SESSION['vsTipo']=$row['idrol'];
    if ($row['idrol'] == 1) {
        header("Location:view/components/dashboard.php");
    }elseif ($row['idrol'] == 2) {
        header("Location:view/components/dashboard.php");
    }elseif ($row['idrol'] == 3) {
        header("Location:view/components/dashboard.php");
    }elseif($row['idrol'] == 4) {
        header("Location:view/components/dashboard.php");
    }else{
        header("Location:../index.php");
    }
   

}else {
    
    $alerta = "<div class='alert bg-danger text-white'>
                    Los campos son erroneos
                </div>";
}


mysqli_free_result($resultado);
mysqli_close($conexion);
?>
