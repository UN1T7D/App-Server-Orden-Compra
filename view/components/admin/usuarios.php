<?php
/* include('../conexion/conexion.php'); */

  //inicio de session

session_start();
error_reporting(0);
$varsesion=$_SESSION['usuario'];
$query="SELECT u.idrol,r.rol,u.nombre_user FROM usuarios as u INNER JOIN rol as r on u.idrol=r.idrol WHERE usuario ='$varsesion'";
  //fin inicio de session

  //echo $varsesion;

$contador=1;
  //Consulta 1 trae todas los usuarios
$sql="SELECT u.usuario,u.nombre_user,r.rol FROM usuarios as u 
inner join rol as r on 
u.idrol=r.idrol";

$result=mysqli_query($conexion,$sql);
$r=mysqli_query($conexion,$query);
//fecha de inicio
date_default_timezone_set("America/El_Salvador");
$registro =date("Y-m-d H:i:s");

if (isset($_POST['adminagguser'])) {
    require_once("../../controller/admin/insertarusuario.php");
}elseif (isset($_POST['adminedituser'])) {
  require_once("../../controller/admin/modificarusuario.php");
}elseif (isset($_POST['admeliminarusuario'])) {
  require_once("../../controller/admin/eliminarusuario.php");
}else {
    $alertProceso = "<div class='alert bg-litgh text-center'>
                      No se a realizado ninguna accion aun!
                    </div>";
  }

if($varsesion == null || $varsesion==''){
  echo "<script language='javascript'>
  alert('PORFAVOR INTRODUCIR CREDENCIALES')
  location.href='../login.html';
  </script>";
  die();
}
if($_SESSION['vsTipo']==1){
?>


<!-- <script type="text/javascript">
  function ConfirmDelete(){
    var respuesta=confirm("Estas seguro que deseas eliminar al usuario?");
    if (respuesta==true){
      return true;
    }
    else{
      return false;
    }
  }
</script> -->
  <!--contenedor-->
  

<!--Fin barra de navegacion-->
<section>
  <div class="contenedor-dashboard">
      <div class="row p-1">
        <div class="col-md-6 m-auto text-center">
          <?php
            echo $alertProceso;
          ?>
        </div>
      </div>
      
    <div class="">
      <div class="row">
        <div class="col-xl-12 ">
          <div class="card text-left">
            <div class="card-header" >
              <H3 class="text-center">Usuarios</H3>
            </div>
            <div class="card-body">
              <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalregistro">
                Agregar nuevo <span class="fa fa-plus-circle"></span>
              </button>
              <hr>
              <div class="row table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Usuario</th>
                      <th>Rol</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php while($row = $result->fetch_array(MYSQLI_ASSOC)) { 
                      $idusuario=$row['usuario'];
                      ?>
                      <tr>
                        <td><?php echo $row['nombre_user']; ?></td>
                        <td><?php echo $row['usuario']; ?></td>
                        <td><?php echo $row['rol']; ?></td>
                        <td><button class="btn btn-success" data-toggle="modal" data-target="#editar<?php echo $contador ?>" ><i class="fas fa-user-edit"></i></button></td>
                        <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter<?php echo $contador?>"><i class="fas fa-trash-alt"></i></button></td>
                      </tr>
                      <!-- MODAL ELIMINAR -->
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
                                  
                                    <label for="" class="text-center display-4">Estas seguro de eliminar el usuario</label><br>
                                  </div>
                                </div>
                                <input type="hidden" name="id" value="<?php echo $idusuario; ?>" placeholder="<?php echo $idusuario; ?>" >

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-ligth" data-dismiss="modal">Cancelar</button>
                                <button type="submit" name="admeliminarusuario" class="btn btn-danger">Eliminar</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>



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
                                  <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row['usuario']; ?>" >
                                </div>
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label for="nombre">Nombre del usuario</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" required readonly="" value="<?php echo $row['nombre_user']; ?>">
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="usuario">Usuario</label>
                                    <input type="text" class="form-control" id="usuario" name="usuario" required readonly="" value="<?php echo $row['usuario']; ?>">
                                  </div>
                                </div>
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label for="rol">Rol</label>
                                    <!-- <input list="bp" type="text" class="form-control" id="rol" name="rol" required=""> -->
                                    <select id="bp" name="rol">
                                      <?php
                                      $sql="SELECT usuarios.usuario,rol.idrol,rol.rol FROM usuarios
                                      INNER join rol 
                                      on usuarios.idrol=rol.idrol
                                      where usuarios.usuario= '$idusuario'";
                                      $query = mysqli_query($conexion, $sql);
                                      while ($valores = mysqli_fetch_array($query)) 
                                      {
                                        echo '<option selected value="'.$valores['idrol'].'">'.$valores['rol'].'</option>';
                                        
                                        $sql2="SELECT idrol,rol from rol";
                                        $query2 = mysqli_query($conexion, $sql2);
                                        while ($valores2 = mysqli_fetch_array($query2)) {
                                          echo '<option value="'.$valores2['idrol'].'">'.$valores2['rol'].'</option>';
                                        }
                                      }
                                      ?>
                                    </select>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                <button type="submit" name="adminedituser" class="btn btn-secondary">Modificar</button>
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
                    <h5 class="modal-title">Nuevo Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form class="form-horizontal" method="POST" autocomplete="off">
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="nombre">Nombre del Usuario</label>
                          <input type="text" class="form-control" id="nombre" name="nombre" required placeholder="Un nombre, un apellido">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="usuario">Usuario</label>
                          <input type="text" class="form-control" id="usuario" name="usuario" required>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="pwd">Password</label>
                          <input type="password" class="form-control" id="pwd" name="pwd" required>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="rol">Rol</label>
                          <select id="rol" name="rol" class="form-control" required>
                            <option id="rol" name="rol" required>Seleccione:</option>
                            <?php
                            $sql2="SELECT idrol,rol
                            FROM rol";
                            $query2 = mysqli_query($conexion, $sql2);
                            while ($valores2 = mysqli_fetch_array($query2)) 
                            {
                              echo '<option value="'.$valores2['idrol'].'">'.$valores2['rol'].'</option>';
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="">Registro</label>
                          <input type="text" class="form-control" id="" name="" value="<?php echo $registro ?>" readonly>
                        </div>
                      </div>
                      <div class="modal-footer">
                      <button type="submit" name="adminagguser" class="btn btn-primary">Guardar</button>
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
  </div>

  <!--</div>-->
</section>
<!--modal eliminar-->
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header"><h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>

      <div class="modal-body">
        ¿Desea eliminar este registro?
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <a class="btn btn-danger btn-ok">Borrar</a>
      </div>
    </div>
  </div>
</div>


<!-- <script>
  $('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));

    $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
  });
</script> -->
<?php
}else{
  header('Location:../login.html');
}
?>