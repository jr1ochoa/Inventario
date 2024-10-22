<?php include("../../../../config/net.php");
    $valorRecibido = $_REQUEST['idModal'];
   //echo $valorRecibido;


     
        //PARA TOMAR LOS DATOS DE LA SEDE DE SANTA ANA:::::::::::::
        $query = "SELECT * FROM `admin_finanzas_informacion_vehiculo`  where id = ?";
        $data = $net_rrhh->prepare($query);
        $data->execute([$valorRecibido]);
        // Suponiendo que $data es tu conjunto de resultados
        $nombre_comunidad = "";
        $nota = "";
        $marca = "";
        $clasificacion_vehicular = "";
        
        while ($data3 = $data->fetch()) 
        {
            
            $nombre_comunidad      =   $data3[10].' '.$data3[11].' '.$data3[12].' '.$data3[13];
            $nota = $data3[8];
            $marca                      = $data3[1];
            $clasificacion_vehicular    = $data3[18];
            $modelo                     = $data3[2];
            $year                       = $data3[3];
            $color_vehiculo             = $data3[4];
            $numero_serie               = $data3[5];
            $tipo_motor                 = $data3[6];
            $potencia_motor             = $data3[7];
            $transmicion                = $data3[8];
            $capacidad_pasajero         = $data3[9];
            $capacidad_carga            = $data3[10];
            $dimensiones                = $data3[11];
            $matricula                  = $data3[12];
            $fh_matricula               = $data3[14];
            $vencimiento_matricula      = $data3[15];
            $estado_seguro              = $data3[16];
            $tipo_uso                   = $data3[17];
           
        }

  ?>
    
    <script>
        $(document).ready(function() {
        
            var marca = "<?php echo $marca; ?>"; // Asignar el valor de PHP a la variable de JavaScript
            $("#marcaVehicular").val(marca); // Establecer el valor seleccionado en el <select>

            var clasificacion = "<?php echo $clasificacion_vehicular; ?>"; 
            $("#clasificacionVehicular").val(clasificacion);

            var modelo = "<?php echo $modelo; ?>"; 
            $("#modeloVehicular").val(modelo);

            var year = "<?php echo $year; ?>"; 
            $("#yearVehicular").val(year);

            var fh_matricula = "<?php echo $fh_matricula; ?>"; 
            $("#fhMatriculaVehiculos").val(fh_matricula);

            var color_vehiculo = "<?php echo $color_vehiculo; ?>"; 
            $("#colorVehicular").val(color_vehiculo);

            var numero_serie = "<?php echo $numero_serie; ?>"; 
            $("#serieVehicular").val(numero_serie);

            var tipo_motor = "<?php echo $tipo_motor; ?>"; 
            $("#tipoMotorVehicular").val(tipo_motor);

            var potencia_motor = "<?php echo $potencia_motor; ?>"; 
            $("#potenciaVehicular").val(potencia_motor);

            var transmicion = "<?php echo $transmicion; ?>"; 
            $("#transmisionVehicular").val(transmicion);

            var capacidad_pasajero = "<?php echo $capacidad_pasajero; ?>"; 
            $("#capacidaPasajeroVehicular").val(capacidad_pasajero);


            var capacidad_carga = "<?php echo $capacidad_carga; ?>"; 
            $("#capacidadCargaVehicular").val(capacidad_carga);

            var dimensiones = "<?php echo $dimensiones; ?>"; 
            $("#idDimensionesVehiculos").val(dimensiones);

            var matricula = "<?php echo $matricula; ?>"; 
            $("#matriculaVehiculos").val(matricula);

            var vencimiento_matricula = "<?php echo $vencimiento_matricula; ?>"; 
            $("#fhVencimientoVehiculos").val(vencimiento_matricula);

            var estado_seguro = "<?php echo $estado_seguro; ?>"; 
            $("#estadoSeguroId").val(estado_seguro);

            var tipo_uso = "<?php echo $tipo_uso; ?>"; 
            $("#tipoUsoVehiculo").val(tipo_uso);

    });
    </script>
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content w-100">
            <div class="modal-body d-flex mb-1 justify-content-center align-items-center ">
               
               <!-- <img src="view/Operaciones/GestionProyectos/FichaComunitaria/assets/Icons/edit.png" width="50px" height="50px">
