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

    background-image: url('assets/images/Wavy_Tech-11_Single-08.jpg'); /* Reemplaza 'ruta_de_tu_imagen.jpg' con la ruta de tu imagen de fondo */

    background-size: cover;

    background-position: center ;

    height: 20vh;
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
// Establecer la zona horaria a El Salvador
date_default_timezone_set('America/El_Salvador');

// Obtener la hora actual
$hora_actual = date('H:i:s');

// Mostrar la hora actual
//echo "La hora actual en El Salvador es: " . $hora_actual;
?>



<?php
 
$idEmpleado =  $_SESSION['iu'];
//echo $idEmpleado."<br>";
$idAreaEmpleado;
$query = "SELECT s1.*, s2.idarea FROM workarea_positions_assignment as s1  inner join workarea_positions as s2   WHERE  s2.id = s1.idposition and s1.idemployee = $idEmpleado";
    $spaces = $net_rrhh->prepare($query);
    $spaces->execute();
    while ($data = $spaces->fetch())
    {
        //echo $data[8];
        $idAreaEmpleado = $data[8];
    }
 
?>

<div class="bodydiv">
    
 <div id="clock"></div>
</div>
<script>
function updateTime() {
    const now = new Date();
    const hours = String(now.getHours()).padStart(2, '0');
    const minutes = String(now.getMinutes()).padStart(2, '0');
    const seconds = String(now.getSeconds()).padStart(2, '0');
    const timeString = `${hours}:${minutes}:${seconds}`;
    document.getElementById('clock').innerText = "Hora del sistema: "+timeString;
}

// Actualizar cada segundo
setInterval(updateTime, 1000);

// Llamar a updateTime al cargar la página para mostrar la hora actual
updateTime();
</script>
<!--:::::::::: ANIMACION ADVERTENCIA ::::::::::::::-->


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
<div class="row justify-content-center">
    <div class="mt-3 mx-3 col-4 h-100">
    <div class="card mb-3">
       
    <div class="card-body  d-flex flex-column " style="background-color: #d9e1e79a;">
     

<h3><b>FORMULARIO PARA SOLICITUD DE TRANSPORTE</b></h3>
<div style="height: 4px; width:100%; margin-top:-20px;background: linear-gradient(to right, #1A4262 33%, #668196 33%, #668196 66%, #CCD5DC 66%);"></div>
<?php
// Obtener la fecha y hora actual del sistema
$fecha_actual = date('Y-m-d');
$hora_actual = date('H:i:s');
$idEmpleado =  $_SESSION['iu'];

$codigoVariable = $fecha_actual.$hora_actual.":".$idEmpleado;
//echo $codigoVariable;
?>



<div class="form-group mt-1">
    <label for="exampleFormControlTextarea1" style="font-size: 10px;">🏷️ CODIGO UNICO: </label>
    <input disabled class="form-control form-sm" id="idcodigoSolicitud" style="font-size: 10px;" value="<?php echo $fecha_actual.$hora_actual.":".$idEmpleado; ?>" />
  </div>

  <input type="hidden" value="<?php echo $idAreaEmpleado; ?>" id="idAreaEmpleadoTexto"/>


<div class="form-group ">
    <div class="row">
     
        <div class="col-md">
        <label for="exampleFormControlTextarea1">Dirección de Destino: <span style="color: red;">(*)</span></label>
        </div>
        <div class="col-md">
            <svg id="idIcono_direccion" xmlns="http://www.w3.org/2000/svg" style="display: none; background-color: #FDE366; border-radius:8px;" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle mt-1 bounce-image" viewBox="0 0 16 16">
            <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
            <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
            </svg>
        </div>
    </div>

    <div class="col-9">
            <div id="charCount3"  style="background-color: #CFE2FF; border-radius:5px;">0/3000 caracteres</div>
        </div> 
    <textarea class="form-control" id="idDireccionDestino" maxlength="3000" rows="3"></textarea>
  </div>
  <script>
