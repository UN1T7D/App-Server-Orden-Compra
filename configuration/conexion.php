<?php
$conexion = mysqli_connect("den1.mysql6.gear.host", "appserveroc", "Wh1d2x24?~Xf", "appserveroc")or die("No se pudo conectar a la base de datos");
$select_db = mysqli_select_db($conexion, 'appserveroc');
if (!$select_db){
    die("Ha fallado la conexion" . mysqli_error($conexion));
}

?>

