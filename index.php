<?php
    if (isset($_POST["login"])) {
        require_once("configuration/validar.php");
    }else { 
        $alerta = "<div class='alert bg-ligth'>
                        Por favor complete los campos necesarios.
                    </div>";
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>GRUPO GUARDADO</title>
	<link rel="icon" type="image/png" href="view/assets/img/ico.ico">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="view/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
	<link href="view/assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="view/assets/css/mdb.min.css" rel="stylesheet">
	<link rel="stylesheet" href="view/assets/css/estilos.css">
</head>
<body style="background: #EFEFFB;">
	

	<section class="jumbotron" style="height: 150px;">
		<div class="container">
			<h1>Grupo Guardado</h1>
			<p>Bienvenido a Kanbanflow Exportaciones.</p>
		</div>
	</section>

	<section class="main container homeVirtual" style="background:#F2F2F2;">
		<div class="row">
			<section class="posts col-md-6" >
				<article class="post clearfix ">
					<!-- Default form login -->
					<form class="text-center border border-light p-5 "  method="post">
						<p class="h4 mb-4">Iniciar Sesion</p>
						<!-- Usuario -->
						<input type="text" name="usuario" id="usuario"  class="form-control mb-4 col-md-12" placeholder="Usuario" required="">
						<!-- Password -->
						<input type="password" name="pwd" id="pwd" class="form-control mb-4 col-md-12" placeholder="Contraseña" required="">	
						<!-- Sign in button -->
						<button class="btn btn-info btn-block my-4" name="login" type="submit">Ingresar</button>
						<br><br>
                        <div class="row">
                            <div class="col-xl-12">
                                <?php
                                    echo $alerta;
                                ?>
                            </div>
                        </div>
					</form>
					<!-- Default form login -->
				</article>
			</section>
			<aside class="col-md-6 hidden-xs hidden-sm">
				<div class="view overlay zoom ">
					<img src="view/assets/img/gg.png" class="img-fluid " alt="zoom">
					<div class="mask flex-center waves-effect waves-light rgba-blue-slight">
					</div>
				</div>		  
			</aside>
		</div>
	</section>

	<footer>
		<div class="container">
			<div class="row">
				<div class="col-xs-6">
					<p>Grupo Guardado S.A de C.V</p>
				</div>
				<div class="col-xs-6">
					<ul class="list-inline text-right">
						<li><a href="#">Inicio</a></li>
						<li><a href="#">Quienes Somos</a></li>
						<li><a href="#">Contacto</a></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="view/assets/js/jquery.js"></script>
	<script src="view/assets/js/bootstrap.min.js"></script>
</body>
</html>