document.getElementById('idDireccionDestino').addEventListener('input', function() {
    // Obtiene el número de caracteres en el textarea
    var charCount3 = this.value.length;
    
    // Actualiza el div con el número de caracteres
    document.getElementById('charCount3').innerText = charCount3 + '/1200 caracteres';
});
</script>
  <div class="form-group">
    <div class="row">
    <div class="col-md">
        <label for="exampleFormControlTextarea1">Motivo de la Salida: <span style="color: red;">(*)</span></label>
        </div>
        <div class="col-md">
            <svg id="idIcono_direccion2" xmlns="http://www.w3.org/2000/svg" style="display: none; background-color: #FDE366; border-radius:8px;" width="16" height="16" fill="currentColor" class="bounce-image bi bi-exclamation-triangle mt-1" viewBox="0 0 16 16">
            <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
            <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
            </svg>
        </div>
    </div>
    <div class="col-9">
            <div id="charCount2"  style="background-color: #CFE2FF; border-radius:5px;">0/1200 caracteres</div>
        </div>
    <textarea class="form-control" id="idMotivoSalida" maxlength="1200" rows="3"></textarea>
  </div>
  <script>
document.getElementById('idMotivoSalida').addEventListener('input', function() {
    // Obtiene el número de caracteres en el textarea
    var charCount2 = this.value.length;
    
    // Actualiza el div con el número de caracteres
    document.getElementById('charCount2').innerText = charCount2 + '/1200 caracteres';
});
</script>
  <div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="exampleFormControlSelect1">¿Pertenece a un proyecto?</label>
            <select class="form-control" id="idSelectProyecto">
            <option>No</option>
            <option>Si</option>
            </select>
        </div>

    </div>
    <div class="col-12">
        <div class="form-group" id="idBloqueProyecto" style="display: none;">
        
        <div class="row">
        <div class="col-md">
        <label for="exampleFormControlTextarea1">Nombre del Proyecto: <span style="color: red;">(*)</span></label>
        </div>
        <div class="col-md">
            <svg id="idIcono_direccion3" xmlns="http://www.w3.org/2000/svg" style="display: none; background-color: #FDE366; border-radius:8px;" width="16" height="16" fill="currentColor" class="bounce-image bi bi-exclamation-triangle mt-1" viewBox="0 0 16 16">
            <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
            <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
            </svg>
        </div>
    </div>
        <div class="col-9">
            <div id="charCount1"  style="background-color: #CFE2FF; border-radius:5px;">0/1200 caracteres</div>
        </div>
        <textarea class="form-control" id="idNombreProyecto" maxlength="1200"  rows="3"></textarea>
        
             
    </div>
    </div>
  </div>
  <script>
document.getElementById('idNombreProyecto').addEventListener('input', function() {
    // Obtiene el número de caracteres en el textarea
    var charCount1 = this.value.length;
    
    // Actualiza el div con el número de caracteres
    document.getElementById('charCount1').innerText = charCount1 + '/1200 caracteres';
});
</script>

  <div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="exampleFormControlSelect1">¿Llevara equipo o Herramienta?</label>
            <select class="form-control" id="idSelectHerramientas">
            <option>No</option>
            <option>Si</option>
           
            </select>
        </div>

    </div>
    <div class="col-12">
        <div class="form-group" style="display: none;" id="idBloqueHerramienta">
        
        <div class="row">
        <div class="col-md">
        <label for="exampleFormControlTextarea1">Describir el equipo o herramienta: <span style="color: red;">(*)</span></label>
        </div>
        <div class="col-md">
            <svg id="idIcono_direccion4" xmlns="http://www.w3.org/2000/svg" style="display: none; background-color: #FDE366; border-radius:8px;" width="16" height="16" fill="currentColor" class="bounce-image bi bi-exclamation-triangle mt-1" viewBox="0 0 16 16">
            <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
            <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
            </svg>
        </div>
    </div>
        <div class="col-4">
        <div id="charCount"  style="background-color: #CFE2FF; border-radius:5px;">0/1200 caracteres</div>
        </div>
        <textarea class="form-control" id="idDescripcionHerramintas" maxlength="1200" rows="3"></textarea>
          
    </div>
    </div>
  </div>

  <script>
