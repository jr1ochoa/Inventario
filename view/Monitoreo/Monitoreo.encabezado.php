<style>

    /* Agrega estilos según tu preferencia */

.hidden {

  display: none;

}

.colorBoton{

                background-color: #F5E6BD;

            }

.colorBOtonEnviar{

    background-color: #7D942E;

    color: while;

}

#codigo-container {

  margin-bottom: 20px;

}

.estiloLetra{

    font-weight: 700;

    background-color: #1A4262;

    color: white;

    padding-left: 12px;

    padding-right: 12px;

    padding-top: 5px;

    padding-bottom: 5px;

    border-radius: 2px;

}

.colorDelaFicha{

    background-color: #FFFFFF;

}

.tamañoInput{

   

    background-color: white;

}

.grosorDeTitulo{

    font-weight: 700;

}

.tamañoLetraFormulario{

    text-transform: uppercase;

    font-size: 12px;

    font-weight: 600;

}

</style>

<script src="view/Monitoreo/ExpresionRegular.js"></script>

<script>

    const funcionrecargar = () => {

        fetch()

    }

</script>

<?php

session_start(); // Inicia la sesión

// Primero intenta obtener idProyecto de la solicitud HTTP ($_REQUEST)

if (isset($_REQUEST['idProyecto'])) {

    $valor = $_REQUEST['idProyecto'];

} else {

    // Si idProyecto no está en la solicitud, intenta obtenerlo de la sesión

    $valor = isset($_SESSION['idProyecto']) ? $_SESSION['idProyecto'] : 'Valor por defecto o manejo de error';

}

 include("../../config/net.php");



 $diaActual = date("Y-m-d");

//echo "El día actual es: " . $diaActual;





    $query = "SELECT s1.*, s2.name1,s2.name2,s2.name3,s2.lastname1,s2.lastname2, s3.proyecto,s3.conocidoCOmo 

    FROM monitor_generalidad_proyecto as s1 

    inner join employee as s2 on s1.id_coordinador = s2.id

    inner join monitor_proyecto as s3 on s1.id_proyecto = s3.id WHERE s1.id = ?";

                $data3 = $net_rrhh->prepare($query);

                $data3->execute([$valor]);

                while ($data = $data3->fetch()) 

                {

                    $nombreProyecto = $data[17];

                    $conocidoComo = $data[18];

                    $idRelacionProyecto = $data[0];

                }





    $query2 =    "SELECT * FROM monitor_ficha_encabezado WHERE id_proyecto_generalidades = ?";

                $data3 = $net_rrhh->prepare($query2);

                $data3->execute([$valor]);

                while ($data = $data3->fetch()) 

                {

                    $codigo_proyecto = $data[1];

                    $codigo_asignado = $data[3];

                    $tipo_cooperante = $data[4];

                    $nombre_cooperante = $data[5];

                    $pagina_web = $data[6];

                    $consorcio_ = $data[7];

                    $nombre_prime = $data[8];

                    $aporte_proyecto = $data[11];

                    $organizacion_socia = $data[9];

                    $nombre_dela_organizacion = $data[10];



                    //::::::::: SESION DOS ::::::::::

                    $otrosespecifique = $data[13];

                    $fhinicio = $data[17];

                    $fhcierre = $data[18];

                    $numerobeneficiario = $data[20];

                    

                    //::::::::: SESION TRES :::::::::

                    $monto_del_cooperante = $data[21];

                    //echo "Monton Cooperante".$data[21];

                    //$monto_formateado = number_format($monto_del_cooperante, 2, ',', '');

                    $proyecto_possecontrapartida = $data[22];

                    $monto_contrapartida = $data[23];

                    $suma_demontos = $data[24];



                }               

?>

<div class="container mb-0 pb-5" >



<div class="row">

    <div class="col-md-2">

        <!--Formulario con los datos normales-->

    </div>

    <div class="mt-4 col-md-9 colorDelaFicha" >

        <!--Datos a modificar-->

        

        <div class="container" >

            <div class="row" >

                

                <div class="col mt-3" >

                    <img src="assets/images/LogoFusalmo.png"  style="width: 30%; margin-left: 30%"/>

                </div>

            </div>

        </div>

        <center><b class="grosorDeTitulo">FICHA DE PROYECTO</b></center>

        <p><b>Objetivo:</b> Sintetizar información de manera mensual sobre la ejecución de proyectos a fin de brindar reportes

actualizados y estandarizados.

</p>

        <div id="codigo-container">

    

    <div class="codigo hidden mt-3" id="codigo1">

        <!--Aquí va tu primer fragmento de código <img src="assets/images/money_769309.png" style="width: 5%; margin-right: 5%;"/>-->



        <h4> <b class="estiloLetra">INFORMACIÓN GENERAL SOBRE EL PROYECTO  1/5</b></h4>

        <hr/>

        <div class="container">

            <div class="row">

                <div class="col">

                    <div class="mb-3">

                    <label for="exampleFormControlInput1" class="form-label tamañoLetraFormulario">NOMBRE COMPLETO DEL PROYECTO : </label>

                    <input type="text" readonly value="<?php echo $nombreProyecto;?>" class="tamañoInput form-control form-control-sm" id="exampleFormControlInput1" >

                    <input type="hidden" value="<?php echo $idRelacionProyecto; ?>" id="idRelacionProyecto" >

                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col">

                    <div class="mb-3">

                    <label for="exampleFormControlInput1" class="form-label tamañoLetraFormulario">CÓDIGO DEL PROYECTO</label>

                    <input type="text" class="form-control form-control-sm" value="<?php echo ($codigo_proyecto != null) ? ( $codigo_proyecto) : " "; ?>" id="codigoproyecto" placeholder="digitar">

                    </div>

                </div>

                <div class="col">

                    <div class="mb-3">

                    <label for="exampleFormControlTextarea1" class="form-label tamañoLetraFormulario">PROYECTO CONOCIDO COMO: </label>

                    <input type="text" class="form-control form-control-sm" readonly value="<?php echo $conocidoComo;?>" id="proyectoconocido" placeholder="digitar">

                    </div>

                </div>

                

            </div>

            <div class="row">

                <div class="col">

                    <div class="mb-3">

                    <label for="exampleFormControlTextarea1" class="form-label tamañoLetraFormulario">Código o número de referencia asignado por el cooperante: </label>

                    <input type="number" class="form-control form-control-sm" id="codigoasignado" value="<?php echo ($codigo_asignado != null) ? ( $codigo_asignado) : ""; ?>" oninput="validarNumero(this,mensajeError)" pattern="^[0-9]+$" placeholder="digitar">

                    <p id="mensajeError"></p>    

                </div>

                </div>

                <div class="col">

                    <div class="mb-3">

                        <label for="exampleFormControlTextarea1" class="form-label tamañoLetraFormulario">Tipo de cooperante: </label>

                        <select class="form-control form-control-sm" id="tipocooperante">

                        <?php

                        // Si $tipo_cooperante no es null, agrega la opción seleccionada al principio

                        if ($tipo_cooperante != null) {

                            echo "<option selected>" . htmlspecialchars($tipo_cooperante) . "</option>";

                        }



                        // Opciones predefinidas que siempre se muestran

                        $opciones = [

                            "Multilateral",

                            "Bilateral",

                            "ONG Internacional",

                            "ONG Nacional",

                            "Empresa privada",

                            "Gobierno",

                            "Otros",

                        ];



                        foreach ($opciones as $opcion) {

                            // Asegurarse de no repetir la opción seleccionada si ya fue agregada

                            if ($opcion !== $tipo_cooperante) {

                                echo "<option>" . htmlspecialchars($opcion) . "</option>";

                            }

                        }

                        ?>

                            

                        </select>

                    </div>

                </div>

            </div>

            <hr/>

            <div class="row" >

                <div class="col">

                    <div class="mb-3">

                    <label for="exampleFormControlTextarea1" class="form-label tamañoLetraFormulario">Nombre del cooperante o fuente de financiamiento: </label>

                    <input type="email" class="form-control form-control-sm" id="nombrecooperante" value="<?php echo ($nombre_cooperante != null) ? ( $nombre_cooperante) : ""; ?>" placeholder="digitar">

                    </div>

                </div>



                <div class="col">

                    <div class="mb-3">

                        <label for="exampleFormControlInput1" class="form-label tamañoLetraFormulario">Página web del cooperante o fuente de financiamiento (si aplica)</label>

                        <input type="email" class="form-control form-control-sm" id="paginaweb" value="<?php echo ($pagina_web != null) ? ( $pagina_web) : ""; ?>" placeholder="digitar">

                    </div>

                </div>



            </div>

            <div class="row mt-2">

            <div class="col">

                    <div class="mb-3">

                        <label for="exampleFormControlTextarea1" class="form-label tamañoLetraFormulario">¿Es un consorcio? : </label>

                        <select class="form-control form-control-sm" id="consorcio">

                            

                        

                        <?php

                        // Si $tipo_cooperante no es null, agrega la opción seleccionada al principio

                        if ($consorcio_ != null) {

                            echo "<option selected>" . htmlspecialchars($consorcio_) . "</option>";

                        }



                        // Opciones predefinidas que siempre se muestran

                        $opciones = [

                            "Si",

                            "No",

                            

                        ];



                        foreach ($opciones as $opcion) {

                            // Asegurarse de no repetir la opción seleccionada si ya fue agregada

                            if ($opcion !== $consorcio_) {

                                echo "<option>" . htmlspecialchars($opcion) . "</option>";

                            }

                        }

                        ?>

                        

                        

                    

                        </select>

                    </div>

                </div>

            </div>

            <div class="row" >

                

                



                <div class="col">

                    <div class="mb-3">

                        <label for="exampleFormControlTextarea1" class="form-label tamañoLetraFormulario">Nombre de prime : (si aplica) </label>

                        <input type="email" class="form-control form-control-sm" value="<?php echo ($nombre_prime != null) ? ( $nombre_prime) : ""; ?>" id="nombreprime" placeholder="digitar">

                    </div>

                </div>

            </div>

            <div class="row">

                

                <div class="col">

                    <div class="mb-3">

                        <label for="exampleFormControlTextarea1" class="form-label tamañoLetraFormulario">Aporte al proyecto : </label>

                        <input type="email" class="form-control form-control-sm" value="<?php echo ($aporte_proyecto != null) ? ( $aporte_proyecto) : ""; ?>" id="aporteproyecto" placeholder="digitar">

                    </div>

                </div>

            </div>

            

            <div class="row" >

               

                <div class="col">

                    <div class="mb-3">

                        <label for="exampleFormControlTextarea1" class="form-label tamañoLetraFormulario">¿Cuenta con organizaciones socias? : 

                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-text-fill" viewBox="0 0 16 16" data-toggle="popover" title="¿Qué es una organizacion socia?" data-bs-content="<p>Organizaciones que figuran en el marco del proyecto con un rol/,resultado/actividades definidas</p>">

  <path d="M16 8c0 3.866-3.582 7-8 7a9 9 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7M4.5 5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1zm0 2.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1zm0 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1z"/>

</svg> </label>

                        <select class="form-control form-control-sm" id="organizacionsocia">

                        <?php

                        // Si $tipo_cooperante no es null, agrega la opción seleccionada al principio

                        if ($organizacion_socia != null) {

                            echo "<option selected>" . htmlspecialchars($organizacion_socia) . "</option>";

                        }



                        // Opciones predefinidas que siempre se muestran

                        $opciones = [

                            "Si",

                            "No",

                            

                        ];



                        foreach ($opciones as $opcion) {

                            // Asegurarse de no repetir la opción seleccionada si ya fue agregada

                            if ($opcion !== $organizacion_socia) {

                                echo "<option>" . htmlspecialchars($opcion) . "</option>";

                            }

                        }

                        ?>   

                        

                      

                        </select>

                    </div>

                </div>



                <div class="col">

                    <div class="mb-3">

                        <label for="exampleFormControlTextarea1" class="form-label tamañoLetraFormulario">Nombre de  las organizaciones : (si aplica)</label>

                        <input type="email" class="form-control form-control-sm" value="<?php echo ($nombre_dela_organizacion != null) ? ( $nombre_dela_organizacion) : ""; ?>" id="nombredelaorganizacion" placeholder="digitar">

                    </div>

                </div>



            </div>





        </div>

        <button id="btnAvance1" style="display: none;" class="btn btn-primary" type="button" disabled>

  <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>

  Guardando avance PARTE UNO, espere un momento...

