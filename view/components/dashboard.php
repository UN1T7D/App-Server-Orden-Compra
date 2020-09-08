<?php
include('../../configuration/conexion.php');
//header('Content-Type: text/html; charset=ISO-8859-1'); 
  //inicio de session

session_start();
error_reporting(0);
$varsesion=$_SESSION['usuario'];
$query="SELECT u.idrol,r.rol,u.nombre_user FROM usuarios as u INNER JOIN rol as r on u.idrol=r.idrol WHERE usuario ='$varsesion'";
  //fin inicio de session

$r=mysqli_query($conexion,$query);
if($varsesion == null || $varsesion==''){
  echo "<script language='javascript'>
  alert('PORFAVOR INTRODUCIR CREDENCIALES')
  location.href='../../index.php';
  </script>";
  die();
}
if($_SESSION['vsTipo'] > 0){
?>
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script src="https://use.fontawesome.com/releases/v5.13.1/js/all.js" data-auto-replace-svg="nest"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="../assets/js/funciones.js"></script>

  <!--refrescar pagina cada-->
  <link rel="stylesheet" href="../assets/css/estilosprincipal.css">
  <meta http-equiv="refresh" content="180" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/style.css">

  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/estilosmenu.css">
  <link rel="stylesheet" href="../assets/icon/style.css">
  <link rel="stylesheet" href="../assets/css/barraprogreso.css">

  <title>GRUPO GUARDADO</title>
</head>
<body background="../assets/img/f3.png" style="background-size: cover;">
  <!--Inicio barra de navegacion-->
  <!--Inicio barra de navegacion-->
  <header>
    <div class="container-header">
      <div class="container-logo-title">
        <img src="../assets/img/logo.png" alt="">
        <h2>Kanbanflow Exportaciones</h2>
      </div>

      <div class="container-menu">
       <label class="icon-menu"></label>
       <nav class="menu">
        <ul>
          <li class="nav-item dropdown">
            <?php 
            while ($m=mysqli_fetch_array($r)){
              ?>
              <a class="nav-link text-white" href="../procesos/cerrar_sesion.php" data-toggle="modal" data-target="#logoutModal">
                <?php echo $m['nombre_user'] ?> (<?php echo $m['rol'] ?>)
                <i class="fas fa-sign-out-alt"></i>
              </a>
              <?php
            }
            ?>
            
          </li>
        </ul>

      </nav>
    </div>
  </div>
</header>
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Listo para irte?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">X</span>
        </button>
      </div>
      <div class="modal-body">Selecciona "Salir" si estas listo para finalizar su sesion actual.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
        <a class="btn btn-primary" href="../../configuration/cerrar_sesion.php">Salir</a>
      </div>
    </div>
  </div>
</div>
<!--Fin modal-->

<!--Fin barra de navegacion-->
<br>
<section>
  <h1 class="title">Menu Principal</h1>
    
    <div class="container">
       
        <?php
            if ($_SESSION['vsTipo']==1) {
                
                require_once("../layout/menu-admin.php");

                ?>
                <div class="contenedor-configuracion">
                  <a data-toggle="modal" data-target="#exampleModalCenter"> <i class="fas fa-cogs text-white"></i></a>
                </div>
        
                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Ajustes <i class="fas fa-toolbox"></i></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                      <div class="row">
                        <div class="col-md-6">
                          <a type="button" href="workspace.php?funcion=crearpais" class="btn btn-outline-primary"><i class="fas fa-globe-americas"></i> Agregar Pais</a>
                        </div>
                        <div class="col-md-6">
                          <a type="button"  href="workspace.php?funcion=asignar" class="btn btn-outline-success"><i class="fas fa-folder-plus"></i> Asignar Pais <i class="fas fa-angle-double-right"></i> Etapa</a>
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-md-6">
                        <a type="button" href="workspace.php?funcion=etapa" class="btn btn-outline-primary"><i class="fas fa-clipboard"></i> Agregar Etapa</a>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                      </div>
                    </div>
                  </div>
                </div>
                <?php
            }elseif ($_SESSION['vsTipo']==2) {

                require_once("../layout/menu-exportaciones.php");

            }elseif ($_SESSION['vsTipo']==3) {

                require_once("../layout/menu-logistica.php");

            }elseif ($_SESSION['vsTipo']==4){

                require_once("../layout/menu-visitas.php");

            }
        ?>
        

    </div>
</section>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="../assets/js/jquery.js"></script>
<script src="../assets/js/script.js"></script>
</body>
</html>
<?php
}else{
  header('Location:../../index.php');
}
?>