  <!-- Modal Para agregar una OC-->
  <div class="modal fade" id="modalregistro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nueva Orden de Compra</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" method="POST"  autocomplete="off">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="oc">Orden de Compra</label>
                <input type="text" class="form-control" id="oc" name="oc">
              </div>
              <div class="form-group col-md-6">
                <label for="pais">Pais</label>
                <input list="bp" type="text" class="form-control" id="pais" name="pais">
                <datalist id="bp">
                  <?php
                  $sql="SELECT idpais,npais
                  FROM pais";
                  $query = mysqli_query($conexion, $sql);
                  while ($valores = mysqli_fetch_array($query)) 
                  {
                    echo '<option value="'.$valores['idpais'].'">'.$valores['npais'].'</option>';
                  }
                  ?>
                </datalist>
              </div>
            </div>

            <div class="form-group" id="select2lista"> 

            </div>
            <div class="form-group">
              <label for="etapa">Etapa</label>
              <input type="hidden" class="input-etapa" name="etapa" readonly value="16"><br>
              <div class="col-md-4"><b><label>En Proceso</label></b><br></div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="finicio">Fecha Inicio</label>
                <input type="date" class="form-control" id="finicio" name="finicio" value="<?php echo $fecha ?>" readonly>
              </div>
              <div class="form-group col-md-6">
                <label for="ffin">Fecha Fin</label>
                <input type="date" class="form-control" id="ffin" name="ffin" disabled>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="estatus">Estatus</label>
                <select id="estatus" name="estatus" class="form-control" disabled>
                  <option selected>En Proceso</option>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" name="ordenes_compra_crear"  class="btn btn-primary">Guardar</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>