document.getElementById('idDescripcionHerramintas').addEventListener('input', function() {
    // Obtiene el número de caracteres en el textarea
    var charCount = this.value.length;
    
    // Actualiza el div con el número de caracteres
    document.getElementById('charCount').innerText = charCount + '/1200 caracteres';
});
</script>


  <div class="form-group mb-5">

        <div class="row">
        <div class="col-md">
        <label for="exampleFormControlTextarea1">Nota adicional: </label>
        </div>
       
    </div>
    <div class="col-9">
            <div id="charCount4"  style="background-color: #CFE2FF; border-radius:5px;">0/1200 caracteres</div>
        </div> 
        <textarea class="form-control" id="idNotaAdicional" rows="3"></textarea>
        </div>
        <script>
document.getElementById('idNotaAdicional').addEventListener('input', function() {
    // Obtiene el número de caracteres en el textarea
    var charCount4 = this.value.length;
    
    // Actualiza el div con el número de caracteres
    document.getElementById('charCount4').innerText = charCount4 + '/1200 caracteres';
});
</script>
        <div class="card-footer text-muted">
  </div>
        
        </div>
                            </div>
</div>


                        <div class="col-1 d-flex justify-content-center">
                            <hr class="vr align-self-center h-75">
                        </div>

                        <div class="col-4 mt-3">
                            <div class="card">
                            <div class="card-body  d-flex flex-column " style="background-color: #d9e1e79a;">
                      
    <div class="row ">


    <div class="form-group">
    
    <div class="row">
        <div class="col-md">
        <label for="exampleFormControlTextarea1">Fecha de Salida: <span style="color: red;">(*)</span></label>
        </div>
        <div class="col-md">
            <svg id="idIcono_direccion5" xmlns="http://www.w3.org/2000/svg" style="display: none; background-color: #FDE366; border-radius:8px;" width="16" height="16" fill="currentColor" class="bounce-image bi bi-exclamation-triangle mt-1" viewBox="0 0 16 16">
            <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
            <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
            </svg>
        </div>
    </div>

    <input id="idFechaSolicitud" class="form-control form-control-sm" min="<?php echo date('Y-m-d'); ?>" type="date" name="date" value="<?php echo getNextWorkingDay(); ?>">
</div>

<?php
function getNextWorkingDay() {
    $nextDay = strtotime('+1 day');
    while (date('N', $nextDay) >= 6) { // 6 y 7 representan sábado y domingo respectivamente
        $nextDay = strtotime('+1 day', $nextDay);
    }
    return date('Y-m-d', $nextDay);
}
?>



        <div class="col-md">
                <div class="form-group">
                  
                    <div class="row">
        <div class="col-md">
        <label for="exampleFormControlTextarea1">Hora de llegar al Lugar: <span style="color: red;">(*)</span></label>
        </div>
        <div class="col-md">
            <svg id="idIcono_direccion6" xmlns="http://www.w3.org/2000/svg" style="display: none; background-color: #FDE366; border-radius:8px;" width="16" height="16" fill="currentColor" class="bounce-image bi bi-exclamation-triangle mt-1" viewBox="0 0 16 16">
            <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
            <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
            </svg>
        </div>
    </div>
                    <input id="idHoraLlegada" class="form-control form-control-sm" type="time" name="times" value="">
                </div>  
          
            
            
        </div>
        <div class="col-md">
            <div class="form-group">
               

                <div class="row">
        <div class="col-md">
        <label for="exampleFormControlTextarea1">Hora estimada de retorno: <span style="color: red;">(*)</span></label>
        </div>
        <div class="col-md">
            <svg id="idIcono_direccion7" xmlns="http://www.w3.org/2000/svg" style="display: none; background-color: #FDE366; border-radius:8px;" width="16" height="16" fill="currentColor" class="bounce-image bi bi-exclamation-triangle mt-1" viewBox="0 0 16 16">
            <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
            <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
            </svg>
        </div>
    </div>
                <input id="idHorRetorno" class="form-control form-control-sm" type="time" name="times" value="">
            </div>
        </div>
    </div>            
    <center class="mb-3 mt-3 ">
        <h3>Cantidad Total de Pasajeros:
            
        <b style="background-color: #FDC53D; padding:4px; padding-top:0px; padding-bottom:0px; border-radius: 5px;"><span id="idCantidadpASAJERO"></span></b></h3>
        <div style="height: 4px; width:60%; margin-top:-20px;background: linear-gradient(to right, #1A4262 33%, #668196 33%, #668196 66%, #CCD5DC 66%);"></div>
        
        <svg id="idIcono_direccion8" xmlns="http://www.w3.org/2000/svg" style="display: none; background-color: #FDE366; border-radius:8px;" width="16" height="16" fill="currentColor" class="bounce-image bi bi-exclamation-triangle mt-1" viewBox="0 0 16 16">
            <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
            <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
            </svg>
    </center>
   


    <div class="form-group mb-3">
                    <label for="exampleFormControlTextarea1">¿Cantidad de Pasajeros Internos?  </label>
                    <input disabled id="idCantidaPasajeros2" class="form-control form-control-sm" type="number" name="times" value="0">
    </div> 


    <div class="form-group mt-1">
            <button type="button" class="btn btn-sm " style="background-color: #77AEFE;"  data-bs-toggle="modal" data-bs-target="#exampleModal3">Agregar Pasajero</button>
            <button type="button" id="refrescarPasajero" class="btn btn-sm " style="background-color: #77AEFE;"  >Refrescar</button>

               
