<?php  include("../../../../config/net.php");
    $valorRecibido = $_REQUEST['idModal'];
    echo $valorRecibido;


    
        //PARA TOMAR LOS DATOS DE LA SEDE DE SANTA ANA:::::::::::::
        $query = "SELECT * FROM proyecto_mapeo_comunidades_centros_educativos where id = ?";
        $data = $net_rrhh->prepare($query);
        $data->execute([$valorRecibido]);
        // Suponiendo que $data es tu conjunto de resultados
        $nombreCentros = "";
        $linkSiges = "";
        $tipoCentro = "";
        
        while ($data3 = $data->fetch()) 
        {
            $nombreCentros      =   $data3[2];
            $linkSiges          =   $data3[3];
            $tipoCentro         =   $data3[4];
        }

  ?>
    
    <div class="row">
        <input disabled class="form-control form-control-sm" id="idRelacionProyecto" type="hidden" value="<?php echo $valorRecibido; ?>"  type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
        <div class="col">
            <div class="mb-3">
                <label for="formFile" class="form-label">Centro Educativo (ACTUAL)*</label>
                <input  class="form-control form-control-sm" id="centrosEducativos" value="<?php echo $nombreCentros; ?>"  type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
            </div>
        </div>

        <div class="col">
            <div class="mb-3">
                <label for="formFile" class="form-label">Link Siges (ACTUAL)*</label>
                <input  class="form-control form-control-sm" id="linkSiges" value="<?php echo $linkSiges; ?>"   type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
            </div>
        </div>
    </div>


    <div class="row">
        <input disabled class="form-control form-control-sm" id="idRelacionProyecto" type="hidden" value="<?php echo $valorRecibido; ?>"  type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
        <div class="col">
        <div class="mb-3">
    
      </div>
        </div>

        <div class="col">
            <div class="mb-3">
                <label for="formFile" class="form-label">TIPOS*</label>
                <input  disabled class="form-control form-control-sm" value="<?php echo $tipoCentro; ?>"   type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
            </div>
        </div>
    </div>
   