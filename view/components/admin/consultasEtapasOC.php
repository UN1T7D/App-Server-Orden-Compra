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
$sql="SELECT oc,ncliente,netapas,f_inicio,usuario FROM log_oc
order by idlogoc DESC limit 14";

$contador=1;

$result=mysqli_query($conexion,$sql);
$r=mysqli_query($conexion,$query);
//fecha de inicio
date_default_timezone_set("America/El_Salvador");
$registro =date("Y-m-d H:i:s");
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
            <center><H3>Historico de OC</H3></center>
          </div>
          <div class="card-body">
            <hr>
            <div class="row table-responsive">
              <!--id para datatable-->
              <table class="table table-striped" id="datatable">
                <thead>
                  <tr>
                    <th>OC</th>
                    <th>Clientes</th>
                    <th>Etapas</th>
                    <th>Fecha</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while($row = $result->fetch_array(MYSQLI_ASSOC)) { ?>
                    <tr>
                      <td><?php echo $row['oc']; ?></td>
                      <td><?php echo $row['ncliente']; ?></td>
                      <td><?php echo $row['netapas']; ?></td>
                      <td><?php echo $row['f_inicio']; ?></td>
                    </tr>
                    <!-- elminar modal -->
                    <div class="modal fade" id="exampleModalCenter<?php echo $contador?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                  
                                    <label for="" class="text-center display-4">Estas seguro de eliminar el cli</label><br>
                                  </div>
                                </div>
                                <input type="hidden" name="id" value="<?php echo $row['nit']; ?>" placeholder="<?php echo $row['nit']; ?>" >

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-ligth" data-dismiss="modal">Cancelar</button>
                                <button type="submit" name="admeliminarcliente" class="btn btn-danger">Eliminar</button>
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
                                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row['nit']; ?>" >
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label for="nombre">Nombre del Cliente</label>
                                  <input type="text" class="form-control" id="nombre" name="nombre" required value="<?php echo $row['ncliente']; ?>">
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="nit">NIT</label>
                                  <input type="text" class="form-control" id="nit" name="nit" required value="<?php echo $row['nit']; ?>">
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label for="contacto">Contacto</label>
                                  <input type="text" class="form-control" id="contacto" name="contacto" value="<?php echo $row['contacto']; ?>">
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="pais">Pais</label>
                                  <input type="text" class="form-control" id="pais" name="pais" disabled value="<?php echo $row['npais']; ?>">
                                </div>
                              </div>

                              
                              <div class="modal-footer">
                               <button type="submit" name="admineditcliente" class="btn btn-primary">Modificar</button>
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
                  <h5 class="modal-title">Nuevo Cliente</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form class="form-horizontal" method="POST" autocomplete="off">
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="nombre">Nombre del Cliente</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required placeholder="">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="nit">Nit</label>
                        <input type="text" class="form-control" id="nit" name="nit" required>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="contacto">Contacto</label>
                        <input type="text" class="form-control" id="contacto" name="contacto" >
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="pais">Pais</label>
                        <input list="bp" type="text" class="form-control" id="pais" name="pais">
                        <select id="bp">
                          <?php
                          $sql="SELECT idpais,npais
                          FROM pais";
                          $query = mysqli_query($conexion, $sql);
                          while ($valores = mysqli_fetch_array($query)) 
                          {
                            echo '<option value="'.$valores['idpais'].'">'.$valores['npais'].'</option>';
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    
                    <div class="modal-footer">
                    <button type="submit" name="adminaggcliente" class="btn btn-primary">Guardar</button>
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
<script>
  $(document).ready(function() {
    var table = $('#datatable').DataTable( {
      lengthChange: false,
      buttons: [ 'copy', 'excel', 'csv', 'pdf', 'colvis' ]
    } );

    table.buttons().container()
    .appendTo( '#datatable_wrapper .col-md-6:eq(0)' );
  } );
</script>
<script type="text/javascript">
  $(document).ready( function () {
    $('#datatable').DataTable();
  } );
</script>
<!---------------------------------------->

<script type="text/javascript">
  $(document).ready( function () {
    $('#datatable').DataTable();
  } );
</script>
