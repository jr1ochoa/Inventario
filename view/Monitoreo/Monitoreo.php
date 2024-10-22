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

    background-image: url('assets/images/3594607.jpg'); /* Reemplaza 'ruta_de_tu_imagen.jpg' con la ruta de tu imagen de fondo */
 
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

<!--fondoImagen-->


<div class="position-relative overflow-hidden p-3 p-md-3 m-md-3 text-center bg-light">
    <div class="col-md-5 p-lg-2 mx-auto my-2">
      <h1 class="display-4 fw-normal">Gestión de Proyectos</h1>
      <p class="lead fw-normal">V 1.8.0 </p>
     
    </div>
    <div class="product-device shadow-sm d-none d-md-block">
    <a type="button" class="btn  btn-sm  " style="background-color: #1A4262; color:white;"  data-bs-toggle="modal" data-bs-target="#exampleModalSdd">
    CREAR NUEVO PROYECTO</a>

    <a type="button" class="btn  btn-sm  colorNuevaFicha" style="background-color: #1A4262; color:white;" data-bs-toggle="modal" data-bs-target="#exampleModal2">
         NUEVA FICHA</a>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-paint-bucket" viewBox="0 0 16 16">
  <path d="M6.192 2.78c-.458-.677-.927-1.248-1.35-1.643a3 3 0 0 0-.71-.515c-.217-.104-.56-.205-.882-.02-.367.213-.427.63-.43.896-.003.304.064.664.173 1.044.196.687.556 1.528 1.035 2.402L.752 8.22c-.277.277-.269.656-.218.918.055.283.187.593.36.903.348.627.92 1.361 1.626 2.068.707.707 1.441 1.278 2.068 1.626.31.173.62.305.903.36.262.05.64.059.918-.218l5.615-5.615c.118.257.092.512.05.939-.03.292-.068.665-.073 1.176v.123h.003a1 1 0 0 0 1.993 0H14v-.057a1 1 0 0 0-.004-.117c-.055-1.25-.7-2.738-1.86-3.494a4 4 0 0 0-.211-.434c-.349-.626-.92-1.36-1.627-2.067S8.857 3.052 8.23 2.704c-.31-.172-.62-.304-.903-.36-.262-.05-.64-.058-.918.219zM4.16 1.867c.381.356.844.922 1.311 1.632l-.704.705c-.382-.727-.66-1.402-.813-1.938a3.3 3.3 0 0 1-.131-.673q.137.09.337.274m.394 3.965c.54.852 1.107 1.567 1.607 2.033a.5.5 0 1 0 .682-.732c-.453-.422-1.017-1.136-1.564-2.027l1.088-1.088q.081.181.183.365c.349.627.92 1.361 1.627 2.068.706.707 1.44 1.278 2.068 1.626q.183.103.365.183l-4.861 4.862-.068-.01c-.137-.027-.342-.104-.608-.252-.524-.292-1.186-.8-1.846-1.46s-1.168-1.32-1.46-1.846c-.147-.265-.225-.47-.251-.607l-.01-.068zm2.87-1.935a2.4 2.4 0 0 1-.241-.561c.135.033.324.11.562.241.524.292 1.186.8 1.846 1.46.45.45.83.901 1.118 1.31a3.5 3.5 0 0 0-1.066.091 11 11 0 0 1-.76-.694c-.66-.66-1.167-1.322-1.458-1.847z"/>
</svg>
    <span class="badge  text-dark" style="background-color: #F0F0F0; border-radius:12px;">no iniciado</span>
    <span class="badge  text-dark" style="background-color: #FEF5CC; border-radius:12px;">proceso</span>
    <span class="badge  text-dark" style="background-color: #AFB6CC; border-radius:12px;">pausa</span>
    <span class="badge  text-dark" style="background-color: #E59A8D; border-radius:12px;">atrasado</span>
    <span class="badge  text-dark" style="background-color: #C0E5B9; border-radius:12px;">finalizado</span>
  </div>

<div class="row">

    <div class="col-md-3">

   <!-- <h6 style="color: black; font-size: 16px;" class="mx-3 colorTextoFondo">Sistema Gestión de Proyectos
    <p style="color:black;">V 1.7.0</p> 
        FUSALMO  <?php //echo $ano_actual; ?>-->

   


      <!--  <div class="col-md">

<div class="colorTextoFondo ">

<div class="">

    <a type="button" class="btn  btn-sm mt-3 mb-1 " style="background-color: #1A4262; color:white;"  data-bs-toggle="modal" data-bs-target="#exampleModal">
        CREAR NUEVO PROYECTO</a>

</div>



<div class="">

    <a type="button" class="btn  btn-sm mb-1  colorNuevaFicha" style="background-color: #1A4262; color:white;" data-bs-toggle="modal" data-bs-target="#exampleModal2">
         NUEVA FICHA</a>

</div>


<p style="color:black;">V 1.7.0</p> 

</div>

</div> -->





    </div>

    <script src="view/Monitoreo/ExpresionRegular.js"></script>


    <div class="col-md-12">
        <!--::::::::::::::::::::::::::::::: TABLA DE PROYECTOS :::::::::::::::::::-->
        <div class="row">
            <div class="col-md-2">

            </div>
            <div class="col-md-9">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Proyectos</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Dashboard </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">...</button>
                </li>
                </ul>
            </div>
        </div>
        
        <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <!--::::::::::: TABLAS DE PROYECTOS ::::::::::::::: -->
            <div id="tablaFichas"></div>
            <!--::::::::::::::::::::::::::::::::::::::::::::::: -->
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
           
        <center class="mt-2">
