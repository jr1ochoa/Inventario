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
        }

  ?>
    
    <div class="row">
        <input disabled class="form-control form-control-sm" id="idRelacionProyecto" type="hidden" value="<?php echo $valorRecibido; ?>"  type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
        <div class="col">
            <div class="mb-3">
                <label for="formFile" class="form-label">Departamento (ACTUAL)*</label>
                <input disabled class="form-control form-control-sm" value="<?php echo $departamento; ?>"  type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
            </div>
        </div>

        <div class="col">
            <div class="mb-3">
                <label for="formFile" class="form-label">Municipio (ACTUAL)*</label>
                <input disabled class="form-control form-control-sm" value="<?php echo $municipio; ?>"   type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
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
        <label for="formFile" class="form-label">3]- Nombre Comunidad</label>
        <input class="form-control form-control-sm" value="<?php echo $nombre_comunidad; ?>"  id="nombreComunidad"type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
      </div>
      <div class="mb-3">
        <label for="formFile" class="form-label">4]- Radio</label>
        <input class="form-control form-control-sm" value="<?php echo $radio; ?>" id="radio" type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
      </div>
      <div class="mb-3">
        <label for="formFile" class="form-label">5]- Ubicación</label>
        <input class="form-control form-control-sm" value="<?php echo $ubicacion; ?>"  id="ubicacion" type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
      </div>
      <div class="mb-3">
        <label for="formFile" class="form-label">6]- Coordenadas</label>
        <input class="form-control form-control-sm" value="<?php echo $coordenadas; ?>"  id="coordenadas" type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
      </div>
  </div>


  <div class="col">
  <div class="mb-3">
        <label for="formFile" class="form-label">7]- Total Viviendas</label>
        <input class="form-control form-control-sm" value="<?php echo $total_viviendas; ?>"  id="totalviviendas"type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
      </div>
      <div class="mb-3">
        <label for="formFile" class="form-label">8]- Casa Comunal</label>
        <select required class="form-control form-control-sm" value="<?php echo $departamento; ?>"  name="cboDepartment" id="casacomunal" class="form-control form-control-sm">
            <option >No</option>
			<option >Sí</option>            
		</select>
      </div>
      <div class="mb-3">
        <label for="formFile" class="form-label">9]- Descripción Casa Comunal</label>
        <textarea rows="2" type="text" maxlength="200"    class="form-control form-control-sm" id="descripcionCasaComunal" placeholder="name@example.com"><?php echo $casa_comunal; ?></textarea>
      </div>
      <div class="mb-3">
        <label for="formFile" class="form-label">10]- Centro Alcance</label>
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







      
      
     