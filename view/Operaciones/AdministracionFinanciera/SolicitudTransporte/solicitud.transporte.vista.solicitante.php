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

    background-image: url('assets/images/kuki_online_taxi_service_3.jpg'); /* Reemplaza 'ruta_de_tu_imagen.jpg' con la ruta de tu imagen de fondo */

    background-size: cover;

    background-position: center ;

    height: 25vh;
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





<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>



<!--<center>
<div class="fondoImagen justify-content-center">

    </div>
</center>-->

<div class="position-relative overflow-hidden p-3 p-md-3 m-md-3 text-center bg-light">
    <button id="btnRegresarSolicitud" type="button" class="btn btn-light btn-sm position-absolute" style="left: 0; top: 0; color: blue; border-bottom: 2px solid #000;">Regresar</button>
    
    <div class="col-12 col-md-12 p-lg-2 mx-auto my-2">
        <h1 class="display-4 fw-normal">Solicitudes de Transporte</h1>
        <p class="lead fw-normal">V 1.0.0</p>
    </div>

    <div class="d-flex justify-content-center">
        <button type="button" id="creacionRegistroSolicitud" class="btn btn-sm" style="background-color: #1A4262; color: white;">Nueva Solicitud</button>
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

<br>














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

$("#creacionRegistroSolicitud").click(function(){
    window.location.href='?view=formulario-registro';  
})
    $(document).ready(function(){

    

        $('.js-example-basic-single').select2({

            dropdownParent:$('#exampleModal2')

        })



        $("#tablaFichas").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.vista.tabla.php");

        $("#IdProyecto").load("view/Monitoreo/get_options.php");



        $("#btnSaveInscription").click(function() {

           document.getElementById("botonCargando").style.display="";

            $.post("process/index.php", {

                process: "monitoreo_proyecto",

                action: "addproject",



                conocidoComo: $("#conocidoComo").val(), 

                nombreProyecto: $("#nombreProyecto").val(), 

                descripcionProyecto: $("#descripcionProyecto").val(), 

            },

            function(response){

                if(response)

                {

                    document.getElementById("botonCargando").style.display="none";

                $.toast({

                    heading: 'Finalizado',

                    text: response,//'Proyecto Creado Correctamente',

                    showHideTransition: 'slide',

                    icon: 'success',

                    hideAfter: 2000, 

                    position: 'top-center'

                });

                document.getElementById("btnReturn").click();

                setTimeout(function() {

                    window.location.href = '?view=monitoreo';

                 //   $("#IdProyecto").load("view/Monitoreo/get_options.php");

                

}, 3000); 

                

                }

                else

                {

                    document.getElementById("botonCargando").style.display="none";

                $.toast({

                    heading: 'ERRORRRRRRR',

                    text: response,//'El nombre del proyecto es obligatorio',

                    showHideTransition: 'slide',

                    icon: 'error',

                    hideAfter: 5000, 

                    position: 'top-center'

                });

                document.getElementById("btnReturn").click();

                }

                

            });

        });





        $("#btnSaveInscription2").click(function() {

           document.getElementById("botonCargando2").style.display="";

            $.post("process/index.php", {

                process: "monitoreo_proyecto",

                action: "addasociacion",





                idProyecto: $("#IdProyecto").val(), 

                idCoordinador: $("#id_label_single").val(), 

                linkSharepoint: $("#linkSharepoint").val(),

            },

            function(response){

                if(response == 10)

                {

                    document.getElementById("botonCargando2").style.display="none";

                $.toast({

                    heading: 'Finalizado',

                    text: 'Ficha de Proyecto Creado Correctamente',

                    showHideTransition: 'slide',

                    icon: 'success',

                    hideAfter: 2000, 

                    position: 'top-center'

                });

                //$("#tablaFichas").load("view/Monitoreo//Monitoreo.fichas.table.php");

                setTimeout(function() {

                    window.location.href = '?view=monitoreo';

                 //   $("#IdProyecto").load("view/Monitoreo/get_options.php");

                

}, 3000);

              

                document.getElementById("btnReturn2").click();

                }

                else if(response == 2)

                {

                    document.getElementById("botonCargando2").style.display="none";

                    $.toast({

                        heading: 'ERROR',

                        text: 'Error al registrar el proyecto',

                        showHideTransition: 'slide',

                        icon: 'error',

                        hideAfter: 5000, 

                        position: 'top-center'

                    });

                    document.getElementById("btnReturn2").click();

                }

                else if (response == 3){

                    document.getElementById("botonCargando2").style.display="none";

                    $.toast({

                        heading: 'ERRORRRRRRR',

                        text: 'Error al registrar el historial del coordinador ',

                        showHideTransition: 'slide',

                        icon: 'error',

                        hideAfter: 5000, 

                        position: 'top-center'

                    });

                    document.getElementById("btnReturn2").click();

                }

                else if (response == 4){

                    document.getElementById("botonCargando2").style.display="none";

                    $.toast({

                        heading: 'ADVERTENCIA',

                        text: 'YA EXISTE EL COORDINADOR EN EL PROYECTO , NO SE PUEDE VOLVER A CREAR OTRA FICHA',

                        showHideTransition: 'slide',

                        icon: 'warning',

                        hideAfter: 5000, 

                        position: 'top-center'

                    });

                    document.getElementById("btnReturn2").click();

                }

                else {

                    document.getElementById("botonCargando2").style.display="none";

                    $.toast({

                        heading: 'ADVERTENCIA',

                        text: response,//'YA EXISTE EL COORDINADOR EN EL PROYECTO , NO SE PUEDE VOLVER A CREAR OTRA FICHA',

                        showHideTransition: 'slide',

                        icon: 'warning',

                        hideAfter: 5000, 

                        position: 'top-center'

                    });

                    document.getElementById("btnReturn2").click();

                }

                

            });

        });







       









    <?php if(isset($_GET['respuesta'])){ ?>



    $.toast({

        text: 'SE REGISTRO CORRECTAMENTE.',

      showHideTransition: 'slide',

      icon: 'success',

      position: 'bottom-center', 

    });



    <?php } ?>



    })



   

</script>