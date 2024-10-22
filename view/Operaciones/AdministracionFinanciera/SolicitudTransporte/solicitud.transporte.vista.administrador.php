<style>

    .formatodeTexto{

        font-weight: 400;

    }

    .formatoTituloTexto{

        font-weight: 600;

    }

    .colorFichaProyecto{

        background-color: #F2F2F2;

        color: while;

        margin-right: 534px;

        border-radius: 8px;

    }

</style>

<style>

    .colorFondo{

        background-color: #CFE2FF;

        color: #FFFFFF;

    }

    .colorTitulo{

        background-color: #F2F2F2;

        border-radius: 10px;

        color: #FFFFFF;

        font-size: 15px;

        margin-left: 20px;

    }

    .colorNuevoProyecto{

        background-color: #FFFFFF;

        color: black;

    }

    .colorNuevaFicha{

        background-color: #FFFFFF;

        color: black;

    }

    .colorFondo{

        background-color: #3E9AA5;

    }

    .fondoImagen {

    margin: 0;

    padding: 0;

    background-image: url('assets/images/4025889.jpg'); /* Reemplaza 'ruta_de_tu_imagen.jpg' con la ruta de tu imagen de fondo */

    background-size: cover;

    background-position: center 5px;

    height: 30vh;
    width: 20%;

    display: flex;

    align-items: center;

    justify-content: center;

    

}

.colorTextoFondo{

    color: while;

    font-weight: 700;

}

.fondoColor{

    background-color: #CFE2FF;

    color: white;

    opacity: 0.7; /* Ajusta la opacidad según tus preferencias */

   

}



</style> 

<?php

$ano_actual = date("Y");

?>




<!--<center>
<div class="fondoImagen justify-content-center">

    </div>
</center>-->


<div class="position-relative overflow-hidden p-3 p-md-3 m-md-3 text-center bg-light">
<button id="btnRegresarSolicitud" type="button" class="btn btn btn-light btn-sm position-absolute" style="left: 0; color:blue; border-bottom: 2px solid #000;">Regresar</button>
  
    <div class="col-md-5 p-lg-2 mx-auto my-2">
      <h1 class="display-4 fw-normal">Gestión de Solicitudes</h1>
      <p class="lead fw-normal">V 1.0.0 </p>
     
    </div>
    <div class="product-device shadow-sm d-none d-md-block">
    <button type="button" id="creacionRegistroSolicitudt" class="btn btn-sm" style="background-color: #1A4262; color:white;" data-bs-toggle="modal" data-bs-target="#exampleModal255"  >Registrar Nuevo Vehiculo</button>
            

    <button type="button" id="creacionRegistroSolicitud2t" class="btn btn-sm" style="background-color: #1A4262; color:white;" data-bs-toggle="modal" data-bs-target="#exampleModal213"  >Crear Nuevo Motorista</button>
    
    
    <a href="?view=statsTransportation" style="text-decoration: none;">
        <button type="button" id="btnStats" class="btn btn-sm" style="background-color: #1A4262; color:white;">
            Estadísticas
        </button>
    </a>
           
    </div>
    
  </div>


<br>

<div class="row">

   

    <div class="col-md">
        <div id="tablaFichas"></div>
    </div>

</div>

<br>



<br>







<!-- Modal -->






<!-- REGISTRANDO NUEVA FICHA-->


<style>
    .bounce-image {
        animation: bounce 1s infinite;
    }
    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% {
            transform: translateY(0);
        }
        40% {
            transform: translateY(-20px);
        }
        60% {
            transform: translateY(-5px);
        }
    
}
</style>


