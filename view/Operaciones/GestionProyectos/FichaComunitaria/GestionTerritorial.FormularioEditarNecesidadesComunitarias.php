<?php  include("../../../../config/net.php");
    $valorRecibido = $_REQUEST['idModal'];
    echo $valorRecibido;


    
        //PARA TOMAR LOS DATOS DE LA SEDE DE SANTA ANA:::::::::::::
        $query = "SELECT * FROM proyecto_mapeo_comunidades_necesidades where id = ?";
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
       
        <div class="col">
            <div class="mb-3"> 
                <label for="formFile" class="form-label">Descripción (ACTUAL)*</label>
                <input  class="form-control form-control-sm" id="descripcionNecesidades" value="<?php echo $cantidad; ?>"  type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
            </div>
        </div>

        <div class="col">
            <div class="mb-3">
                <label for="formFile" class="form-label">Tipo de Necesidades Comunitarias (ACTUAL)*</label>
                <input disabled class="form-control form-control-sm" id="descripcionNecesidades" value="<?php echo $tipos; ?>"  type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
            </div>
        </div>

        
    </div>


    <div class="row">
        <input disabled class="form-control form-control-sm" id="idRelacionProyecto" type="hidden" value="<?php echo $valorRecibido; ?>"  type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
        <div class="col">
        <div class="mb-3">
            <div class="form-group" id="departamentoEmpresa" >
			<label for="formGroupExampleInput2">Tipo de Necesidad Comunitaria: </label>
			<select required class="form-control form-control-sm" id="tipoSeleccion"  class="form-control form-control-sm">
				<option>SELECCIONE</option>
				<option>EDUCACIÓN</option>
                <option>INFRAESTRUCTURA</option> 
                <option>SALUD</option> 
                <option>AMBIENTALES</option>
                <option>DEPORTIVO/RECREATIVO</option>
                <option>JURÍDICO</option>
                <option>SOCIO LABORAL</option>
                <option>AYUDA HUMANITARIA</option>
			</select>
		    </div>
        </div>
        </div>
    </div>
    