-->  
    <section class="ms-3 w-100">
        <h2>RESULTADO  SELECCIONADO:   </h2>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
            <div class="row">
                <div class="col-md">
                <label for="exampleFormControlTextarea1">Marca del vehiculo: <span style="color: red;">(*)</span></label>
                </div>
                <div class="col-md">
                    <svg id="idIcono_direccion" xmlns="http://www.w3.org/2000/svg" style="display: none; background-color: #FDE366; border-radius:8px;" width="16" height="16" fill="currentColor" class="bounce-image bi bi-exclamation-triangle mt-1" viewBox="0 0 16 16">
                    <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
                    <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                    </svg>
                </div>
            </div>

            <select class="form-select form-select-sm" id="marcaVehicular" aria-label=".form-select-sm example">
            <option value="">Seleccionar</option>
            <option value="audi">Audi</option>
            <option value="bmw">BMW</option>
            <option value="chevrolet">Chevrolet</option>
            <option value="fiat">Fiat</option>
            <option value="ford">Ford</option>
            <option value="honda">Honda</option>
            <option value="hyundai">Hyundai</option>
            <option value="isuzu">ISUZU</option>
            <option value="jaguar">Jaguar</option>
            <option value="jeep">Jeep</option>
            <option value="kia">Kia</option>
            <option value="land_rover">Land Rover</option>
            <option value="lexus">Lexus</option>
            <option value="mazda">Mazda</option>
            <option value="mercedes_benz">Mercedes-Benz</option>
            <option value="nissan">Nissan</option>
            <option value="porsche">Porsche</option>
            <option value="subaru">Subaru</option>
            <option value="tesla">Tesla</option>
            <option value="toyota">Toyota</option>
            <option value="volkswagen">Volkswagen</option>
            </select>
        </div>

        <div class="mb-3">
            
            <div class="row">
                <div class="col-md">
                <label for="exampleFormControlTextarea1">Clasificacion: <span style="color: red;">(*)</span></label>
                </div>
                <div class="col-md">
                    <svg id="idIcono_direccion2" xmlns="http://www.w3.org/2000/svg" style="display: none; background-color: #FDE366; border-radius:8px;" width="16" height="16" fill="currentColor" class="bounce-image bi bi-exclamation-triangle mt-1" viewBox="0 0 16 16">
                    <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
                    <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                    </svg>
                </div>
            </div>

            <select class="form-select form-select-sm" id="clasificacionVehicular" aria-label=".form-select-sm example">
              <option value="">Seleccione</option>
              <option value="Sedán">Sedán</option>
              <option value="Minivans">Minivans</option>
              <option value="Pick-up">Pick-up</option>
              <option value="Camioneta">Camioneta</option>
              <option value="Camion">Camión</option>
              <option value="Autobus">Autobus</option>
              <option value="MicroBus">MicroBus</option>
            </select>
        </div>

        <div class="mb-3">
           
            <div class="row">
                <div class="col-md">
                <label for="exampleFormControlTextarea1">Modelo del vehiculo: <span style="color: red;">(*)</span></label>
                </div>
                <div class="col-md">
                    <svg id="idIcono_direccion3" xmlns="http://www.w3.org/2000/svg" style="display: none; background-color: #FDE366; border-radius:8px;" width="16" height="16" fill="currentColor" class="bounce-image bi bi-exclamation-triangle mt-1" viewBox="0 0 16 16">
                    <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
                    <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                    </svg>
                </div>
            </div>

            <div class="col-9">
                <div id="charCount"   style=" background-color: #CFE2FF; border-radius:5px;">0/850 caracteres</div>
            </div> 
            <textarea class="form-control" maxlength="850" id="modeloVehicular" rows="2"></textarea>
        </div>
        <script>