<!--::::::::::: MODAL PARA REGISTRAR SOLICITUD ::::::::::::::::::-->
<div class="modal fade " id="exampleModal255" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content " >
      <div class="modal-header colorNuevaFicha " style="background-color: #1A4262; ">
        <h4 class="modal-title" id="exampleModalLabel"  style="color:white;"> Registrando Vehiculo</h4>
        <button type="button" id="cerrarRegistroVehiculo" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">


      <div class="row">
        <div class="col-md-5">
            
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
            <option value="fiat">Fiat</option><!---->
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
              <option >Sedán</option>
              <option >Minivans</option>
              <option >Pick-up</option>
              <option >Camioneta</option>
              <option >Camión</option>
              <option >Autobus</option>
              <option >MicroBus</option>
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
        <div class="col-1 d-flex justify-content-center">
                            <hr class="vr align-self-center h-75">
                        </div>
        <div class="col-md-5">


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
       

      



       
      <div class="modal-footer">

      <a type="button" id="btnCerrarVehiculos"  class="btn btn-sm btn-seconday" style="background-color: #FD9683;" data-bs-dismiss="modal">Cancelar</a>

        <a type="button" id="btnRegistrarVehiculos" class="btn  btn-sm" style="background-color: #CBE8BA;"  >Registrar Vehículo</a>


        <a class="btn btn-success" id="botonsPINERCargandoVehiculos"  style="display:none;"type="button" disabled>

<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>

Cargando...

</a>
      </div>

     



    </div>

  </div>

</div>
</div>


<!--:::::::::::::::::::::  MODAL MOTORISTAS ::::::::::::::::::::::::::::::-->
<div class="modal fade " id="exampleModal213" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content " > 
      <div class="modal-header colorNuevaFicha " style="background-color: #1A4262; ">
        <h4 class="modal-title" id="exampleModalLabel"  style="color:white;"> Registrando Motorista al Sistema</h4>
        <button type="button" id="closeVentanaModal1" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
      <img class="mx-auto d-block borderFotoPerfil" src="process/pictures/profile_14082740.png" style='width: 20%' />


      <div class="row">
        <div class="col-md">
            
        <div class="mb-3">
            <label for="formFile" class="form-label">¿El motorista es interno?:  </label>
            <select class="form-select form-select-sm" id="motoristaId" aria-label=".form-select-sm example">
              <option selected>Seleccione</option>
              <option >Si</option>
              <option >No</option>
            </select>
        </div>


        <div class="mb-3" id="bloqueNombreEmpleadoInterno" style="display: none;">
            <label for="formFile" class="form-label">Empleado Interno:  <span style="color: red;">(*)</span></label>
            <select class="js-example-basic-single form-control form-control-sm " id="id_label_single" style="width: 100%;"  data-show-subtext="true" data-live-search="true">

<option>N/A</option>

<?php 

include("../../config/net.php");

$query = "SELECT id, CONVERT(name1 USING utf8),CONVERT(name2 USING utf8),CONVERT(name3 USING utf8),CONVERT(lastname1 USING utf8),CONVERT(lastname2 USING utf8)  FROM employee order by name1";

$data3 = $net_rrhh->prepare($query);

$data3->execute();



if($data3->rowCount()>0)

{

    while ($data = $data3->fetch()) {

        echo "<option value=".$data[0].">".$data[1]." ".$data[2]." ".$data[3]." ".$data[4]." ".$data[5]."</option>";

    }

}

?>
 
</select>

        </div>
       


        <div class="mb-3" id="bloqueNombreMotorista" style="display: none;">
            <label for="formFile" class="form-label">Nombre del Motorista:  <span style="color: red;">(*)</span></label>
            <input id="nombreMotorista" class="form-control form-control-sm" type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
        </div>

        <div class="mb-3" id="bloqueNombreEmpresa" style="display: none;">
            <label for="formFile" class="form-label">Nombre de la Empresa :  <span style="color: red;">(*)</span></label>
            <textarea id="nombreEmpresa" class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
        </div>

        <div class="mb-3" id="bloqueDui" style="display: none;">
            <label for="formFile" class="form-label">DUI: <span style="color: red;">(*)</span> </label>
            <input id="duiMotorista" class="form-control form-control-sm" type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
        </div>

        <div class="mb-3" id="BLOQUENOTA" style="display: none;">
            <label for="formFile" class="form-label">Nota (Opcional) :  </label>
            <textarea id="notaOpcional" class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
        </div>


        </div>

      </div>
       

      



       
      <div class="modal-footer">

      <a type="button" id="btnCerrarMotorista"  class="btn btn-sm btn-seconday" style="background-color: #FD9683;" data-bs-dismiss="modal">Cancelar</a>

        <a type="button" id="btnRegistrarMotorista222" class="btn  btn-sm" style="background-color: #CBE8BA;"  >Registrar Motorista</a>
        <a class="btn btn-success" id="botonsPINERCargando"  style="display:none;"type="button" disabled>