<div id="tablaPasajeros">

</div>


            </div>

    <hr/>


    <div class="row ">
        <div class="col-6">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">¿Llevara pasajeros <br/> Externos?  </label>
                    <select class="form-control" id="selectPasajerExterno">
                    <option>No</option>
                        <option>Si</option>
                     
                    </select>
                </div>  
          
            
            
        </div>
        
        <div class="col-6">
        <div style="display: none;" id="bloque1Externo" class="form-group">
                    <label for="exampleFormControlTextarea1">¿Cantidad de Pasajeros Externo? <span style="color: red;">(*)</span> </label>
                    <input id="idCantidadPasajeroExterno" min="0" class="form-control form-control-sm" type="number" name="times" value="0">
                </div>  
        </div>
    </div>
              

    <div class="form-group mb-4">
        
    <div class="row">
        <div class="col-md">
        <label style="display: none;" id="idNombrePasajeroExeterno" for="exampleFormControlTextarea1">Nombre de los Pasajeros:  <span style="color: red;">(*)</span></label>
        </div>
        <div class="col-md">
            <svg id="idIcono_direccion9" xmlns="http://www.w3.org/2000/svg" style="display: none; background-color: #FDE366; border-radius:8px;" width="16" height="16" fill="currentColor" class="bounce-image bi bi-exclamation-triangle mt-1" viewBox="0 0 16 16">
            <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
            <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
            </svg>
        </div>
    </div>
    <div class="col-9">
            <div id="charCount5"   style="display: none; background-color: #CFE2FF; border-radius:5px;">0/1200 caracteres</div>
        </div> 
        <textarea style="display: none;" id="textIdPsajeroExterno" class="form-control" id="idListaPasajeros" rows="3"></textarea>
        </div>
        <script>
document.getElementById('textIdPsajeroExterno').addEventListener('input', function() {
    // Obtiene el número de caracteres en el textarea
    var charCount5 = this.value.length;
    
    // Actualiza el div con el número de caracteres
    document.getElementById('charCount5').innerText = charCount5 + '/1200 caracteres';
});
</script>
<?php 

if($hora_actual < "16:30:00" && $hora_actual >"06:00:00" )
{

?>
    
    <button id="idEnviarSolicitudRegistro" class="btn " style="background-color: #CBE8BA;">
        <i class="bi bi-gear"></i> Enviar Solicitud
    </button>

    <button class="btn btn-primary" style="display: none;" id="spinerCargando" type="button" disabled>
  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
  Cargando...
</button>

<div class="alert alert-success" id="mensajeTerminado" style="display: none;" role="alert">
  Proceso Terminado
</div>

<?php 
}
else
{
?>
 <button  class="btn " style="background-color: #A9A9A9;">
        <i class="bi bi-gear"></i>No se puede enviar solicitud
    </button>
<?php 
}
?>
    <div class="card-footer text-muted">
  </div>
                                </div>
                            </div>
                        </div>