document.getElementById('modeloVehicular').addEventListener('input', function() {
    // Obtiene el número de caracteres en el textarea
    var charCount = this.value.length;
    
    // Actualiza el div con el número de caracteres
    document.getElementById('charCount').innerText = charCount + '/850 caracteres';
});
</script>
        <div class="mb-3">
            
            <div class="row">
                <div class="col-md">
                <label for="exampleFormControlTextarea1">Año del vehiculo: <span style="color: red;">(*)</span></label>
                </div>
                <div class="col-md">
                    <svg id="idIcono_direccion4" xmlns="http://www.w3.org/2000/svg" style="display: none; background-color: #FDE366; border-radius:8px;" width="16" height="16" fill="currentColor" class="bounce-image bi bi-exclamation-triangle mt-1" viewBox="0 0 16 16">
                    <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
                    <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                    </svg>
                </div>
            </div>

            <input class="form-control form-control-sm" id="yearVehicular" type="number" placeholder="0" max="<?php echo date('Y'); ?>" aria-label=".form-control-sm example">
        </div>

        <div class="mb-3">

            <div class="row">
                <div class="col-md">
                <label for="exampleFormControlTextarea1">Color del vehiculo: <span style="color: red;">(*)</span></label>
                </div>
                <div class="col-md">
                    <svg id="idIcono_direccion5" xmlns="http://www.w3.org/2000/svg" style="display: none; background-color: #FDE366; border-radius:8px;" width="16" height="16" fill="currentColor" class="bounce-image bi bi-exclamation-triangle mt-1" viewBox="0 0 16 16">
                    <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
                    <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                    </svg>
                </div>
            </div>

            <div class="col-9">
                <div id="charCount"   style=" background-color: #CFE2FF; border-radius:5px;">0/850 caracteres</div>
            </div>
            <input class="form-control form-control-sm" id="colorVehicular" maxlength="850" type="text" placeholder="escribir..." aria-label=".form-control-sm example">
        </div>
        <script>
document.getElementById('modeloVehicular').addEventListener('input', function() {
    // Obtiene el número de caracteres en el textarea
    var charCount = this.value.length;
    
    // Actualiza el div con el número de caracteres
    document.getElementById('charCount').innerText = charCount + '/850 caracteres';
});
</script>
        <div class="mb-3">

            <div class="row">
                <div class="col-md">
                <label for="exampleFormControlTextarea1">Número de Serie: <span style="color: red;">(*)</span></label>
                </div>
                <div class="col-md">
                    <svg id="idIcono_direccion6" xmlns="http://www.w3.org/2000/svg" style="display: none; background-color: #FDE366; border-radius:8px;" width="16" height="16" fill="currentColor" class="bounce-image bi bi-exclamation-triangle mt-1" viewBox="0 0 16 16">
                    <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
                    <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                    </svg>
                </div>
            </div>

            <div class="col-9">
                <div id="charCount2"   style=" background-color: #CFE2FF; border-radius:5px;">0/1250 caracteres</div>
            </div>
            <input class="form-control form-control-sm" id="serieVehicular" type="text" placeholder="escribir..." aria-label=".form-control-sm example">
        </div>
        <script>
document.getElementById('serieVehicular').addEventListener('input', function() {
    // Obtiene el número de caracteres en el textarea
    var charCount2 = this.value.length;
    
    // Actualiza el div con el número de caracteres
    document.getElementById('charCount2').innerText = charCount2 + '/1250 caracteres';
});
</script>

        <div class="mb-3">

            <div class="row">
                <div class="col-md">
                <label for="exampleFormControlTextarea1">Tipo de Motor: <span style="color: red;">(*)</span></label>
                </div>
                <div class="col-md">
                    <svg id="idIcono_direccion7" xmlns="http://www.w3.org/2000/svg" style="display: none; background-color: #FDE366; border-radius:8px;" width="16" height="16" fill="currentColor" class="bounce-image bi bi-exclamation-triangle mt-1" viewBox="0 0 16 16">
                    <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
                    <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                    </svg>
                </div>
            </div>

            <select class="form-select form-select-sm" id="tipoMotorVehicular" aria-label=".form-select-sm example">
              <option value="" selected>Seleccione</option>
              <option >Diesel</option>
              <option >Gasolina</option>
              <option >Electricos</option>
              <option >Hibridos</option>
            </select>
        </div>

        <div class="mb-3">

            <div class="row">
                <div class="col-md">
                <label for="exampleFormControlTextarea1">Potencia de Motor (Toneladas): <span style="color: red;">(*)</span></label>
                </div>
                <div class="col-md">
                    <svg id="idIcono_direccion8" xmlns="http://www.w3.org/2000/svg" style="display: none; background-color: #FDE366; border-radius:8px;" width="16" height="16" fill="currentColor" class="bounce-image bi bi-exclamation-triangle mt-1" viewBox="0 0 16 16">
                    <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
                    <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                    </svg>
                </div>
            </div>

            <div class="col-9">
                <div id="charCount3"   style=" background-color: #CFE2FF; border-radius:5px;">0/850 caracteres</div>
            </div>
            <input class="form-control form-control-sm" maxlength="850" id="potenciaVehicular" type="text" placeholder="Ej. 1.8, 1.9, 2.0, 2.2" aria-label=".form-control-sm example">
        </div>
        <script>
