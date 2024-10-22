  <?php  include("../../../../config/net.php");
    $valorRecibido = $_REQUEST['idModal'];
    echo $valorRecibido;


    
        //PARA TOMAR LOS DATOS DE LA SEDE DE SANTA ANA:::::::::::::
        $query = "SELECT * FROM proyecto_mapeo_comunidades where id = ?";
        $data = $net_rrhh->prepare($query);
        $data->execute([$valorRecibido]);
        // Suponiendo que $data es tu conjunto de resultados
        $departamento = "";
        $municipio = "";
        $nombre_comunidad = "";
        $radio = "";
        $ubicacion = "";
        $coordenadas = "";
        $total_viviendas = "";
        $casa_comunal = "";
        $centro_alcances="";
        $observaciones="";
        $distancia="";
        $tipocomunidad="";
        
        while ($data3 = $data->fetch()) 
        {
            $departamento       =   $data3[1];
            $municipio          =   $data3[2];
            $nombre_comunidad   =   $data3[3];
            $radio              =   $data3[4];
            $ubicacion          =   $data3[5];
            $coordenadas        =   $data3[6];
            $total_viviendas    =   $data3[7];
            $casa_comunal       =   $data3[17];
            $centro_alcances    =   $data3[9];
            $observaciones      =   $data3[16];
            $radioEscrito       =   $data3[19];
            $tipocomunidad      =   $data3[18];
        }

  ?>
    
    <div class="row">
        <input disabled class="form-control form-control-sm" id="idRelacionProyecto" type="hidden" value="<?php echo $valorRecibido; ?>"  type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
        <div class="col">
            <div class="mb-3">
                <label for="formFile" class="form-label">Departamento (ACTUAL)*</label>
                <input disabled class="form-control form-control-sm" id="departamentoActual" value="<?php echo $departamento; ?>"  type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
            </div>
        </div>

        <div class="col">
            <div class="mb-3">
                <label for="formFile" class="form-label">Municipio (ACTUAL)*</label>
                <input disabled class="form-control form-control-sm" id="municipioActual" value="<?php echo $municipio; ?>"   type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
            </div>
        </div>


    </div>
    <div class="row">
    <div class="col">
    <div class="mb-3">
        <div class="form-group" id="departamentoEmpresa" >
                <label for="formGroupExampleInput2">1]- Departamento: </label>
                <select required class="form-control form-control-sm" name="cboDepartment" id="cboDepartment" class="form-control form-control-sm">
                            <option value="MM">MANTENER DEPARTAMENTO </option>
                            <option value="Ahuachapan">Ahuachapán</option>
                            <option value="Santa Ana">Santa Ana</option>
                            <option value="Sonsonate">Sonsonate</option>
                            <option value="La Libertad">La Libertad</option>
                            <option value="Chalatenango">Chalatenango</option>
                            <option value="La Paz">La Paz</option>
                            <option value="San Salvador">San Salvador</option>
                            <option value="Cuscatlan">Cuscatlán</option>
                            <option value="Caba&ntilde;as">Cabañas</option>
                            <option value="San Vicente">San Vicente</option>
                            <option value="Usulutan">Usulután</option>
                            <option value="San Miguel">San Miguel</option>
                            <option value="Morazan">Morazán</option>
                            <option value="La Union">La Unión</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col">
    <div class="mb-3">
            <label for="cboMunicipality" class="form-label">2]- Municipio:  </label>
            <select required class="form-control form-control-sm"  name="cboMunicipality" aria-label="Default select example" id="cboMunicipality" name="cboMunicipality" required>
			<option value="MM">MANTENER MUNICIPIO </option>
            </select>
        </div>
    </div>
    </div>

    <div class="row">
    <div class="col">
 
    <div class="mb-3">
        <label for="formFile" class="form-label">TIPO COMUNIDAD (ACTUAL)</label>
        <input class="form-control form-control-sm" disabled value="<?php echo $tipocomunidad; ?>"  id="tipoComunidadActual"type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
      </div>


    <div class="mb-3">
    <div class="form-group" id="departamentoEmpresa" >
			<label for="formGroupExampleInput2">3]- TIPO DE COMUNIDAD: </label>
			<select required class="form-control form-control-sm" name="typecomunidad" id="typecomunidad" class="form-control form-control-sm">
						<option value="MM">MANTENER ACTUAL </option>
						<option value="BARRIO">BARRIO</option>
                        <option value="CANTÓN">CANTÓN</option>
                        <option value="COLONIA">COLONIA</option>
                        <option value="CASERÍO">CASERÍO</option>
                        <option value="COMUNIDAD">COMUNIDAD</option>
                        <option value="CONDOMINIO">CONDOMINIO</option>
                        <option value="LOTIFICACIÓN">LOTIFICACIÓN</option>
                        <option value="FINCA">FINCA</option>
                        <option value="PARCELACIÓN">PARCELACIÓN</option>
                        <option value="REPARTO">REPARTO</option>
                        <option value="RESIDENCIAL">RESIDENCIAL</option>
                        <option value="URBANIZACIÓN">URBANIZACIÓN</option>
                        <option value="OTROS">OTROS</option>
			</select>
		</div>
      </div>
      
      <div class="mb-3">
        <label for="formFile" class="form-label">4]- Nombre Comunidad</label>
        <input class="form-control form-control-sm" value="<?php echo $nombre_comunidad; ?>"  id="nombreComunidad"type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
      </div>

      <div class="mb-3">
        <label for="formFile" class="form-label">5]- Distancia Específica</label>
        <input class="form-control form-control-sm" value="<?php echo $radioEscrito; ?>" id="distancia" type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
      </div>


      <div class="mb-3">
        <label for="formFile" class="form-label">5]- Radio (Actual)</label>
        <input class="form-control form-control-sm" disabled value="<?php echo $radio; ?>" id="radioaCTUAL" type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
      </div>

      <div class="mb-3">
        <label for="formFile" class="form-label">4]- Radio</label>
       <!-- <input class="form-control form-control-sm" maxlength="255"  id="radio" type="text" placeholder="escribir..." aria-label=".form-control-sm example">-->
        <select required class="form-control form-control-sm" name="radio" id="radio" class="form-control form-control-sm">
						<option value="MM">MANTENER ACTUAL </option>
						<option value="MENOS DE 1 KILÓMETRO">MENOS DE 1 KILÓMETRO</option>
                        <option value="1 A 2 KILÓMETROS">1 A 2 KILÓMETROS</option>
                        <option value="3 A 4 KILÓMETROS">3 A 4 KILÓMETROS</option>
                        <option value="5 A 8 KILÓMETROS">5 A 8 KILÓMETROS</option>
                        <option value="9 EN ADELANTE">9 EN ADELANTE</option>
                        
			</select>  
    </div>

      <div class="mb-3">
        <label for="formFile" class="form-label">6]- Ubicación</label>
        <input class="form-control form-control-sm" value="<?php echo $ubicacion; ?>"  id="ubicacion" type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
      </div>
      <div class="mb-3">
        <label for="formFile" class="form-label">7]- Coordenadas</label>
        <input class="form-control form-control-sm" value="<?php echo $coordenadas; ?>"  id="coordenadas" type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
      </div>
  </div>


  <div class="col">
  <div class="mb-3">
        <label for="formFile" class="form-label">8]- Total Viviendas</label>
        <input class="form-control form-control-sm" value="<?php echo $total_viviendas; ?>"  id="totalviviendas"type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
      </div>
      <div class="mb-3">
        <label for="formFile" class="form-label">9]- Casa Comunal</label>
        <select required class="form-control form-control-sm" value="<?php echo $departamento; ?>"  name="casacomunal" id="casacomunal" class="form-control form-control-sm">
            <option >No</option>
			<option >Sí</option>            
		</select>
      </div>
      <div class="mb-3">
        <label for="formFile" class="form-label">10]- Descripción Casa Comunal</label>
        <textarea rows="2" type="text" maxlength="200"    class="form-control form-control-sm" id="descripcionCasaComunal" placeholder="name@example.com"><?php echo $casa_comunal; ?></textarea>
      </div>
      <div class="mb-3">
        <label for="formFile" class="form-label">11]- Centro Alcance</label>
        <input class="form-control form-control-sm" value="<?php echo $centro_alcances; ?>"  id="centroalcance" type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
      </div>
      
      <!--<div class="mb-3">
        <label for="formFile" class="form-label">11]- SEDE</label>
            <select required class="form-control form-control-sm" name="sede" id="sede" class="form-control form-control-sm">
                        <option value="Santa Ana">Santa Ana</option>
                        <option value="Soyapando">Soyapango </option>
                        <option value="San Miguel">San Miguel</option>
			</select>
      </div>-->
      <div class="mb-3">
        <label for="formFile" class="form-label">12]- OBSERVACIONES</label>
            <textarea rows="2" type="text"  maxlength="200" class="form-control form-control-sm" id="OBSERVACIONES" placeholder="name@example.com"><?php echo $observaciones; ?></textarea>
      </div>
  </div>
</div>







      
      
     