</div>


<!--:::::::::::::::::::::  MODAL MOTORISTAS ::::::::::::::::::::::::::::::-->
<div class="modal fade " id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content " >
      <div class="modal-header colorNuevaFicha " style="background-color: #1A4262; ">
        <h4 class="modal-title" id="exampleModalLabel"  style="color:white;"> Registrando Pasajero Interno</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">


      <div class="row">
        <div class="col-md">
            
        


        <div class="mb-3">
            <label for="formFile" class="form-label">Empleado :  </label>
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



    


        </div>

      </div>
       

      



       
      <div class="modal-footer">

      <button type="button" id="btnCancelar"  class="btn btn-sm btn-seconday" style="background-color: #FD9683;" data-bs-dismiss="modal">Cancelar</button>

        <button type="button" id="btnRegisterPasajero" class="btn  btn-sm" style="background-color: #CBE8BA;"  >Registrar Pasajero</button>

      </div>

      <a class="btn btn-success" id="botonCargando2"  style="display:none;"type="button" disabled>

  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>

  Loading...

</a>

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


let countRowsAndDisplay = () => {
    let rowCount = $('#tablaBody tr').length; // Cuenta las filas en el tbody de la tabla
    $('#idCantidaPasajeros2').val(rowCount); // Muestra el número de filas en el input
    //$("#idCantidadpASAJERO").text(rowCount);

    var valorInput1 = parseFloat($("#idCantidaPasajeros2").val()) || 0; // Obtener el valor del primer input
    var valorInput2 = parseFloat($("#idCantidadPasajeroExterno").val()) || 0; // Obtener el valor del segundo input
    
    if(valorInput2 < 0)
    {
        var resultado = valorInput1 + 0; // Sumar los valores de ambos inputs
        $("#idCantidadpASAJERO").text(resultado); // Actualizar el texto del span con el resultado
    }
    else
    {
        var resultado = valorInput1 + valorInput2; // Sumar los valores de ambos inputs
        $("#idCantidadpASAJERO").text(resultado); // Actualizar el texto del span con el resultado
    }
   
          
};

$(document).ready(function() {
    countRowsAndDisplay();

    $.toast({
        heading: 'Aviso!',
        text: [
            'Horas habilitadas para envio de solicitud:',
            '6:00am - 4:30pm',
            'Toda solicitud nueva, se tomara para el dia siguiente'
        ],
        icon: 'info',
        hideAfter: 10000, 
        position: 'top-rigth'
    })

});
$("#refrescarPasajero").click(function(){
    $("#tablaPasajeros").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.tabla.pasajeros.php", { idProyecto: <?php echo json_encode($codigoVariable); ?> });

})