document.getElementById('potenciaVehicular').addEventListener('input', function() {
    // Obtiene el número de caracteres en el textarea
    var charCount3 = this.value.length;
    
    // Actualiza el div con el número de caracteres
    document.getElementById('charCount3').innerText = charCount3 + '/850 caracteres';
});
</script>

        <div class="mb-3">

            <div class="row">
                <div class="col-md">
                <label for="exampleFormControlTextarea1">Transmisión:<span style="color: red;">(*)</span></label>
                </div>
                <div class="col-md">
                    <svg id="idIcono_direccion9" xmlns="http://www.w3.org/2000/svg" style="display: none; background-color: #FDE366; border-radius:8px;" width="16" height="16" fill="currentColor" class="bounce-image bi bi-exclamation-triangle mt-1" viewBox="0 0 16 16">
                    <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
                    <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                    </svg>
                </div>
            </div>

            <select class="form-select form-select-sm" id="transmisionVehicular" aria-label=".form-select-sm example">
              <option value="" selected>Seleccione</option>
              <option >Automatica</option>
              <option >Manual</option>
            </select>
        </div>

        


        </div>
      
        <div class="col-md-12">


        <div class="mb-3">

            <div class="row">
                <div class="col-md">
                <label for="exampleFormControlTextarea1">Capacidad de Pasajeros:<span style="color: red;">(*)</span></label>
                </div>
                <div class="col-md">
                    <svg id="idIcono_direccion10" xmlns="http://www.w3.org/2000/svg" style="display: none; background-color: #FDE366; border-radius:8px;" width="16" height="16" fill="currentColor" class="bounce-image bi bi-exclamation-triangle mt-1" viewBox="0 0 16 16">
                    <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
                    <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                    </svg>
                </div>
            </div>

            <input class="form-control form-control-sm" id="capacidaPasajeroVehicular" type="number" placeholder="0" aria-label=".form-control-sm example">
        </div>


        <div class="mb-3">

            <div class="row">
                <div class="col-md">
                <label for="exampleFormControlTextarea1">Capacidad de Carga (Toneladas):<span style="color: red;">(*)</span></label>
                </div>
                <div class="col-md">
                    <svg id="idIcono_direccion11" xmlns="http://www.w3.org/2000/svg" style="display: none; background-color: #FDE366; border-radius:8px;" width="16" height="16" fill="currentColor" class="bounce-image bi bi-exclamation-triangle mt-1" viewBox="0 0 16 16">
                    <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
                    <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                    </svg>
                </div>
            </div>

            <div class="col-9">
                <div id="charCount4"   style=" background-color: #CFE2FF; border-radius:5px;">0/850 caracteres</div>
            </div>
            <input class="form-control form-control-sm" id="capacidadCargaVehicular" type="text" placeholder="escribir..." aria-label=".form-control-sm example">
        </div>
        <script>
document.getElementById('capacidadCargaVehicular').addEventListener('input', function() {
    // Obtiene el número de caracteres en el textarea
    var charCount4 = this.value.length;
    
    // Actualiza el div con el número de caracteres
    document.getElementById('charCount4').innerText = charCount4 + '/850 caracteres';
});
</script>

        <div class="mb-3">


            <div class="row">
                <div class="col-md">
                <label for="exampleFormControlTextarea1">Dimensiones:<span style="color: red;">(*)</span></label>
                </div>
                <div class="col-md">
                    <svg id="idIcono_direccion12" xmlns="http://www.w3.org/2000/svg" style="display: none; background-color: #FDE366; border-radius:8px;" width="16" height="16" fill="currentColor" class="bounce-image bi bi-exclamation-triangle mt-1" viewBox="0 0 16 16">
                    <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
                    <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                    </svg>
                </div>
            </div>

            <div class="col-9">
                <div id="charCount5"   style=" background-color: #CFE2FF; border-radius:5px;">0/850 caracteres</div>
            </div>
            <input class="form-control form-control-sm" id="idDimensionesVehiculos" type="text" placeholder="escribir..." aria-label=".form-control-sm example">
        </div>
        <script>
