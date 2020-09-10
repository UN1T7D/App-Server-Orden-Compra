<?php
$conexion = mysqli_connect("localhost", "root", "", "appserveroc")or die("No se pudo conectar a la base de datos");
$select_db = mysqli_select_db($conexion, 'appserveroc');
if (!$select_db){
    die("Ha fallado la conexion" . mysqli_error($conexion));
}

?>

