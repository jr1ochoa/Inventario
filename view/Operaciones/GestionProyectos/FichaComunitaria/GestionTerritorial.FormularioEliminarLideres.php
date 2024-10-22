<?php  include("../../../../config/net.php");
    $valorRecibido = $_REQUEST['idModal'];
    echo $valorRecibido;
    
        //PARA TOMAR LOS DATOS DE LA SEDE DE SANTA ANA:::::::::::::
        $query = "SELECT * FROM proyecto_mapeo_comunidades_lideres where id = ?";
        $data = $net_rrhh->prepare($query);
        $data->execute([$valorRecibido]);
        // Suponiendo que $data es tu conjunto de resultados
        $nombreCentros = "";
        $contacto1 = "";
        $contacto2 = "";
        $cargo = "";
        
        while ($data3 = $data->fetch()) 
        {
            $nombreCentros  =   $data3[2];
            $contacto1      =   $data3[3];
            $contacto2      =   $data3[9];
            $cargo          =   $data3[4];
        }
  ?>
    
    <div class="row">
        <input disabled class="form-control form-control-sm" id="idRelacionProyecto" type="hidden" value="<?php echo $valorRecibido; ?>"  type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
        <div class="col">
            <div class="mb-3">
                <label for="formFile" class="form-label">Nombre Lider (ACTUAL)*</label>
                <input  class="form-control form-control-sm" id="nombreLider" value="<?php echo $nombreCentros; ?>"  type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col">
            <div class="mb-3">
                <label for="formFile" class="form-label">Contacto #1 (ACTUAL)*</label>
                <input  class="form-control form-control-sm" id="contacto1" value="<?php echo $contacto1; ?>"   type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
            </div>
        </div>
        <div class="col">
            <div class="mb-3">
                <label for="formFile" class="form-label">Contacto #2 (ACTUAL)*</label>
                <input  class="form-control form-control-sm" id="contacto2" value="<?php echo $contacto2; ?>"   type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="mb-3">
                <label for="formFile" class="form-label">Cargo (ACTUAL)*</label>
                <input  class="form-control form-control-sm" id="cargo" value="<?php echo $cargo; ?>"   type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
            </div>
        </div>
    </div>


  
   
