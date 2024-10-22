<?php  include("../../../../config/net.php");
    $valorRecibido = $_REQUEST['idModal'];
    echo $valorRecibido;


    
        //PARA TOMAR LOS DATOS DE LA SEDE DE SANTA ANA:::::::::::::
        $query = "SELECT * FROM proyecto_mapeo_comunidades_organizaciones_comunitarias where id = ?";
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
    
    <div class="row">
        <input disabled class="form-control form-control-sm" id="idRelacionProyecto" type="hidden" value="<?php echo $valorRecibido; ?>"  type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
        
        <p>¿Desea eliminar este registro? 🗑️</p>
        
        <div class="col">
            <div class="mb-3">
                <label for="formFile" class="form-label">Nombre (ACTUAL)*</label>
                <input  class="form-control form-control-sm" id="nombreOrganizacion" value="<?php echo $cantidad; ?>"  type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
            </div>
        </div>

        <div class="col">
            <div class="mb-3">
                <label for="formFile" class="form-label">Clasificación (ACTUAL)*</label>
                <input  class="form-control form-control-sm" disabled id="clasificacion" value="<?php echo $tipos; ?>"   type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
            </div>
        </div>
    </div>


   <!-- <div class="row">
        <input disabled class="form-control form-control-sm" id="idRelacionProyecto" type="hidden" value="<?php echo $valorRecibido; ?>"  type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
        <div class="col">
        <div class="mb-3">
            <div class="form-group" id="departamentoEmpresa" >
			<label for="formGroupExampleInput2">Tipo Organización: </label>
			<select required class="form-control form-control-sm" id="tipoSeleccion"  class="form-control form-control-sm">
				<option>SELECCIONE</option>
				<option>ADESCO</option>
                <option>Juntas Directivas</option> 
                <option>Comités</option> 
                <option>Asociaciones</option> 
			</select>
		    </div>
        </div>
        </div>
    </div>-->
   