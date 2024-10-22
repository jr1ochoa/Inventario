<?php
include("../../../../config/net.php");
echo"<center>🏷️ Codigo: ".$_REQUEST['idProyecto']."  </center>";
//:::::::::: Variables de Registro ::::::::::::::::::
$direccionDestino;

$hora_de_llegada;
$hora_de_salida;
$hora_de_retorno;

$motivoSalida;
$esProyeto;
$nombreProyecto;
$llevarEquipo;
$descripcionEquipo;
$notaAdicional;
$hora_llegada;
$hora_retorno;
$cantidadPasajeros;
$pasajeroExterno;
$listaPasajeroExterno;
$cantidadExterno;

$idFormulario = 0;

$query = "SELECT * FROM admin_finanzas_formulario  where codigo_formulario = ?";

 $data3 = $net_rrhh->prepare($query);

 $data3->execute([$_REQUEST['idProyecto']]);

 while ($data = $data3->fetch()) {


    $hora_de_llegada = $data[7];
    //echo "ddddddd".$hora_de_llegada;
    $hora_de_retorno = $data[8];
    $hora_de_salida = $data[17];
    $idFormulario = $data[0];
    $direccionDestino = $data[3];
    $motivoSalida = $data[4];
    $esProyeto = $data[5];
    $nombreProyecto = $data[6];
    $llevarEquipo = $data[9];
    $descripcionEquipo = $data[10];
    $notaAdicional = $data[13];
    $hora_llegada = $data[7];
    $hora_retorno = $data[8];

    //::::::::::::::::::::::::: ID EMPLEADO MOTORISTA ::::::::::::::::::::::
    $id_empleado_motorista = $data[12];
    //::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

    //:::::::::::::::::::::::: ID VEHICULO ASIGNADO ::::::::::::::::::::::::
    $id_vehiculos = $data[11];
    //::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    $cantidadPasajeros = $data[18];
    $pasajeroExterno = $data[20];
    $listaPasajeroExterno = $data[21];

    $cantidadExterno = $data[23];
 }
?>
 
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
<button id="btnRegresarSolicitud" type="button" class="btn btn btn-light btn-sm position-absolute" style="left: 0; color:blue; border-bottom: 2px solid #000;">Regresar</button>
  
<div class="row justify-content-center">

    <div class="mt-3 mx-3 col-4 h-100" >
    <div class="card mb-3" style="background-color: #d9e1e79a;">
       
    <div class="card-body  d-flex flex-column ">
     

<h3><b>FORMULARIO PARA SOLICITUD DE TRANSPORTE</b></h3>
<div class="mb-2" style="height: 4px; width:100%; margin-top:-20px; background: linear-gradient(to right, #1A4262 33%, #668196 33%, #668196 66%, #CCD5DC 66%);"></div>
  
<div class="row ">
        <div class="col-md" style="font-size: 9px;">
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
                    <input id="idHoraLlegada"style="font-size: 10px;"   class="form-control form-control-sm" type="time" name="times" value="<?php echo $hora_de_llegada; ?>">
                </div>  
          
            
            
        </div>
        <div class="col-md" style="font-size: 9px;">
            <div class="form-group">
               
        <div class="row">
                <div class="col-md">
                <label for="exampleFormControlTextarea1">Hora estimada de retorno: <span style="color: red;">(*)</span></label>
                </div>
                <div class="col-md">
                    <svg id="idIcono_direccionqw" xmlns="http://www.w3.org/2000/svg" style="display: none; background-color: #FDE366; border-radius:8px;" width="16" height="16" fill="currentColor" class="bounce-image bi bi-exclamation-triangle mt-1" viewBox="0 0 16 16">
                    <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
                    <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                    </svg>
                </div>
        </div>
                <input id="idHorRetorno" style="font-size: 10px;"  class="form-control form-control-sm" type="time" name="times" value="<?php echo $hora_de_retorno; ?>">
            </div>
        </div>
        
    </div> 
    
   
    <div class="row mt-3 justify-content-center">
    <div class="col-12">
            <div class="form-group">
                
                <div class="row">
                <div class="col-md">
                <label for="exampleFormControlTextarea1">Hora salida FUSALMO: <span style="color: red;">(*)</span></label>
                </div>
                <div class="col-md">
                    <svg id="idIcono_direccion27" xmlns="http://www.w3.org/2000/svg" style="display: none; background-color: #FDE366; border-radius:8px;" width="16" height="16" fill="currentColor" class="bounce-image bi bi-exclamation-triangle mt-1" viewBox="0 0 16 16">
                    <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
                    <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                    </svg>
                </div>
        </div>
                <input id="idHorRetorno222" style="font-size: 10px;" disabled class="form-control form-control-sm" type="time" name="times" value="<?php echo $hora_de_salida; ?>">
            </div>
        </div>
       
    </div>