</button>

        <div class="text-right"style="text-align: right;">

        <button id="btnsession1" type="button" class="btn btn-info">

            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16">

            <path d="M11 2H9v3h2z"/>

            <path d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z"/>

            </svg> Guardar Avance</button>



        </div>

    </div>



    <div class="codigo hidden mt-3" id="codigo2">

        <!---->

        <h4><b class="estiloLetra">RESUMEN DE INTERVENCIÓN 2/5</b></h4>

        <hr>

    <div class="container">

    <div class="row">





                <div class="col-md">

<!--::::::::::::::::::::::::: OBJETIVOS GENERALES :::::::::::::::::::::::::::::::::::::::::::::::-->

                <div class="col-md">

                    <div class="mb-3">

                        <label for="exampleFormControlTextarea1" class="form-label tamañoLetraFormulario">Objetivos Generales: <a class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalObjetivosGenerales">

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">

                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/>

                        </svg> agregar</a> <a type="button" class="btn btn-sm btn-info" id="refrescarObjGeneral"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">

  <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"/>

  <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"/>

</svg></a>

                        </label>

                        

                        <div id="loadListaObjetivoGeneral"></div>

                       

                    </div>

                </div>

<!--Modal OBJETIVO GENERAL INICIO  -->

    <div class="modal fade" id="exampleModalObjetivosGenerales" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header colorEncabezadoLista">

                    <h5 class="modal-title " id="exampleModalLabel" style="color: white; 

                        font-weight: 500;">REGISTRANDO OBJETIVO GENERAL</h5>

                    <a type="button" class="close" data-bs-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                    </a>

                </div>

                <div class="modal-body">

            <center>

                <img src="assets/images/maps_501999.png" width="10%">

            </center>

            <div class="row">

                    <!--<input type="hidden" value="<?php echo $idRelacionProyecto; ?>" id="idRelacionProyecto" >-->

                    <div class="col">

                    <div class="mb-3">

                    <label for="exampleFormControlInput1" class="form-label ">Escribir Objetivo General: *</label>

                    <textarea rows="2" type="text" maxlength="2000" class="form-control form-control-sm" id="objetivoGeneral" placeholder="name@example.com"></textarea>

                        </div>

                </div>

                

            </div>



            

            

        </div>

        <div class="modal-footer">

            <a type="button" id="cerrarBtnZona"class="btn  btn-sm btn-danger" data-bs-dismiss="modal">CANCELAR</a>

            <a type="button" id="btnRegistrarObjGeneral" class="btn  btn-sm btn-primary">REGISTRAR</a>

        </div>

        <a class="btn btn-success" id="botonCargando"  style="display:none;"type="button" disabled>

    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>

    Loading...

    </a>

        </div>

    </div>

    </div> 

<!--MODAL OBJETIVO GENERAL FIN -->





<!--:::::::::::::::::::::::::::: FIN DEL OBJETIVO ESPECIFICO :::::::::::::::::::::::::::-->

                   <!-- <div class="mb-3">

                        <label for="exampleFormControlInput1" class="form-label tamañoLetraFormulario">Objetivo del proyecto</label>

                        <textarea rows="2" type="email" maxlength="100" class="form-control form-control-sm" id="objetivoproyecto2" placeholder="name@example.com"></textarea>

                    </div>-->

                </div>





<!--:::::::::::::::::::::::::: OBJETIVOS ESPECIFICOS ::::::::::::::::::::::::::::::::::::::::::::::::::-->

<div class="col-md">

        <div class="mb-3">

            <label for="exampleFormControlTextarea1" class="form-label tamañoLetraFormulario">Objetivos Especificos: 

                <a class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalObjetivosEspecificos">

                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">

                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/>

                </svg> agregar</a> 

                <a type="button" class="btn btn-sm btn-info" id="refrescarObjEspecifico"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">

                <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"/>

                <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"/>

                </svg></a>

                        </label>

                        

                        <div id="loadListaObjetivoEspecifico"></div>

                       

                    </div>

                </div>



<!--Modal OBJETIVO ESPECIFICO INICIO  -->

<div class="modal fade" id="exampleModalObjetivosEspecificos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header colorEncabezadoLista">

                    <h5 class="modal-title " id="exampleModalLabel" style="color: white; 

                        font-weight: 500;">REGISTRANDO OBJETIVO ESPECIFICO</h5>

                    <a type="button" class="close" data-bs-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                    </a>

                </div>

                <div class="modal-body">

            <center>

                <img src="assets/images/maps_501999.png" width="10%">

            </center>

            <div class="row">

                    <!--<input type="hidden" value="<?php echo $idRelacionProyecto; ?>" id="idRelacionProyecto" >-->

                    <div class="col">

                    <div class="mb-3">

                    <label for="exampleFormControlInput1" class="form-label ">Escribir Objetivo Especifico: *</label>

                    <textarea rows="2" type="text" maxlength="1200" class="form-control form-control-sm" id="objetivoEspecifico" placeholder="name@example.com"></textarea>

                        </div>

                </div>

                

            </div>



            

            

        </div>

        <div class="modal-footer">

            <a type="button" id="cerrarBtnObjEspecifico"class="btn  btn-sm btn-danger" data-bs-dismiss="modal">CANCELAR</a>

            <a type="button" id="btnRegistrarObjEspecificos" class="btn  btn-sm btn-primary">REGISTRAR </a>

        </div>

        <a class="btn btn-success" id="botonCargandoEspecifico"  style="display:none;"type="button" disabled>

    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>

    Loading...

    </a>

        </div>

    </div>

    </div> 





    

<!--MODAL OBJETIVO ESPECIFICO FIN -->

         

        </div>

       

<div class="row">





<div class="col-md">

                    <div class="mb-3">

                        <label for="exampleFormControlTextarea1" class="form-label tamañoLetraFormulario">Zona de influencia : <a class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalZonadeInfluencia">

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">

                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/>

                        </svg> agregar</a> <a type="button" class="btn btn-sm btn-info" id="refrescarzona"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">

  <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"/>

  <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"/>

</svg></a>

                        </label>

                        

                        <div id="loadListaZonaInfluencia"></div>

                       

                    </div>

                </div>



   

                

<!-- Modal ZONA DE INFLUENCIA INICIO -->

<div class="modal fade" id="exampleModalZonadeInfluencia" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header colorEncabezadoLista">

        <h5 class="modal-title " id="exampleModalLabel" style="color: white; 

        font-weight: 500;">REGISTRANDO ZONA DE INFLUENCIA</h5>

        <a type="button" class="close" data-bs-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </a>

      </div>

      <div class="modal-body">

        <center>

            <img src="assets/images/maps_501999.png" width="10%">

        </center>

        <div class="row">

                <!--<input type="hidden" value="<?php echo $idRelacionProyecto; ?>" id="idRelacionProyecto" >-->

                <div class="col">

                   <div class="mb-3">

                   <label for="exampleFormControlInput1" class="form-label ">Seleccionar Zona de Influencia: *</label>

                   <select class="form-control form-control-sm" id="zonainfluencia">

                            <option>Sede de Santa Ana</option>

                            <option>Sede Soyapango </option>

                            <option>Sede Multigimnasio </option>

                            <option>Sede San Miguel </option>

                            <option>Otros </option>

                        </select> </div>

               </div>

              

           </div>



           

          

      </div>

      <div class="modal-footer">

        <a type="button" id="cerrarBtnZona3"class="btn  btn-sm btn-danger" data-bs-dismiss="modal">CANCELAR</a>

        <a type="button" id="btnRegistrarZona" class="btn  btn-sm btn-primary">REGISTRAR </a>

      </div>

      <a class="btn btn-success" id="botonCargando"  style="display:none;"type="button" disabled>

  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>

  Loading...

</a>

    </div>

  </div>

</div> 

<!-- MODAL ZONA DE INFLUENCIA FIN -->





<div class="col-md">

            <div class="col">

                <div class="mb-3">

                <label for="exampleFormControlTextarea1" class="form-label tamañoLetraFormulario">Otras Zonas de influencia especifique (si aplica): </label>

                <textarea rows="2" type="text" maxlength="200"  class="form-control form-control-sm" id="otrosespecifique" placeholder="name@example.com"><?php echo ($otrosespecifique != null) ? ( $otrosespecifique) : "";?></textarea>

                <!--<input type="email" class="form-control form-control-sm" id="otrosespecifique" placeholder="name@example.com">-->

                </div>

            </div>

        </div>





</div>

        <div class="row">

            <div class="col-md-12">



            <div class="col-md">

                    <div class="mb-3">

                        <label for="exampleFormControlTextarea1" class="form-label tamañoLetraFormulario">Resultados :  <a class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalResultados">

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">

                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/>

                        </svg> agregar</a> 

                        <a type="button" class="btn btn-sm btn-info" id="refrescarResultados">

                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">

                            <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"/>

                            <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"/>

                            </svg>

                        </a>

                        </label>

                        

                        <div id="loadListaResultado"></div>

                       

                    </div>

                </div>





<!-- Modal RESULTADOS INICIO -->

<div class="modal fade" id="exampleModalResultados" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header colorEncabezadoLista">

        <h5 class="modal-title " id="exampleModalLabel" style="color: white; 

        font-weight: 500;">REGISTRANDO RESULTADO</h5>

        <a type="button" class="close" data-bs-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </a>

      </div>

      <div class="modal-body">

        <center>

            <img src="assets/images/maps_501999.png" width="10%">

        </center>

        <div class="row">

                <!--<input type="hidden" value="<?php echo $idRelacionProyecto; ?>" id="idRelacionProyecto" >-->

                <div class="col">

                   <div class="mb-3">

                   <label for="exampleFormControlInput1" class="form-label ">ESCRIBIR RESULTADO : *</label>

                    <textarea rows="2" type="text" maxlength="1200" class="form-control form-control-sm" id="resultado" placeholder="name@example.com"></textarea>

                    </div>

               </div>

              

           </div>



           

          

      </div>

      <div class="modal-footer">

        <a type="button" id="cerrarBtnResultado"class="btn  btn-sm btn-danger" data-bs-dismiss="modal">CANCELAR</a>

        <a type="button" id="btnRegistrarResultado" class="btn  btn-sm btn-primary">REGISTRAR </a>

      </div>

      <a class="btn btn-success" id="botonCargandoResultado"  style="display:none;"type="button" disabled>

  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>

  Loading...

</a>

    </div>

  </div>

</div> 

<!--MODAL RESULTADOS FIN -->











               <!-- <div class="mb-3">

                    <label for="exampleFormControlInput1" class="form-label tamañoLetraFormulario">Metas y/o resultados principales del proyecto </label>

                    <textarea type="email" class="form-control form-control-sm" id="metasyresultados" placeholder="name@example.com"></textarea>

                </div>-->

            </div>

            <div class="col">







            <div class="col-md">

                    <div class="mb-3">

                        <label for="exampleFormControlTextarea1" class="form-label tamañoLetraFormulario">METAS Y/O INDICADORES: <a class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleMetaseIndicadores">

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">

                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/>

                        </svg> agregar</a> 

                        <a type="button" class="btn btn-sm btn-info" id="refrescarMeta">

                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">

                            <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"/>

                            <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"/>

                            </svg>

                        </a>

                        </label>

                        

                        <div id="loadListaMetasIndicadores"></div>

                       

                    </div>

                </div>





<!-- Modal RESULTADOS INICIO -->

