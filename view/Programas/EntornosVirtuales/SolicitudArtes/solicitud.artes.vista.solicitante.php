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

    background-image: url('assets/images/Tiny graphic designer drawing with big pen on computer screen.jpg'); /* Reemplaza 'ruta_de_tu_imagen.jpg' con la ruta de tu imagen de fondo */

    background-size: cover;

    background-position: center 40%;

    height: 30vh;
    width: 25%;
 
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


<!--::::::::::   IMAGEN DE FONDO INICIO-->
<div class="position-relative overflow-hidden p-3 p-md-3 m-md-3 text-center bg-light">
<button id="btnRegresarSolicitud" type="button" class="btn btn btn-light btn-sm position-absolute" style="left: 0; color:blue; border-bottom: 2px solid #000;">Regresar</button>
    <div class="col-md-12 p-lg-2 mx-auto my-2">
      <h1 class="display-4 fw-normal">Solicitudes de Arte</h1>
    <!--  <p class="lead fw-normal">V 1.0.0 </p>-->
     
    </div>
    <div class="product-device shadow-sm d-none d-md-block">
    <button type="button" id="creacionRegistroSolicitud" class="btn btn-sm" style="background-color: #1A4262;color:white;" > Nueva Solicitud</button> 
    </div>
    
  </div>
<!--:::::::::::::: IMAGEN DE FONDO FIN:::::::::::::-->




<br>

<div class="row">

   

    <div class="col-md">
        <div id="tablaFichas"></div>
    </div>

</div>

<br>



<br>

<br>

<br>





<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content ">

        

        

        

        <div class="modal-header colorNuevoProyecto">

        <h4 class="modal-title " id="exampleModalLabel" style="color:white; font-weight: 800;"><img src="assets/images/idea_6331189(1).png"  style="width: 10%; "/>  Registrando Nuevo Proyecto</h4>

        <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>

      </div>

      <div class="modal-body">

        

        <div class="mb-3">

        <label for="formFile" class="form-label">NOMBRE DEL PROYECTO: </label>

        <input class="form-control form-control-sm" type="text" id="nombreProyecto" placeholder=".form-control-sm" aria-label=".form-control-sm example">

        </div>



        <div class="mb-3">

        <label for="formFile" class="form-label">PROYECTO CONOCIDO COMO: </label>

        <input class="form-control form-control-sm" type="text" id="conocidoComo" placeholder=".form-control-sm" aria-label=".form-control-sm example">

        </div>



        <div class="mb-3">

        <label for="formFile" class="form-label">DESCRIPCIÓN DEL PROYECTO: </label>

        <input class="form-control form-control-sm" type="text" id="descripcionProyecto" placeholder=".form-control-sm" aria-label=".form-control-sm example">

        </div>

      </div>

      <div class="modal-footer">

      <a type="button" id="btnReturn"  class="btn btn-sm btn-danger" data-bs-dismiss="modal">Cancelar</a>

        <a type="button" id="btnSaveInscription" class="btn btn-success btn-sm">Registrar proyecto</a>

        

      </div>

    <a class="btn btn-success" id="botonCargando"  style="display:none;"type="button" disabled>

        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>

        Loading...

    </a>

      

    </div>

  </div>

</div>





<!-- REGISTRANDO NUEVA FICHA-->

<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header colorNuevaFicha">

        <h4 class="modal-title" id="exampleModalLabel" style="color:black; font-weight: 800;"> <img src="assets/images/skill_6079760.png"  style="width: 10%; "/> Registrando Nuevo Ficha</h4>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

      </div>

      <div class="modal-body">

       

      

        <div class="mb-3">

            <label for="formFile" class="form-label">SELECCIONAR PROYECTO:  </label>

            <select id="IdProyecto" class="form-control form-control-sm" type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">

            

            </select>

        </div>







        <div class="mb-3">

    <label for="id_label_single" class="form-label">SELECCIONAR COORDINADOR: </label>

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



        <div class="mb-3">

            <label for="formFile" class="form-label">AGREGAR LINK SHAREPOINT:  </label>

            <input type="text" class="form-control form-control-sm" id="linkSharepoint" placeholder="pegar link de la carpeta">   

            </div>

      </div>

      <div class="modal-footer">

      <a type="button" id="btnReturn2"  class="btn btn-sm btn-danger" data-bs-dismiss="modal">Cancelar</a>

        <a type="button" id="btnSaveInscription2" class="btn btn-success btn-sm">Registrar proyecto</a>

      </div>

      <a class="btn btn-success" id="botonCargando2"  style="display:none;"type="button" disabled>

  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>

  Loading...

</a>

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
$("#creacionRegistroSolicitud").click(function(){ 
    window.location.href='?view=vistaSolicitanteNueva'; 
});
</script>


<script>

    $(document).ready(function(){

    

        $('.js-example-basic-single').select2({

            dropdownParent:$('#exampleModal2')

        })



        $("#tablaFichas").load("view/Programas/EntornosVirtuales/SolicitudArtes/solicitud.artes.vista.tabla.php");
        $("#tablaFichasTerminada").load("view/Programas/EntornosVirtuales/SolicitudArtes/solicitud.artes.vista.tabla.php");



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