document.getElementById('idDimensionesVehiculos').addEventListener('input', function() {
    // Obtiene el número de caracteres en el textarea
    var charCount5 = this.value.length;
    
    // Actualiza el div con el número de caracteres
    document.getElementById('charCount5').innerText = charCount5 + '/850 caracteres';
});
</script>
        <div class="mb-3">
  
            <div class="row">
                <div class="col-md">
                <label for="exampleFormControlTextarea1">Matricula : <span style="color: red;">(*)</span></label>
                </div>
                <div class="col-md">
                    <svg id="idIcono_direccion13" xmlns="http://www.w3.org/2000/svg" style="display: none; background-color: #FDE366; border-radius:8px;" width="16" height="16" fill="currentColor" class="bounce-image bi bi-exclamation-triangle mt-1" viewBox="0 0 16 16">
                    <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
                    <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                    </svg>
                </div>
            </div>

            <div class="col-9">
                <div id="charCount6"   style=" background-color: #CFE2FF; border-radius:5px;">0/850 caracteres</div>
            </div>
            <input class="form-control form-control-sm" id="matriculaVehiculos" type="text" placeholder="escribir..." aria-label=".form-control-sm example">
        </div>
        <script>
document.getElementById('matriculaVehiculos').addEventListener('input', function() {
    // Obtiene el número de caracteres en el textarea
    var charCount6 = this.value.length;
    
    // Actualiza el div con el número de caracteres
    document.getElementById('charCount6').innerText = charCount6 + '/850 caracteres';
});
</script>

        <div class="mb-3">
           
            <div class="row">
                <div class="col-md">
                <label for="exampleFormControlTextarea1">Fecha Matricula : <span style="color: red;">(*)</span></label>
                </div>
                <div class="col-md">
                    <svg id="idIcono_direccion14" xmlns="http://www.w3.org/2000/svg" style="display: none; background-color: #FDE366; border-radius:8px;" width="16" height="16" fill="currentColor" class="bounce-image bi bi-exclamation-triangle mt-1" viewBox="0 0 16 16">
                    <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
                    <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                    </svg>
                </div>
            </div>

            <input class="form-control form-control-sm"  min="<?php echo date('Y-m-d', strtotime('-1 year')); ?>" id="fhMatriculaVehiculos" type="date" placeholder=".form-control-sm" aria-label=".form-control-sm example">
        </div>


        <div class="mb-3">
            

            <div class="row">
                <div class="col-md">
                <label for="exampleFormControlTextarea1">Fecha Vencimiento Matricula : <span style="color: red;">(*)</span></label>
                </div>
                <div class="col-md">
                    <svg id="idIcono_direccion15" xmlns="http://www.w3.org/2000/svg" style="display: none; background-color: #FDE366; border-radius:8px;" width="16" height="16" fill="currentColor" class="bounce-image bi bi-exclamation-triangle mt-1" viewBox="0 0 16 16">
                    <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
                    <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                    </svg>
                </div>
            </div>

            <input value="<?php echo date('Y-m-d', strtotime('+1 year')); ?>" max="<?php echo date('Y-m-d', strtotime('+1 year')); ?>" class="form-control form-control-sm" id="fhVencimientoVehiculos" type="date"  aria-label=".form-control-sm example">
        </div>

        
        <div class="mb-3">

            <div class="row">
                <div class="col-md">
                <label for="exampleFormControlTextarea1">Estado del Seguro : <span style="color: red;">(*)</span></label>
                </div>
                <div class="col-md">
                    <svg id="idIcono_direccion16" xmlns="http://www.w3.org/2000/svg" style="display: none; background-color: #FDE366; border-radius:8px;" width="16" height="16" fill="currentColor" class="bounce-image bi bi-exclamation-triangle mt-1" viewBox="0 0 16 16">
                    <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
                    <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                    </svg>
                </div>
            </div>

            <select class="form-select form-select-sm" id="estadoSeguroId" aria-label=".form-select-sm example">
              <option value="" selected>Seleccione</option>
              <option >Activo</option>
              <option >Inactivo</option>
            </select>
        </div>


        <div class="mb-3">
           
            <div class="row">
                <div class="col-md">
                <label for="exampleFormControlTextarea1">Tipo de Uso : <span style="color: red;">(*)</span></label>
                </div>
                <div class="col-md">
                    <svg id="idIcono_direccion17" xmlns="http://www.w3.org/2000/svg" style="display: none; background-color: #FDE366; border-radius:8px;" width="16" height="16" fill="currentColor" class="bounce-image bi bi-exclamation-triangle mt-1" viewBox="0 0 16 16">
                    <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
                    <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                    </svg>
                </div>
            </div>

            <select class="form-select form-select-sm" id="tipoUsoVehiculo" aria-label=".form-select-sm example">
              <option value="" selected>Seleccione</option>
              <option >Activo</option>
              <option >Inactivo</option>
            </select>
        </div>


        </div>
      </div>
       
      
     <!-- <div class="modal-footer">
        <a type="button" id="btnRegistrarVehiculos" class="btn  btn-sm" style="background-color: #CBE8BA;"  >Editar Vehículo</a>
      </div> -->

    </div>
                
                
                
                
                </section>
                <input type="hidden" value="<?php echo $valorRecibido; ?>" id="idObjetivoGeneralDelete" name="idObjetivoGeneralDelete"/>
            </div>
            <div class="modal-footer p-1 border-0 ">
               <button id="editarMOtoristas222" class="btn">Editar  </button>
            </div>
        </div>
    </div>