<div class="modal fade" id="exampleMetaseIndicadores" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header colorEncabezadoLista">

        <h5 class="modal-title " id="exampleModalLabel" style="color: white; 

        font-weight: 500;">REGISTRANDO METAS E INDICADORES</h5>

        <a type="button" class="close" data-bs-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </a>

      </div>

      <div class="modal-body">

        <center>

            <img src="assets/images/maps_501999.png" width="10%">

        </center>

        <div class="row">

                <!--<input type="hidden" value="<?php echo $idRelacionProyecto; ?>" id="idRelacionProyecto" >-->



                <div class="col-md-12">

                   <div class="mb-3">

                   <label for="exampleFormControlInput1" class="form-label ">ESCRIBIR META O INDICADOR : *</label>

                    <textarea rows="4" type="text" maxlength="1800" class="form-control form-control-sm" id="metaoindicador" placeholder="name@example.com"></textarea>

                    </div>

               </div>





                <div class="col-md-12">
                   <div class="mb-3">
                   <label for="exampleFormControlInput1" class="form-label ">ESCRIBIR RESULTADO : *</label>
                    <select class="form-control form-control-sm"id="tipo">
                        <option value="META">META</option>
                        <option value="INDICADOR">INDICADOR</option>
                        <option value="HITOS">HITOS</option>
                        <option value="ACTIVIDADES">ACTIVIDADES</option>
                    </select>
                    </div>
               </div>

               <div class="col-md-12">
               <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label ">FECHA FINALIZACIÓN: *</label>
                <input class="form-control form-control-sm" id="fh_finalizacion" type="date" placeholder=".form-control-sm" aria-label=".form-control-sm example">
               </div>
            </div>

              

           </div>



           

          

      </div>

      <div class="modal-footer">

        <a type="button" id="cerrarBtnMetasIndicadores"class="btn  btn-sm btn-danger" data-bs-dismiss="modal">CANCELAR</a>

        <a type="button" id="btnRegistrarMetasIndicadores" class="btn  btn-sm btn-primary">REGISTRAR </a>

      </div>

      <a class="btn btn-success" id="botonCargandoMetasIndicadores"  style="display:none;"type="button" disabled>

  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>

  Loading...

</a>

    </div>

  </div>

</div> 

<!--MODAL RESULTADOS FIN -->











            </div>

            

        </div>



        <div class="row">

            <!--:::::::::::::::::::::::::: OBJETIVOS ESPECIFICOS ::::::::::::::::::::::::::::::::::::::::::::::::::-->

<div class="col-md">

        <div class="mb-3">

            <label for="exampleFormControlTextarea1" class="form-label tamañoLetraFormulario">ESCRIBIR PRODUCTOS : 

                <a class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalProductos">

                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">

                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/>

                </svg> agregar</a> 

                <a type="button" class="btn btn-sm btn-info" id="refrescarProductos"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">

                <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"/>

                <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"/>

                </svg></a>

                        </label>

                        

                        <div id="loadListaProductosGenerados"></div>

                       

                    </div>

                </div>



<!--Modal OBJETIVO ESPECIFICO INICIO  -->

<div class="modal fade" id="exampleModalProductos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header colorEncabezadoLista">

                    <h5 class="modal-title " id="exampleModalLabel" style="color: white; 

                        font-weight: 500;">REGISTRANDO PRODUCTOS PARA EL PROYECTO</h5>

                    <a type="button" class="close" data-bs-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                    </a>

                </div>

                <div class="modal-body">

            <center>

                <img src="assets/images/maps_501999.png" width="10%">

            </center>

            <div class="row">

                    <!--<input type="hidden" value="<?php echo $idRelacionProyecto; ?>" id="idRelacionProyecto" >-->

                    <div class="col">

                    <div class="mb-3">

                    <label for="exampleFormControlInput1" class="form-label ">Escribir Nombre del  Producto: *</label>

                    <textarea rows="2" type="text" maxlength="1200" class="form-control form-control-sm" id="productoGenerado" placeholder="name@example.com"></textarea>

                        </div>

                </div>

                

            </div>



            

            

        </div>

        <div class="modal-footer">

            <a type="button" id="cerrarBtnProductosGenerados"class="btn  btn-sm btn-danger" data-bs-dismiss="modal">CANCELAR</a>

            <a type="button" id="btnRegistrarProductosGenerados" class="btn  btn-sm btn-primary">REGISTRAR </a>

        </div>

        <a class="btn btn-success" id="botonCargandoProductosGenerados"  style="display:none;"type="button" disabled>

    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>

    Loading...

    </a>

        </div>

    </div>

    </div> 





    <!--:::::::::::::: ACTIVIDADES  ::::::::::::::::::::::::::::::::::::::-->

            <!--<div class="col">

                <div class="mb-3">

                    <label for="exampleFormControlInput1" class="form-label tamañoLetraFormulario">Productos generados</label>

                    <textarea type="email" class="form-control form-control-sm" id="productosgenerados" placeholder="name@example.com"></textarea>

                </div>

            </div>-->

        </div>



        <div class="row">

            <div class="col">





            <div class="mb-3">

            <label for="exampleFormControlTextarea1" class="form-label tamañoLetraFormulario">Área/ Subprograma institucional a cargo del proyecto :   

                <a class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalAreas">

                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">

                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/>

                </svg> agregar</a> 

                <a type="button" class="btn btn-sm btn-info" id="refrescarAreasyProgramas"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">

                <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"/>

                <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"/>

                </svg></a>

                        </label>

                        

                        <div id="loadListaAreasSubProgramas"></div>

                       

                    </div>



<!--::::::::::  Modal AREAS Y PROGRAMAS  INICIO  -->

<div class="modal fade" id="exampleModalAreas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header colorEncabezadoLista">

                    <h5 class="modal-title " id="exampleModalLabel" style="color: white; 

                        font-weight: 500;">Área/ Subprograma institucional a cargo del proyecto </h5>

                    <a type="button" class="close" data-bs-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                    </a>

                </div>

                <div class="modal-body">

            <center>

                <img src="assets/images/maps_501999.png" width="10%">

            </center>

            <div class="row">

                    <!--<input type="hidden" value="<?php echo $idRelacionProyecto; ?>" id="idRelacionProyecto" >-->

                    <div class="col">

                    <div class="mb-3">

                    <label for="exampleFormControlInput1" class="form-label ">Seleccionar Área/ Subprograma: *</label>

                <select class="form-control form-control-sm"id="areassubprogramas">

                        <option>Transformación educativa</option>

                        <option>Formación hacia el trabajo </option>

                        <option>Gestión y desarrollo </option>

                        <option>Ejecución y monitoreo </option>

                        <option>Comunicaciones </option>

                        <option>Dirección ejecutiva </option>

                </select>

                        </div>







                        <div class="mb-3">

                    <label for="exampleFormControlInput1" class="form-label ">Aporte del proyecto: *</label>

                    <textarea class="form-control" maxlength="1200" id="aporteDelProyectoArea" rows="3"></textarea>

                        </div>

                </div>

                

                









            </div>



            

            

        </div>

        <div class="modal-footer">

            <a type="button" id="cerrarBtnAreasProgramasCerrar"class="btn  btn-sm btn-danger" data-bs-dismiss="modal">CANCELAR</a>

            <a type="button" id="btnRegistrarAreaSubprograma" class="btn  btn-sm btn-primary">REGISTRAR </a>

        </div>

        <a class="btn btn-success" id="botonCargandoAreasProgramas"  style="display:none;"type="button" disabled>

    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>

    Loading...

    </a>

        </div>

    </div>

    </div> 

                <!--<div class="mb-3">

                <label for="exampleFormControlInput1" class="form-label tamañoLetraFormulario">Área/ Subprograma institucional a cargo del proyecto</label>

               

                <select class="form-control form-control-sm"id="areaacargo">

                    <option>Transformación educativa</option>

                    <option>Formación hacia el trabajo </option>

                    <option>Gestión y desarrollo </option>

                    <option>Ejecución y monitoreo </option>

                    <option>Comunicaciones </option>

                    <option>Dirección ejecutiva </option>

                </select>

                </div>-->

            </div>

        </div>

        <div class="row">

            <div class="col">

                <div class="mb-3">

                <label for="exampleFormControlTextarea1" class="form-label tamañoLetraFormulario">Fecha de inicio : </label>

                <input type="date" class="form-control form-control-sm"   value="<?php echo ($fhinicio != null) ? ( $fhinicio) : $diaActual; ?>" id="fhinicio" max="<?php echo $diaActual; ?>" placeholder="escribir...">

                </div>

            </div>

            <div class="col">

                <div class="mb-3">

                <label for="exampleFormControlTextarea1" class="form-label tamañoLetraFormulario">Fecha de cierre : </label>

                <input type="date" class="form-control form-control-sm" min="<?php echo $diaActual; ?>" value="<?php echo ($fhcierre != null) ? ( $fhcierre) : $diaActual; ?>" id="fhcierre" placeholder="escribir...">

                </div>

            </div>

        </div>

        <div class="row">

            <div class="col">

                <div class="mb-3">

                        <label for="exampleFormControlTextarea1" class="form-label tamañoLetraFormulario">Población meta principal: 

                            <a class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalPoblacionMeta">

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">

                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/>

                        </svg> agregar</a> <a type="button" class="btn btn-sm btn-info" id="refrescarpoblacion"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">

  <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"/>

  <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"/>

</svg></a>

                        </label>

                        

                        <div id="loadListaPoblacionMeta"></div>

                       

                    </div>



                

            </div>

            <div class="col">

            <div class="mb-3 ">

            <label for="exampleFormControlTextarea1" class="form-label tamañoLetraFormulario">Sector al que va dirigido : <a class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalSectorDirigido">

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">

                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/>

                        </svg> agregar</a> <a type="button" class="btn btn-sm btn-info" id="refrescarsector"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">

  <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"/>

  <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"/>

</svg></a></label>

                    

            <div id="loadListaSectorDirigido"></div>

               

            </div>

            </div>

<!-- Modal POBLACION META INICIO -->

<div class="modal fade" id="exampleModalPoblacionMeta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header colorEncabezadoLista">

        <h5 class="modal-title " id="exampleModalLabel" style="color: white; 

        font-weight: 500;">REGISTRANDO POBLACION META</h5>

        <a type="button" class="close" data-bs-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </a>

      </div>

      <div class="modal-body">

        <center>

            <img src="assets/images/crowd_5778109.png" width="10%">

        </center>

        <div class="row">

                <!--<input type="hidden" value="<?php echo $idRelacionProyecto; ?>" id="idRelacionProyecto" >-->

                <div class="col">

                   <div class="mb-3">

                   <label for="exampleFormControlInput1" class="form-label">Seleccionar Poblacion Meta: *</label>

                   <select class="form-control form-control-sm" id="poblacionprincipal">

                    <option>Niñez (4- 12 años)</option>

                    <option>Adolescentes (13- 17 años) </option>

                    <option>Jovenes (18- 35 años)</option>

                    <option>Docente </option>

                </select> </div>

               </div>

              

           </div>



           

          

      </div>

      <div class="modal-footer">

        <a type="button" id="cerrarBtnPoblacion"class="btn  btn-sm btn-danger" data-bs-dismiss="modal">CANCELAR</a>

        <a type="button" id="btnRegistrarPoblacion" class="btn  btn-sm btn-primary">REGISTRAR </a>

      </div>

      <a class="btn btn-success" id="botonCargando"  style="display:none;"type="button" disabled>

  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>

  Loading...

</a>

    </div>

  </div>

</div> 

<!-- MODAL POBLACION META FIN -->



<!-- Modal SECTOR AL QUE VA DIRIGIDO INICIO -->

<div class="modal fade" id="exampleModalSectorDirigido" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header colorEncabezadoLista">

        <h5 class="modal-title " id="exampleModalLabel" style="color: white; 

        font-weight: 500;">REGISTRANDO SECTOR AL QUE VA DIRIGIDO</h5>

        <a type="button" class="close" data-bs-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </a>

      </div>

      <div class="modal-body">

        <center>

            <img src="assets/images/crowd_5778109.png" width="10%">

        </center>

        <div class="row">

                <!--<input type="hidden" value="<?php echo $idRelacionProyecto; ?>" id="idRelacionProyecto" >-->

                <div class="col">

                   <div class="mb-3">

                   <label for="exampleFormControlInput1" class="form-label">Seleccionar Sector al que va dirigido: *</label>

                   <select class="form-control form-control-sm" id="sectordirigida">

                    <option>Sede de FUSALMO</option>

                    <option>Comunitario </option>

                    <option>Escolar</option>

                    <option>Municipal </option>

                    <option>Otro </option>

                </select>

             </div>

               </div>

              

           </div>



           

          

      </div>

      <div class="modal-footer">

        <a type="button" id="cerrarBtnSector"class="btn  btn-sm btn-danger" data-bs-dismiss="modal">CANCELAR</a>

        <a type="button" id="btnRegistrarSector" class="btn  btn-sm btn-primary">REGISTRAR </a>

      </div>

      <a class="btn btn-success" id="botonCargando"  style="display:none;"type="button" disabled>

  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>

  Loading...

