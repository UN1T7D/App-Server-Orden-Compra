<?php
/* include('../conexion/conexion.php'); */
//header('Content-Type: text/html; charset=ISO-8859-1'); 
  //inicio de session

session_start();
error_reporting(0);
$varsesion=$_SESSION['usuario'];
$query="SELECT u.idrol,r.rol,u.nombre_user FROM usuarios as u INNER JOIN rol as r on u.idrol=r.idrol WHERE usuario ='$varsesion'";
  //fin inicio de session

  //echo $varsesion;

  //Consulta trae clientes
$sql="SELECT idetapa,netapas,codigo,idrol 
from etapas
order by codigo";

$contador=1;

$result=mysqli_query($conexion,$sql);
$r=mysqli_query($conexion,$query);
//fecha de inicio
date_default_timezone_set("America/El_Salvador");
$registro =date("Y-m-d H:i:s");

if (isset($_POST['adminaggetapa'])) {
  require_once("../../controller/admin/insertetapa.php");
}elseif (isset($_POST['editetapa'])) {
  require_once("../../controller/admin/editetapa.php");
}elseif (isset($_POST['eliminaretapa'])) {
  require_once("../../controller/admin/eliminaretapa.php");
}
else {
  
  $alertProceso = "<div class='alert bg-litgh text-center'>
                    No se a realizado ninguna accion aun!
                  </div>";
}

if($varsesion == null || $varsesion==''){
  header("Location:../../../index.php");
  die();
}
/* if($_SESSION['vsTipo']==1){ */
?>
<section >
    <div class="contenedor-dashboard">
    <div class="row p-1">
        <div class="col-md-6 m-auto text-center">
          <?php
            echo $alertProceso;
          ?>
        </div>
      </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="card text-left">
          <div class="card-header">
            <center><H3>Etapas</H3></center>
          </div>
          <div class="card-body">
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalregistro">
              Agregar nuevo <span class="fa fa-plus-circle"></span>
            </button>
            <hr>
            <div class="row table-responsive">
              <!--id para datatable-->
              <table class="table table-striped" id="datatable">
                <thead>
                  <tr>
                    <th>Etapa</th>
                    <th>Codigo</th>
                    <th></th>
                    <th></th>

                  </tr>
                </thead>
                <tbody>
                  <?php while($row = $result->fetch_array(MYSQLI_ASSOC)) { ?>
                    <tr>
                      <td><?php echo $row['netapas']; ?></td>
                      <td><?php echo $row['codigo']; ?></td>
                      <td><button class="btn btn-success" data-toggle="modal" data-target="#editar<?php echo $contador ?>" ><i class="fas fa-user-edit"></i></button></td>
                      <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#eliminaretapa<?php echo $contador?>"><i class="fas fa-trash-alt"></i></button></td>
                    </tr>
                    <!-- elminar modal -->
                    <div class="modal fade" id="eliminaretapa<?php echo $contador?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form action="" method="post">
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-md-12 m-auto">
                                  
                                    <label for="" class="text-center display-6">Estas seguro de eliminar esta etapa</label><br>
                                    <label for="" class="text-center display-6"><?php echo $row['netapas']; ?></label><br>
                                  </div>
                                </div>
                                <input type="hidden" name="id" value="<?php echo $row['idetapa']; ?>" placeholder="<?php echo $row['idetapa']; ?>" >

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-ligth" data-dismiss="modal">Cancelar</button>
                                <button type="submit" name="eliminaretapa" class="btn btn-danger">Eliminar</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>

                    <!-- fin modal -->
                    <!--modal modificar-->
                    <div class="modal" tabindex="-1" role="dialog" id="editar<?php echo $contador; ?>">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Modificar Cliente <?php echo $contador; ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form class="form-horizontal" method="POST" autocomplete="off">
                              <div class="form-group col-md-2">
                                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row['idetapa']; ?>" >
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label for="nombre">Nombre Etapa</label>
                                  <input type="text" class="form-control" id="etapa" name="etapa" required value="<?php echo $row['netapas']; ?>">
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="codigo">Codigo</label>
                                  <input type="text" class="form-control" id="codigo" name="codigo" required value="<?php echo $row['codigo']; ?>">
                                </div>
                              </div>                              
                              <div class="modal-footer">
                               <button type="submit" name="editetapa" class="btn btn-primary">Modificar</button>
                             </div>
                           </form>
                         </div>
                       </div>
                     </div>
                   </div>

                   <!--fin modal modificar-->

                   <?php
                   $contador++;
                 } ?>
               </tbody>
             </table>
           </div>
           <div class="modal" tabindex="-1" role="dialog" id="modalregistro">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Nueva etapa</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form class="form-horizontal" method="POST" autocomplete="off">
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="nombre">Nombre de Etapa</label>
                        <input type="text" class="form-control" id="etapa" name="etapa" required placeholder="">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="codigo">Codigo</label>
                        <input type="text" class="form-control" id="codigo" name="codigo" required>
                      </div>
                    </div> 
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="rol"> Responsable</label>
                        <select id="rol" name="rol" class="form-control">
                          <?php
                          $sql="SELECT idrol,rol
                          FROM rol";
                          $query = mysqli_query($conexion, $sql);
                          while ($valores = mysqli_fetch_array($query)) 
                          {
                            echo '<option value="'.$valores['idrol'].'">'.$valores['rol'].'</option>';
                          }
                          ?>
                        </select>
                      </div>
                    </div>                   
                    <div class="modal-footer">
                     <button type="submit" name="adminaggetapa" class="btn btn-primary">Guardar</button>
                   </div>
                 </form>
               </div>
             </div>
           </div>
         </div>
       </div>
       <div class="card-footer text-muted">
        GRUPO GUARDADO S.A DE C.V
      </div>
    </div>
    </div>
</section>
<script type="text/javascript">
  $(document).ready( function () {
    $('#datatable').DataTable();
  } );
</script>