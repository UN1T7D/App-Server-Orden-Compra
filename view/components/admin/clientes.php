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
$sql="SELECT c.nit,c.ncliente,p.npais,c.contacto,p.idpais FROM clientes as c 
INNER JOIN pais as p on 
c.idpais=p.idpais
order by p.npais";

$contador=1;

$result=mysqli_query($conexion,$sql);
$r=mysqli_query($conexion,$query);
//fecha de inicio
date_default_timezone_set("America/El_Salvador");
$registro =date("Y-m-d H:i:s");

if (isset($_POST['adminaggcliente'])) {
  require_once("../../controller/admin/insertarcliente.php");
}elseif (isset($_POST['admineditcliente'])) {
  require_once("../../controller/admin/modificarcliente.php");
}elseif (isset($_POST['admeliminarcliente'])) {
  require_once("../../controller/admin/eliminarcliente.php");
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
            <center><H3>Clientes</H3></center>
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
                    <th>Cliente</th>
                    <th>Pais</th>
                    <th>Contacto</th>
                    
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php while($row = $result->fetch_array(MYSQLI_ASSOC)) { ?>
                    <tr>
                      <td><?php echo $row['ncliente']; ?></td>
                      <td><?php echo $row['npais']; ?></td>
                      <td><?php echo $row['contacto']; ?></td>
                      
                      <td><button class="btn btn-success" data-toggle="modal" data-target="#editar<?php echo $contador ?>" ><i class="fas fa-user-edit"></i></button></td>
                      <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter<?php echo $contador?>"><i class="fas fa-trash-alt"></i></button></td>
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
                        <!-- <input list="bp" type="text" class="form-control" id="pais" name="pais"> -->
                        <select id="bp" class="form-control" name="pais">
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
<script type="text/javascript">
  $(document).ready( function () {
    $('#datatable').DataTable();
  } );
</script>