</a>

    </div>

  </div>

</div> 

<!-- Modal SECTOR AL QUE VA DIRIGIDO FIN -->

        </div>

        <div class="row">

            <div class="col">

                <div class="mb-3 ">

                <label for="exampleFormControlTextarea1" class="form-label tamañoLetraFormulario">Número de beneficiarios esperados : </label>

                <input type="number" class="form-control form-control-sm" value="<?php echo ($numerobeneficiario != null) ? ( $numerobeneficiario) : 0; ?>" oninput="validarNumero(this,mensajeError4)" pattern="^[0-9]+$" id="numerobeneficiario" placeholder="name@example.com">

                <p id="mensajeError4"></p>         

            </div>

            </div>

        </div>



        <div class="row">

        <div class="mb-3 ">

            <label for="exampleFormControlTextarea1" class="form-label tamañoLetraFormulario">ESPECIFICAR NÚMERO DE POBLACIÓN META : <a class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalPoblacionMetaDetalle">

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">

                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/>

                        </svg> agregar</a> <a type="button" class="btn btn-sm btn-info" id="refrescarPoblacionMeta"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">

  <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"/>

  <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"/>

</svg></a></label>

                    

            <div id="loadListaPoblacionMetaNumero"></div>

               

            </div>





<!-- Modal NUMERO DE POBLACION META QUE VA DIRIGIDO INICIO -->

<div class="modal fade" id="exampleModalPoblacionMetaDetalle" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header colorEncabezadoLista">

        <h5 class="modal-title " id="exampleModalLabel" style="color: white; 

        font-weight: 500;">DETALLAR LA CANTIDAD DE POBLACIÓN META</h5>

        <a type="button" class="close" data-bs-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </a>

      </div>

      <div class="modal-body">

        <center>

            <img src="assets/images/crowd_5778109.png" width="10%">

        </center>

        <div class="row">

                <!--<input type="hidden" value="<?php echo $idRelacionProyecto; ?>" id="idRelacionProyecto" >-->

                <div class="col">

                   <div class="mb-3">

                   <label for="exampleFormControlInput1 tamañoLetraFormulario" class="form-label">Seleccionar población meta: *</label>

                   <select class="form-control form-control-sm" id="poblacionMetaDetalle">

                    <option>Niñez (4- 12 años)</option>

                    <option>Adolescentes (13- 17 años) </option>

                    <option>Jovenes (18- 35 años)</option>
                    <option>Niñez, adolescentes y jóvenes</option>

                    <option>Docente </option>

                </select> 

             </div>

               </div>

               <div class="col-md-12">

               <div class="mb-3">

                <label for="exampleFormControlTextarea1" class="form-label tamañoLetraFormulario">Digitar la cantidad : </label>

                <input type="number" class="form-control form-control-sm" oninput="validarNumero(this,mensajeError59)" pattern="^[0-9]+$" id="cantidadPoblacionMeta" placeholder="escribir...">

                

               <p id="mensajeError59"></p>     

            

            </div>

               </div>

              

           </div>



           

          

      </div>

      <div class="modal-footer">

        <a type="button" id="cerrarBtnPoblacionMeta"class="btn  btn-sm btn-danger" data-bs-dismiss="modal">CANCELAR</a>

        <a type="button" id="btnRegistrarNumeroPoblacionMeta" class="btn  btn-sm btn-primary">REGISTRAR </a>

      </div>

      <a class="btn btn-success" id="botonCargandoBtnPoblacionMeta"  style="display:none;"type="button" disabled>

  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>

  Loading...

</a>

    </div>

  </div>

</div> 

<!-- Modal NUMERO DE POBLACION META QUE VA DIRIGIDO FIN -->









        </div>







    </div>

       

    <button id="btnAvance2" style="display: none;" class="btn btn-primary" type="button" disabled>

  <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>

  Guardando avance PARTE DOS, espere un momento...

</button>



    <div class="text-right"style="text-align: right;">

        <button id="btnsession2" type="button" class="btn btn-info">

            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16">

            <path d="M11 2H9v3h2z"/>

            <path d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z"/>

            </svg> Guardar Avance</button>



        </div>







    </div>



    

    <div class="codigo hidden mt-3" id="codigo3">

        <!---->

        <h4><b class="estiloLetra">REGISTROS FINANCIERO 3/5</b></h4>

        <hr>

        <div class="row">

            <div class="col">

                <div class="mb-3">

                <label for="exampleFormControlInput1" class="form-label tamañoLetraFormulario">Monto que aporta el cooperante</label>

                <input type="number"  onkeyup="detectarEnter(event)" value="<?php echo ($monto_del_cooperante != null) ? ( $monto_del_cooperante) : 0; ?>"  oninput="validarNumeroConDecimal(this,mensajeError2)" pattern="^[0-9]+(\.[0-9]+)?$" class="form-control form-control-sm" id="montodelcooperante" placeholder="name@example.com">

                <p id="mensajeError2"></p>     

            </div>

            </div>

            <div class="col">

                <div class="mb-3">

                <label for="exampleFormControlTextarea1" class="form-label tamañoLetraFormulario">¿El proyecto posee contrapartida ? : </label>

                <select class="form-control form-control-sm"id="proyectopossecontrapartida">

                   

                <?php

                        // Si $tipo_cooperante no es null, agrega la opción seleccionada al principio

                        if ($proyecto_possecontrapartida != null) {

                            echo "<option selected>" . htmlspecialchars($proyecto_possecontrapartida) . "</option>";

                        }



                        // Opciones predefinidas que siempre se muestran

                        $opciones = [

                            "Si",

                            "No",

                            

                        ];



                        foreach ($opciones as $opcion) {

                            // Asegurarse de no repetir la opción seleccionada si ya fue agregada

                            if ($opcion !== $proyecto_possecontrapartida) {

                                echo "<option>" . htmlspecialchars($opcion) . "</option>";

                            }

                        }

                        ?>   

                </select>

                </div>

            </div>

            <div class="col-md-1">



            </div>

        </div>

        <div class="row">

            <div class="col">

                <div class="mb-3">

                    <label for="exampleFormControlTextarea1" class="form-label tamañoLetraFormulario">Monto de contrapartida: </label>

                    <input type="number"   onkeyup="detectarEnter(event)"  value="<?php echo ($monto_contrapartida != null) ? ( $monto_contrapartida) : 0; ?>"  oninput="validarNumeroConDecimal(this,mensajeError3)" pattern="^[0-9]+(\.[0-9]+)?$" class="form-control form-control-sm" id="montocontrapartida" placeholder="name@example.com">

                    <p id="mensajeError3"></p>   

                </div>

            </div>

            <div class="col">

                <div class="mb-3">

                    <label for="exampleFormControlTextarea1" class="form-label tamañoLetraFormulario">Suma de los montos total de proyecto: </label>

                    <input type="number" readonly  class="form-control form-control-sm" value="<?php echo ($suma_demontos != null) ? ( $suma_demontos) : 0; ?>" id="sumademontos" placeholder="name@example.com">

                </div>

            </div>

            <div class="col-md-1">



            </div>

        </div>



        <hr/>

        <div class="row">

            <!--<div class="col">

                <div class="mb-3">

                    <label for="exampleFormControlTextarea1" class="form-label">Enliste las líneas presupuestarias del proyecto: </label>

                    <textarea type="text"  class="form-control form-control-sm" rows="3" id="lineaspresupuestarias" placeholder="name@example.com"></textarea>

                </div>

            </div>-->

            

            <div class="col">

                <div class="row">

                    <div class="col-md-4">

                    <a type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalPersonal">

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">

  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/>

</svg> NUEVA LISTA PRESUPUESTARIA</a>

           

                    </div>

                    <div class="col-md">

                                <!-- SUBIR PRESUPUESTO      -->

                                <a type="button" class="btn btn-sm " style="background-color: #C7D2DC; color:black;" data-bs-toggle="modal" data-bs-target="#subirEnlacePdf"><!--#subirDocumentoPdf-->

                                💾 Registrar Link Presupuesto</a>

                                <!--:::::::::::::::::::::::-->



                               

                    </div>

                    <div class="col-md">

 <!--descargar el archivo -->



 <?php 

 

//::::::::: ENLACE PRESUPUESTO  ::::::::::::::::::::::::::::::::::::::::

$query = "SELECT * FROM monitor_archivos_guardados  WHERE id_generalidad_proyecto = ? and presupuesto = 1";

$data3 = $net_rrhh->prepare($query);

$data3->execute([$valor]);

while ($data = $data3->fetch()) {

    $nombreArchivoSubido = $data['ruta_archivo'];

}

 

 ?>

 <p ><b>ENLACE DEL PRESUPUESTO:</b> <?php if(isset($nombreArchivoSubido)) { ?> 
👉🏻<!--<?php // echo '/view/Monitoreo/SERVIDORMONITOREO/'.$nombreArchivoSubido; ?>">descargar</a>// } else { ?><span style="background-color: #F5E6BD; border-radius: 12px;">No existe ningun archivo</span>// }-->
 <a  target="_blank" href="<?php echo $nombreArchivoSubido; ?>">VER ARCHIVO</a><?php } else { ?><span style="background-color: #F5E6BD; border-radius: 12px;">No existe ningun archivo</span><?php } ?> </p>



                                <!---->

                    </div>

                    <div class="col-md">

                    <style>

                        .colorRefrescarDatos{

                            background-color: #CFE2FF;

                        }

                    </style>

                    <a type="button" id="refrescarListaPresu"class="btn btn-sm colorRefrescarDatos" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">

  <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"/>

  <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"/>

</svg> REFRESCAR</a>

           

                    </div>

                    

            <div class="col-md-11"><div id="loadListaPresupuestaria"></div></div>

                </div>

           

            </div>

            



<style>

    .colorEncabezadoLista{

        background-color: #4F6FAE;

    }

</style>

   <!-- Modal LISTRA PRESUPUESTARIA INICIO-->

   <div class="modal fade" id="exampleModalPersonal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header colorEncabezadoLista">

        <h5 class="modal-title " id="exampleModalLabel" style="color: white; 

        font-weight: 500;">REGISTRANDO NUEVA LISTA PRESUPUESTARIA</h5>

        <a type="button" class="close" data-bs-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </a>

      </div>

      <div class="modal-body">

        <center>

            <img src="assets/images/folder_3113202.png" width="10%">

        </center>

        <div class="row">

                <!--<input type="hidden" value="<?php echo $idRelacionProyecto; ?>" id="idRelacionProyecto" >-->

                <div class="col">

                   <div class="mb-3">

                   <label for="exampleFormControlInput1" class="form-label ">Nombre de la lista*</label>

                   <textarea class="form-control" id="nombreLista" maxlength="1200" rows="3"></textarea>

                   <!--<input type="text" class="form-control form-control-sm" id="nombreLista" placeholder="escribir">-->

                    </div>

               </div>

               <div class="col">

                   <div class="mb-3">

                   <label for="exampleFormControlInput1" class="form-label">Descripcion de la lista*</label>

                   <textarea class="form-control" id="descripcionLista" maxlength="1200" rows="3"></textarea>

                   <!--<input type="text" class="form-control form-control-sm" id="descripcionLista" placeholder="escribir">-->

                     </div>

               </div>

           </div>



           <div class="row">

                <div class="col">

                   <div class="mb-3">

                   <label for="exampleFormControlInput1" class="form-label">Monto asignado*</label>

                   <input type="number" min="0.01" oninput="validarNumeroConDecimal(this,mensajeError212)" pattern="^[0-9]+$" class="form-control form-control-sm" id="montoAsignado" placeholder="escribir">

                

               <p id="mensajeError212"></p>

                

                </div>

               </div>

           </div>



           <div class="row">

                <div class="col">

                   <div class="mb-3">

                   <label for="exampleFormControlInput1" class="form-label">Fecha de ejecución*</label>

                   <input type="date" class="form-control form-control-sm" value="<?php echo $diaActual;?>"   id="fhEjecucion" placeholder="name@example.com">

                    </div>

               </div>

               <div class="col">

                   <div class="mb-3">

                   <label for="exampleFormControlInput1" class="form-label">Fecha de finalización*</label>

                   <input type="date" class="form-control form-control-sm" id="fhFinalizacion" value="<?php echo $diaActual;?>" min="<?php echo $diaActual;?>" placeholder="name@example.com">

                    </div>

               </div>

           </div>

          

      </div>

      <div class="modal-footer">

        <a type="button" id="cerrarBtn"class="btn  btn-sm btn-danger" data-bs-dismiss="modal">CANCELAR</a>

        <a type="button" id="btnRegistrarListaPresupuesta" class="btn  btn-sm btn-primary">REGISTRAR </a>

      </div>

      <a class="btn btn-success" id="botonCargando"  style="display:none;"type="button" disabled>

  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>

  Loading...

