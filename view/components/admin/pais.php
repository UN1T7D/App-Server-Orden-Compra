<?php

session_start();
error_reporting(0);
$varsesion=$_SESSION['usuario'];


$query="SELECT u.idrol,r.rol,u.nombre_user FROM usuarios as u INNER JOIN rol as r on u.idrol=r.idrol WHERE usuario ='$varsesion'";
 
  //Consulta 1 trae todas los datos
$sql="SELECT idpais,npais from pais LIMIT 10";
$result=mysqli_query($conexion,$sql);

$contador=1;


/* $r=mysqli_query($conexion,$query); */

if($varsesion == null || $varsesion==''){
  echo "<script language='javascript'>
  alert('PORFAVOR INTRODUCIR CREDENCIALES')
  location.href='../login.html';
  </script>";
  die();
}
/* if($_SESSION['vsTipo']==1){ */
if (isset($_POST['modpais'])) {
  require_once("../../controller/admin/modpais.php");
}
elseif(isset($_POST['aggpais'])){
  require_once("../../controller/admin/aggpais.php");
}
else {
  
  $alertProceso = "<div class='alert bg-litgh text-center'>
                    No se a realizado ninguna accion aun!
                  </div>";
}

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
              <b><H3 class="text-center">Paises</H3></b>
            </div>
            <div class="card-body">
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalregistro">
                Agregar nuevo <span class="fa fa-plus-circle"></span>
              </button>
              <hr>
              <div class="row table-responsive-sm">
                <!--id para datatable-->
                <div class="col-xl-12">
                  <table id="datatable" class="table table-hover" >
                    <thead class="thead-dark" style="font-size:13px">
                      <tr class="text-center">
                        <th>Id Pais</th>
                        <th>Pais</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php while($row = $result->fetch_array(MYSQLI_ASSOC)) { ?>
                        <tr class="text-center">
                          <td><?php echo $row['idpais']; ?></td>
                          <td><?php echo $row['npais']; ?></td>
                          <td><button class="btn btn-success" data-toggle="modal" data-target="#editar<?php echo $contador ?>" ><i class="fas fa-user-edit"></i></button></td>
                        </tr> 
  
                        <!--modal modificar-->
  
                        <div class="modal" tabindex="-1" role="dialog" id="editar<?php echo $contador; ?>">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Modificar Pais <?php echo $contador; ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form class="form-horizontal" method="POST" autocomplete="off">
                                  <div class="form-group col-md-2">
                                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row['idpais']; ?>" >
                                  </div>
                                  <div class="form-row">
                                    <div class="form-group col-md-6">
                                      <label for="pais">Pais</label>
                                      <input type="text" class="form-control" id="pais" name="pais" required value="<?php echo $row['npais']; ?>">
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                   <button type="submit" name="modpais" class="btn btn-primary">Modificar</button>
                                 </div>
                               </form>
                             </div>
                           </div>
                         </div>
                       </div>
                       <!--fin modal modificar-->
                       <!-- MODAL PAIS -->
                       <div class="modal" tabindex="-1" role="dialog" id="modalregistro">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Nuevo Usuario</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form class="form-horizontal" method="POST" autocomplete="off">
                                  <div class="form-row">
                                    <div class="form-group col-md-6">
                                      <label for="usuario">Pais</label>
                                      <input type="text" class="form-control" id="pais" name="pais" required>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                  <button type="submit" name="aggpais" class="btn btn-primary">Guardar</button>
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

