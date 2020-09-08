<?php
include('../conexion/conexion.php');

session_start();
error_reporting(0);
$varsesion=$_SESSION['usuario'];
$query="SELECT u.idrol,r.rol,u.nombre_user FROM usuarios as u INNER JOIN rol as r on u.idrol=r.idrol WHERE usuario ='$varsesion'";
require_once("../../controller/procesologistica.php");

if (isset($_POST["ordenes_compra_siguiente"])) {
  
  require_once("../../controller/logistica/finalizar.php");

}else{
  $alertProceso = "<div class='alert bg-litgh text-center'>
                    No se a realizado ninguna accion aun!
                  </div>";
}


$contador=1;
//fin fecha inicio
if($varsesion == null || $varsesion==''){
  echo "<script language='javascript'>
  alert('PORFAVOR INTRODUCIR CREDENCIALES')
  location.href='../login.html';
  </script>";
  die();
}
if($_SESSION['vsTipo']==3){
  
  require_once("../layout/admin/principal/crear-orden.php");
?>



<!--Fin barra de navegacion-->

<section class="mt-5">
  <div class="contenedor-dashboard">

      <div class="row">
        <div class="col-md-12">
          <?php
            echo $alertProceso;
          ?>
        </div>
      </div>
      
      <div class="">
        <div class="row">
          <div class="col-md-4 overflow-container">
            <?php 
            while ($ocver1=mysqli_fetch_array($ver1)) {
            ?>
            <div class="card-header">
              <div class="row">
                <div class="col-md-12 font-weight-bold">
                
                <?php
                    if ($varsesion == "logistica") {
                        
                        ?>
                            <span >
                                <i class="fas fa-plus fa-lg" ></i>
                                PENDIENTE 
                                <label style="  color: black;">(<?php echo $ocver1['oct'] ?>)</label>
                            </span>
                        <?php
                    }else {
                        
                        ?>

                            <a type="button"  data-toggle="modal" data-target="#modalregistro">
                            <i class="fas fa-plus fa-lg" ></i>
                            PENDIENTE 
                            <label style="  color: black;">(<?php echo $ocver1['oct'] ?>)</label>
                            </a>

                        <?php
                    }
                ?>
                </div>  
              </div>
            </div>
            <?php } ?>
            <br>
            <?php
              require_once("../layout/admin/principal/iniciar-orden.php");
            ?>
          </div>
          <!--row 2-->
          <div class="col-md-4 overflow-container">
            <?php 
            while ($ocver=mysqli_fetch_array($ver)) {
            ?>
              <div class="card-header">
                  <div class="row">
                      <div class="col-md-12">
                          <i class="fas fa-plus fa-lg" ></i>
                          <b style="color: black;">
                          EN PROCESO
                          </b>
                          <b><label style="  color: black;">(<?php echo $ocver['oct'] ?>)</label></b>
                      </div>  
                  </div>
              </div>
            <?php } ?>
            <br>
            <?php
              require_once("../layout/admin/principal/procesosFin.php");
            ?>
          </div>
          <!--row 3-->
          <div class="col-md-4 overflow-container">
            <?php 
            while ($ocver3=mysqli_fetch_array($ver3)) {
            ?>
              <div class="card-header">
                  <div class="row">
                      <div class="col-md-12">
                          <i class="fas fa-plus fa-lg" ></i>
                          <b style="color: black;">
                          FINALIZADO
                          </b>
                          <b><label style="  color: black;">(<?php echo $ocver3['oct'] ?>)</label></b>
                      </div>  
                  </div>
              </div>
          <?php } ?>
            <br>
            <?php
            while ($mostrar3=mysqli_fetch_array($resultado3)) {
              ?>
              <div class="alert alert-success alt" role="alert">
                <form class="form-horizontal" method="POST" action="../../controller/admin/ocultar.php" autocomplete="off">
                  <div class="row">
                    <div class="col-md-4"><b>OC: </b><label><?php echo $mostrar3['oc'] ?></label></div>
                    <input type="hidden" class="input-etapa" name="id" readonly value="<?php echo $mostrar3['oc'] ?>"><br>
                    <div class="col-md-4"><b>Inicio<br></b><label><?php echo $mostrar3['finicio'] ?></label></div>
                    <div class="col-md-4"><b>Pais: </b><label><?php echo $mostrar3['npais'] ?></label><br></div>
                    <input type="hidden" class="input-pais" name="pais" readonly value="<?php echo $mostrar3['npais'] ?>"><br>
                  </div>
                  <div class="row">
                    <div class="col-md-12"><b>Cliente<br></b><label><?php echo $mostrar3['ncliente'] ?></label><br></div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <b>Etapa<br></b>
                      <label id="etapa"><?php echo $mostrar3['netapas'] ?></label><br>
                      <input type="hidden" class="input-etapa" name="etapa" readonly value="<?php echo $mostrar3['idetapa'] ?>"><br>
                    </div>
                  </div>
                  <div class="subir row">
                    <div class="col-md-4"><label><b>Estado<br></b><?php echo $mostrar3['estado'] ?></label></div>
                    <div class="col-md-6"><b>Fin<br></b><label><?php echo $mostrar3['ffin'] ?></label></div>
                    <?php
                        if ($varsesion == "logistica") {
                            
                            ?>

                                <div class="col-md-2 p-2">
                                    <button type="submit" style="border: none; color: #A4A4A4; background-color: transparent;" disabled="disabled" title="Ocultar">
                                        <i class="fas fa-eye-slash fa-2x"></i>
                                    </button>
                                </div>
                            <?php

                        }else {
                            
                            ?>

                                <div class="col-md-2 p-2">
                                    <button type="submit" style="border: none; color: #FF000C; background-color: transparent;" title="Ocultar">
                                        <i class="fas fa-eye-slash fa-2x"></i>
                                    </button>
                                </div>
                            <?php
                        }
                    ?>
                  </div>
                </form>
              </div>
              <?php
            } 
            ?>
          </div>
        </div>
      </div>
      
  </div>

  <!--</div>-->
</section>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<?php
}else{
  header('Location:../../index.php');
}
?>
<!--Scrip para llenar un select con otro-->
<script type="text/javascript">
  $(document).ready(function(){
    //$('#pais').val();
    recargarLista();

    $('#pais').change(function(){
      recargarLista();
    });
  })
</script>
<script type="text/javascript">
  function recargarLista(){
    $.ajax({
      type:"POST",
      url:"../../controller/datos.php",
      data:"cliente=" + $('#pais').val(),
      success:function(r){
        $('#select2lista').html(r);
      }
    });
  }
</script>
<script>
  $('.icon').click(function(){
    $('span').toggleClass("cancel");
  });
</script>