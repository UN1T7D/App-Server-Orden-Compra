<?php

session_start();
error_reporting(0);
$varsesion=$_SESSION['usuario'];


$query="SELECT u.idrol,r.rol,u.nombre_user FROM usuarios as u INNER JOIN rol as r on u.idrol=r.idrol WHERE usuario ='$varsesion'";
 
  //Consulta 1 trae todas los datos
$sql="SELECT o.oc,c.ncliente,o.finicio,o.ffin,o.estado,pa.npais,e.netapas,pe.porcentaje,o.visible
from oc as o 
INNER join clientes as c on o.nit=c.nit
INNER JOIN pais_etapa as pe on o.idpais_etapa=pe.idpais_etapa 
INNER JOIN etapas as e on pe.idetapa=e.idetapa 
INNER JOIN pais as pa ON pe.idpais=pa.idpais LIMIT 10";
$result=mysqli_query($conexion,$sql);

if (isset($_POST['search'])) {
  $fecha1=$_POST['fecha1'];
  $fecha2=$_POST['fecha2'];

  $sql="SELECT o.oc,c.ncliente,o.finicio,o.ffin,o.estado,pa.npais,e.netapas,pe.porcentaje,o.visible
from oc as o 
INNER join clientes as c on o.nit=c.nit
INNER JOIN pais_etapa as pe on o.idpais_etapa=pe.idpais_etapa 
INNER JOIN etapas as e on pe.idetapa=e.idetapa 
INNER JOIN pais as pa ON pe.idpais=pa.idpais
where o.finicio >= '$fecha1' and o.finicio <= '$fecha2' order by o.finicio";
$result=mysqli_query($conexion,$sql);
}
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