</a>

    </div>

  </div>

</div> 

<!--MODAL LISTA PRESUPUESTARIA FIN-->


<!--::::::::::: MODAL SUBIR EL ENLACE DEL PRESUPUESTO :::::::::::-->
<div class="modal fade" id="subirEnlacePdf" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header colorTituloModal">

        <h5 class="modal-title" style="color:black;" id="exampleModalLabel">REGISTRAR </h5>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

      </div>

     <!-- <form action="process/" method="post" enctype="multipart/form-data">-->

      <div class="modal-body">

            <div class="mb-3">



                <input type="hidden" value="addfilePresupuesto" name="action">

                <input type="hidden" value="monitoreo_proyecto" name="process">



                <input class="form-control" type="hidden" value="<?php echo $idRelacionProyecto; ?>"  name="idEnvio" id="idEnvio">

                <input type="hidden" name="idProyecto" id="idProyecto" value="<?php echo $valor; ?>"/>



               



                <label for="formFile" class="form-label">REGISTRAR LINK DEL ARCHIVO AL SERVIDOR</label>

                <!--<input class="form-control" type="file" name="formFile">-->
                <textarea class="form-control" id="linkSaherPointPresupuesto" rows="3"></textarea>
                

            </div>

      </div>

      <div class="modal-footer">

        <button type="button" id="CERRARMODALPRESIPUESTO" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

        <button type="submit" class="btn btn-primary" id="subirArchivo">GUARDAR LINK</button>

      </div>

    <!--  </form>-->

    </div>

  </div>

</div>

<!--:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->
<!-- MODAL SUBIR PRESUPUESTO -->

<div class="modal fade" id="subirDocumentoPdf" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header colorTituloModal">

        <h5 class="modal-title" style="color:black;" id="exampleModalLabel">SUBIENDO PRESUPUESTO AL SISTEMA</h5>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

      </div>

      <form action="process/" method="post" enctype="multipart/form-data">

      <div class="modal-body">

            <div class="mb-3">



                <input type="hidden" value="addfilePresupuesto" name="action">

                <input type="hidden" value="monitoreo_proyecto" name="process">



                <input class="form-control" type="hidden" value="<?php echo $idRelacionProyecto; ?>"  name="idEnvio" id="idEnvio">

                <input type="hidden" name="idProyecto" id="idProyecto" value="<?php echo $valor; ?>"/>



               



                <label for="formFile" class="form-label">SUBIR ARCHIVO AL SERVIDOR</label>

                <input class="form-control" type="file" name="formFile">

                

               







            </div>

      </div>

      <div class="modal-footer">

        <button type="button" id="cerrarModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

        <button type="submit" class="btn btn-primary" id="subirArchivo">SUBIR ARCHIVO</button>

      </div>

      </form>

    </div>

  </div>

</div>

<!-- FIN MODAL SUBIR PRESUPUESTO -->

            

        </div>

        

        <button id="btnAvance3" style="display: none;" class="btn btn-primary" type="button" disabled>

  <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>

  Guardando avance PARTE TRES, espere un momento...

</button>

        <div class="text-right"style="text-align: right;">

        <button id="btnsession3" type="button" class="btn btn-info">

            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16">

            <path d="M11 2H9v3h2z"/>

            <path d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z"/>

            </svg> Guardar Avance</button>



        </div>

     

        

    </div>







    <div class="codigo hidden mt-3" id="codigo4">

        <!---->

        <h4><b class="estiloLetra">REGISTROS EMPLEADOS 4/5</b></h4>

        <hr>

        <div class="container">

       





<div class="row">

                    <div class="col-md-6">

                    <a type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalPersonal2">

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">

  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"></path>

</svg> REGISTRAR </a>

           

                    </div>

                    <div class="col-md">

                    <style>

                        .colorRefrescarDatos{

                            background-color: #CFE2FF;

                        }

                    </style>

                    <a type="button" id="refrescarPersonalProyecto" class="btn btn-sm colorRefrescarDatos"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">

  <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"></path>

  <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"></path>

</svg> REFRESCAR</a>

           

                    </div>

                </div>



<!--::::::::::::::::: ID TABLA PERSONAS :::::::::::::::::::::::::::::::::::::-->

       <div id="loadListaPersonal">

</div>

<style>

    .colorTitulo{

        background-color: #418CFF;

        color: while;

    }

</style>

<!-- MODAL REGISTRO DEL PERSONAL DEL PROYECTO INICIO -->

<div class="modal fade" id="exampleModalPersonal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header colorTitulo">

        <h5 class="modal-title " id="exampleModalLabel" style="color: white; 

        font-weight: 500;">REGISTRAR NUEVO PERSONAL PARA EL PROYECTO</h5>

        <a type="button" class="close" data-bs-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">×</span>

        </a>

      </div>

      <div class="modal-body">

        <center>

            <img src="assets/images/clipboard_3113123.png" width="10%">

        </center>

        <div class="row">

                <div class="col">

                   <div class="mb-3">

                   <label for="exampleFormControlInput1" class="form-label">Nombre completo*</label>

                   <input type="text" class="form-control form-control-sm" id="nombreCompleto" placeholder="escribir">

                    </div>

               </div>

               <div class="col">

                   <div class="mb-3">

                   <label for="exampleFormControlInput1" class="form-label">Cargo*</label>

                   <input type="text" class="form-control form-control-sm" id="cargoEmpleado" placeholder="escribi">

                     </div>

               </div>

           </div>

           <div class="row">

                <div class="col">

                   <div class="mb-3">

                   <label for="exampleFormControlInput1" class="form-label">Porcentaje de tiempo*</label>

                   <input type="number" class="form-control form-control-sm" oninput="validarPorcentaje(this,mensajeError6)" id="porcentajeTiempo" placeholder="escrbir solo el número">

                <p id="mensajeError6"></p>    

                </div>

               </div>

           </div>

           <div class="row">

                <div class="col">

                   <div class="mb-3">

                   <label for="exampleFormControlInput1" class="form-label">TIPO CONTRATO:*</label>

                   <select class="form-control form-control-sm" id="contratadoPor">

                            <option>CONSULTORIA </option>

                            <option>PLANILLA</option>

                            <!--<option><?php echo $nombreProyecto;?></option>-->

                        </select>

                    </div>

               </div>

           </div>

      </div>

      <div class="modal-footer">

        <a type="button" id="cerrarBtnPersonal" class="btn  btn-sm btn-danger" data-bs-dismiss="modal">CANCELAR</a>

        <a type="button" id="btnRegistrarPersonal" class="btn  btn-sm btn-primary">REGISTRAR </a>

      </div>

      <a class="btn btn-success" id="botonCargandoPersonal" style="display:none;" type="button" disabled="">

  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>

  Loading...

</a>

    </div>

  </div>

</div> 

       </div>

        







       

    </div>



    <div class="codigo hidden mt-3" id="codigo5">

        <!---->

        <h4><b class="estiloLetra">VINCULACION INSTITUCIONAL 5/5</b></h4>

        <hr>

        <div class="row">

           







            <div class="col">

                <div class="row">

                    <div class="col-md-6">

                    <a type="button" class="btn btn-sm btn-success tamañoLetraFormulario" data-bs-toggle="modal" data-bs-target="#exampleModalVinculacionInstitucional">

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">

  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/>

</svg> AGREGAR VINCULACION INSTITUCIONAL</a>

           

                    </div>

                    <div class="col-md">



                    </div>

                    <div class="col-md">

                    <style>

                        .colorRefrescarDatos{

                            background-color: #CFE2FF;

                        }

                    </style>

                    <a type="button" id="refrescarVinculacion"class="btn btn-sm colorRefrescarDatos" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">

  <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"/>

  <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"/>

</svg> REFRESCAR</a>

           

                    </div>

                    <div class="col-md-11">

                    <div id="loadListaVinculacioninstitucional"></div>

                    </div>

                </div>

           

            </div>





           



            <style>

    .colorEncabezadoLista{

        background-color: #4F6FAE;

    }

</style>

   <!-- Modal LISTRA PRESUPUESTARIA INICIO-->

   <div class="modal fade" id="exampleModalVinculacionInstitucional" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header colorEncabezadoLista">

        <h5 class="modal-title " id="exampleModalLabel" style="color: white; 

        font-weight: 500;">REGISTRANDO VINCULACION INSTITUCIONAL</h5>

        <a type="button" class="close" data-bs-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </a>

      </div>

      <div class="modal-body">

        <center>

            <img src="assets/images/decentralized_5966460.png" width="10%">

        </center>

        <div class="row">

                <!--<input type="hidden" value="<?php echo $idRelacionProyecto; ?>" id="idRelacionProyecto" >-->

                <div class="col">

                   <div class="mb-3">

                   <label for="exampleFormControlInput1" class="form-label">Seleccionar area*</label>

                   <select class="form-control form-control-sm"id="area">

                    <option>Transformación educativa</option>

                    <option>Formación hacia el trabajo </option>

                    <option>Gestión y desarrollo </option>

                    <option>Ejecución y monitoreo </option>

                    <option>Comunicaciones </option>

                    <option>Dirección ejecutiva </option>

                </select>

              </div>

               </div>

               <div class="col">

                   <div class="mb-3">

                   <label for="exampleFormControlInput1" class="form-label">Descripcion el apoyo*</label>

                   <textarea type="text"  class="form-control form-control-sm" maxlength="1200" rows="3" id="apoyo" placeholder="escribir"></textarea>

                </div>

               </div>

           </div>



           <div class="row">

                <div class="col">

                   <div class="mb-3">

                   <label for="exampleFormControlInput1" class="form-label">Descripción de recursos que proporciona el proyecto y su relacionamiento:*</label>

                   <textarea type="text"  class="form-control form-control-sm" maxlength="1200" rows="3" id="recursosproporcionados" placeholder="escribir"></textarea>

                 </div>

               </div>

           </div>



          

          

      </div>

      <div class="modal-footer">

        <a type="button" id="cerrarBtnVinculacion"class="btn  btn-sm btn-danger" data-bs-dismiss="modal">CANCELAR</a>

        <a type="button" id="btnRegistrarVinculacionInstitucional" class="btn  btn-sm btn-primary">REGISTRAR </a>

      </div>

      <a class="btn btn-success" id="botonCargando22"  style="display:none;"type="button" disabled>

  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>

  Loading...

</a>

    </div>

  </div>

</div> 

<!--MODAL LISTA PRESUPUESTARIA FIN-->















































        </div>

       

        

        

        

    </div>



    

    



    <!-- Añade más bloques de código según sea necesario -->

    </div>

    <a  type="button" class="btn colorBoton" id="anterior">

    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">

    <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>

    </svg> Anterior</a>



<a  type="button"  class="btn colorBoton" id="siguiente">Siguiente 

    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">

    <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z"/>

    </svg></a>





    <a type="button" class="btn colorBOtonEnviar mx-5" id="registrar" style="display: none; color:white;">

    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16">

  <path d="M11 2H9v3h2z"/>

  <path d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z"/>

</svg> REGISTRAR</a>



    </div>

    <center>

    <div class="col-md-6">

    <a class="btn btn-success" id="btnBaseDeDatos" style="display:none;" type="button" disabled>

  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>

  REGISTRANDO EN BASE DE DATO...

</a>

    </div>

    </center>

   

   

</div>







    

</div>

