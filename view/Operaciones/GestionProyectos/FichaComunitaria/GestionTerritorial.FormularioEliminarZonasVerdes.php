<?php  include("../../../../config/net.php");
    $valorRecibido = $_REQUEST['idModal'];
    echo $valorRecibido;


    
        //PARA TOMAR LOS DATOS DE LA SEDE DE SANTA ANA:::::::::::::
        $query = "SELECT * FROM proyecto_mapeo_comunidades_zonas_verdes where id = ?";
        $data = $net_rrhh->prepare($query);
        $data->execute([$valorRecibido]);
        // Suponiendo que $data es tu conjunto de resultados
        $cantidad = "";
        $tipos = "";
       // $tipoCentro = "";
        
        while ($data3 = $data->fetch()) 
        {
            $cantidad       =   $data3[2];
            $tipos          =   $data3[3];
            //$tipoCentro         =   $data3[4];
        }

  ?>
     <script src="view/Monitoreo/ExpresionRegular.js"></script>
    <div class="row">
        <input disabled class="form-control form-control-sm" id="idRelacionProyecto" type="hidden" value="<?php echo $valorRecibido; ?>"  type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
       
        <p>¿Desea eliminar este registro? 🗑️</p>

        <div class="col">
            <div class="mb-3">
                <label for="formFile" class="form-label">Cantidad (ACTUAL)*</label>
                <input  class="form-control form-control-sm" id="cantidadActual" value="<?php echo $cantidad; ?>"  type="number" value="0" onkeyup="detectarEnter(event)"  oninput="validarNumero(this,mensajeError2)" pattern="^[0-9]+$" placeholder="escribir..." aria-label=".form-control-sm example">
                <p id="mensajeError2"></p> 
            </div>
        </div>

        <div class="col">
            <div class="mb-3">
                <label for="formFile" class="form-label">(ACTUAL)*</label>
                <input  class="form-control form-control-sm" disabled id="tipoActual" value="<?php echo $tipos; ?>"   type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
            </div>
        </div>
    </div>


   