$("#tablaPasajeros").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.tabla.pasajeros.php", { idProyecto: <?php echo json_encode($codigoVariable); ?> });


      $(document).ready(function(){

$('.js-example-basic-single').select2({

    dropdownParent:$('#exampleModal3')

})
      });

    $("#selectPasajerExterno").change(function()
    {
        if($(this).val() === "Si"){
            document.getElementById("bloque1Externo").style.display= "";
            document.getElementById("idNombrePasajeroExeterno").style.display = "";
            document.getElementById("textIdPsajeroExterno").style.display = "";
            document.getElementById("charCount5").style.display="";
        } else {
            document.getElementById("bloque1Externo").style.display= "none";
            document.getElementById("idNombrePasajeroExeterno").style.display = "none";
            document.getElementById("textIdPsajeroExterno").style.display = "none";
            document.getElementById("charCount5").style.display="none";
            document.getElementById("idCantidadPasajeroExterno").value = "0";
            var valorInput1 = parseFloat($("#idCantidaPasajeros2").val()) || 0; // Obtener el valor del primer input
    var valorInput2 = parseFloat($("#idCantidadPasajeroExterno").val()) || 0; // Obtener el valor del segundo input
    var resultado = valorInput1 + valorInput2; // Sumar los valores de ambos inputs
    $("#idCantidadpASAJERO").text(resultado); // Actualizar el texto del span con el resultado
            
        }
    })

    $("#idSelectProyecto").change(function()
    {
        if($(this).val() === "Si"){
            document.getElementById("idBloqueProyecto").style.display= "";
            
        } else {
            document.getElementById("idBloqueProyecto").style.display= "none";
            
        } 
    });

    $("#idSelectHerramientas").change(function()
    {
        if($(this).val() === "Si"){
            document.getElementById("idBloqueHerramienta").style.display= "";
            
        } else {
            document.getElementById("idBloqueHerramienta").style.display= "none";
            
        } 
    })


    $("#idCantidaPasajeros2, #idCantidadPasajeroExterno").on('input', function() {
    var valorInput1 = parseFloat($("#idCantidaPasajeros2").val()) || 0; // Obtener el valor del primer input
    var valorInput2 = parseFloat($("#idCantidadPasajeroExterno").val()) || 0; // Obtener el valor del segundo input
    
    if(valorInput2 <= 0)
    {
        var resultado = valorInput1 + 0; // Sumar los valores de ambos inputs
    $("#idCantidadpASAJERO").text(resultado); // Actualizar el texto del span con el resultado
 
    }
    else
    {
        var resultado = valorInput1 + valorInput2; // Sumar los valores de ambos inputs
    $("#idCantidadpASAJERO").text(resultado); // Actualizar el texto del span con el resultado
  
    }
    
});

    $("#btnRegisterPasajero").click(function(){
        $.post("process/index.php", {
            
            process: "administracion_finanza",
            action: "addPasajerosInternosTransporte",
    
            id_label_single_value: $("#id_label_single").val(), // Valor asociado al elemento seleccionado
            id_label_single_text: $("#id_label_single option:selected").text(), // Texto del elemento seleccionado
            idcodigoSolicitud : $("#idcodigoSolicitud").val(),
        },
    
     function(response){
    
         if(response)
    
         {
         $.toast({
             heading: 'Finalizado',
             text:'Pasajero Registrado ',
             showHideTransition: 'slide',
             icon: 'success',
             hideAfter: 3000, 
             position: 'bottom-center'
    
         });
         
         $("#tablaPasajeros").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.tabla.pasajeros.php", { idProyecto: <?php echo json_encode($codigoVariable); ?> });
          
         $("#btnCancelar").click();

$(document).ready(function() {
    countRowsAndDisplay();
});
         //document.getElementById("#btnCancelar").click();
          // Esperar 6 segundos antes de redirigir
            //setTimeout(function () {
                //window.location.href = "http://sii.fusalmo.org/?view=monitoreo";
            //}, 4000); // 6000 milisegundos = 6 segundos
    
         }
    
        
     });
    
    });       


