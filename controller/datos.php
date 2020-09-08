<?php 
include('../configuration/conexion.php');
$lista2=$_POST['cliente'];

	$sql="SELECT c.nit,c.ncliente 
	from clientes as c
	inner join pais as p on 
	c.idpais=p.idpais where p.idpais='$lista2'";

	$result=mysqli_query($conexion,$sql);

	$cadena="<label for=cliente>Cliente</label><br>
			<select class=col-sm-12 id='cliente' name='cliente'>";

	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.'<option value='.$ver[0].'>'.utf8_encode($ver[1]).'</option>';
	}

	echo  $cadena."</select>";
	

?>