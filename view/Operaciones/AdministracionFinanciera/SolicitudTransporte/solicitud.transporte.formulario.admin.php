<?php
include("../../../../config/net.php");
echo"<center>🏷️ Codigo: ".$_REQUEST['idProyecto']."  </center>";
//:::::::::: Variables de Registro ::::::::::::::::::
$direccionDestino;
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

$query = "SELECT * FROM admin_finanzas_formulario  where codigo_formulario = ?";

 $data3 = $net_rrhh->prepare($query);

 $data3->execute([$_REQUEST['idProyecto']]);

 while ($data = $data3->fetch()) {
    $direccionDestino = $data[3];
    $motivoSalida = $data[4];
    $esProyeto = $data[5];
    $nombreProyecto = $data[6];
    $llevarEquipo = $data[9];
    $descripcionEquipo = $data[10];
    $notaAdicional = $data[13];
    $hora_llegada = $data[7];
    $hora_retorno = $data[8];

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
<div class="row justify-content-center">
    <div class="mt-3 mx-3 col-4 h-100">
    <div class="card mb-3">
       
    <div class="card-body  d-flex flex-column ">
     

<h3><b>FORMULARIO PARA SOLICITUD DE TRANSPORTE</b></h3>
<div style="height: 4px; width:80%; margin-top:-20px;background: linear-gradient(to right, #1A4262 33%, #668196 33%, #668196 66%, #CCD5DC 66%);"></div>
  
<div class="form-group mt-5">
    <label for="exampleFormControlTextarea1">Dirección de Destino: </label>
    <textarea disabled class="form-control" id="exampleFormControlTextarea1" rows="5"><?php echo $direccionDestino; ?></textarea>
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Motivo de la Salida:  </label>
    <textarea disabled class="form-control" id="exampleFormControlTextarea1" rows="5"><?php echo $motivoSalida; ?></textarea>
  </div>

  <div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="exampleFormControlSelect1">¿Es proyecto?</label>
            <input id="timeStart" disabled class="form-control form-control-sm" type="text" name="times" value="<?php echo $esProyeto; ?>">
        </div>

    </div>
    <div class="col-12">
        <div class="form-group">
        <label for="exampleFormControlTextarea1">Nombre del Proyecto:  </label>
        <textarea disabled class="form-control" id="exampleFormControlTextarea1" rows="5"><?php echo $nombreProyecto; ?></textarea>
        </div>
    </div>
  </div>


  <div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="exampleFormControlSelect1">¿Llevara equipo o Herramienta?</label>
            <input id="timeStart" disabled class="form-control form-control-sm" type="text" name="times" value="<?php echo $llevarEquipo; ?>">
        </div>

    </div>
    <div class="col-12">
        <div class="form-group">
        <label for="exampleFormControlTextarea1">Describir el equipo o herramienta:  </label>
        <textarea disabled class="form-control" id="exampleFormControlTextarea1" rows="5"><?php echo $descripcionEquipo; ?></textarea>
        </div>
    </div>
  </div>

  <div class="form-group mb-3">
        <label for="exampleFormControlTextarea1">Nota adicional:  </label>
        <textarea disabled class="form-control" id="exampleFormControlTextarea1" rows="6"><?php echo $notaAdicional; ?></textarea>
        </div>
        
    <div class="form-group mb-3">
        <label for="exampleFormControlTextarea1">Agregar Nota:  </label>
        <div class="col-9">
            <div id="charCount3"  style="background-color: #CFE2FF; border-radius:5px;">0/1200 caracteres</div>
        </div> 
        <textarea  class="form-control" id="idNotaGestion" rows="3"></textarea>
     </div>

     <script>
document.getElementById('idNotaGestion').addEventListener('input', function() {
    // Obtiene el número de caracteres en el textarea
    var charCount3 = this.value.length;
    
    // Actualiza el div con el número de caracteres
    document.getElementById('charCount3').innerText = charCount3 + '/1200 caracteres';
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
                            <div class="card-body  d-flex flex-column ">
                      
    <div class="row ">
        <div class="col-md">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Hora de llegar al Lugar:  </label>
                    <input id="timeStart2" disabled class="form-control form-control-sm" type="time" name="times" value="<?php echo $hora_llegada; ?>">
                </div>  
          
            
            
        </div>
        <div class="col-md">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Hora estimada de retorno:  </label>
                <input id="timeStart3" disabled class="form-control form-control-sm" type="time" name="times" value="<?php echo $hora_retorno; ?>">
            </div>
        </div>
        
    </div> 
    
   
    <div class="row mt-3 ">
    <div class="col-md">
            <div class="form-group">
                <div class="row">       
                        <div class="col-md">
                        <label for="exampleFormControlTextarea1">Hora salida FUSALMO: <span style="color: red;">(*)</span></label>
                        </div>
                        <div class="col-md">
                            <svg id="idIcono_direccion" xmlns="http://www.w3.org/2000/svg" style="display: none; background-color: #FDE366; border-radius:8px;" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle mt-1 bounce-image" viewBox="0 0 16 16">
                            <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
                            <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                            </svg>
                        </div>
                    </div>
                <input id="timeStartAsignacion" class="form-control form-control-sm" type="time" name="times" value="">
            </div>
        </div>
    </div>
    
    

    <center class="mb-4 mt-2">
        <h3>Cantidad Total de Pasajeros: <?php echo $cantidadPasajeros; ?></h3>
        <div style="height: 4px; width:60%; margin-top:-20px;background: linear-gradient(to right, #1A4262 33%, #668196 33%, #668196 66%, #CCD5DC 66%);"></div>

    </center>
   



   

    <div class="form-group mt-1">
           
               

              <div id="tablaPasajerosInternos"></div>


            </div>

    <div class="row ">
       
        
        <div class="col-md">
        <div class="form-group">
                    <label for="exampleFormControlTextarea1">¿Llevara Pasajeros Externos?  </label>
                    <input disabled id="timeStart" class="form-control form-control-sm" type="text" name="times" value="<?php echo $pasajeroExterno; ?>">
                </div>  
        </div>
    </div>
              

    <div class="form-group mb-4">
        <label for="exampleFormControlTextarea1">Pasajeros Externos:  </label>
        <textarea disabled class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo $listaPasajeroExterno; ?></textarea>
        </div>

<!--::::::::::::::::::::::::::::::::::::::: MOTORISTA PARTE 1 SELECCIONAR FUSALMO O EXTERNO :::::::::::::::::::::::::::::::::-->

    <div class="row mt-3 justify-content-center">
        <div class="col-12">
        <div class="mb-3">
                <label for="formFile" class="form-label" style="background-color: #D9EDBC;">Seleccionar motorista de Salida:  👤🔺</label>
                <select class="form-select form-select-sm" id="clasificacionMotorista" aria-label=".form-select-sm example">
                <option selected>Seleccione</option>
                <option value="FUSALMO">FUSALMO</option>
                <option value="EXTERNO">EXTERNO</option>
                </select>
        </div>   
        </div>
    </div>

    <div style="background-color: #FAFDF7; border-radius: 12px;">
        <div class="col-12" style="display: none;" id="idBloqueMotorista1">
            <div class="form-group">
            <label for="exampleFormControlTextarea1">Motorista Externo Descripción:  </label>
            <textarea   class="form-control" id="MotoristaExternoText" rows="1"></textarea>
            </div>
        </div>

        <div style="display: none;" id="idBloqueMotorista2" class="row mt-3 justify-content-center">
            <div class="col-12">
                <div class="form-group">
                    <div class="row">       
                        <div class="col-md">
                            <label for="exampleFormControlTextarea1">Seleccionar Motorista de Salida: <span style="color: red;">(*)</span></label>
                        </div>
                        <div class="col-md">
                            <svg id="idIcono_direccion2" xmlns="http://www.w3.org/2000/svg" style="display: none; background-color: #FDE366; border-radius:8px;" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle mt-1 bounce-image" viewBox="0 0 16 16">
                            <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
                            <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                            </svg>
                        </div>
                    </div>
                    <select class="js-example-basic-single form-control form-control-sm " id="id_label_single23" style="width: 100%;"  data-show-subtext="true" data-live-search="true">
                    <option value="">Seleccione</option>
                    </select>
                </div>
            </div>
        </div>
    </div>



<!--::::::::::::::::::::::::::::::::::::::: MOTORISTA PARTE 2 SELECCIONAR FUSALMO O EXTERNO :::::::::::::::::::::::::::::::::-->
    
    <div class="row mt-3 justify-content-center">
        <div class="col-12">
            <div class="mb-3">
                <label for="formFile" class="form-label" style="background-color: #FBDC7C;">Seleccionar motorista de Retorno: 👤🔻 </label>
                <select class="form-select form-select-sm" id="clasificacionMotorista2" aria-label=".form-select-sm example">
                    <option selected>Seleccione</option>
                    <option value="FUSALMO">FUSALMO</option>
                    <option value="EXTERNO">EXTERNO</option>
                </select>
            </div>   
        </div>
    </div>

    <div style="background-color: #FDF7E1; border-radius:12px;" class="mb-2">

        <div style="display: none;" class="col-12" style="display: none;" id="idBloqueMotorista3">
            <div class="form-group">
            <label for="exampleFormControlTextarea1">Motorista Externo Descripción:  </label>
            <textarea   class="form-control" id="MotoristaExternoText224_2" rows="1"></textarea>
            </div>
        </div>

        <div style="display: none;" style="display: none;" id="idBloqueMotorista4" class="row mt-3 justify-content-center">
       
        <div class="col-12">
            <div class="form-group">
                <div class="row">       
                    <div class="col-md">
                        <label for="exampleFormControlTextarea1">Seleccionar Motorista de Retorno: <span style="color: red;">(*)</span></label>
                    </div>
                    <div class="col-md">
                      <svg id="idIcono_direccion2" xmlns="http://www.w3.org/2000/svg" style="display: none; background-color: #FDE366; border-radius:8px;" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle mt-1 bounce-image" viewBox="0 0 16 16">
                      <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
                      <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                      </svg>
                    </div>
                </div>
                <select class="js-example-basic-single form-control form-control-sm " id="id_label_single2324" style="width: 100%;"  data-show-subtext="true" data-live-search="true">
                    <option value="">Seleccione</option>
                </select>
            </div>
        </div>
   
        </div>
    </div>











    


<div class="col-12" style="display: none;" id="idBloqueMotorista1">
        <div class="form-group">
        <label for="exampleFormControlTextarea1">Motorista Externo Descripción:  </label>
        <textarea disabled  class="form-control" id="MotoristaExternoText" rows="1"></textarea>
        </div>
    </div>
<span style="background-color: #D9EDBC;">Seleccionar vehiculo de salida 🚗🔺</span>

<div style="background-color: #FAFDF7; border-radius: 12px;">
<div class="row mt-3 justify-content-center">
        <div class="col-12">
            <div class="mb-3">
                <label for="formFile" class="form-label">Clasificacion:  </label>
                    <select class="form-select form-select-sm" id="clasificacionVehicular" aria-label=".form-select-sm example">
                        <option selected>Seleccione</option>
                        <option >Sedán</option>
                        <option >Minivans</option>
                        <option >Pick-up</option>
                        <option >Camión</option>
                        <option >Camioneta</option>
                        <option >Autobus</option>
                        <option >MicroBus</option>
                    </select>
            </div>
        </div>
    </div>
<!--:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->
    <div class="row mt-3 justify-content-center">
        <div class="col-12">
            <div class="mb-3">
                <div class="row">       
                    <div class="col-md">
                        <label for="exampleFormControlTextarea1">Seleccionar vehiculos: <span style="color: red;">(*)</span></label>
                    </div>
                    <div class="col-md">
                        <svg id="idIcono_direccion3" xmlns="http://www.w3.org/2000/svg" style="display: none; background-color: #FDE366; border-radius:8px;" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle mt-1 bounce-image" viewBox="0 0 16 16">
                        <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
                        <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                        </svg>
                    </div>
                </div>
                <select class="form-select form-select-sm" id="idOpciones" aria-label=".form-select-sm example">
                    <option value="">Seleccione</option>
                </select>
            </div>
        </div>
    </div>
</div>
    

    <!--::::::::::::::::::::;; SEGUNDO VEHICULO ::::::::::::::::::::::::::::::::::: -->
    <span style="background-color: #FBDC7C;">Seleccionar vehiculo de retorno 🚗🔻</span>
    
    <div style="background-color: #FDF7E1;">
    <div class="row mt-3 justify-content-center">
        <div class="col-12">
            <div class="mb-3">
                <label for="formFile" class="form-label">Clasificacion:  </label>
                    <select class="form-select form-select-sm" id="clasificacionVehicular2" aria-label=".form-select-sm example">
                        <option selected>Seleccione</option>
                        <option >Sedán</option>
                        <option >Minivans</option>
                        <option >Pick-up</option>
                        <option >Camión</option>
                        <option >Camioneta</option>
                        <option >Autobus</option>
                        <option >MicroBus</option>
                    </select>
            </div>
        </div>
    </div>
<!--:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->
    <div class="row mt-3 justify-content-center">
        <div class="col-12">
            <div class="mb-3">
                <div class="row">       
                    <div class="col-md">
                        <label for="exampleFormControlTextarea1">Seleccionar vehiculos: <span style="color: red;">(*)</span></label>
                    </div>
                    <div class="col-md">
                            <svg id="idIcono_direccion3" xmlns="http://www.w3.org/2000/svg" style="display: none; background-color: #FDE366; border-radius:8px;" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle mt-1 bounce-image" viewBox="0 0 16 16">
                            <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
                            <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                            </svg>
                    </div>
                </div>
            <select class="form-select form-select-sm" id="idOpciones2" aria-label=".form-select-sm example">
            <option value="">Seleccione</option>
            </select>
        </div>
    </div>
    </div>
    </div>
    


    <input id="codigoSolicitudid" type="hidden" value="<?php echo $_REQUEST['idProyecto']; ?>" />
<!--::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->


                                    <button class="btn mt-5" id="enviarSolicitudSolicitud" style="background-color: #CBE8BA;">
                                        <i class="bi bi-gear"></i> Aprobar Solicitud    
</button>

<button class="btn btn-primary" style="display: none;" id="spinerCargando" type="button" disabled>
  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
  Cargando...
</button>

<div class="alert alert-success" id="mensajeTerminado" style="display: none;" role="alert">
  Proceso Terminado
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


<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- Después, incluye el CSS y JS de jQuery Toast Plugin -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>




<script>
     $("#clasificacionMotorista").change(function()
    {
        if ($(this).val() === "EXTERNO") {
        document.getElementById("MotoristaExternoText").disabled = false;
    } else {
        document.getElementById("MotoristaExternoText").disabled = true;
    }
    })

    $("#clasificacionMotorista").change(function()
    {
    if($(this).val() !="EXTERNO"){
        document.getElementById("idBloqueMotorista2").style.display= "";
        document.getElementById("idBloqueMotorista1").style.display= "none";
        } else {
            document.getElementById("idBloqueMotorista2").style.display= "none";
            document.getElementById("idBloqueMotorista1").style.display= "";
        } 
    })

    $("#clasificacionMotorista2").change(function()
    {
    if($(this).val() !="EXTERNO"){
        document.getElementById("idBloqueMotorista4").style.display= "";
        document.getElementById("idBloqueMotorista3").style.display= "none";
        } else {
            document.getElementById("idBloqueMotorista4").style.display= "none";
            document.getElementById("idBloqueMotorista3").style.display= "";
        } 
    })
var bandera = 0;
$("#enviarSolicitudSolicitud").click(function(){
    bandera = 0;
    $("#enviarSolicitudSolicitud").css("display", "none");
    $("#spinerCargando").css("display", "block");
    $("#mensajeTerminado").css("display", "none");


/*
<button class="btn btn-primary" style="display: none;" id="spinerCargando" type="button" disabled>
  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
  Cargando...
</button>

<div class="alert alert-success" id="mensajeTerminado" style="display: none;" role="alert">
  Proceso Terminado
</div>

*/

            $("#idIcono_direccion").css("display", "none");
            $("#idIcono_direccion2").css("display", "none");
            $("#idIcono_direccion3").css("display", "none");

    if($("#id_label_single23").val() == "")
    {
        bandera = 1;
        $("#idIcono_direccion2").css("display", "block");
    }
    if($("#idOpciones").val() == "")
    {
        bandera = 1;
        $("#idIcono_direccion3").css("display", "block");
    }
    if($("#timeStartAsignacion").val() == "")
    {
        bandera = 1;
        $("#idIcono_direccion").css("display", "block");
        
    }
    if($("#timeStartAsignacion").val() >= $("#timeStart2").val())
    {
        $.toast({
                    heading: 'Advertencia',
                    text:'Hora de Salida de FUSALMO debe ser menor que la hora de llegada ',
                    showHideTransition: 'slide',
                    icon: 'warning',
                    hideAfter: 10000, 
                    position: 'top-center'
            
                });
                $("#idIcono_direccion").css("display", "block");
                bandera = 1;
                
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
                $("#enviarSolicitudSolicitud").css("display", "block");
    $("#spinerCargando").css("display", "none");
    }
    else
    {
        $.post("process/index.php", {
            
            process: "administracion_finanza",
            action: "updateSolicitudtransporteAdmin",
    
            idOpciones: $("#idOpciones").val(), // Valor asociado al elemento seleccionado
            //id_label_single_text: $("#id_label_single option:selected").text(), // Texto del elemento seleccionado
            id_label_single23 : $("#id_label_single23").val(),
            codigoSolicitudid: $("#codigoSolicitudid").val(),
            timeStartAsignacion : $("#timeStartAsignacion").val(),
            idNotaGestion : $("#idNotaGestion").val(),
            idOpciones2: $("#idOpciones2").val(),
            id_label_single2324 : $("#id_label_single2324").val(), 
            MotoristaExternoText : $("#MotoristaExternoText").val(),
            MotoristaExternoText224_2 : $("#MotoristaExternoText224_2").val()
        },
    
     function(response){
    
        $("#spinerCargando").css("display", "none");
    $("#mensajeTerminado").css("display", "block");
         
         $.toast({
             heading: 'Finalizado',
             text:'Solicitud Aprobada',
             showHideTransition: 'slide',
             icon: 'success',
             hideAfter: 3000, 
             position: 'bottom-center'
    
         });
         
         setTimeout(function() {

            window.location.href = '?view=vistaAdmnTransporte';
            //$("#IdProyecto").load("view/Monitoreo/get_options.php");
        }, 3000); 
         
    
        
     });
    }
        

    });


//clasificacionVehicular

$(document).ready(function(){

$('.js-example-basic-single').select2({

    //dropdownParent:$('#exampleModal3')

});



$('#clasificacionVehicular').on('change', function(e) {
        var selectedValue = $(this).val();

        // Cargar contenido en el elemento con id 'idOpciones' usando el valor seleccionado
        $("#idOpciones").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.vehiculos.select.php", 
            { 
                idClasificacion: selectedValue 
            },
            function(response, status, xhr) {
                if (status == "error") {
                    var msg = "Error al cargar el contenido: ";
                    alert(msg + xhr.status + " " + xhr.statusText);
                }
            }
        );
    });

    $('#clasificacionVehicular2').on('change', function(e) {
        var selectedValue = $(this).val();

        // Cargar contenido en el elemento con id 'idOpciones' usando el valor seleccionado
        $("#idOpciones2").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.vehiculos.select.php", 
            { 
                idClasificacion: selectedValue 
            },
            function(response, status, xhr) {
                if (status == "error") {
                    var msg = "Error al cargar el contenido: ";
                    alert(msg + xhr.status + " " + xhr.statusText);
                }
            }
        );
    });
//::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
$('#clasificacionMotorista').on('change', function(e) {
        var selectedValue = $(this).val();

        // Cargar contenido en el elemento con id 'idOpciones' usando el valor seleccionado
        $("#id_label_single23").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.motorista.select.php", 
            { 
                idClasificacion: selectedValue 
            },
            function(response, status, xhr) {
                if (status == "error") {
                    var msg = "Error al cargar el contenido: ";
                    alert(msg + xhr.status + " " + xhr.statusText);
                }
            }
        );

    
    });


//::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

$('#clasificacionMotorista2').on('change', function(e) {
        var selectedValue = $(this).val();

        // Cargar contenido en el elemento con id 'idOpciones' usando el valor seleccionado
       

        //Cargar el siguiente select
        $("#id_label_single2324").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.motorista.select.php", 
            { 
                idClasificacion: selectedValue 
            },
            function(response, status, xhr) {
                if (status == "error") {
                    var msg = "Error al cargar el contenido: ";
                    alert(msg + xhr.status + " " + xhr.statusText);
                }
            }
        );
    });



//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
      });



     $("#tablaPasajerosInternos").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.tabla.admin.pasajeros.php", { idProyecto: <?php echo json_encode($_REQUEST['idProyecto']); ?> });
     
</script>