<script>

                            $(document).ready(function(){

                                // Inicialización del Popover

                                $('[data-toggle="popover"]').popover({

                                trigger: 'hover', // Mostrar el popover al pasar el mouse

                                html: true // Permitir contenido HTML

                                });

                            });

                            </script>



<script>

$("#subirArchivo").click(function(){
    $.post("process/index.php",{
        process: "monitoreo_proyecto",
        action: "addLinkPresupuesto",
        linkSaherPointPresupuesto : $("#linkSaherPointPresupuesto").val(),
        idProyecto : $("#idProyecto").val(),
},
    function(response)
    {
        if(response)
        {
            //document.getElementById("btnAvance1").style.display="none";
            $.toast({
                heading: 'Finalizado',
                text: 'Enlace Guardado',
                showHideTransition: 'slide',
                icon: 'success',
                hideAfter: 5000, 
                position: 'bottom-center'
            });
            document.getElementById("CERRARMODALPRESIPUESTO").click();
        }
        else
        {
            //document.getElementById("btnAvance1").style.display="none";
            $.toast({
                heading: 'ERRORRRRRRR',
                text: 'Enlace No guardado',
                showHideTransition: 'slide',
                icon: 'error',
                hideAfter: 5000, 
                position: 'bottom-center'
            });    
        }      
    })
})

  function detectarEnter(event) {

    // Verificar si la tecla presionada es "Enter"

   

      let valor1 = document.getElementById("montodelcooperante").value;

      let valor2 = document.getElementById("montocontrapartida").value;

      document.getElementById("sumademontos").value = "";

      document.getElementById("sumademontos").value = Number(valor1) + Number(valor2);

      // Puedes agregar aquí el código que deseas ejecutar al presionar Enter

    

  }

</script>

<!--<button id="mostrarToastBtn">Mostrar Toast</button>-->





<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>