<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>

Cargando...

</a>
      </div>

      

    </div>

  </div>

</div>
</div>





<!-- Incluye jQuery primero -->

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>



<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>



<!-- Después, incluye el CSS y JS de jQuery Toast Plugin -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>




<script>

$("#btnRegresarSolicitud").click(function(){
    window.location.href='?view=administracionFinanza';  
})

    $(document).ready(function()
    {
        $('.js-example-basic-single').select2({
            dropdownParent:$('#exampleModal213')
        })
        $("#tablaFichas").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.admin.tabla.php");
        $("#tablaVehiculo").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.tabla.vehiculo.php");
        $("#tablaMotorista").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.tabla.motoristas.php");

    })
    $("#tablaVehiculo").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.tabla.vehiculo.php");
        $("#tablaMotorista").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.tabla.motoristas.php");

</script>




 

<script>


//::::::::::::::::::: REGISTRAR VEHICULOS :::::::::::::::::::::::::::::::::::::::::::::::::::::::::
var bandera2 = 0;
$("#btnRegistrarVehiculos").click(function() {
    //botonsPINERCargandoVehiculos
    bandera2 = 0;
    $("#idIcono_direccion").css("display", "none");
    $("#idIcono_direccion2").css("display", "none");
    $("#idIcono_direccion3").css("display", "none");
    $("#idIcono_direccion4").css("display", "none");
    $("#idIcono_direccion5").css("display", "none");
    $("#idIcono_direccion6").css("display", "none");
    $("#idIcono_direccion7").css("display", "none");
    $("#idIcono_direccion8").css("display", "none");
    $("#idIcono_direccion9").css("display", "none");
    $("#idIcono_direccion10").css("display", "none");
    $("#idIcono_direccion11").css("display", "none");
    $("#idIcono_direccion12").css("display", "none");
    $("#idIcono_direccion13").css("display", "none");
    $("#idIcono_direccion14").css("display", "none");
    $("#idIcono_direccion15").css("display", "none");
    $("#idIcono_direccion16").css("display", "none");
    $("#idIcono_direccion17").css("display", "none");

    $("#btnRegistrarVehiculos").css("display", "block");
    $("#botonsPINERCargandoVehiculos").css("display", "none");

    if($("#marcaVehicular").val() == "")
    {
        bandera2 = 1;
        $("#idIcono_direccion").css("display", "block");
    }
    if($("#clasificacionVehicular").val()=="")
    {
        bandera2 = 1;
        $("#idIcono_direccion2").css("display", "block");
    }
    if($("#modeloVehicular").val() == "")
    {
        bandera2 = 1;
        $("#idIcono_direccion3").css("display", "block");
    }
    if($("#yearVehicular").val() < 2000)
    {
        bandera2 = 1;
        $("#idIcono_direccion4").css("display", "block");
    }
    if($("#colorVehicular").val() == "")
    {
        bandera2 = 1;
        $("#idIcono_direccion5").css("display", "block");
    }
    if($("#serieVehicular").val() == "")
    {
        bandera2 = 1;
        $("#idIcono_direccion6").css("display", "block");
    }
    if($("#tipoMotorVehicular").val() == "")
    {
        bandera2 = 1;
        $("#idIcono_direccion7").css("display", "block");
    }
    if($("#potenciaVehicular").val() == "")
    {
        bandera2 = 1;
        $("#idIcono_direccion8").css("display", "block");
    }
    if($("#transmisionVehicular").val() == "")
    {
        bandera2 = 1;
        $("#idIcono_direccion9").css("display", "block");
    }
    if($("#capacidaPasajeroVehicular").val() <=0)
    {
        bandera2 = 1;
        $("#idIcono_direccion10").css("display", "block");
    }
    if($("#capacidadCargaVehicular").val() == "")
    {
        bandera2 = 1;
        $("#idIcono_direccion11").css("display", "block");
    }
    if($("#idDimensionesVehiculos").val() == "")
    {
        bandera2 = 1;
        $("#idIcono_direccion12").css("display", "block");
    }
    
    if($("#matriculaVehiculos").val() == "")
    {
        bandera2 = 1;
        $("#idIcono_direccion13").css("display", "block");
    }
    if($("#fhMatriculaVehiculos").val() == "")
    {
        bandera2 = 1;
        $("#idIcono_direccion14").css("display", "block");
    }
    if($("#fhVencimientoVehiculos").val() == "")
    {
        bandera2 = 1;
        $("#idIcono_direccion15").css("display", "block");
    }
    if($("#estadoSeguroId").val() == "")
    {
        bandera2 = 1;
        $("#idIcono_direccion16").css("display", "block");
    }
    if($("#tipoUsoVehiculo").val() == "")
    {
        bandera2 = 1;
        $("#idIcono_direccion17").css("display", "block");
    }

    if(bandera2 == 1)
    {
        $.toast({
             heading: 'Error',
             text:'Debe completar los campos requeridos ',
             showHideTransition: 'slide',
             icon: 'error',
             hideAfter: 3000, 
             position: 'bottom-center'
    
         });
    }
    else 
    {
        $.post("process/index.php", {
            
            process: "administracion_finanza",
            action: "addVehiculoTransporte",
    
            marcaVehicular: $("#marcaVehicular").val(), 
            modeloVehicular: $("#modeloVehicular").val(), 
            yearVehicular: $("#yearVehicular").val(), 
            colorVehicular: $("#colorVehicular").val(), 
            serieVehicular: $("#serieVehicular").val(), 
            tipoMotorVehicular: $("#tipoMotorVehicular").val(), 
            potenciaVehicular: $("#potenciaVehicular").val(), 
            transmisionVehicular: $("#transmisionVehicular").val(), 
            capacidaPasajeroVehicular: $("#capacidaPasajeroVehicular").val(),
            capacidadCargaVehicular : $("#capacidadCargaVehicular").val(),
            idDimensionesVehiculos : $("#idDimensionesVehiculos").val(),
            matriculaVehiculos : $("#matriculaVehiculos").val(),
            fhMatriculaVehiculos : $("#fhMatriculaVehiculos").val(),
            fhVencimientoVehiculos  : $("#fhVencimientoVehiculos").val(),
            estadoSeguroId          : $("#estadoSeguroId").val(),
            tipoUsoVehiculo : $("#tipoUsoVehiculo").val(),
            clasificacionVehicular :$("#clasificacionVehicular").val()
    
        },
    
     function(response){
    
         if(response)
         {
            
         $.toast({
             heading: 'Finalizado',
             text:'Vehiculo Creado ',
             showHideTransition: 'slide',
             icon: 'success',
             hideAfter: 3000, 
             position: 'bottom-center'
    
         });
         $("#btnRegistrarVehiculos").css("display", "none");
            $("#botonsPINERCargandoVehiculos").css("display", "block");
         $("#cerrarRegistroVehiculo").click();
         $("#tablaVehiculo").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.tabla.vehiculo.php");
    
          // Esperar 6 segundos antes de redirigir
            /*setTimeout(function () {
                window.location.href = "?view=vistaSolicitanteTransporte";
            }, 4000); // 6000 milisegundos = 6 segundos*/
    
         }
    
        
        });
    }
    

});
var banderaSeguridad = 0;
//:::::::::::: REGISTRAR MOTORISTAS ::::::::::::::::::::::::::::::::::::::::::::::::::::
$("#btnRegistrarMotorista222").click(function() {
    //botonsPINERCargando
    banderaSeguridad = 0;
    if($("#motoristaId").val() != "Si" && $("#motoristaId").val() != "No")
    {
        $.toast
        ({
                heading: 'Error',
                text:'Debe Seleccionar una opción ',
                showHideTransition: 'slide',
                icon: 'error',
                hideAfter: 10000, 
                position: 'top-center'
                 
        });
    }
    else
    {
        if($("#motoristaId").val() == "Si")
        {
            if($("#id_label_single").val() == "" || $("#id_label_single").val() == "N/A")
            {
                banderaSeguridad = 1;
            }
        }
        if($("#motoristaId").val() == "No")
        {
            if($("#nombreMotorista").val() == "")
            {
                banderaSeguridad = 1;
            }
            if($("#nombreEmpresa").val() == "")
            {
                banderaSeguridad = 1;
            }
            if($("#duiMotorista").val() == "")
            {
                banderaSeguridad = 1;
            }
        }
        if(banderaSeguridad == 1)
        {
            $.toast
        ({
                heading: 'Error',
                text:'Llenar campos obligatorios ',
                showHideTransition: 'slide',
                icon: 'error',
                hideAfter: 10000, 
                position: 'top-center'
                 
        });
        }
        else
        {
            $("#botonsPINERCargando").css("display", "block");
        $("#btnRegistrarMotorista222").css("display", "none");

            $.post("process/index.php", {
                    
                process: "administracion_finanza",
                action: "addMotoristaTransporte",

                motoristaId: $("#motoristaId").val(), 
                id_label_single: $("#id_label_single").val(), 
                nombreMotorista: $("#nombreMotorista").val(), 
                nombreEmpresa: $("#nombreEmpresa").val(), 
                duiMotorista: $("#duiMotorista").val(), 
                notaOpcional: $("#notaOpcional").val(),
            },

        function(response){

        if( response == 2)
        {
            $.toast({
                            heading: 'Error',
                            text:'Motorista ya se encuentra registrado ',
                            showHideTransition: 'slide',
                            icon: 'error',
                            hideAfter: 10000, 
                            position: 'top-center'
                    
                        });
                        $("#botonsPINERCargando").css("display", "none");
                        $("#btnRegistrarMotorista222").css("display", "block");
        }
        else {
            $("#closeVentanaModal1").click();
            $.toast({
                            heading: 'Finalizado',
                            text:'Registro Terminado ',
                            showHideTransition: 'slide',
                            icon: 'success',
                            hideAfter: 10000, 
                            position: 'top-center'
                    
                        });
                        $("#botonsPINERCargando").css("display", "none");
            $("#btnRegistrarMotorista222").css("display", "block");
            //$("#tablaMotorista").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.tabla.motoristas.php");
            $("#tablaMotorista").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.tabla.motoristas.php");

            //$("#tablaVehiculo").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.tabla.vehiculo.php");

            // Esperar 6 segundos antes de redirigir
                /*setTimeout(function () {
                    window.location.href = "?view=vistaSolicitanteTransporte";
                }, 4000); // 6000 milisegundos = 6 segundos*/
        }
            

        });   
        }
        
    }
    

});




