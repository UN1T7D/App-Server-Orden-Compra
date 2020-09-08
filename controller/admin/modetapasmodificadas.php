<?php
require_once "../../configuration/conexion.php";
error_reporting();
$id=$_POST['id'];
$estado=$_POST['estado'];
$visible=$_POST['visible'];

$sql="UPDATE oc SET estado='$estado',visible='$visible' WHERE oc='$id'";
$resultado=mysqli_query($conexion,$sql);


?>
<html lang="es">
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<script src="https://use.fontawesome.com/releases/v5.13.1/js/all.js" data-auto-replace-svg="nest"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="js/funciones.js"></script>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body class="aling-center" style="background-color:#A6ACAF;">
	<div class="container col-sm-2" >
		<div class="row">
			<div class="row" style="text-align:center">
				<?php if($resultado) {
					echo "<script language='javascript'>
					alert('OC Actualizado correctamente.')
					location.href='../../view/components/workspace.php?funcion=finalizadas';
					</script>";
					die();
				} else {
					echo "<script language='javascript'>
					alert('Algo Salio Mal!')
					location.href='../../view/components/workspace.php?funcion=finalizadas';
					</script>";
					die();
				} ?>					
			</div>
		</div>			
	</div>
</body>
</html>