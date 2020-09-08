<?php
	session_start();
	error_reporting(0);
	$varsesion=$_SESSION['usuario'];
	if($varsesion == null || $varsesion==''){
    echo"<script language='javascript'>
    alert('PORFAVOR INTRODUCIR CREDENCIALES')
    </script>";
    die();
  }
  session_destroy();
  header("Location:../index.php");
?>