?>
<section class="mt-5">
  <div class="contenedor-dashboard">
  <!-- <div class="row p-5">
        <div class="col-md-6 m-auto text-center">
          <?php
            echo $alertProceso;
          ?>
        </div>
      </div> -->
  <div class="row">
        <div class="col-md-12 p-3">
          <div class="card">
            <b><center><H3>Consultas OC</H3></center></b>
            <div class="card-header">
              
              <div class="row">
                <div class="col-md-5">
                  <form method="POST">
                    <input type="text" name="fecha1" placeholder="Desde 0000-00-00" class="input-busqueda">
                    <input type="text" name="fecha2" placeholder="Hasta 0000-00-00" class="input-busqueda">
                    <input type="submit" name="search" class="btn btn-outline-info boton-b" value="Filtrar">
                  </form>
                </div>
                 <div class="col-md-2"></div>
                <div class="col-md-5">
                 <center><label>Rango de busqueda del <?php echo $fecha1; ?> al <?php echo $fecha2; ?> </label></center>
               </div>
             </div>
            </div>
            <div class="card-body">
              <div class="row table-responsive-sm">
                
                <!--id para datatable-->
                <div class="col-xl-12">
                  <table id="datatable" class="table table-hover" >
                    <thead class="thead-dark" style="font-size:13px">
                      <tr>
                        <th class="text-center">OC</th>
                        <th class="text-center">Pais</th>
                        <th class="text-center">Cliente</th>
                        <th class="text-center">F Inicio</th>
                        <th class="text-center">F Fin</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center">%</th>
                        <th class="text-center"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php while($row = $result->fetch_array(MYSQLI_ASSOC)) { ?>
                        <tr >
                          <?php if ($row['estado']=='FINALIZADO') {
                            ?>
                            <td style="color: green; font-size:80%;"><?php echo $row['oc']; ?></td>
                            <td style="color: green;font-size:80%;"><?php echo $row['npais']; ?></td>
                            <td style="color: green;font-size:75%;"><?php echo $row['ncliente']; ?></td>
                            <td style="color: green;font-size:85%;"><?php echo $row['finicio']; ?></td>
                            <td style="color: green;font-size:80%;"><?php echo $row['ffin']; ?></td>
                            <td style="color: green;font-size:80%;"><?php echo $row['estado']; ?></td>
                            <td style="color: green;font-size:80%;"><?php echo $row['porcentaje']; ?>%</td>
                            <td><button class="btn btn-success" data-toggle="modal" data-target="#editar<?php echo $contador ?>" ><i class="fas fa-user-edit"></i></button></td>
                          <?php } ?>
                          <?php if ($row['estado']!='FINALIZADO' AND $row['estado']!='CANCELADO'){
                            ?>
                            <td style="color: blue;font-size:80%;"><?php echo $row['oc']; ?></td>
                            <td style="color: blue;font-size:80%;"><?php echo $row['npais']; ?></td>
                            <td style="color: blue;font-size:75%;"><?php echo $row['ncliente']; ?></td>
                            <td style="color: blue;font-size:85%;"><?php echo $row['finicio']; ?></td>
                            <td style="color: blue;font-size:80%;"><?php echo $row['ffin']; ?></td>
                            <td style="color: blue;font-size:80%;"><?php echo $row['estado']; ?></td>
                            <td style="color: blue;font-size:80%;"><?php echo $row['porcentaje']; ?>%</td>
                            <td><button class="btn btn-success" data-toggle="modal" data-target="#editar<?php echo $contador ?>" ><i class="fas fa-user-edit"></i></button></td>
                          <?php } ?>
  
                          <?php if ($row['estado']=='CANCELADO') {
                            ?>
                            <td style="color: red; font-size:80%;"><?php echo $row['oc']; ?></td>
                            <td style="color: red;font-size:80%;"><?php echo $row['npais']; ?></td>
                            <td style="color: red;font-size:75%;"><?php echo $row['ncliente']; ?></td>
                            <td style="color: red;font-size:85%;"><?php echo $row['finicio']; ?></td>
                            <td style="color: red;font-size:80%;"><?php echo $row['ffin']; ?></td>
                            <td style="color: red;font-size:80%;"><?php echo $row['estado']; ?></td>
                            <td style="color: red;font-size:80%;"><?php echo $row['porcentaje']; ?>%</td>
                            <td><button class="btn btn-success" data-toggle="modal" data-target="#editar<?php echo $contador ?>" ><i class="fas fa-user-edit"></i></button></td>
                            <td><button class="btn btn-danger" data-toggle="modal" data-target="#eliminar<?php echo $contador ?>" ><i class="far fa-trash-alt"></i></button></td>
                          <?php } ?>
                        </tr> 
  
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
                                <form class="form-horizontal" method="POST" action="../../controller/admin/modetapasmodificadas.php" autocomplete="off">
                                  <div class="form-group col-md-2">
                                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row['oc']; ?>" >
                                  </div>
                                  <div class="form-row">
                                    <div class="form-group col-md-4">
                                      <label for="oc">Orden de Compra</label>
                                      <input type="text" class="form-control" id="oc" name="oc" readonly required value="<?php echo $row['oc']; ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label for="pais">Pais</label>
                                      <input type="text" class="form-control" id="pais" name="pais" readonly required value="<?php echo $row['npais']; ?>">
                                    </div>
                                  </div>
                                  <div class="form-row">
                                    <div class="form-group col-md-12">
                                      <label for="cliente">Cliente</label>
                                      <input type="text" class="form-control" id="cliente" name="cliente" readonly required value="<?php echo $row['ncliente']; ?>">
                                    </div>
                                  </div>
                                  <div class="form-row">
                                    <div class="form-group col-md-12">
                                      <label for="etapas">Etapa</label>
                                      <input type="text" class="form-control" id="etapas" name="etapas" readonly required value="<?php echo $row['netapas']; ?>">
                                    </div>
                                  </div>
                                  <div class="form-row">
                                    <div class="form-group col-md-4">
                                      <label for="estado">Estado</label>
                                      <select class="browser-default custom-select" id="estado" name="estado" >
                                        <option selected>Selecione</option>
                                        <option value="EN PROCESO" <?php if($row['estado']=='EN PROCESO') echo 'selected="selected" ';?> >EN PROCESO</option>
                                        <option value="FINALIZADO" <?php if($row['estado']=='FINALIZADO') echo 'selected="selected" ';?> >FINALIZADO</option>
                                        <option value="CANCELADO" <?php if($row['estado']=='CANCELADO') echo 'selected="selected" ';?> >CANCELADO</option>
                                      </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                      <label for="visible">Visible</label>
                                      <select class="browser-default custom-select" id="visible" name="visible" >
                                        <option>Selecione</option>
                                        <option value="SI" <?php if($row['visible']=='SI') echo 'selected="selected" ';?> >SI</option>
                                        <option value="NO" <?php if($row['visible']=='NO') echo 'selected="selected" ';?> >NO</option>
                                      </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                      <label for="estado">Progreso</label>
                                      <div class="progress">
                                        <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" style="width: <?php echo $row['porcentaje']; ?>%;" aria-valuenow="<?php echo $row['porcentaje']; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $row['porcentaje']; ?>%
                                        </div>
                                      </div>   
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                   <button type="submit" class="btn btn-primary">Modificar</button>
                                 </div>
                               </form>
                             </div>
                           </div>
                         </div>
                       </div>
                       <!--fin modal modificar-->
                       <!--Modal Cancelar OC-->
                       <div class="modal fade" id="eliminar<?php echo $contador; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Cancelar <?php echo $row['oc']; ?></h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form class="form-horizontal" method="POST" action="../../controller/admin/eliminarcancelado.php" autocomplete="off">
                                Estas seguro que deseas Cancelar esta OC?
                                <h6>
                                  Si estas seguro preciona Aceptar
                                </h6>
                                <input type="hidden" name="id" readonly value="<?php echo $row['oc'] ?>"><br>
  
                                <div class="row">
                                  <div class="col-md-6"><b>OC: </b><label><?php echo $row['oc'] ?></label></div>
                                  <div class="col-md-6"><b>Pais: </b><label><?php echo $row['pais'] ?></label></div>
                                </div>
                                <div class="row">
                                  <div class="col-md-12"><b>Cliente<br></b><label><?php echo $row['ncliente'] ?></label><br></div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                  <button type="submit" class="btn btn-primary">Aceptar</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!---->
  
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