//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
var bandera = 0;
    $("#idEnviarSolicitudRegistro").click(function() {
        $("#idEnviarSolicitudRegistro").css("display", "none");
        $("#spinerCargando").css("display", "block");
       
        //
        //spinerCargando
bandera = 0;

        // Crear un objeto de fecha
var fecha = new Date();

// Establecer la zona horaria a El Salvador (UTC-6)
fecha.toLocaleString('en-US', {timeZone: 'America/El_Salvador'});

// Obtener la hora actual en El Salvador
var hora_actual = fecha.toLocaleTimeString();

// Mostrar la hora actual
console.log("La hora actual en El Salvador es: " + hora_actual);

var hora_actual = new Date();
var inicio = new Date();
inicio.setHours(6, 30, 0); // 06:30:00

var fin = new Date();
fin.setHours(16, 30, 0); // 16:30:00


var fechaActual = new Date(); 
// Formatear la fecha como 'YYYY-MM-DD'
var año = fechaActual.getFullYear();
var mes = (fechaActual.getMonth() + 1).toString().padStart(2, '0'); 
// Se suma 1 porque getMonth() retorna un índice de 0 a 11
var dia = fechaActual.getDate().toString().padStart(2, '0'); 
// Asegura que el día tenga dos dígitos
var fechaFormateada = `${año}-${mes}-${dia}`; 
//console.log("La fecha actual es:", fechaFormateada);

if (hora_actual > inicio && hora_actual < fin) { 
    
    //:::::::::::::: VARIABLES DEL FORMULARIO ::::::::::::::::::::::::::::;;
           /* var varDestino = document.getElementById("idDireccionDestino").textContent; 
            var varMotivo = document.getElementById("idMotivoSalida").textContent; 
            var varselectProyecto = document.getElementById("idSelectProyecto").value; 
            var varnombreProyecto = document.getElementById("idNombreProyecto").textContent; 
            var varselectHerramientas = document.getElementById("idSelectHerramientas").value; 
            var vardescripcionHerramienta = document.getElementById("idDescripcionHerramintas").textContent; 
            var varnotaAdicional = document.getElementById("idNotaAdicional").value; 
            var varhorallegada = document.getElementById("idHoraLlegada").value; 
            var varhoraRetorno = document.getElementById("idHorRetorno").value; 
            var varCantidadPasajero = document.getElementById("idCantidaPasajeros2").value;
            var varLocalCantidadPasajero = document.getElementById("#idCantidadpASAJERO").innerText; 
            var varSelectPasajero = document.getElementById("selectPasajerExterno").value; 
            var varCantidadPjeroExterno = document.getElementById("idCantidadPasajeroExterno").value; 
            var varIdPsajeroExterno = document.getElementById("textIdPsajeroExterno").textContent; 
            var varCodigoSolicitud = document.getElementById("idcodigoSolicitud").value; 
            var varAreaEmpleado = document.getElementById("idAreaEmpleadoTexto").value; 
            var varFechaSolicitud = document.getElementById("idFechaSolicitud").value; */
            $("#idIcono_direccion").css("display", "none");
            $("#idIcono_direccion2").css("display", "none");
            $("#idIcono_direccion3").css("display", "none");
            $("#idIcono_direccion4").css("display", "none");
            $("#idIcono_direccion5").css("display", "none");
            $("#idIcono_direccion6").css("display", "none");
            $("#idIcono_direccion7").css("display", "none");
            $("#idIcono_direccion8").css("display", "none");
            $("#idIcono_direccion9").css("display", "none");

            if($("#idDireccionDestino").val() == "")
            {
                bandera = 1;
               $("#idIcono_direccion").css("display", "block");
            }
            if($("#idMotivoSalida").val() == "")
            {
                bandera = 1;
                $("#idIcono_direccion2").css("display", "block");
            }
            if($("#idSelectProyecto").val() === "Si"){
                if($("#idNombreProyecto").val() == "")
                {
                    bandera = 1;
                    $("#idIcono_direccion3").css("display", "block");
                }
            } 
            else 
            {
                //bandera = 0;
            } 
            if($("#idSelectHerramientas").val() === "Si"){
                if($("#idDescripcionHerramintas").val() == "")
                {
                    bandera = 1;
                    $("#idIcono_direccion4").css("display", "block");
                }
            } 
            else 
            {
                //bandera = 0;
            } 
            if($("#idFechaSolicitud").val() == "")
            {
                bandera = 1;
                $("#idIcono_direccion5").css("display", "block");
            }
            if($("#idFechaSolicitud").val() <= fechaFormateada)
            {
                bandera = 1;
                $("#idIcono_direccion5").css("display", "block");

                $.toast({
                    heading: 'Advertencia',
                    text:'Fecha debe ser superior a la fecha actual ',
                    showHideTransition: 'slide',
                    icon: 'warning',
                    hideAfter: 10000, 
                    position: 'top-center'
            
                });
            }
            if($("#idHoraLlegada").val() == "")
            {
                bandera = 1;
                $("#idIcono_direccion6").css("display", "block");
            }
            if($("#idHorRetorno").val() == "")
            {
                bandera = 1;
                $("#idIcono_direccion7").css("display", "block");
            }
            if($("#idHoraLlegada").val() >= $("#idHorRetorno").val())
            {
                $.toast({
                    heading: 'Advertencia',
                    text:'Hora de Retorno debe ser mayor ',
                    showHideTransition: 'slide',
                    icon: 'warning',
                    hideAfter: 10000, 
                    position: 'top-center'
            
                });
                $("#idIcono_direccion7").css("display", "block");
                bandera = 1;
            }
            if($("#idCantidadPasajeroExterno").val() <= 0 && $("#idCantidaPasajeros2").val() <= 0  )
            {
                $.toast({
                    heading: 'Error',
                    text:'Debe Ingresar al menos 1 pasajero ',
                    showHideTransition: 'slide',
                    icon: 'error',
                    hideAfter: 10000, 
                    position: 'top-center'
            
                });
                bandera = 1;
            }
            if($("#selectPasajerExterno").val() === "Si"){
                if($("#idCantidadPasajeroExterno").val() <= 0)
                {
                    $.toast({
                    heading: 'Error',
                    text:'No cantidades Negativas ',
                    showHideTransition: 'slide',
                    icon: 'error',
                    hideAfter: 10000, 
                    position: 'top-center'
            
                });
                    bandera = 1;
                    $("#idIcono_direccion8").css("display", "block");
                }
                if($("#textIdPsajeroExterno").val() == "")
                {
                    bandera = 1;
                    $("#idIcono_direccion9").css("display", "block");
                }
            } 
            else 
            {
                //bandera = 0;
            } 

    if(bandera == 1)
    {
        $.toast({
                    heading: 'Error',
                    text:'Debe completar los campos requeridos ',
                    showHideTransition: 'slide',
                    icon: 'error',
                    hideAfter: 6000, 
                    position: 'bottom-center'
            
                });
                $("#idEnviarSolicitudRegistro").css("display", "block");
        $("#spinerCargando").css("display", "none");
    }
    else
    {
        $.post("process/index.php", {
                    
                    process: "administracion_finanza",
                    action: "addSolicitudTransporte",
            
                    idDireccionDestino: $("#idDireccionDestino").val(), 
                    idMotivoSalida: $("#idMotivoSalida").val(), 
                    idSelectProyecto: $("#idSelectProyecto").val(), 
                    idNombreProyecto: $("#idNombreProyecto").val(), 
                    idSelectHerramientas: $("#idSelectHerramientas").val(), 
                    idDescripcionHerramintas: $("#idDescripcionHerramintas").val(), 
                    idNotaAdicional: $("#idNotaAdicional").val(), 
                    idHoraLlegada: $("#idHoraLlegada").val(), 
                    idHorRetorno: $("#idHorRetorno").val(),
                    idCantidaPasajeros2 : $("#idCantidaPasajeros2").val(),
                    selectPasajerExterno : $("#selectPasajerExterno").val(),
                    idCantidadPasajeroExterno : $("#idCantidadPasajeroExterno").val(),
                    textIdPsajeroExterno : $("#textIdPsajeroExterno").val(),
                    idcodigoSolicitud : $("#idcodigoSolicitud").val(),
                    idAreaEmpleadoTexto : $("#idAreaEmpleadoTexto").val(),
                    idFechaSolicitud: $("#idFechaSolicitud").val()

                },
            
            function(response){
            
                if(response)
            
                {
                    $("#spinerCargando").css("display", "none");
                    $("#mensajeTerminado").css("display", "block");
                $.toast({
                    heading: 'Finalizado',
                    text:'Solicitud Enviada ',
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: 3000, 
                    position: 'bottom-center'
            
                });
                // Esperar 6 segundos antes de redirigir
                    setTimeout(function () {
                        window.location.href = "?view=vistaSolicitanteTransporte";
                    }, 4000); // 6000 milisegundos = 6 segundos
            
                }
            
                
            }); 
    }
    
}
else{
    $.toast({
             heading: 'Finalizado',
             text:'No se Puede enviar la solicitud, fuera de tiempo, Toda Solicitud antes de: 06:30:00, hora actual: '+hora_actual,
             showHideTransition: 'slide',
             icon: 'error',
             hideAfter: 6000, 
             position: 'bottom-center'
    
         });
}


       

});


</script>