<div class="form-group mt-2">
    
    <div class="row">
                <div class="col-md">
                <label for="exampleFormControlTextarea1">Dirección de Destino: <span style="color: red;">(*)</span></label>
                </div>
                <div class="col-md">
                    <svg id="idIcono_direccion" xmlns="http://www.w3.org/2000/svg" style="display: none; background-color: #FDE366; border-radius:8px;" width="16" height="16" fill="currentColor" class="bounce-image bi bi-exclamation-triangle mt-1" viewBox="0 0 16 16">
                    <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
                    <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                    </svg>
                </div>
        </div>
        <div class="col-9">
            <div id="charCount"   style=" background-color: #CFE2FF; border-radius:5px;">0/1200 caracteres</div>
        </div> 
    <textarea  class="form-control" id="idDireccionDestino" rows="3"><?php echo $direccionDestino; ?></textarea>
  </div>
  <script>
document.getElementById('idDireccionDestino').addEventListener('input', function() {
    // Obtiene el número de caracteres en el textarea
    var charCount = this.value.length;
    
    // Actualiza el div con el número de caracteres
    document.getElementById('charCount').innerText = charCount + '/1200 caracteres';
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
            <div id="charCount2"   style=" background-color: #CFE2FF; border-radius:5px;">0/1200 caracteres</div>
        </div> 
    <textarea  class="form-control" id="idMotivoSalida" rows="3"><?php echo $motivoSalida; ?></textarea>
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
            <label for="exampleFormControlSelect1">¿Es proyecto?</label>
            <select class="form-control" id="idProyectoSelec">
            <option value="Si">Si</option>
            <option value="No">No</option>
            </select>
        </div>

    </div>
    <div class="col-12" id="detalleProyectoNombre" style="display:none;">
        <div class="form-group">
        
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
            <div id="charCount3"   style=" background-color: #CFE2FF; border-radius:5px;">0/1200 caracteres</div>
        </div> 
        <textarea   class="form-control" id="detalleTextoProyecto" rows="3"><?php echo $nombreProyecto; ?></textarea>
        </div>
    </div>
  </div>
  <script>
document.getElementById('detalleTextoProyecto').addEventListener('input', function() {
    // Obtiene el número de caracteres en el textarea
    var charCount3 = this.value.length;
    
    // Actualiza el div con el número de caracteres
    document.getElementById('charCount3').innerText = charCount3 + '/1200 caracteres';
});
</script>

  <div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="exampleFormControlSelect1">¿Llevara equipo o Herramienta?</label>
            <select class="form-control" id="idSelectHerramientas">
            <option>Si</option>
            <option>No</option>
            </select>
        </div>

    </div>
    <div class="col-12"  id="idBloqueHerramienta" style="display:none;"> 
        <div class="form-group">
        
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
        <div class="col-9">
            <div id="charCount4"   style=" background-color: #CFE2FF; border-radius:5px;">0/1200 caracteres</div>
        </div> 
        <textarea  class="form-control" id="idDescripcionHerramintas" rows="3"><?php echo $descripcionEquipo;?></textarea>
        </div>
    </div>
  </div>
  <script>
document.getElementById('idDescripcionHerramintas').addEventListener('input', function() {
    // Obtiene el número de caracteres en el textarea
    var charCount4 = this.value.length;
    
    // Actualiza el div con el número de caracteres
    document.getElementById('charCount4').innerText = charCount4 + '/1200 caracteres';
});
</script>
  

  <div class="form-group mb-3">
        <label for="exampleFormControlTextarea1">Nota adicional:  </label>
        <div class="col-9">
            <div id="charCount5"   style=" background-color: #CFE2FF; border-radius:5px;">0/1200 caracteres</div>
        </div> 
        <textarea  class="form-control" id="idNotaAdicional" rows="3"><?php echo $notaAdicional; ?></textarea>
        </div>


        <script>
document.getElementById('idNotaAdicional').addEventListener('input', function() {
    // Obtiene el número de caracteres en el textarea
    var charCount5 = this.value.length;
    
    // Actualiza el div con el número de caracteres
    document.getElementById('charCount5').innerText = charCount5 + '/1200 caracteres';
});
</script>
      


        <div class="card-footer text-muted">
  </div>
        
        </div>
                            </div>
</div>


                        <div class="col-1 d-flex justify-content-center" >
                            <hr class="vr align-self-center h-75">
                        </div>

                        <div class="col-4 mt-3" >
                            <div class="card" style="background-color: #d9e1e79a;">
                            <div class="card-body  d-flex flex-column ">
                      
    
                           
  
    <div class="form-group">
                 
    <center class="mb-3 mt-3 ">
        <h3>Cantidad Total de Pasajeros:
            
        <b style="background-color: #FDC53D; padding:4px; padding-top:0px; padding-bottom:0px; border-radius: 5px;"><span id="idCantidadpASAJERO"></span></b></h3>
        <div style="height: 4px; width:60%; margin-top:-20px;background: linear-gradient(to right, #1A4262 33%, #668196 33%, #668196 66%, #CCD5DC 66%);"></div>
        
        <svg id="idIcono_direccion8" xmlns="http://www.w3.org/2000/svg" style="display: none; background-color: #FDE366; border-radius:8px;" width="16" height="16" fill="currentColor" class="bounce-image bi bi-exclamation-triangle mt-1" viewBox="0 0 16 16">
            <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
            <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
            </svg>
    </center>

        <div class="row">
                <div class="col-md">
                <label for="exampleFormControlTextarea1">¿Cantidad de Pasajeros Internos? <span style="color: red;">(*)</span></label>
                </div>
                <div class="col-md">
                    <svg id="idIcono_direccion" xmlns="http://www.w3.org/2000/svg" style="display: none; background-color: #FDE366; border-radius:8px;" width="16" height="16" fill="currentColor" class="bounce-image bi bi-exclamation-triangle mt-1" viewBox="0 0 16 16">
                    <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
                    <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                    </svg>
                </div>
        </div>
                    <input id="idCantidadInternas" disabled class="form-control form-control-sm" type="number" name="times" value="">
    </div> 


    <div class="form-group mt-4">
           
    <button type="button" class="btn btn-sm " style="background-color: #1A4262;color:white;" data-bs-toggle="modal" data-bs-target="#exampleModal4">Agregar Pasajero</button>

        <div id="tablaPasajerosInternos"></div>


            </div>

    <div class="row ">
        <div class="col-12">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">¿Llevara pasajeros <br/> Externos?  </label>
                    <select class="form-control" id="idPasajeroExterno">
                        <option value="Si">Si</option>
                        <option value="No">No</option>
                    </select>
                </div>  
          
            
            
        </div>
        
        <div class="col-md" id="grupoPasjeroExterno1">
        <div class="form-group">
                    
                    <div class="row">
                <div class="col-md-12">
                <label for="exampleFormControlTextarea1">¿Cantidad de Pasajeros Externos?:  <span style="color: red;">(*)</span></label>
                </div>
                <div class="col-md">
                    <svg id="idIcono_direccion8" xmlns="http://www.w3.org/2000/svg" style="display: none; background-color: #FDE366; border-radius:8px;" width="16" height="16" fill="currentColor" class="bounce-image bi bi-exclamation-triangle mt-1" viewBox="0 0 16 16">
                    <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
                    <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                    </svg>
                </div>
        </div>
                    <input  id="cantidadIdExternoPasajero" min=0 class="form-control form-control-sm" type="number" name="times" value="<?php echo $cantidadExterno; ?>">
                </div>  
        </div>
    </div>

    <div class="form-group mb-4" id="idPasajeroListaExterno1">
       
        <div class="row">
                <div class="col-md-12">
                <label for="exampleFormControlTextarea1">Lista de Pasajeros Externos: <span style="color: red;">(*)</span></label>
                </div>
                <div class="col-md">
                    <svg id="idIcono_direccion9" xmlns="http://www.w3.org/2000/svg" style="display: none; background-color: #FDE366; border-radius:8px;" width="16" height="16" fill="currentColor" class="bounce-image bi bi-exclamation-triangle mt-1" viewBox="0 0 16 16">
                    <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
                    <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                    </svg>
                </div>
        </div>
        <div class="col-9">
            <div id="charCount6"   style=" background-color: #CFE2FF; border-radius:5px;">0/1200 caracteres</div>
        </div> 
        <textarea  class="form-control" id="textIdPsajeroExterno" rows="3"><?php echo $listaPasajeroExterno; ?></textarea>
        </div>
              
        <script>
document.getElementById('textIdPsajeroExterno').addEventListener('input', function() {
    // Obtiene el número de caracteres en el textarea
    var charCount6 = this.value.length;
    
    // Actualiza el div con el número de caracteres
    document.getElementById('charCount6').innerText = charCount6 + '/1200 caracteres';
});
</script>
 



        <div class="row  justify-content-center">
    
        <div class="col-12">
    
        <div class="form-group">
                <label for="exampleFormControlTextarea1">Motorista Asignado: 👮🏻‍♂️ </label>

            <?php     
            $id_empleado=0;
                $query = "SELECT * FROM admin_finanzas_lista_motorista  where id = ?";
                $data3 = $net_rrhh->prepare($query);
                $data3->execute([$id_empleado_motorista]);
                while ($data = $data3->fetch()) 
                {
                    //echo "idMotorista".$id_empleado_motorista;
                    $id_empleado = $data[1];
                    $nombre_motorista_externo = $data[2];
                    $empresa_externa = $data[17];
                    $estado = $data[0];
                    $motorista_interno = $data[9];
                }
                //echo "Valor del ID Empleado".$id_empleado;
                if($motorista_interno == 'Si')
                {
                    //echo "SIII ENTRE".$id_empleado;
                    $query = "SELECT * FROM employee  where id = ?";
                    $data3 = $net_rrhh->prepare($query);
                    $data3->execute([$id_empleado]);
                    while ($data = $data3->fetch()) 
                    {
                        $name1 = $data[1];
                        $name2 = $data[2];
                        $name3 = $data[3];
                        $lastname1 = $data[4];
                        $lastname2 = $data[5];
                    }
            ?>
                <input disabled value="<?php echo $name1." ".$name2." ".$name3." ".$lastname1." ".$lastname2;?>" id="timeStart" style="font-size: 10px;" class="form-control form-control-sm" type="text" name="times" >
            <?php 
                }
                else 
                {
            ?>
                <input disabled  id="timeStart" style="font-size: 10px;" class="form-control form-control-sm" type="text" name="times" value="<?php echo $nombre_motorista_externo; ?>">
            <?php
                }  
            ?>

            </div>

        </div>
    </div>




    <div class="row mt-3 mb-3 justify-content-center">
   
    <div class="col-12">
    
    <div class="form-group ">
                <label for="exampleFormControlTextarea1">Vehiculo Asignado: 🚘 </label>


                <?php     
            $id_empleado=0;
                $query = "SELECT * FROM admin_finanzas_informacion_vehiculo  where id = ?";
                $data3 = $net_rrhh->prepare($query);
                $data3->execute([$id_vehiculos]);
                while ($data = $data3->fetch()) 
                {
                    //echo "idMotorista".$id_empleado_motorista;
                    $nombreVhiculo = $data[1];
                    $modelovehiculo = $data[2];
                    $colorvehiculo = $data[3];
                    $yearvehiculo = $data[4];
                }
               ?> 
                <input disabled value="<?php echo $nombreVhiculo." ".$modelovehiculo." ".$colorvehiculo." ".$yearvehiculo; ?>" id="timeStart" style="font-size: 10px;" class="form-control form-control-sm" type="text" name="times" >
    </div>
    
    </div>
    </div>

                                    <button class="btn btn-sm" id="idEnviarSolicitudRegistro" style="background-color: #CBE8BA;">
                                        <i class="bi bi-gear"></i> Actualizar Información
                                        
</button>
<button class="btn btn-primary" style="display: none;" id="spinerCargando" type="button" disabled>
  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
  Cargando...
</button>

<div class="alert alert-success" id="mensajeTerminado" style="display: none;" role="alert">
  Proceso Terminado
</div>
<div class="card-footer text-muted">
  </div>
                                </div>
                            </div>
                        </div>
</div>





<!--::::::::::: MODAL PARA REGISTRAR SOLICITUD ::::::::::::::::::-->
<div class="modal fade " id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content " >
      <div class="modal-header colorNuevaFicha " style="background-color: #1A4262; ">
        <h4 class="modal-title" id="exampleModalLabel"  style="color:white;"> Registrando Solicitud de Arte</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">


      <div class="row">
        <div class="col-md-5">
            
        <div class="mb-3">
            <label for="formFile" class="form-label">Marca:  </label>
            <input class="form-control form-control-sm" type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label">Modelo :  </label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label">Año:  </label>
            <input class="form-control form-control-sm" type="date" placeholder=".form-control-sm" aria-label=".form-control-sm example">
        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label">Color:  </label>
            <input class="form-control form-control-sm" type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label">Número de Serie:  </label>
            <input class="form-control form-control-sm" type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
        </div>


        <div class="mb-3">
            <label for="formFile" class="form-label">Tipo de Motor:  </label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example">
              <option selected>Seleccione</option>
              <option >Diesel</option>
              <option >Gasolina</option>
              <option >Electricos</option>
              <option >Hibridos</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label">Potencia de Motor:  </label>
            <input class="form-control form-control-sm" type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label">Transmisión:  </label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example">
              <option selected>Seleccione</option>
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
            <label for="formFile" class="form-label">Capacidad de Pasajeros: </label>
            <input class="form-control form-control-sm" type="number" placeholder=".form-control-sm" aria-label=".form-control-sm example">
        </div>


        <div class="mb-3">
            <label for="formFile" class="form-label">Capacidad de Carga:  </label>
            <input class="form-control form-control-sm" type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
        </div>
       

        <div class="mb-3">
            <label for="formFile" class="form-label">Dimensiones:  </label>
            <input class="form-control form-control-sm" type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label">Matricula: </label>
            <input class="form-control form-control-sm" type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
        </div>


        <div class="mb-3">
            <label for="formFile" class="form-label">Fecha Matricula: </label>
            <input class="form-control form-control-sm" type="date" placeholder=".form-control-sm" aria-label=".form-control-sm example">
        </div>


        <div class="mb-3">
            <label for="formFile" class="form-label">Fecha Vencimiento Matricula:  </label>
            <input class="form-control form-control-sm" type="date" placeholder=".form-control-sm" aria-label=".form-control-sm example">
        </div>

        
        <div class="mb-3">
            <label for="formFile" class="form-label">Estado del Seguro:  </label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example">
              <option selected>Seleccione</option>
              <option >Activo</option>
              <option >Inactivo</option>
            </select>
        </div>


        <div class="mb-3">
            <label for="formFile" class="form-label">Tipo de Uso:  </label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example">
              <option selected>Seleccione</option>
              <option >Activo</option>
              <option >Inactivo</option>
            </select>
        </div>


        </div>
      </div>
       

      



       
      <div class="modal-footer">

      <a type="button" id="btnReturn2"  class="btn btn-sm btn-seconday" style="background-color: #FD9683;" data-bs-dismiss="modal">Cancelar</a>

        <a type="button" id="btnSaveInscription2" class="btn  btn-sm" style="background-color: #CBE8BA;"  >Registrar Vehículo</a>

      </div>

      <a class="btn btn-success" id="botonCargando2"  style="display:none;"type="button" disabled>

  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>

  Loading...

</a>

    </div>

  </div>

</div>
</div>


<!--:::::::::::::::::::::  MODAL MOTORISTAS ::::::::::::::::::::::::::::::-->
<div class="modal fade " id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content " >
      <div class="modal-header colorNuevaFicha " style="background-color: #1A4262; ">
        <h4 class="modal-title" id="exampleModalLabel"  style="color:white;"> Registrando Solicitud de Arte</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">


      <div class="row">
        <div class="col-md">
            
        <div class="mb-3">
            <label for="formFile" class="form-label">¿El motorista es interno?:  </label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example">
              <option selected>Seleccione</option>
              <option >Si</option>
              <option >No</option>
            </select>
        </div>


        <div class="mb-3">
            <label for="formFile" class="form-label">Empleado :  </label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example">
              <option selected>Seleccione</option>
              <option >Persona 1</option>
              <option >Persona 2</option>
            </select>
        </div>



        <div class="mb-3">
            <label for="formFile" class="form-label">Nombre del Motorista:  </label>
            <input class="form-control form-control-sm" type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label">Nombre de la Empresa :  </label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label">DUI:  </label>
            <input class="form-control form-control-sm" type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
        </div>


        </div>

      </div>
       

      



       
      <div class="modal-footer">

      <a type="button" id="btnReturn2"  class="btn btn-sm btn-seconday" style="background-color: #FD9683;" data-bs-dismiss="modal">Cancelar</a>

        <a type="button" id="btnSaveInscription2" class="btn  btn-sm" style="background-color: #CBE8BA;"  >Registrar Vehículo</a>

      </div>

      <a class="btn btn-success" id="botonCargando2"  style="display:none;"type="button" disabled>

  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>

  Loading...

</a>

    </div>

  </div>

</div>
</div>



<!--:::::::::::::::::::::  MODAL MOTORISTAS ::::::::::::::::::::::::::::::-->
<div class="modal fade " id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content " >
      <div class="modal-header colorNuevaFicha " style="background-color: #1A4262; ">
        <h4 class="modal-title" id="exampleModalLabel"  style="color:white;"> Registrando Pasajero Interno</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">


      <div class="row">
        <div class="col-md">
            
        <div class="col-7">
        <input disabled class="form-control form-sm" id="idcodigoSolicitud" style="font-size: 8px;" value="<?php echo $_REQUEST['idProyecto']; ?>" />
    </div>


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

      <button type="button" id="btnCancelar3"  class="btn btn-sm btn-seconday" style="background-color: #FD9683;" data-bs-dismiss="modal">Cancelar</button>

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



<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- Después, incluye el CSS y JS de jQuery Toast Plugin -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>


<script>

$("#btnRegresarSolicitud").click(function(){
    window.location.href='?view=administracionFinanza';  
})


let countRowsAndDisplay = () => {
    let rowCount = $('#tablaBody tr').length; // Cuenta las filas en el tbody de la tabla
    $('#idCantidadInternas').val(rowCount); // Muestra el número de filas en el input
    //$("#idCantidadpASAJERO").text(rowCount);

    var valorInput1 = parseFloat($("#idCantidadInternas").val()) || 0; // Obtener el valor del primer input
    var valorInput2 = parseFloat($("#cantidadIdExternoPasajero").val()) || 0; // Obtener el valor del segundo input
    
    if(valorInput2 <0)
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

$("#idCantidadInternas, #cantidadIdExternoPasajero").on('input', function() {
    var valorInput1 = parseFloat($("#idCantidadInternas").val()) || 0; // Obtener el valor del primer input
    var valorInput2 = parseFloat($("#cantidadIdExternoPasajero").val()) || 0; // Obtener el valor del segundo input
    
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
         /*$.toast({
             heading: 'Finalizado',
             text:'Pasajero Registrado ',
             showHideTransition: 'slide',
             icon: 'success',
             hideAfter: 3000, 
             position: 'bottom-center'
    
         });*/
         
         $("#tablaPasajerosInternos").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.tabla.codigo.php", { idProyecto: <?php echo json_encode($_REQUEST['idProyecto']); ?> });
     
         $("#btnCancelar3").click();

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






$(document).ready(function(){

$('.js-example-basic-single').select2({

    dropdownParent:$('#exampleModal4')

})
      });



        $("#tablaPasajerosInternos").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.tabla.codigo.php", { idProyecto: <?php echo json_encode($_REQUEST['idProyecto']); ?> });
     
 document.getElementById("idProyectoSelec").value = "<?php echo $esProyeto; ?>" ;
    document.getElementById("idSelectHerramientas").value = "<?php echo $llevarEquipo; ?>" ;

$(document).ready(function() {
    document.getElementById("idProyectoSelec").value = "<?php echo $esProyeto; ?>" ;
    document.getElementById("idSelectHerramientas").value = "<?php echo $llevarEquipo; ?>" ;
    document.getElementById("idPasajeroExterno").value = "<?php echo $pasajeroExterno ?>";


    var valorPasajeroExterno = $("#idPasajeroExterno").val();
    $("#idPasajeroExterno").change(function(){
        if ($(this).val() === "Si") {
            $("#grupoPasjeroExterno1").show();
            $("#idPasajeroListaExterno1").show();
        } else {
            $("#grupoPasjeroExterno1").hide();
            $("#idPasajeroListaExterno1").hide();
        }
    })





    // Detectar el valor actual del select con id "idProyectoSelec"
    var valorProyecto = $("#idProyectoSelec").val();

    // Detectar el valor actual del select con id "idSelectHerramientas"
    var valorHerramientas = $("#idSelectHerramientas").val();

    // Configurar el evento change para el select con id "idProyectoSelec"
    $("#idProyectoSelec").change(function() {
        if ($(this).val() === "Si") {
            $("#detalleProyectoNombre").show();
        } else {
            $("#detalleProyectoNombre").hide();
        }
    });

    // Configurar el evento change para el select con id "idSelectHerramientas"
    $("#idSelectHerramientas").change(function() {
        if ($(this).val() === "Si") {
            $("#idBloqueHerramienta").show();
        } else {
            $("#idBloqueHerramienta").hide();
        }
    });

    // Establecer los valores iniciales de los selects según los valores detectados
    if (valorProyecto === "Si") {
        $("#detalleProyectoNombre").show();
    } else {
        $("#detalleProyectoNombre").hide();
    }

    if (valorHerramientas === "Si") {
        $("#idBloqueHerramienta").show();
    } else {
        $("#idBloqueHerramienta").hide();
    }

    if(valorPasajeroExterno == "Si")
    {
        $("#grupoPasjeroExterno1").show();
            $("#idPasajeroListaExterno1").show();
    }
    else
    {
        $("#grupoPasjeroExterno1").hide();
            $("#idPasajeroListaExterno1").hide();
    }
});
//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
//::::::::::::: EDITAR FORMULARIO ::::::::::::::::::::::::;;;
//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
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
var hora_actual = new Date();
var inicio = new Date();
inicio.setHours(6, 30, 0); // 06:30:00

var fin = new Date();
fin.setHours(16, 30, 0); // 16:30:00

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
            $("#idIcono_direccionqw").css("display", "none");

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
            if($("#idProyectoSelec").val() === "Si"){
                if($("#detalleTextoProyecto").val() == "")
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
            /*if($("#idFechaSolicitud").val() == "")
            {
                bandera = 1;
                $("#idIcono_direccion5").css("display", "block");
            }*/
            if($("#idHoraLlegada").val() == "")
            {
                bandera = 1;
                $("#idIcono_direccion6").css("display", "block");
            }
            if($("#idHorRetorno").val() == "")
            {
                bandera = 1;
                $("#idIcono_direccionqw").css("display", "block");
            }
            if(($("#idHoraLlegada").val()) > ($("#idHorRetorno").val()))
            {
                $.toast({
                    heading: 'Advertencia',
                    text:'Hora de Retorno debe ser mayor ',
                    showHideTransition: 'slide',
                    icon: 'warning',
                    hideAfter: 10000, 
                    position: 'top-center'
            
                });
                $("#idIcono_direccionqw").css("display", "block");
                bandera = 1;
            }
            if($("#cantidadIdExternoPasajero").val() <= 0 && $("#idCantidadInternas").val() <= 0  )
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
            if($("#idPasajeroExterno").val() === "Si"){
                if($("#cantidadIdExternoPasajero").val() <= 0)
                {
                    $.toast({
                    heading: 'Error',
                    text:'No Valores Negativos ',
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
                    action: "updateSolicitudTransporte",
            
                    idDireccionDestino: $("#idDireccionDestino").val(), 
                    idMotivoSalida: $("#idMotivoSalida").val(), 
                    idSelectProyecto: $("#idProyectoSelec").val(), 
                    idNombreProyecto: $("#detalleTextoProyecto").val(), 
                    idSelectHerramientas: $("#idSelectHerramientas").val(), 
                    idDescripcionHerramintas: $("#idDescripcionHerramintas").val(), 
                    idNotaAdicional: $("#idNotaAdicional").val(), 
                    idHoraLlegada: $("#idHoraLlegada").val(), 
                    idHorRetorno: $("#idHorRetorno").val(),
                    idCantidaPasajeros2 : $("#idCantidadInternas").val(),
                    selectPasajerExterno : $("#idPasajeroExterno").val(),
                    cantidadIdExternoPasajero : $("#cantidadIdExternoPasajero").val(),
                    textIdPsajeroExterno : $("#textIdPsajeroExterno").val(),
                    idcodigoSolicitud : $("#idcodigoSolicitud").val(),
                    //idAreaEmpleadoTexto : $("#idAreaEmpleadoTexto").val(),
                    //idFechaSolicitud: $("#idFechaSolicitud").val()

                },
            
            function(response){
                if(response)
            
                {
                    $("#spinerCargando").css("display", "none");
                    $("#mensajeTerminado").css("display", "block");
                $.toast({
                    heading: 'Finalizado',
                    text:'Solicitud Actualizada ',
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
             text:'No se Puede enviar la solicitud, fuera de tiempo, Toda Solicitud antes de: 09:11:00, hora actual: '+hora_actual,
             showHideTransition: 'slide',
             icon: 'error',
             hideAfter: 6000, 
             position: 'bottom-center'
    
         });
}


       

});


</script>