<script>
$('#editarMOtoristas222').click(function(){ 
//alert("Hola Mundo");
//alert($("#idEstadoMotorista").val());
$.post("process/index.php", {
    process: "administracion_finanza",
    action: "editarVehiculos2024",  
 
            marca : $("#marcaVehicular").val(), // Asignar el valor de PHP a la variable de JavaScript
            //$("#marcaVehicular").val(marca); // Establecer el valor seleccionado en el <select>

            clasificacion : $("#clasificacionVehicular").val(), 
            //$("#clasificacionVehicular").val(clasificacion);

            modelo : $("#modeloVehicular").val(), 
            //$("#modeloVehicular").val(modelo);

            year : $("#yearVehicular").val(), 
            //$("#yearVehicular").val(year);

            fh_matricula : $("#fhMatriculaVehiculos").val(), 
            //$("#fhMatriculaVehiculos").val(fh_matricula);

            color_vehiculo : $("#colorVehicular").val(), 
            //$("#colorVehicular").val(color_vehiculo);

            numero_serie : $("#serieVehicular").val(), 
            //$("#serieVehicular").val(numero_serie);

            tipo_motor : $("#tipoMotorVehicular").val(), 
            //$("#tipoMotorVehicular").val(tipo_motor);

            potencia_motor : $("#potenciaVehicular").val(), 
            //$("#potenciaVehicular").val(potencia_motor);

            transmicion : $("#transmisionVehicular").val(),
            //$("#transmisionVehicular").val(transmicion);

            capacidad_pasajero : $("#capacidaPasajeroVehicular").val(), 
            //$("#capacidaPasajeroVehicular").val(capacidad_pasajero);


            capacidad_carga : $("#capacidadCargaVehicular").val(), 
            //$("#capacidadCargaVehicular").val(capacidad_carga);

            dimensiones : $("#idDimensionesVehiculos").val(), 
            //$("#idDimensionesVehiculos").val(dimensiones);

            matricula : $("#matriculaVehiculos").val(), 
            //$("#matriculaVehiculos").val(matricula);

            vencimiento_matricula : $("#fhVencimientoVehiculos").val(), 
            //$("#fhVencimientoVehiculos").val(vencimiento_matricula);

            estado_seguro : $("#estadoSeguroId").val(), 
            //$("#estadoSeguroId").val(estado_seguro);

            tipo_uso : $("#tipoUsoVehiculo").val(), 
            //$("#tipoUsoVehiculo").val(tipo_uso);
    
    idObjetivoGeneralDelete : $("#idObjetivoGeneralDelete").val()

},
    function(response){
       //alert(response);
        if(response){
            $.toast({
                    heading: 'Finalizado',
                    text: "Edición terminada",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: 3000, 
                    position: 'bottom-center'
                });

               $('#btnCerrarModalEditarVehiculo').click();
               $("#tablaVehiculo").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.tabla.vehiculo.php");
        
               //$('#refrescarResultados').click();
               //$("#tablaPasajeros").load("view/Monitoreo/Monitoreo.tabla.obj.general.php");
            }
    }
);
});
</script>