<script>

  $(document).ready(function() {



//::::::::::: REGISTRANDO PRIMERA SESIÓN :::::::::::::::::::::::

$("#btnsession1").click(function()

{

    document.getElementById("btnAvance1").style.display="";

    $.post("process/index.php", {

        process: "monitoreo_proyecto",

        action: "addSesionuno",

        codigoproyecto:         $("#codigoproyecto").val(),//

        proyectoconocido:       $("#proyectoconocido").val(),

        codigoasignado:         $("#codigoasignado").val(),

        tipocooperante:         $("#tipocooperante").val(),

        nombrecooperante:       $("#nombrecooperante").val(), 

        paginaweb:              $("#paginaweb").val(), 

        consorcio:              $("#consorcio").val(), 

        nombreprime:            $("#nombreprime").val(),

        aporteproyecto:         $("#aporteproyecto").val(),

        organizacionsocia:      $("#organizacionsocia").val(),

        nombredelaorganizacion: $("#nombredelaorganizacion").val(),

        idRelacion : $("#idRelacionProyecto").val(),



    },

    function(response)

    {

        if(response)

        {

            document.getElementById("btnAvance1").style.display="none";

            $.toast({

                heading: 'Finalizado',

                text: 'Avance Guardado',

                showHideTransition: 'slide',

                icon: 'success',

                hideAfter: 5000, 

                position: 'bottom-center'

            });

        }

        else

        {

            document.getElementById("btnAvance1").style.display="none";

            $.toast({

                heading: 'ERRORRRRRRR',

                text: 'Avance No guardado',

                showHideTransition: 'slide',

                icon: 'error',

                hideAfter: 5000, 

                position: 'bottom-center'

            });    

        }      

    });

});

//btnsession2 <--- BTN GUARDAR AVANCE SEGUNDA SESIÓN 

$("#btnsession2").click(function()

{

    document.getElementById("btnAvance2").style.display="";

    $.post("process/index.php", {

        process: "monitoreo_proyecto",

        action: "addSesiondos",

        

        otrosespecifique:         $("#otrosespecifique").val(),

        fhinicio:         $("#fhinicio").val(),

        fhcierre:         $("#fhcierre").val(),

        numerobeneficiario:       $("#numerobeneficiario").val(), 

        idRelacion : $("#idRelacionProyecto").val(),



    },

    function(response)

    {

        if(response)

        {

            document.getElementById("btnAvance2").style.display="none";

            $.toast({

                heading: 'Finalizado',

                text: 'Avance Guardado',

                showHideTransition: 'slide',

                icon: 'success',

                hideAfter: 5000, 

                position: 'bottom-center'

            });

        }

        else

        {

            document.getElementById("btnAvance2").style.display="none";

            $.toast({

                heading: 'ERRORRRRRRR',

                text: 'Avance No guardado',

                showHideTransition: 'slide',

                icon: 'error',

                hideAfter: 5000, 

                position: 'bottom-center'

            });    

        }      

    });

});



//btnsession3 <--- BTN GUARDAR AVANCE TERCERA SESIÓN 

$("#btnsession3").click(function()

{

    document.getElementById("btnAvance3").style.display="";

    $.post("process/index.php", {

        process: "monitoreo_proyecto",

        action: "addSesiontres",

        

        montodelcooperante:         $("#montodelcooperante").val(),

        proyectopossecontrapartida:         $("#proyectopossecontrapartida").val(),

        montocontrapartida:         $("#montocontrapartida").val(),

        sumademontos:       $("#sumademontos").val(), 

        idRelacion : $("#idRelacionProyecto").val(),



    },

    function(response)

    {

        if(response)

        {

            document.getElementById("btnAvance3").style.display="none";

            $.toast({

                heading: 'Finalizado',

                text: 'Avance Guardado',

                showHideTransition: 'slide',

                icon: 'success',

                hideAfter: 5000, 

                position: 'bottom-center'

            });

        }

        else

        {

            document.getElementById("btnAvance3").style.display="none";

            $.toast({

                heading: 'ERRORRRRRRR',

                text: 'Avance No guardado',

                showHideTransition: 'slide',

                icon: 'error',

                hideAfter: 5000, 

                position: 'bottom-center'

            });    

        }      

    });

});

    //:::::::::::::: REGISTRANDO PERSONAL DEL PROYECTO :::::::::::::::::::::::::::::::::::::::

$("#btnRegistrarPersonal").click(function() {

           document.getElementById("botonCargandoPersonal").style.display="";

            $.post("process/index.php", {

                process: "monitoreo_proyecto",

                action: "addPersonalProyeto",

                

                

                nombreCompleto: $("#nombreCompleto").val(), 

                cargoEmpleado: $("#cargoEmpleado").val(), 

                porcentajeTiempo: $("#porcentajeTiempo").val(), 

                contratadoPor: $("#contratadoPor").val(), 

                idRelacion : $("#idRelacionProyecto").val(),



            },

            function(response){

                if(response)

                {

                    document.getElementById("botonCargandoPersonal").style.display="none";

                $.toast({

                    heading: 'Finalizado',

                    text: 'Personal del Proyecto Agregado',

                    showHideTransition: 'slide',

                    icon: 'success',

                    hideAfter: 5000, 

                    position: 'bottom-center'

                });

                document.getElementById("cerrarBtnPersonal").click();

                $("#loadListaPersonal").load("view/Monitoreo/Monitoreo.tabla.personalproyecto.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

                }

                else

                {

                    document.getElementById("botonCargandoPersonal").style.display="none";

                $.toast({

                    heading: 'ERRORRRRRRR',

                    text: 'Problemas al registrar la vinculacion',

                    showHideTransition: 'slide',

                    icon: 'error',

                    hideAfter: 5000, 

                    position: 'bottom-center'

                });

                

                }

                

            });

        });





    //LISTA PERSONAL :::::::::::::::::::::::::::::::

$("#loadListaPersonal").load("view/Monitoreo/Monitoreo.tabla.personalproyecto.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

    $("#refrescarPersonalProyecto").click(function(){

        $("#loadListaPersonal").load("view/Monitoreo/Monitoreo.tabla.personalproyecto.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

    $.toast({

        text : 'Informacion cargada',

        showHideTransition: 'slide',

                    icon: '',

                    hideAfter: 5000, 

                    position: 'bottom-left'

    })

    });







    $('#proyectopossecontrapartida').change(function(){

        if($("#proyectopossecontrapartida").val() == "No")

        {

            $("#montocontrapartida").prop('disabled',true);

            let valor1 = document.getElementById("montodelcooperante").value;

            document.getElementById("montocontrapartida").value = 0;

            document.getElementById("sumademontos").value = "";

            document.getElementById("sumademontos").value = Number(valor1) + 0;

        }

        else

        {

            $("#montocontrapartida").prop('disabled',false);

        }

        

    })

    

    //POBLACION META NUMEROS ESPERADOS ::::::::::::::::::::::

    $("#loadListaPoblacionMetaNumero").load("view/Monitoreo/Monitoreo.tabla.numero.poblacionmeta.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

    $("#refrescarPoblacionMeta").click(function(){

        $("#loadListaPoblacionMetaNumero").load("view/Monitoreo/Monitoreo.tabla.numero.poblacionmeta.php",{

            idRelacion : $("#idRelacionProyecto").val()

        });

    });

    //PROGRAMAS Y AREAS ::::::::::::::::::::::::::::::::::::

    $("#loadListaAreasSubProgramas").load("view/Monitoreo/Monitoreo.tabla.areasyprogramas.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

    $("#refrescarAreasyProgramas").click(function(){

        $("#loadListaAreasSubProgramas").load("view/Monitoreo/Monitoreo.tabla.areasyprogramas.php",{

            idRelacion : $("#idRelacionProyecto").val()

        });

    });

    //PRODUCTOS GENERADOS ::::::::::::::::::::::::::::::

    $("#loadListaProductosGenerados").load("view/Monitoreo/Monitoreo.tabla.productos.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

    $("#refrescarProductos").click(function(){

        $("#loadListaProductosGenerados").load("view/Monitoreo/Monitoreo.tabla.productos.php",{

            idRelacion : $("#idRelacionProyecto").val()

        });

    });

    //METAS E INDICADORES ::::::::::::::::::::::::::::::

     $("#loadListaMetasIndicadores").load("view/Monitoreo/Monitoreo.tabla.meta.activiades.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

    $("#refrescarMeta").click(function(){

        $("#loadListaMetasIndicadores").load("view/Monitoreo/Monitoreo.tabla.meta.activiades.php",{

            idRelacion : $("#idRelacionProyecto").val()

        });

    });

    //RESULTADOS  ::::::::::::::::::::::::::::::::::::::

    $("#loadListaResultado").load("view/Monitoreo/Monitoreo.tabla.resultados.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

    $("#refrescarResultados").click(function(){

        $("#loadListaResultado").load("view/Monitoreo/Monitoreo.tabla.resultados.php",{

            idRelacion : $("#idRelacionProyecto").val()

        });

    });

    //OBJETIVOS ESPECIFICOS ::::::::::::::::::::::::::::

    $("#loadListaObjetivoEspecifico").load("view/Monitoreo/Monitoreo.tabla.obj.especifico.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

    $("#refrescarObjEspecifico").click(function(){

        $("#loadListaObjetivoEspecifico").load("view/Monitoreo/Monitoreo.tabla.obj.especifico.php",{

            idRelacion : $("#idRelacionProyecto").val()

        });

    });

    //OBJETIVOS GENERALES ::::::::::::::::::::::::::::

    $("#loadListaObjetivoGeneral").load("view/Monitoreo/Monitoreo.tabla.obj.general.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

    $("#refrescarObjGeneral").click(function(){

        $("#loadListaObjetivoGeneral").load("view/Monitoreo/Monitoreo.tabla.obj.general.php",{

            idRelacion : $("#idRelacionProyecto").val()

        });

    });

    //LINE PRESUPUESTARIA ::::::::::::::::::::::::::::

    $("#loadListaPresupuestaria").load("view/Monitoreo/Monitoreo.tabla.listapresupuestaria.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

    $("#refrescarListaPresu").click(function(){

        $("#loadListaPresupuestaria").load("view/Monitoreo/Monitoreo.tabla.listapresupuestaria.php",{

            idRelacion : $("#idRelacionProyecto").val()

        });

    });

    //ZONA DE INFLUENCIA ::::::::::::::::::::::

    $("#loadListaZonaInfluencia").load("view/Monitoreo/Monitoreo.tabla.zonainfluencia.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

    $("#refrescarzona").click(function(){

        $("#loadListaZonaInfluencia").load("view/Monitoreo/Monitoreo.tabla.zonainfluencia.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

    });

    //POBLACION META :::::::::::::::::::::::::

    $("#loadListaPoblacionMeta").load("view/Monitoreo/Monitoreo.tabla.poblacionmeta.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

    $("#refrescarpoblacion").click(function(){

        $("#loadListaPoblacionMeta").load("view/Monitoreo/Monitoreo.tabla.poblacionmeta.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

    $.toast({

        text : 'Informacion cargada',

        showHideTransition: 'slide',

                    icon: '',

                    hideAfter: 5000, 

                    position: 'bottom-left'

    })

    });

    //SECTOR DIRIGIDO :::::::::::::::::::::::::::::::

    $("#loadListaSectorDirigido").load("view/Monitoreo/Monitoreo.tabla.sectordirigido.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

    $("#refrescarsector").click(function(){

        $("#loadListaSectorDirigido").load("view/Monitoreo/Monitoreo.tabla.sectordirigido.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

    $.toast({

        text : 'Informacion cargada',

        showHideTransition: 'slide',

                    icon: '',

                    hideAfter: 5000, 

                    position: 'bottom-left'

    })

    });

    //VINCULACION INSTITUCIONAL :::::::::::::::::::::::::::::::

       $("#loadListaVinculacioninstitucional").load("view/Monitoreo/Monitoreo.tabla.vinculacioninstitucional.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

    $("#refrescarVinculacion").click(function(){

        $("#loadListaVinculacioninstitucional").load("view/Monitoreo/Monitoreo.tabla.vinculacioninstitucional.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

    $.toast({

        text : 'Informacion cargada',

        showHideTransition: 'slide',

                    icon: '',

                    hideAfter: 5000, 

                    position: 'bottom-left'

    })

    });



//:::::::::::::: REGISTRANDO VINCULACION INSTITUCIONAL :::::::::::::::::::::::::::::::::::::::

$("#btnRegistrarVinculacionInstitucional").click(function() {

           document.getElementById("botonCargando22").style.display="";

            $.post("process/index.php", {

                process: "monitoreo_proyecto",

                action: "addvinculacioninstitucional",



                area: $("#area").val(), 

                apoyo: $("#apoyo").val(), 

                recursosproporcionados: $("#recursosproporcionados").val(), 

                idRelacion : $("#idRelacionProyecto").val()



            },

            function(response){

                if(response)

                {

                    document.getElementById("botonCargando22").style.display="none";

                $.toast({

                    heading: 'Finalizado',

                    text: 'Vinculacion Agregada ',

                    showHideTransition: 'slide',

                    icon: 'success',

                    hideAfter: 5000, 

                    position: 'bottom-center'

                });

                document.getElementById("cerrarBtnVinculacion").click();

                $("#loadListaVinculacioninstitucional").load("view/Monitoreo/Monitoreo.tabla.vinculacioninstitucional.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

                }

                else

                {

                    document.getElementById("botonCargando").style.display="none";

                $.toast({

                    heading: 'ERRORRRRRRR',

                    text: 'Problemas al registrar la vinculacion',

                    showHideTransition: 'slide',

                    icon: 'error',

                    hideAfter: 5000, 

                    position: 'top-center'

                });

                

                }

                

            });

        });  

//:::::::::::::: REGISTRAR  NUMERO DE POBLACION META A DETALLE :::::::::::::::::::::

$("#btnRegistrarNumeroPoblacionMeta").click(function() {

           document.getElementById("botonCargandoBtnPoblacionMeta").style.display="";

            $.post("process/index.php", {

                process: "monitoreo_proyecto",

                action: "addpoblacionMetaDetalle",



                poblacionMetaDetalle: $("#poblacionMetaDetalle").val(), 

                cantidadPoblacion: $("#cantidadPoblacionMeta").val(), 

                idRelacion : $("#idRelacionProyecto").val()



            },

            function(response){

                if(response)

                {

                    document.getElementById("botonCargandoBtnPoblacionMeta").style.display="none";

                $.toast({

                    heading: 'Finalizado',

                    text: 'Sector dirigido Agregado',

                    showHideTransition: 'slide',

                    icon: 'success',

                    hideAfter: 5000, 

                    position: 'bottom-center'

                });

                document.getElementById("cerrarBtnPoblacionMeta").click();

                $("#loadListaPoblacionMetaNumero").load("view/Monitoreo/Monitoreo.tabla.numero.poblacionmeta.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

                }

                else

                {

                    document.getElementById("botonCargando").style.display="none";

                $.toast({

                    heading: 'ERRORRRRRRR',

                    text: 'Problemas al registrar el sector',

                    showHideTransition: 'slide',

                    icon: 'error',

                    hideAfter: 5000, 

                    position: 'top-center'

                });

                

                }

                

            });

        });  

//:::::::::::::: REGISTRANDO SECTOR DIRIGIDO :::::::::::::::::::::::::::::::::::::::

$("#btnRegistrarSector").click(function() {

           document.getElementById("botonCargando").style.display="";

            $.post("process/index.php", {

                process: "monitoreo_proyecto",

                action: "addsectordirigido",



                sectordirigida: $("#sectordirigida").val(), 

                idRelacion : $("#idRelacionProyecto").val()



            },

            function(response){

                if(response)

                {

                    document.getElementById("botonCargando").style.display="none";

                $.toast({

                    heading: 'Finalizado',

                    text: 'Sector dirigido Agregado',

                    showHideTransition: 'slide',

                    icon: 'success',

                    hideAfter: 5000, 

                    position: 'bottom-center'

                });

                document.getElementById("cerrarBtnSector").click();

                $("#loadListaSectorDirigido").load("view/Monitoreo/Monitoreo.tabla.sectordirigido.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

                }

                else

                {

                    document.getElementById("botonCargando").style.display="none";

                $.toast({

                    heading: 'ERRORRRRRRR',

                    text: 'Problemas al registrar el sector',

                    showHideTransition: 'slide',

                    icon: 'error',

                    hideAfter: 5000, 

                    position: 'top-center'

                });

                

                }

                

            });

        });  

//:::::::::::::: REGISTRANDO POBLACION  META :::::::::::::::::::::::::::::::::::::::

$("#btnRegistrarPoblacion").click(function() {

           document.getElementById("botonCargando").style.display="";

            $.post("process/index.php", {

                process: "monitoreo_proyecto",

                action: "addpoblacionmeta",



                zonainfluencia: $("#poblacionprincipal").val(), 

                idRelacion : $("#idRelacionProyecto").val()



            },

            function(response){

                if(response)

                {

                    document.getElementById("botonCargando").style.display="none";

                $.toast({

                    heading: 'Finalizado',

                    text: 'Poblacion Meta Agregada',

                    showHideTransition: 'slide',

                    icon: 'success',

                    hideAfter: 5000, 

                    position: 'bottom-center'

                });

                document.getElementById("cerrarBtnPoblacion").click();

                $("#loadListaPoblacionMeta").load("view/Monitoreo/Monitoreo.tabla.poblacionmeta.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

                }

                else

                {

                    document.getElementById("botonCargando").style.display="none";

                $.toast({

                    heading: 'ERRORRRRRRR',

                    text: 'Problemas al registrar la Poblacion',

                    showHideTransition: 'slide',

                    icon: 'error',

                    hideAfter: 5000, 

                    position: 'top-center'

                });

                

                }

                

            });

        }); 

//:::::::::::::: REGISTRANDO METAS Y RESULTADOS :::::::::::::::::::::::::::::::::::::::::::::::::::

$("#btnRegistrarMetasIndicadores").click(function() {

           document.getElementById("botonCargandoMetasIndicadores").style.display="";

            $.post("process/index.php", {

                process: "monitoreo_proyecto",

                action: "addmetasindicadores",



                metaoindicador: $("#metaoindicador").val(), 
                tipo: $("#tipo").val(), 
                idRelacion : $("#idRelacionProyecto").val(),
                fh_finalizacion : $("#fh_finalizacion").val()



            },

            function(response){

                if(response)

                {

                    document.getElementById("botonCargandoMetasIndicadores").style.display="none";

                $.toast({

                    heading: 'Finalizado',

                    text: 'Meta o Indicador Agregado',

                    showHideTransition: 'slide',

                    icon: 'success',

                    hideAfter: 5000, 

                    position: 'bottom-center'

                });

                document.getElementById("cerrarBtnMetasIndicadores").click();

                $("#loadListaMetasIndicadores").load("view/Monitoreo/Monitoreo.tabla.meta.activiades.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

                }

                else

                {

                    document.getElementById("botonCargando").style.display="none";

                $.toast({

                    heading: 'ERRORRRRRRR',

                    text: 'Problemas al registrar Meta o Indicador',

                    showHideTransition: 'slide',

                    icon: 'error',

                    hideAfter: 5000, 

                    position: 'top-center'

                });

                

                }

                

            });

        });

//:::::::::::::: REGISTRANDO RESULTADOS :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

$("#btnRegistrarResultado").click(function() {

           document.getElementById("botonCargandoResultado").style.display="";

            $.post("process/index.php", {

                process: "monitoreo_proyecto",

                action: "addresultado",



                resultado: $("#resultado").val(), 

                idRelacion : $("#idRelacionProyecto").val()



            },

            function(response){

                if(response)

                {

                    document.getElementById("botonCargandoResultado").style.display="none";

                $.toast({

                    heading: 'Finalizado',

                    text: 'Resultado Agregado',

                    showHideTransition: 'slide',

                    icon: 'success',

                    hideAfter: 5000, 

                    position: 'bottom-center'

                });

                document.getElementById("cerrarBtnResultado").click();

                $("#loadListaResultado").load("view/Monitoreo/Monitoreo.tabla.resultados.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

                }

                else

                {

                    document.getElementById("botonCargando").style.display="none";

                $.toast({

                    heading: 'ERRORRRRRRR',

                    text: 'Problemas al registrar Resultado',

                    showHideTransition: 'slide',

                    icon: 'error',

                    hideAfter: 5000, 

                    position: 'top-center'

                });

                

                }

                

            });

        });

//:::::::::::::: REGISTRANDO  AREAS / SUBPROGRAMAS INSTITUCIONALES A CARGO ::::::::::::::::::::::::

$("#btnRegistrarAreaSubprograma").click(function() {

           document.getElementById("botonCargandoAreasProgramas").style.display="";

            $.post("process/index.php", {

                process: "monitoreo_proyecto",

                action: "addareassubprogramas",



                areassubprogramas: $("#areassubprogramas").val(), 

                aporteDelProyectoArea: $("#aporteDelProyectoArea").val(),

                idRelacion : $("#idRelacionProyecto").val()



            },

            function(response){

                if(response)

                {

                    document.getElementById("botonCargandoAreasProgramas").style.display="none";

                $.toast({

                    heading: 'Finalizado',

                    text: 'Área/SubPrograma Agregado',

                    showHideTransition: 'slide',

                    icon: 'success',

                    hideAfter: 5000, 

                    position: 'bottom-center'

                });

                document.getElementById("cerrarBtnAreasProgramasCerrar").click();

                $("#loadListaAreasSubProgramas").load("view/Monitoreo/Monitoreo.tabla.areasyprogramas.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

                }

                else

                {

                    document.getElementById("botonCargandoAreasProgramas").style.display="none";

                $.toast({

                    heading: 'ERRORRRRRRR',

                    text: 'Problemas al registrar Área / SubPrograma',

                    showHideTransition: 'slide',

                    icon: 'error',

                    hideAfter: 5000, 

                    position: 'top-center'

                });

                

                }

                

            });

        });

//:::::::::::::: REGISTRANDO PRODUCTOS GENERADOS   ::::::::::::::::::::::::::::::::::::::::::::::::

$("#btnRegistrarProductosGenerados").click(function() {

           document.getElementById("botonCargandoProductosGenerados").style.display="";

            $.post("process/index.php", {

                process: "monitoreo_proyecto",

                action: "addproductogenerado",



                productoGenerado: $("#productoGenerado").val(), 

                idRelacion : $("#idRelacionProyecto").val()



            },

            function(response){

                if(response)

                {

                    document.getElementById("botonCargandoProductosGenerados").style.display="none";

                $.toast({

                    heading: 'Finalizado',

                    text: 'Producto Agregado',

                    showHideTransition: 'slide',

                    icon: 'success',

                    hideAfter: 5000, 

                    position: 'bottom-center'

                });

                document.getElementById("cerrarBtnProductosGenerados").click();

                $("#loadListaProductosGenerados").load("view/Monitoreo/Monitoreo.tabla.productos.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

                }

                else

                {

                    document.getElementById("botonCargandoProductosGenerados").style.display="none";

                $.toast({

                    heading: 'ERRORRRRRRR',

                    text: 'Problemas al registrar Producto',

                    showHideTransition: 'slide',

                    icon: 'error',

                    hideAfter: 5000, 

                    position: 'top-center'

                });

                

                }

                

            });

        });

//:::::::::::::: REGISTRANDO OBJETIVOS ESPECIFICOS ::::::::::::::::::::::::::::::::::::::::::::::::

$("#btnRegistrarObjEspecificos").click(function() {

           document.getElementById("botonCargandoEspecifico").style.display="";

            $.post("process/index.php", {

                process: "monitoreo_proyecto",

                action: "addobjespecifico",



                objetivoEspecifico: $("#objetivoEspecifico").val(), 

                idRelacion : $("#idRelacionProyecto").val()



            },

            function(response){

                if(response)

                {

                    document.getElementById("botonCargandoEspecifico").style.display="none";

                $.toast({

                    heading: 'Finalizado',

                    text: 'Objetivo Especifico Agregado',

                    showHideTransition: 'slide',

                    icon: 'success',

                    hideAfter: 5000, 

                    position: 'bottom-center'

                });

                document.getElementById("cerrarBtnObjEspecifico").click();

                $("#loadListaObjetivoEspecifico").load("view/Monitoreo/Monitoreo.tabla.obj.especifico.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

                }

                else

                {

                    document.getElementById("botonCargando").style.display="none";

                $.toast({

                    heading: 'ERRORRRRRRR',

                    text: 'Problemas al registrar objetivo Especifico',

                    showHideTransition: 'slide',

                    icon: 'error',

                    hideAfter: 5000, 

                    position: 'top-center'

                });

                

                }

                

            });

        });



//:::::::::::::: REGISTRANDO OBJETIVOS GENERALES ::::::::::::::::::::::::::::::::::objetivoproyecto

$("#btnRegistrarObjGeneral").click(function() {

           document.getElementById("botonCargando").style.display="";

            $.post("process/index.php", {

                process: "monitoreo_proyecto",

                action: "addobjgeneral",



                objetivoGeneral: $("#objetivoGeneral").val(), 

                idRelacion : $("#idRelacionProyecto").val()



            },

            function(response){

                if(response)

                {

                    document.getElementById("botonCargando").style.display="none";

                $.toast({

                    heading: 'Finalizado',

                    text: 'Objetivo General Agregado',

                    showHideTransition: 'slide',

                    icon: 'success',

                    hideAfter: 5000, 

                    position: 'bottom-center'

                });

                document.getElementById("cerrarBtnZona").click();

                $("#loadListaObjetivoGeneral").load("view/Monitoreo/Monitoreo.tabla.obj.general.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

                }

                else

                {

                    document.getElementById("botonCargando").style.display="none";

                $.toast({

                    heading: 'ERRORRRRRRR',

                    text: 'Problemas al registrar objetivo general',

                    showHideTransition: 'slide',

                    icon: 'error',

                    hideAfter: 5000, 

                    position: 'top-center'

                });

                

                }

                

            });

        });



//:::::::::::::: REGISTRANDO ZONA DE INFLUENCIA :::::::::::::::::::::::::::::::::::::::

$("#btnRegistrarZona").click(function() {

           document.getElementById("botonCargando").style.display="";

            $.post("process/index.php", {

                process: "monitoreo_proyecto",

                action: "addzonainfluencia",



                zonainfluencia: $("#zonainfluencia").val(), 

                idRelacion : $("#idRelacionProyecto").val()



            },

            function(response){

                if(response)

                {

                    document.getElementById("botonCargando").style.display="none";

                $.toast({

                    heading: 'Finalizado',

                    text: 'Zona Agregada ',

                    showHideTransition: 'slide',

                    icon: 'success',

                    hideAfter: 5000, 

                    position: 'bottom-center'

                });

                document.getElementById("cerrarBtnZona3").click();

                $("#loadListaZonaInfluencia").load("view/Monitoreo/Monitoreo.tabla.zonainfluencia.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

                }

                else

                {

                    document.getElementById("cerrarBtnZona3").style.display="none";

                $.toast({

                    heading: 'ERRORRRRRRR',

                    text: 'Problemas al registrar la zona ',

                    showHideTransition: 'slide',

                    icon: 'error',

                    hideAfter: 5000, 

                    position: 'top-center'

                });

                

                }

                

            });

        });    

//:::::::::::::: REGISTRANDO LISTA PRESUPUESTARIA ::::::::::::::::::::::::::::::::::::::::

    $("#btnRegistrarListaPresupuesta").click(function() {

           document.getElementById("botonCargando").style.display="";

            $.post("process/index.php", {

                process: "monitoreo_proyecto",

                action: "addlistaPresupuesta",



                nombreLista: $("#nombreLista").val(), 

                descripcionLista: $("#descripcionLista").val(),

                montoAsignado: $("#montoAsignado").val(), 

                fhEjecucion: $("#fhEjecucion").val(), 

                fhFinalizacion: $("#fhFinalizacion").val(),

                idRelacion : $("#idRelacionProyecto").val()



            },

            function(response){

                if(response)

                {

                    document.getElementById("botonCargando").style.display="none";

                $.toast({

                    heading: 'Finalizado',

                    text: 'Lista presupuestaria agregada correctamente',

                    showHideTransition: 'slide',

                    icon: 'success',

                    hideAfter: 5000, 

                    position: 'bottom-center'

                });

                document.getElementById("cerrarBtn").click();

                $("#loadListaPresupuestaria").load("view/Monitoreo/Monitoreo.tabla.listapresupuestaria.php",{

            idRelacion : $("#idRelacionProyecto").val()

        });

                }

                else

                {

                    document.getElementById("botonCargando").style.display="none";

                $.toast({

                    heading: 'ERRORRRRRRR',

                    text: 'Problemas al registrar la lista presupuestaria',

                    showHideTransition: 'slide',

                    icon: 'error',

                    hideAfter: 5000, 

                    position: 'top-center'

                });

                

                }

                

            });

        });





//:::::::::::::: REGISTRANDO FICHA ENCABEZADO ::::::::::::::::::::::::::::::::::::::::

    $("#registrar").click(function() {

           document.getElementById("btnBaseDeDatos").style.display="";

           document.getElementById("registrar").style.display="none";

            $.post("process/index.php", {

                process: "monitoreo_proyecto",

                action: "addficha", 



                codigoproyecto: $("#codigoproyecto").val(), 

                proyectoconocido: $("#proyectoconocido").val(), 

                codigoasignado: $("#codigoasignado").val(), 

                tipocooperante: $("#tipocooperante").val(), 

                nombrecooperante: $("#nombrecooperante").val(), 



                paginaweb: $("#paginaweb").val(), 

                consorcio: $("#consorcio").val(), 

                nombreprime: $("#nombreprime").val(), 

                organizacionsocia: $("#organizacionsocia").val(), 

                nombredelaorganizacion: $("#nombredelaorganizacion").val(), 



                aporteproyecto: $("#aporteproyecto").val(), 

                objetivoproyecto: $("#objetivoproyecto").val(), 

                otrosespecifique: $("#otrosespecifique").val(), 

                metasyresultados: $("#metasyresultados").val(), 



                productosgenerados: $("#productosgenerados").val(), 

                areaacargo: $("#areaacargo").val(), 

                fhinicio: $("#fhinicio").val(), 

                fhcierre: $("#fhcierre").val(), 



                

                numerobeneficiario: $("#numerobeneficiario").val(), 

                montodelcooperante: $("#montodelcooperante").val(), 

                proyectopossecontrapartida: $("#proyectopossecontrapartida").val(), 

                montocontrapartida: $("#montocontrapartida").val(), 



                sumademontos: $("#sumademontos").val(), 

                idRelacion : $("#idRelacionProyecto").val()

            },

            function(response){

                if(response==1)

                {

                    document.getElementById("btnBaseDeDatos").style.display="none";

                    //document.getElementById("registrar").style.display="";

                $.toast({

                    heading: 'Finalizado',

                    text: 'Ficha agregada correctamente ',

                    showHideTransition: 'slide',

                    icon: 'success',

                    hideAfter: 2000, 

                    position: 'bottom-center'

                });

                // Esperar 6 segundos antes de redirigir

    setTimeout(function () {

        // Redirigir a la página deseada

        window.location.href = "http://sii.fusalmo.org/?view=monitoreo";

    }, 3000); // 6000 milisegundos = 6 segundos

                }

                else if(response == 3)

                {

                    document.getElementById("btnBaseDeDatos").style.display="none";

                    document.getElementById("registrar").style.display="";

                    $.toast({

                    heading: 'ERRORRRRRRR',

                    text: 'Registrar las listas presupuestarias ',

                    showHideTransition: 'slide',

                    icon: 'error',

                    hideAfter: 5000, 

                    position: 'top-center'

                    });

                }

                else

                {

                    document.getElementById("btnBaseDeDatos").style.display="none";

                    document.getElementById("registrar").style.display="";

                $.toast({

                    heading: 'ERRORRRRRRR',

                    text: 'Problemas al registrar la ficha ',

                    showHideTransition: 'slide',

                    icon: 'error',

                    hideAfter: 5000, 

                    position: 'top-center'

                });

                

                }

                

            });

        });













        let currentCodigo = 1;

const totalCodigos = $('.codigo').length;



// Mostrar el primer bloque de código al cargar la página

$(`#codigo${currentCodigo}`).removeClass('hidden');



// Función para actualizar la visibilidad de los botones

function actualizarVisibilidadBotones() {

    if (currentCodigo === 1) {

        // Si estamos en el primer bloque, ocultar el botón "Anterior"

        $('#anterior').hide();

    } else {

        $('#anterior').show();

    }



    if (currentCodigo === totalCodigos) {

        // Si estamos en el último bloque, ocultar el botón "Siguiente" y mostrar el botón de envío

        $('#siguiente').hide();

        $('#registrar').show();

    } else {

        $('#siguiente').show();

        $('#registrar').hide();

    }

}



// Manejar el clic en el botón "Siguiente"

$('#siguiente').click(function() {

    // Ocultar el bloque de código actual

    $(`#codigo${currentCodigo}`).addClass('hidden');



    // Incrementar el índice para mostrar el siguiente bloque de código

    currentCodigo++;



    // Verificar si hay más bloques de código

    if (currentCodigo <= totalCodigos) {

        // Mostrar el siguiente bloque de código

        $(`#codigo${currentCodigo}`).removeClass('hidden');

    } else {

        // Si no hay más bloques, reiniciar desde el principio

        currentCodigo = 1;

        $(`#codigo${currentCodigo}`).removeClass('hidden');

    }



    // Actualizar la visibilidad de los botones

    actualizarVisibilidadBotones();

});



// Manejar el clic en el botón "Anterior"

$('#anterior').click(function() {

    // Ocultar el bloque de código actual

    $(`#codigo${currentCodigo}`).addClass('hidden');



    // Decrementar el índice para mostrar el bloque de código anterior

    currentCodigo--;



    // Verificar si hay un bloque de código anterior

    if (currentCodigo >= 1) {

        // Mostrar el bloque de código anterior

        $(`#codigo${currentCodigo}`).removeClass('hidden');

    } else {

        // Si no hay más bloques hacia atrás, ir al último bloque

        currentCodigo = totalCodigos;

        $(`#codigo${currentCodigo}`).removeClass('hidden');

    }



    // Actualizar la visibilidad de los botones

    actualizarVisibilidadBotones();

});



// Llamada inicial para establecer la visibilidad de los botones al cargar la página

actualizarVisibilidadBotones();



    





  });



  

</script>

