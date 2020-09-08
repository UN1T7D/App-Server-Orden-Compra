<?php
    while ($mostrar=mysqli_fetch_array($resultado1)) {
    ?>
        <div class="alert alert-primary alt" role="alert">
            <form class="form-horizontal" method="POST"  autocomplete="off">
            <div class="row">
                <div class="col-md-4"><b>OC: </b><label><?php echo $mostrar['oc'] ?></label></div>
                <input type="hidden" class="input-etapa" name="id" readonly value="<?php echo $mostrar['oc'] ?>"><br>
                <div class="col-md-4"><b>Inicio<br></b><label><?php echo $mostrar['finicio'] ?></label></div>
                <div class="col-md-4"><b>Pais: </b><label><?php echo $mostrar['npais'] ?></label><br></div>
                <input type="hidden" class="input-pais" name="pais" readonly value="<?php echo $mostrar['npais'] ?>"><br>
                <input type="hidden" class="input-pais_etapa" name="pais_etapa" readonly value="<?php echo $mostrar['idpais_etapa'] ?>"><br>
                <input type="hidden" class="input-idpais" name="idpais" readonly value="<?php echo $mostrar['idpais'] ?>"><br>
            </div>
            <div class="row">
                <div class="col-md-12"><b>Cliente<br></b><label><?php echo $mostrar['ncliente'] ?></label><br></div>
            </div>
            <div class="row">
                <div class="col-md-12">
                <b>Etapa<br></b>
                <label id="etapa"><?php echo $mostrar['netapas'] ?></label><br>
                <input type="hidden" class="input-etapa" name="etapa" readonly value="<?php echo $mostrar['idetapa'] ?>"><br>
                </div>
            </div>
            <div class="subir row">
                <div class="col-md-4"><label><b>Estado<br></b><?php echo $mostrar['estado'] ?></label></div>
                <div class="col-md-6"></div>
                <div class="col-md-2 p-2">
                <?php
                    if ($_SESSION['vsTipo']!=3 && $_SESSION['vsTipo']!=4) {
                        
                        ?>

                            <button type="submit" name="ordenes_compra_iniciar" style="border: none; color: blue; background-color: transparent;" title="Iniciar"><i class="fas fa-play fa-2x"></i></button>
                        <?php
                    }
                ?>
                </div>
            </div>
            </form>
        </div>
    <?php
    } 
?>