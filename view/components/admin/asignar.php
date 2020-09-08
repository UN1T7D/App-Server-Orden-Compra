<?php

session_start();
error_reporting(0);
$varsesion=$_SESSION['usuario'];


$query="SELECT u.idrol,r.rol,u.nombre_user FROM usuarios as u INNER JOIN rol as r on u.idrol=r.idrol WHERE usuario ='$varsesion'";
 
  //Consulta 1 trae todas los datos
$sql="SELECT e.netapas,p.npais,pe.porcentaje,pe.idpais_etapa
FROM pais_etapa as pe 
inner join etapas as e ON
pe.idetapa=e.idetapa
INNER JOIN pais as p ON
pe.idpais = p.idpais";
$result=mysqli_query($conexion,$sql);

$contador=1;

if(isset($_POST['update'])){
  require_once("../../controller/admin/editpe.php");
}
elseif(isset($_POST['aggpaisetapa'])){
  require_once("../../controller/admin/aggpaisetapa.php");
}
elseif(isset($_POST['delete'])){
  require_once("../../controller/admin/deletepe.php");
}
else {
  
  $alertProceso = "<div class='alert bg-litgh text-center'>
                    No se a realizado ninguna accion aun!
                  </div>";
}
/* $r=mysqli_query($conexion,$query); */

if($varsesion == null || $varsesion==''){
  echo "<script language='javascript'>
  alert('PORFAVOR INTRODUCIR CREDENCIALES')
  location.href='../login.html';
  </script>";
  die();
}
/* if($_SESSION['vsTipo']==1){ */


?>
<section>
  <div class="contenedor-dashboard">
  <div>
        <div class="col-md-6 m-auto text-center">
          <?php
            echo $alertProceso;
          ?>
        </div>
      </div>
  <div class="row">
        <div class="col-md-12 p-3">
          <div class="card">
            <div class="card-header">
              <b><H3 class="text-center">Asignar Pais <i class="fas fa-arrows-alt-h"></i> Etapa</H3></b>
            </div>
            <div class="card-body">
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalregistro">
                Asignar <i class="fas fa-angle-double-left"></i> <i class="fas fa-angle-double-right"></i>
              </button>
              <hr>
              <div class="row table-responsive-sm">
                <!--id para datatable-->
                <div class="col-xl-12">
                  <table id="datatable" class="table table-hover" >
                    <thead class="thead-dark" style="font-size:13px">
                      <tr class="text-center">
                        <th>Pais</th>
                        <th><i class="fas fa-arrows-alt-h"></i></th>
                        <th>Etapa</th>
                        <th>Porcentaje</th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php while($row = $result->fetch_array(MYSQLI_ASSOC)) { ?>
                        <tr class="text-center">
                          <td><?php echo $row['npais']; ?></td>
                          <td><i class="fas fa-arrows-alt-h"></i></td>
                          <td><?php echo $row['netapas']; ?></td>
                          <td><?php echo $row['porcentaje']; ?></td>
                          <td><button class="btn btn-success" data-toggle="modal" data-target="#update<?php echo $contador ?>" ><i class="fas fa-user-edit"></i></button></td>
                          <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?php echo $contador?>"><i class="fas fa-trash-alt"></i></button></td>
                        </tr> 
                        <!-- MODAL ELIMINAR -->
                          <div class="modal fade" id="delete<?php echo $contador?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                      
                                        <label for="" class="text-center display-6">Estas seguro de eliminar esta asignacion:</label><br>
                                        <label for="" style="color:red;" class="text-center display-6"><?php echo $row['npais']; ?> <i class="fas fa-arrows-alt-h"></i> <?php echo $row['netapas']; ?></label>
                                      </div>
                                    </div>
                                    <input type="hidden" name="id" value="<?php echo $row['idpais_etapa']; ?>" placeholder="<?php echo $row['idpais_etapa']; ?>" >

                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-ligth" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" name="delete" class="btn btn-danger">Eliminar</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        <!-- fin delete -->
  
                        <!--modal modificar-->
  
                        <div class="modal" tabindex="-1" role="dialog" id="update<?php echo $contador; ?>">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Modificar Etapa <?php echo $contador; ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form class="form-horizontal" method="POST" autocomplete="off">
                                  <div class="form-group col-md-2">
                                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row['idpais_etapa']; ?>" >
                                  </div>
                                  <div class="form-row">
                                    <div class="form-group col-md-4">
                                      <label for="pais">Pais</label>
                                      <input type="text" class="form-control" id="pais" name="pais" disabled value="<?php echo $row['npais']; ?>">
                                    </div>
                                  </div>
                                  <div class="form-row">
                                    <div class="form-group col-md-12">
                                      <label for="etapa">Etapa</label>
                                      <input type="text" class="form-control" id="etapa" name="etapa" disabled value="<?php echo $row['netapas']; ?>">
                                    </div>
                                  </div>
                                  <div class="form-row">
                                    <div class="form-group col-md-5">
                                      <label for="porcentaje">Porcentaje</label>
                                      <input type="text" class="form-control" id="porcentaje" name="porcentaje" required value="<?php echo $row['porcentaje']; ?>">
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                   <button type="submit" name="update" class="btn btn-primary">Modificar</button>
                                 </div>
                               </form>
                             </div>
                           </div>
                         </div>
                       </div>
                       <!--fin modal modificar-->
                       <!-- MODAL PAIS--ETAPA -->
                       <div class="modal" tabindex="-1" role="dialog" id="modalregistro">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">ASIGNAR<i class="fas fa-angle-double-left"></i> <i class="fas fa-angle-double-right"></i></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form class="form-horizontal" method="POST" autocomplete="off">
                                  <div class="form-row">
                                    <div class="row">
                                      <div class="form-group col-md-7">
                                        <label for="pais">Pais</label>
                                        <select class="form-control" id="pais" name="pais">
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
  
                                      
                                        <div class="col-md-4">
                                          <label for="pais">Porcentaje</label>
                                          <input class="form-control" type="text" name="porcentaje">
                                        </div>
                                      
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                          <select style="font-size:13px;" class="form-control" id="etapa" name="etapa">
                                          <label for="pais">Etapa</label>
                                            <?php
                                            $sql="SELECT idetapa,netapas
                                            FROM etapas";
                                            $query = mysqli_query($conexion, $sql);
                                            while ($valores = mysqli_fetch_array($query)) 
                                            {
                                              echo '<option value="'.$valores['idetapa'].'">'.$valores['netapas'].'</option>';
                                            }
                                            ?>
                                          </select>
                                        </div>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                  <button type="submit" name="aggpaisetapa" class="btn btn-primary">Guardar</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                       <!-- FIN MODAL PAIS -->
  
                      <?php
                      $contador++;
                    } ?>
                    </tbody>
                  </table>
                </div>
            </div>
          </div>
          <div class="card-footer text-muted">
            GRUPO GUARDADO S.A DE C.V
          </div>
        </div>
      </div>
  </div>

  <!--</div>-->
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