//::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::







$("#motoristaId").change(function()
    {
        if($(this).val() === "Si"){
            document.getElementById("bloqueNombreMotorista").style.display= "none";
            document.getElementById("bloqueNombreEmpresa").style.display= "none";
            document.getElementById("bloqueDui").style.display= "none";//
            document.getElementById("BLOQUENOTA").style.display= "";
            document.getElementById("bloqueNombreEmpleadoInterno").style.display= ""; 
        } else if($(this).val() === "No"){
            document.getElementById("bloqueNombreMotorista").style.display= "";
            document.getElementById("bloqueNombreEmpresa").style.display= "";
            document.getElementById("bloqueDui").style.display= "";
            document.getElementById("BLOQUENOTA").style.display= "";
            document.getElementById("bloqueNombreEmpleadoInterno").style.display= "none";
        } 
        else {
            document.getElementById("bloqueNombreMotorista").style.display= "none";
            document.getElementById("bloqueNombreEmpresa").style.display= "none";
            document.getElementById("bloqueDui").style.display= "none";
            document.getElementById("BLOQUENOTA").style.display= "none";
            document.getElementById("bloqueNombreEmpleadoInterno").style.display= "none";
        }
    });

    $('#timeStart').change(function(){
        // Obtener el nuevo valor de fecha
        var nuevaFecha = $(this).val();
        
        // Cargar la tabla de solicitud con la nueva fecha
        $("#tablaSolicitudadmin").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.admin.tabla.solicitudes.php", { fechaActual: nuevaFecha });
    });
$(document).ready(function(){
 
    $("#tablaSolicitudadmin").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.admin.tabla.solicitudes.php", { fechaActual: document.getElementById("timeStart").value });
   
})
$(document).ready(function(){

         

   
$('.js-example-basic-single2').select2({

    dropdownParent:$('#exampleModal3')

})
      });

      $(document).ready(function(){

    $.toast({

text: 'Bienvenido a la gestión de solicitudes.',

showHideTransition: 'slide',

icon: 'info',

position: 'bottom-left', 

});
})
    </script>

