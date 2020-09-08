<?php
          while ($mostrar2=mysqli_fetch_array($resultado2)) {
            ?>
            <div class="alert alert-warning alt" role="alert">
              <form class="form-horizontal" method="POST" autocomplete="off">
                <div class="row">
                  <div class="col-md-4"><b>OC: </b><label><?php echo $mostrar2['oc'] ?></label></div>
                  <input type="hidden" class="input-etapa" name="id" readonly value="<?php echo $mostrar2['oc'] ?>"><br>
                  <div class="col-md-4"><b>Inicio<br></b><label><?php echo $mostrar2['finicio'] ?></label></div>
                  <div class="col-md-4"><b>Pais: </b><label><?php echo $mostrar2['npais'] ?></label><br></div>
                  <input type="hidden" class="input-idpais_etapa" name="idpais_etapa" readonly value="<?php echo $mostrar2['idpais_etapa'] ?>"><br>
                  <input type="hidden" class="input-idpais" name="idpais" readonly value="<?php echo $mostrar2['idpais'] ?>"><br>
                </div>
                <div class="row">
                  <div class="col-md-12"><b>Cliente<br></b><label><?php echo $mostrar2['ncliente'] ?></label><br></div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <b>Etapa<br></b>
                    <label id="etapa"><?php echo $mostrar2['netapas'] ?></label><br>
                    <input type="hidden" class="input-etapa" name="etapa" readonly value="<?php echo $mostrar2['idetapa'] ?>"><br>
                    <input type="hidden" class="input-netapa" name="netapa" readonly value="<?php echo $mostrar2['netapa'] ?>"><br>
                  </div>
                </div>
                <div class="subir row">
                  <div class="col-md-4"><label><b>Estado<br></b><?php echo $mostrar2['estado'] ?></label>
                  </div>
                    <div class="col-md-5 p-2">
                        <div class="progress">
                          <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" style="width: <?php echo $mostrar2['porcentaje']; ?>%;min-width: 10px;" aria-valuenow="<?php echo $mostrar2['porcentaje']; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $mostrar2['porcentaje']; ?>%
                          </div>
                        </div> 
                    </div>
                </div>
                <!-- ESTO AGREGUE PARA LA VALIDACION DE DATOS, SI LA ORDEN ESTA COMPLETA -->

                <!-- <div class="row">
                  <div class="col-md-6 mt-3">
                    <input type="text" class="form-group" name="idetapa" value="<?php /* echo $mostrar2["idetapa"] */ ?>" placeholder="<?php /* echo $mostrar2["idetapa"] */ ?>">
                  </div>
                </div> -->
                <?php
                        if ($mostrar2["idetapa"] == 13) {
                          
                          ?>
                          <div class="row">
                            <div class="col-md-12 mb-3">
                              <!-- <label for="">¿Está completa la orden de compras?</label>
                                <div class="form-check mb-1">
                                  <input class="form-check-input" name="comprobar" type="radio" id="comprobarCompleto<?php /*echo $ contador */?>" onclick="comprobarCompleto<?php /*echo $ contador */?>">
                                  <label class="form-check-label" for="defaultCheck1">
                                    Si, la orden de compras esta completa
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" name="comprobar" type="radio" id="comprobarIncompleto<?php /*echo $ contador */?>"  onclick="comprobarIncompleto<?php /*echo $ contador */?>">
                                  <label class="form-check-label" for="defaultCheck1">
                                    No, presenta algunas observaciones a fecha
                                  </label>
                                </div> -->

                                  <label for="">¿Está completa la orden de compras?</label>
                                  <div class="form-check mb-3">
                                    <input type="radio" name="cars" class="form-check-input"  value="threeCarDiv"  />
                                    <label class="form-check-label" for="defaultCheck1">
                                      Si, la orden de compras esta completa
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input type="radio" name="cars" class="form-check-input "   value="twoCarDiv"/>
                                    <label class="form-check-label" for="defaultCheck1">
                                      No, presenta algunas observaciones a fecha
                                    </label>
                                  </div>
                            </div>
                          </div>

                          <div class="row mt-3">
                            <div class="col-md-12">
                              <div id="twoCarDiv" class="desc">
                                  <textarea id="w3review" name="compraInCompleta" class="form-control" rows="2" cols="50" placeholder="Descripcion" ></textarea>
                              </div>
                              <div id="threeCarDiv" class="desc">
                                  <input type="text" name="compraCompleta" class="form-control" placeholder="Orden de compra completa" value="Orden de compra completa" readonly id="">
                              </div>
                            </div>
                          </div>
                          
                          
                          

                          <div class="row mt-4">
                            <div class="col-md-4">
                            <?php

                                if ($_SESSION['vsTipo']!=3 && $_SESSION['vsTipo']!=4) {
                                  ?>
                                    <button style="border: none; color: red; background-color: transparent;" title="Cancelar" type="button" data-toggle="modal" data-target="#cancelaroc<?php echo $contador; ?>">
                                      <i class="fas fa-window-close fa-2x"></i>
                                    </button>
                                <?php
                              }
                            ?>
                            </div>
                            <div class="col-md-6">
                              
                            </div>
                            <div class="col-md-2">
                              <?php 
                                  if ($_SESSION['vsTipo']!=4) {
                                    
                                    ?>

                                      <button type="submit" name="ordenes_compra_siguiente" id="siguiente" style="border: none; color: #DBDBDB; background-color: transparent;" disabled title="Siguiente">
                                        <i class="fas fa-arrow-alt-circle-right fa-2x"></i>
                                      </button>
                                    <?php
                                  }
                              ?>
                            </div>
                          </div>


                            <?php
                        }else {
                          
                          ?>
                              <div class="row">
                                <div class="col-md-4">
                                <?php

                                    if ($_SESSION['vsTipo']!=3 && $_SESSION['vsTipo']!=4) {
                                                            
                                      ?>
                                        <button style="border: none; color: red; background-color: transparent;" title="Cancelar" type="button" data-toggle="modal" data-target="#cancelaroc<?php echo $contador; ?>">
                                          <i class="fas fa-window-close fa-2x"></i>
                                        </button>
                                    <?php
                                  }
                                ?>
                                </div>
                                <div class="col-md-6">
                                  
                                </div>
                                <div class="col-md-2">
                                  <?php 
                                      if ($_SESSION['vsTipo']!=4) {
                                        
                                        ?>
                                          <button type="submit" name="ordenes_compra_siguiente" style="border: none; color: green; background-color: transparent;" title="Siguiente">
                                            <i class="fas fa-arrow-alt-circle-right fa-2x"></i>
                                          </button>
                                        <?php
                                      }
                                  ?>
                                </div>
                              </div>
                          <?php
                        }
                  ?>
                <!-- HASTA ACA -->

                
                
                
              </form>
            </div>
            <!--Modal Cancelar OC-->
            <div class="modal fade" id="cancelaroc<?php echo $contador; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cancelar <?php echo $mostrar2['oc']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form class="form-horizontal" method="POST"  autocomplete="off">
                      Estas seguro que deseas Cancelar esta OC?
                      <h6>
                        Si estas seguro preciona Aceptar
                      </h6>
                      <input type="hidden" name="id" readonly value="<?php echo $mostrar2['oc'] ?>"><br>

                      <div class="row">
                        <div class="col-md-6"><b>OC: </b><label><?php echo $mostrar2['oc'] ?></label></div>
                        <div class="col-md-6"><b>Pais: </b><label><?php echo $mostrar2['npais'] ?></label></div>
                      </div>
                      <div class="row">
                        <div class="col-md-12"><b>Cliente<br></b><label><?php echo $mostrar2['ncliente'] ?></label><br></div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" name="ordenes_compra_cancelar" class="btn btn-primary">Aceptar</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!---->
            <?php
            $contador++;
          } 
          ?>


<script>
  $(document).ready(function() {
      $("div.desc").hide();
      $("input[name$='cars']").click(function() {
          var test = $(this).val();
          $("div.desc").hide();
          $("#" + test).show();
      });
  });

  $(document).ready(function(){

      $("input[name$='cars']").click(function(){

        document.getElementById("siguiente").removeAttribute("disabled"); 
        $("#siguiente").css("color","green");
      });
  });
</script>