<div class="row">
    <div class="col-md-4">

    </div>
  <div class="col-md-auto">
    <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Monto Inicial $:</label>
    <input type="number" class="form-control form-control-sm" min=0 id="montoInicial" oninput="validarNumeroConDecimal(this,mensajeError2)" pattern="^[0-9]+(\.[0-9]+)?$"  placeholder="0.0">
    <p id="mensajeError2"></p> 
    </div>
  </div>
  <div class="col-md-auto">
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Monto Final $:</label>
    <input type="number" class="form-control form-control-sm" min=0 oninput="validarNumeroConDecimal(this,mensajeError3)" pattern="^[0-9]+(\.[0-9]+)?$" id="montoFinal" placeholder="0.0">
    <p id="mensajeError3"></p> 
    </div>
  </div>
  <div class="col-auto mt-4">
    <button id="filtrarProyectos" style="background-color: #1A4262; color:white;" type="submit" class="btn btn-sm mb-3">Filtrar Proyectos</button>
  </div>
</div>
</center>

            <div id="Estadisticas"></div>
        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
        </div>

                
           



        <!--:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->
    </div>




<!--::::::::::::::::::::::::-->




</div>

    









<br>



<br>



<br>

<br>

<br>





<!-- Modal -->

<div class="modal fade" id="exampleModalSdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

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

        <button type="button" id="btnSaveInscription22" class="btn btn-success btn-sm">Registrar proyecto</button>

        

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








<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<!-- Incluye jQuery primero -->

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>



<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>



<!-- Después, incluye el CSS y JS de jQuery Toast Plugin -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>







<script>

    $(document).ready(function(){

        var montoInicial = document.getElementById("montoInicial") ? document.getElementById("montoInicial").value : null;
        var montoFinal = document.getElementById("montoFinal") ? document.getElementById("montoFinal").value : null;

        if (montoInicial !== null && montoFinal !== null) {
        $("#Estadisticas").load("view/Monitoreo/Monitoreo.estadisticas.php", {
                montoInicial: montoInicial,
                montofinal: montoFinal
            });
        }
        if(montoInicial == 0 && montoFinal == 0)
        {
            $("#Estadisticas").load("view/Monitoreo/Monitoreo.estadisticas.php", {
                montoInicial: 0,
                montofinal: 0
            });
        }
        
        if(montoInicial < 0 && montoFinal >=0 ||  montoInicial >= 0 && montoFinal <0){
            $.toast({
            heading: 'ERROR',
            text: 'No ingrese números negativos',
            showHideTransition: 'slide',
            icon: 'error',
            hideAfter: 5000, 
            position: 'top-center'
            });
        }
         



        $("#filtrarProyectos").click(function() {
            var montoInicial = document.getElementById("montoInicial") ? document.getElementById("montoInicial").value : null;
            var montoFinal = document.getElementById("montoFinal") ? document.getElementById("montoFinal").value : null;

        if (montoInicial !== null && montoFinal !== null) {
            
        $("#Estadisticas").load("view/Monitoreo/Monitoreo.estadisticas.php", {
                montoInicial: montoInicial,
                montofinal: montoFinal
            });
        }
        else if(montoInicial == 0 && montoFinal == 0)
        {
            $("#Estadisticas").load("view/Monitoreo/Monitoreo.estadisticas.php", {
                montoInicial: 0,
                montofinal: 0
            });
        }
        else if(montoInicial < 0 && montoFinal >=0 ||  montoInicial >= 0 && montoFinal <0){
            $.toast({
            heading: 'ERROR',
            text: 'No ingrese números negativos',
            showHideTransition: 'slide',
            icon: 'error',
            hideAfter: 5000, 
            position: 'top-center'
            });
        }
          
        });


        $('.js-example-basic-single').select2({

            dropdownParent:$('#exampleModal2')

        })



        $("#tablaFichas").load("view/Monitoreo/Monitoreo.fichas.table.php");
        //Estadisticas
       // $("#Estadisticas").load("view/Monitoreo/Monitoreo.estadisticas.php",{ montoInicial: document.getElementById("timeStart2").value,montofinal: document.getElementById("timeStart").value });
        $("#IdProyecto").load("view/Monitoreo/get_options.php");



        $("#btnSaveInscription22").click(function() {
            //alert("asdasdasdasdas");
            //alert($("#conocidoComo").val());
           //document.getElementById("botonCargando").style.display="";

            $.post("process/index.php", {

                process: "monitoreo_proyecto",

                action: "addproject", 



                conocidoComo: $("#conocidoComo").val(), 

                nombreProyecto: $("#nombreProyecto").val(), 

                descripcionProyecto: $("#descripcionProyecto").val(), 

            },

            function(response){

                
                $.toast({
                    heading: 'Finalizado',
                    text: response,//'Proyecto Creado Correctamente',
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: 2000, 
                    position: 'top-center'

                });
                if(response)

                {

                   // document.getElementById("botonCargando").style.display="none";

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