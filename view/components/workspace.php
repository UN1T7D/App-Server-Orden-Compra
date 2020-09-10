<?php
    require_once("../../configuration/conexion.php");
    session_start();
    error_reporting(0);
    $varsesion=$_SESSION['usuario'];
    $r=mysqli_query($conexion,$query);

    if($varsesion == null || $varsesion==''){
        echo "<script language='javascript'>
        alert('PORFAVOR INTRODUCIR CREDENCIALES')
        location.href='../../index.php';
        </script>";
        die();
    }
    $varsesion=$_SESSION['usuario'];
    $query="SELECT u.idrol,r.rol,u.nombre_user FROM usuarios as u INNER JOIN rol as r on u.idrol=r.idrol WHERE usuario ='$varsesion'";
    $r=mysqli_query($conexion,$query);
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
    <!--button-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
    <!---->

    <!--refrescar pagina cada-->
    <link rel="stylesheet" href="../assets/css/estilosprincipal.css">
    <meta http-equiv="refresh" content="180" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/estilosmenu.css">
    <link rel="stylesheet" href="../assets/icon/style.css">
    <link rel="stylesheet" href="../assets/css/barraprogreso.css">

    <title>GRUPO GUARDADO</title>
</head>
    <body background="../assets/img/f3.png" style="background-size: cover;">
    <!--Inicio barra de navegacion-->
    <!--Inicio barra de navegacion-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
        <a class="navbar-brand ml-5" href="#">
        <img src="../assets/img/logo.png" width="230" height="90" class="d-inline-block align-top" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="dashboard.php">KANBANFLOW EXPORTACIONES <span class="sr-only">(current)</span></a>
            </li>
            <?php
                if ($_SESSION['vsTipo'] == 1) {
                    ?>
                            <li class="nav-item"><a class='nav-link text-white' href='dashboard.php'><i class='fas fa-home fa-lg'></i></a></li>
                            <li class="nav-item"><a class='nav-link text-white' href='workspace.php?funcion=exportaciones'>Exportaciones</a></li>
                            <li class="nav-item"><a class='nav-link text-white' href='workspace.php?funcion=usuarios'>Usuarios</a></li>
                            <li class="nav-item"><a class='nav-link text-white' href='workspace.php?funcion=clientes'>Clientes</a></li>
                            <li class="nav-item"><a class='nav-link text-white' href='workspace.php?funcion=finalizadas'>Consultas OC</a></li>
                            <li class="nav-item"><a class='nav-link text-white' href='workspace.php?funcion=consultasEtapasOC'>C etapas OC</a></li>
            <?php
                }elseif ($_SESSION['vsTipo'] == 2) {
                    
            ?>
                            <li class="nav-item"><a class='nav-link text-white' href='dashboard.php'><i class='fas fa-home fa-lg'></i></a></li>
                            <li class="nav-item"><a class='nav-link text-white' href='workspace.php?funcion=exportacionesexpo'>Exportaciones</a></li>
                            <li class="nav-item"><a class='nav-link text-white' href='workspace.php?funcion=clientesexpo'>Clientes</a></li>
                            <li class="nav-item"><a class='nav-link text-white' href='workspace.php?funcion=finalizadasexpo'>Consultas OC</a></li>
                            <li class="nav-item"><a class='nav-link text-white' href='workspace.php?funcion=consultasEtapasOC'>C etapas OC</a></li>
            <?php
                }elseif ($_SESSION['vsTipo'] == 3) {
                    
            ?>
                        <li class="nav-item"><a class='nav-link text-white' href='dashboard.php'><i class='fas fa-home fa-lg'></i></a></li>
                        <li class="nav-item"><a class='nav-link text-white' href='workspace.php?funcion=exportacioneslogistica'>Exportaciones</a></li>
                        <li class="nav-item"><a class='nav-link text-white' href='workspace.php?funcion=finalizadaslogistica'>Consultas OC</a></li>
                        <li class="nav-item"><a class='nav-link text-white' href='workspace.php?funcion=consultasEtapasOC'>C etapas OC</a></li>
            <?php
                }elseif ($_SESSION['vsTipo'] == 4) {
                    
            ?>
                        <li class="nav-item"><a class='nav-link text-white' href='dashboard.php'><i class='fas fa-home fa-lg'></i></a></li>
                        <li class="nav-item"><a class='nav-link text-white' href='workspace.php?funcion=exportacionesvisitas'>Exportaciones</a></li>
                        <li class="nav-item"><a class='nav-link text-white' href='workspace.php?funcion=finalizadasvisitas'>Consultas OC</a></li>
                        <li class="nav-item"><a class='nav-link text-white' href='workspace.php?funcion=consultasEtapasOC'>C etapas OC</a></li>
            <?php
                }
            ?>
        </ul>
        <div class="form-inline my-2 my-lg-0">
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
        </div>
        </div>
    </nav>
    <!-- <header>
        <div class="container-header">
        <div class="container-logo-title">
            <img src="../assets/img/logo.png" alt="">
            <h2>Kanbanflow Exportaciones</h2>
        </div>

        <div class="container-menu">
            <label class="icon-menu"></label>
            <?php
                if ($_SESSION['vsTipo'] == 1) {
                    ?>
                    <nav class='menu'>
                        <ul>
                            <li><a class='nav-link text-white' href='dashboard.php'><i class='fas fa-home fa-lg'></i></a></li>
                            <li><a class='nav-link text-white' href='workspace.php?funcion=exportaciones'>Exportaciones</a></li>
                            <li><a class='nav-link text-white' href='workspace.php?funcion=usuarios'>Usuarios</a></li>
                            <li><a class='nav-link text-white' href='workspace.php?funcion=clientes'>Clientes</a></li>
                            <li><a class='nav-link text-white' href='workspace.php?funcion=finalizadas'>Consultas OC</a></li>
                            <li><a class='nav-link text-white' href='workspace.php?funcion=consultasEtapasOC'>C etapas OC</a></li>
                            <li class='nav-item dropdown'>
                                <?php 
                                    while ($m=mysqli_fetch_array($r)){
                                ?>
                                        <a class='nav-link text-white' href='../procesos/cerrar_sesion.php' data-toggle='modal' data-target='#logoutModal'>
                                            <?php echo $m['nombre_user'] ?> (<?php echo $m['rol'] ?>)
                                            <i class='fas fa-sign-out-alt'></i>
                                        </a>
                                <?php
                                }
                                ?>
                            </li>
                        </ul>
            
                    </nav>
            <?php
                }elseif ($_SESSION['vsTipo'] == 2) {
                    
            ?>
                <nav class='menu'>
                    <ul>
                         <li><a class='nav-link text-white' href='dashboard.php'><i class='fas fa-home fa-lg'></i></a></li>
                            <li><a class='nav-link text-white' href='workspace.php?funcion=exportacionesexpo'>Exportaciones</a></li>
                            <li><a class='nav-link text-white' href='workspace.php?funcion=clientesexpo'>Clientes</a></li>
                            <li><a class='nav-link text-white' href='workspace.php?funcion=finalizadasexpo'>Consultas OC</a></li>
                            <li><a class='nav-link text-white' href='workspace.php?funcion=consultasEtapasOC'>C etapas OC</a></li>
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
            <?php
                }elseif ($_SESSION['vsTipo'] == 3) {
                    
            ?>
                <nav class='menu'>
                    <ul>
                        <li><a class='nav-link text-white' href='dashboard.php'><i class='fas fa-home fa-lg'></i></a></li>
                        <li><a class='nav-link text-white' href='workspace.php?funcion=exportacioneslogistica'>Exportaciones</a></li>
                        <li><a class='nav-link text-white' href='workspace.php?funcion=finalizadaslogistica'>Consultas OC</a></li>
                        <li><a class='nav-link text-white' href='workspace.php?funcion=consultasEtapasOC'>C etapas OC</a></li>
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
            <?php
                }elseif ($_SESSION['vsTipo'] == 4) {
                    
            ?>
                <nav class='menu'>
                    <ul>
                        <li><a class='nav-link text-white' href='dashboard.php'><i class='fas fa-home fa-lg'></i></a></li>
                        <li><a class='nav-link text-white' href='workspace.php?funcion=exportacionesvisitas'>Exportaciones</a></li>
                        <li><a class='nav-link text-white' href='workspace.php?funcion=finalizadasvisitas'>Consultas OC</a></li>
                        <li><a class='nav-link text-white' href='workspace.php?funcion=consultasEtapasOC'>C etapas OC</a></li>
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
            <?php
                }
            ?>
        </div>
    </header> -->
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
    <!-- <h1 class="title">Menu Principal</h1> -->
        
        <div class="container ">
        
            <?php
            
                if($_SESSION['vsTipo']==1) {
                    
                    $workspace = $_GET["funcion"];

                    if ($workspace =="exportaciones") {

                        require_once("admin/principal.php");

                    }elseif ($workspace =="usuarios") {

                        require_once("admin/usuarios.php");

                    }elseif ($workspace =="clientes") {

                        require_once("admin/clientes.php");

                    }elseif ($workspace =="finalizadas") {

                        require_once("admin/ocfin.php");

                    }elseif ($workspace =="consultasEtapasOC") {

                        require_once("admin/consultasEtapasOC.php");

                    }elseif ($workspace =="crearpais") {

                        require_once("admin/pais.php");

                    }elseif ($workspace =="asignar") {

                        require_once("admin/asignar.php");

                    }elseif ($workspace =="etapa") {

                        require_once("admin/etapa.php");

                    }else {
                       
                        require_once("error.php");
                    }

                }elseif ($_SESSION['vsTipo']==2) {

                    $workspace = $_GET["funcion"];

                    if ($workspace =="exportacionesexpo") {

                        require_once("exportaciones/exportaciones.php");

                    }elseif ($workspace =="clientesexpo") {

                        require_once("exportaciones/clientes.php");

                    }elseif ($workspace =="finalizadasexpo") {

                        require_once("exportaciones/ocfin.php");

                    }elseif ($workspace =="consultasEtapasOC") {

                        require_once("admin/consultasEtapasOC.php");

                    }else {
                       
                        require_once("error.php");
                    }

                }elseif ($_SESSION['vsTipo']==3) {

                    $workspace = $_GET["funcion"];

                    if ($workspace =="exportacioneslogistica") {

                        require_once("logistica/exportaciones.php");

                    }elseif ($workspace =="finalizadaslogistica") {

                        require_once("logistica/ocfin.php");

                    }elseif ($workspace =="consultasEtapasOC") {

                        require_once("admin/consultasEtapasOC.php");

                    }else {
                       
                        require_once("error.php");
                    }
                    
                }elseif($_SESSION['vsTipo']==4){
                    $workspace = $_GET["funcion"];
                    if ($workspace =="exportacionesvisitas") {
                        
                        require_once("admin/principal.php");

                    }elseif ($workspace =="finalizadasvisitas") {

                        require_once("logistica/ocfin.php");

                    }elseif ($workspace =="consultasEtapasOC") {

                        require_once("admin/consultasEtapasOC.php");
                        
                    }else {
                        require_once("error.php");
                       
                    }
                    
                }else {
                    
                    require_once("error.php");
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
    <script src="../../assets/js/jquery.js"></script>
    <script src="../../assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
</body>
</html>

<?php
}else{
    require("../../configuration/cerrar_sesion.php");
    header('Location:../../index.php');
  }
?>