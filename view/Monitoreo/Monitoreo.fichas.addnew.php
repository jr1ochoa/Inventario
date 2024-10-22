<?php  include("../../config/net.php");?>

<style>

    /* Agrega estilos según tu preferencia */

.hidden {

  display: none;

}

.colorBoton{

                background-color: #F5E6BD;

            }

#codigo-container {

  margin-bottom: 20px;

}

.estiloLetra{

    font-weight: 700;

    background-color: #FEF2D4;

    padding-left: 12px;

    padding-right: 12px;

    padding-top: 5px;

    padding-bottom: 5px;

    border-radius: 12px;

}

.fondoImagen {

    margin: 0;

    padding: 0;

    padding-top: 5px;

    background-image: url('assets/images/fondo2Prueba.jpg'); /* Reemplaza 'ruta_de_tu_imagen.jpg' con la ruta de tu imagen de fondo */

    background-size: cover;

    background-position: center;

    height: 30vh;

    display: flex;

    align-items: center;

    justify-content: center;

    border-radius: 5px;

    

}

.colorTextoFondo{

    color: black;

    font-weight: 700;

}

.fondoColor{

    background-color: #D7D8D8;

    color: white;

    opacity: 0.7; /* Ajusta la opacidad según tus preferencias */

   

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

.tamañoLetraFormulario{

    text-transform: uppercase;

    font-size: 12px;

    font-weight: 600;

}

</style>

<script src="view/Monitoreo/ExpresionRegular.js"></script>

<?php

 $valor = $_REQUEST['idProyecto'];







 $fechaActual = date('Y-m-d');









 $query = "SELECT s1.*, s2.name1,s2.name2,s2.name3,s2.lastname1,s2.lastname2, s3.proyecto 

 FROM monitor_generalidad_proyecto as s1 

 inner join employee as s2 on s1.id_coordinador = s2.id

 inner join monitor_proyecto as s3 on s1.id_proyecto = s3.id WHERE s1.id = ?";

    $data3 = $net_rrhh->prepare($query);

    $data3->execute([$valor]);

    while ($data = $data3->fetch()) 

    {

        $nombreProyecto = $data[14];

        $IDlINK = $data[8];

        $idRelacionProyecto = $data[0];

    }

    //:::::::::::::: BUSCAMOS FICHA ENCABEZADO  ::::::::::::

    $query = "SELECT * FROM monitor_ficha_encabezado WHERE id_proyecto_generalidades  = ".$idRelacionProyecto."";

    $Select = $net_rrhh->prepare($query);

    $Select->execute();

    while ($data = $Select->fetch()) 

    {

        $idFichaEncabezado = $data[0];

        $conocidoCOmo = $data[2];

    }

    //:::::::::::::: BUSCANDO SI YA ESTA REGISTRADO EL MISMO USUARIO CON EL MISMO PROYECTO ::::::::::::

    //echo $idRelacionProyecto;

    $NUMEROCORRELATIVO = 1;

    $query = "SELECT * FROM monitor_detalle_general WHERE id_ficha_encabezado=?";

    $Select2 = $net_rrhh->prepare($query);

    $Select2->execute([$idRelacionProyecto]);

    while ($data = $Select2->fetch()) 

    {

        $NUMEROCORRELATIVO++;

    }

   

?>

<div class="container mb-0 pb-5" >

<?php

$ano_actual = date("Y");

?>

<?php

setlocale(LC_TIME, 'es_ES'); // Establecer la configuración regional a español



$mes_actual = strftime('%B'); // Obtener el nombre del mes



?>

<div class="row">

    <div class="col-md-2">

        <!--Formulario con los datos normales-->

    </div>

    <div class="mt-4 col-md-9 colorDelaFicha" >



    <div class="container">

           







            <div class="fondoImagen">

      

      <div class="row">

          <div class="col-md-8">

         

          </div>

          <div class="col-md">

          <div class="colorTextoFondo ">

          <h1 style="color: #253958;" class="fondoColor mx-3 colorTextoFondo">Reporte de 

              actividades  <?php echo strtoupper($mes_actual);?>  <?php echo $ano_actual; ?>

          </h1>

      </div>

          </div>

      </div>

          

      

      

      

          </div>









        </div>

        <!--Datos a modificar-->

        <div id="codigo-container">

    

    <div class="codigo mt-3" id="codigo1">

        

    <h4> <b class="estiloLetra">INFORMACIÓN GENERAL SOBRE EL PROYECTO  1/7</b></h4>

        <hr>

        <div class="container">

            <div class="row">

                <div class="col">

                    <div class="mb-3">

                    <label for="exampleFormControlInput1" class="form-label tamañoLetraFormulario">PROYECTO CONOCIDO COMO: </label>

                    <input type="text" value="<?php echo $conocidoCOmo;?>" readonly="" class="tamañoInput form-control form-control-sm" id="exampleFormControlInput1">

                    <input type="hidden" value="<?php  echo $idRelacionProyecto;?>" id="idRelacionProyecto">    

                </div>

                </div>

            </div>

            <div class="row">

                <div class="col">

                    <div class="mb-3">

                    <label for="exampleFormControlInput1" class="form-label tamañoLetraFormulario">Fecha de informe *</label>

                    <input type="date" class="form-control form-control-sm" value="<?php echo  $fechaActual;?>" id="fhInforme" placeholder="escribir">

                    </div>

                </div>

                <div class="col">

                    <div class="mb-3">

                    <label for="exampleFormControlTextarea1" class="form-label tamañoLetraFormulario ">Número de informe * </label>

                    <input type="text" class="form-control form-control-sm" readonly="" value="<?php echo $NUMEROCORRELATIVO; ?>" id="numeroInforme" placeholder="escribir">

                    </div>

                </div>

                

            </div>

            <div class="row">

                <div class="col">

                    <div class="mb-3">

                    <label for="exampleFormControlTextarea1" class="form-label tamañoLetraFormulario">Nombre del responsable o coordinador del prime (Sí aplica): </label>

                    <input type="text" class="form-control form-control-sm" id="responsablePrime" placeholder="escribir">

                    </div>

                </div>

                <div class="col">

                    <div class="mb-3">

                    <label for="exampleFormControlTextarea1" class="form-label tamañoLetraFormulario">Contacto del responsable o coordinador del primer: </label>

                    <input type="text" class="form-control form-control-sm" id="contactoPrimer" placeholder="escribir">

                    </div>

                </div>

                

            </div>

           <hr>

           <center><p class="tamañoLetraFormulario" style="background-color: #F1EBE5; ">Otras organizaciones o instituciones vinculadas</p></center>

            <div class="row">

                <div class="col">

                   

                    <div class="row">

                    <div class="col-md-6">

                    <a type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalInstitucionalVinculacion">

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">

  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"></path>

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

                    <a type="button" id="refrescarVinculada" class="btn btn-sm colorRefrescarDatos"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">

  <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"></path>

  <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"></path>

</svg> REFRESCAR</a>

           

                    </div>

                </div>









                </div>



<div id="loadListaOrganizacionVinculada">

</div>





<style>

    .colorEncabezadoLista{

        background-color: #4F6FAE;

    }

</style>

<!-- Modal VINCULACION INSTITUCIONAL INICIO -->

<div class="modal fade" id="exampleModalInstitucionalVinculacion" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header colorEncabezadoLista">

        <h5 class="modal-title " id="exampleModalLabel" style="color: white; 

        font-weight: 500;">REGISTRANDO VINCULACION INSTITUCIONAL</h5>

        <a type="button" class="close" data-bs-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">×</span>

        </a>

      </div>

      <div class="modal-body">

        <center>

            <img src="assets/images/infection_3598689.png" width="10%">

        </center>

        <div class="row">

                <!--<input type="hidden" value="11" id="idRelacionProyecto" >-->

                <div class="col">

                    <div class="mb-3">

                        <label for="exampleFormControlTextarea1" class="form-label">Nombre de la organización: </label>

                        <input type="text" class="form-control form-control-sm" id="nombreOrganizacion" placeholder="escribir">

                    </div>

                   <div class="mb-3">

                        <label for="exampleFormControlInput1" class="form-label">Seleccione el Sector: *</label>

                        <select class="form-control form-control-sm" id="sectorOrganizacion">

                            <option>Privado</option>

                            <option>Municipal </option>

                            <option>Gobierno</option>

                            <option>Educativo </option>

                            <option>ONG </option>

                            <option>Comunicario </option>

                        </select> 

                    </div>

                    <div class="mb-3">

                        <label for="exampleFormControlTextarea1" class="form-label">Tipo de vinculación: </label>

                        <input type="text" class="form-control form-control-sm" id="tipoVinculacion" placeholder="escribir">

                    </div>

               </div>

              

           </div>



           

          

      </div>

      <div class="modal-footer">

        <a type="button" id="cerrarBtnVinculacion" class="btn  btn-sm btn-danger" data-bs-dismiss="modal">CANCELAR</a>

        <a type="button" id="btnRegistrarVinculacionInstitucional" class="btn  btn-sm btn-primary">REGISTRAR </a>

      </div>

      <a class="btn btn-success" id="botonCargandoVincula" style="display:none;" type="button" disabled="">

  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>

  Loading...

</a>

    </div>

  </div>

</div> 

<!-- MODAL VINCULACION INSTITUCIONAL FIN -->









            </div>



          



            

            





        </div>

    </div>



    <!--<div class="codigo mt-3 hidden" id="codigo2">

        <!-- RESUMEN DE INTERVENCION 

        <h4> <b class="estiloLetra">RESUMEN DE INTERVENCIÓN 2/7</b></h4>



        <div class="container">

           

            <div class="row">

                <div class="col">

                    <div class="mb-3">

                    <label for="exampleFormControlInput1" class="form-label">Fecha de INICIO *</label>

                    <input type="date" disabled="" class="form-control form-control-sm" id="exampleFormControlInput1" placeholder="escribir">

                    </div>

                </div>

                <div class="col">

                    <div class="mb-3">

                    <label for="exampleFormControlInput1" class="form-label">Fecha de CIERRE *</label>

                    <input type="date" class="form-control form-control-sm" id="exampleFormControlInput1" placeholder="escribir">

                    </div>

                </div>

                

            </div>

            <div class="row">

                <div class="col">

                    <div class="mb-3">

                        <label for="exampleFormControlTextarea1" class="form-label">Ampliación con adenda: </label>

                        <select class="form-control form-control-sm">

                            <option>Si</option>

                            <option>No </option>

                        </select>

                    </div>

                </div>

            </div>

           

        </div>



    </div>-->



    <div class="codigo mt-3 hidden" id="codigo2">

        <!---->

        <h4><b class="estiloLetra">AVANCE FINANCIERO 2/7</b></h4>

        <div class="container">

           

            <div class="row">

                <div class="col">

                   







                    <div class="row">

                    <div class="col-md-6">

                    <a type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalFinanciero">

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">

  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"></path>

</svg> AGREGAR AVANCE FINANCIERO</a>

           

                    </div>

                    <div class="col-md">



                    </div>

                    <div class="col-md">

                    <style>

                        .colorRefrescarDatos{

                            background-color: #CFE2FF;

                        }

                    </style>

                    <a type="button" id="refrescarAvance" class="btn btn-sm colorRefrescarDatos"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">

  <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"></path>

  <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"></path>

</svg> REFRESCAR</a>

           

                    </div>

                </div>







        <div id="loadListaAvanceFinanciero">





</div>





        <style>

    .colorEncabezadoLista{

        background-color: #4F6FAE;

    }

    

</style>

<!-- Modal AVANCE FINANCIERO INICIO -->

<div class="modal fade" id="exampleModalFinanciero" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog" style="width: 710px; display: flex; align-items: center; justify-content: center; height: 100vh;">

    <div class="modal-content " >

      <div class="modal-header colorEncabezadoLista">

        <h5 class="modal-title " id="exampleModalLabel" style="color: white; 

        font-weight: 500;">REGISTRANDO AVANCE FINANCIERO</h5>

        <a type="button" class="close" data-bs-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">×</span>

        </a>

      </div>

      <div class="modal-body">

        <center>

            <img src="assets/images/website_1980691.png" width="10%">

        </center>

        <div class="row">

                <!--<input type="hidden" value="11" id="idRelacionProyecto" >-->

                <div class="col">

                    <div class="mb-3">

                        <label for="exampleFormControlTextarea1" class="form-label">Seleccione Lista Presupuestaria *: </label>

                        

                        <select class="" id="notaAvance" data-show-subtext="true" data-live-search="true">

                        <?php 

    $query = "SELECT * FROM monitor_lista_presupuestaria where id_generalidad_proyecto = ?";

    $data3 = $net_rrhh->prepare($query);

    $data3->execute([$valor]);

    while ($data = $data3->fetch()) {

        echo "

        <option value=".$data[0].">".$data[1]."</option>

        

                

        

        ";

    }

    ?>

                            <!--<option value="16">Personal</option><option value="17">Computadoras</option><option value="18">Marketin</option><option value="19">Manuales</option><option value="20">Talleres</option>   -->                   

                   

                            </select>

                        </div>



            <div class="mb-3">

            <div class="form-group">

    <label for="exampleFormControlTextarea1">Descripción Lista Presupuestaria</label>

    <textarea class="form-control" id="descripcionLista" rows="2"></textarea>

  </div>



            </div>



                    <div class="mb-3">

                        <label for="exampleFormControlTextarea1" class="form-label">MONTO DISPONIBLE : </label>

                        <input type="number" class="form-control  form-control-sm" readonly  id="montoDisponible" placeholder="escribir">

                        

                    </div>





                    <div class="mb-3">

                        <label for="exampleFormControlTextarea1" class="form-label">Previsto para el mes (Proyección del mes actual) *: </label>

                        <input type="number" class="form-control  form-control-sm" oninput="validarNumeroConDecimal(this,mensajeError4)" pattern="^[0-9]+(\.[0-9]+)?$" id="previstoMes" placeholder="escribir">

                        <p id="mensajeError4"></p>

                    </div>

                    <div class="mb-3">

                        <label for="exampleFormControlTextarea1" class="form-label">Logrado para el mes $*: </label>

                        <input type="number" class="form-control form-control-sm" oninput="validarNumeroConDecimal(this,mensajeError)" pattern="^[0-9]+(\.[0-9]+)?$" id="logradoMes" placeholder="escribir">

                        <p id="mensajeError"></p>

                    </div>

                   

                    <div class="mb-3">

                        <label for="exampleFormControlTextarea1" class="form-label">Previsto para el próximo mes $*: </label>

                        <input type="number" class="form-control form-control-sm" oninput="validarNumeroConDecimal(this,mensajeError3)" pattern="^[0-9]+(\.[0-9]+)?$" id="previstoProximomes" placeholder="escribir">

                        <p id="mensajeError3"></p>

                    </div>

                   

               </div>

              

           </div>



           

          

      </div>

      <div class="modal-footer">

        <a type="button" id="cerrarBtnAvanceFinanciero33" class="btn  btn-sm btn-danger" data-bs-dismiss="modal">CANCELAR</a>

        <a type="button" id="btnRegistrarAvanceFinanciero" class="btn  btn-sm btn-primary">REGISTRAR </a>

      </div>

      <a class="btn btn-success" id="botonCargandoAvanceFinanciero33" style="display:none;" type="button" disabled="">

  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>

  Loading...

</a>

    </div>

  </div>

</div> 

<!-- MODAL AVANCE FINANCIERO FIN -->













                </div>

                

                

            </div>

            

           

        </div>

    </div>



    <div class="codigo mt-3 hidden" id="codigo3">

        <!---->

        <h4><b class="estiloLetra">OPERATIVO 3/7</b></h4>

        <div class="">

            <div class="row" >

                <div class="col-12" >

                    <div class="mb-3">

                        <label for="exampleFormControlInput1" class="form-label">Porcentaje de Avance</label>

                        Actividades y Metas

                    </div>

                </div>

                





            </div>

        

        <br/>

           

           <!--<div class="row">

               <div class="col">

                   <div class="mb-3">

                   <label for="exampleFormControlInput1" class="form-label">Posee Indicador *</label>

                   <select class="form-control form-control-sm" id="indicador">

                            <option selected>No</option>

                            <option>Si</option>

                        </select>

                   </div>

               </div>

               <div class="col">

                   <div class="mb-3">

                   <label for="exampleFormControlInput1" class="form-label">Posee Resultado *</label>

                   <select class="form-control form-control-sm" id="resultado">

                        <option selected>No</option>

                        <option>Si</option>

                        </select>

                   </div>

               </div>

               <div class="col">

                   <div class="mb-3">

                   <label for="exampleFormControlInput1" class="form-label">Posee Objetivos *</label>

                   <select class="form-control form-control-sm" id="objetivos">

                        <option selected>No</option>

                        <option>Si</option>

                    </select>

                   </div>

               </div>

               <div class="col">

                   <div class="mb-3">

                   <label for="exampleFormControlInput1" class="form-label">Posee Actividades *</label>

                   <select class="form-control form-control-sm" id="actividades">

                        <option selected>No</option>

                        <option>Si</option>

                        </select>

                   </div>

               </div>

               

               

           </div>-->

           <div class="row">

                <div class="col-12">









                <div class="row">

                    <div class="col-md-12">

                    <a type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalAvance">

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">

  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"></path>

</svg> ACTUALIZAR AVANCE</a>

           

                    </div>

                    <div class="col-md-12">

                    <style>

                        .colorRefrescarDatos{

                            background-color: #CFE2FF;

                        }

                    </style>

                    <a type="button" id="refrescarActividades" class="btn btn-sm colorRefrescarDatos"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">

  <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"></path>

  <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"></path>

</svg> REFRESCAR</a>

           

                    </div>

                </div>











<!--<div id="loadListaActividades"></div>-->

<div id="loadListaMetasIndicadores"></div>





<style>

    .colorEncabezadoLista{

        background-color: #4F6FAE;

    }

    

</style>

<!-- Modal AVANCE ACTIVIDADES INICIO -->

<div class="modal fade" id="exampleModalAvance" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content ">

      <div class="modal-header colorEncabezadoLista">

        <h5 class="modal-title " id="exampleModalLabel" style="color: white; 

        font-weight: 500;">REGISTRANDO ACTIVIDAD DEL PROYECTO</h5>

        <a type="button" class="close" data-bs-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">×</span>

        </a>

      </div>

      <div class="modal-body">

        <center>

            <img src="assets/images/checklist_1580359.png" width="10%">

        </center>

        <div class="row">

                <!--<input type="hidden" value="11" id="idRelacionProyecto" >-->

                <div class="col">

                  

                    <div class="mb-3">

                        <label for="exampleFormControlTextarea1" class="form-label">Seleccionar META/ACTIVIDAD *: </label>

                        <select class="form-select form-select-sm" id="nombreActividad" aria-label=".form-select-sm example">

                            <?php 

                            $query = "SELECT * FROM monitor_metas_actividades  where id_generalidad_proyecto = ?";

                            $data3 = $net_rrhh->prepare($query);

                            $data3->execute([$valor]);

                            while ($data = $data3->fetch()) 

                            {

                                echo "

                                <option value=".$data[0].">".$data[1]." ➡️ ".$data[4]."</option>    

                                ";

                            }

                            ?>

                        </select>

                    </div>

                    <div class="mb-3">

                        <label for="exampleFormControlTextarea1" class="form-label">¿META/ACTIVIDAD TERMINADA? *: </label>

                        <select class="form-select form-select-sm" id="metaTerminada" aria-label=".form-select-sm example">

                            <option>NO</option>

                            <option>SI</option>

                        </select>

                    </div>

                   

                   

               </div>

              

           </div>



           

          

      </div>

      <div class="modal-footer">

        <a type="button" id="cerrarBtnAvanceActividad" class="btn  btn-sm btn-danger" data-bs-dismiss="modal">CANCELAR</a>

        <a type="button" id="btnRegistrarAvanceActividad" class="btn  btn-sm btn-primary">REGISTRAR </a>

      </div>

      <a class="btn btn-success" id="botonCargandoAvanceActividad" style="display:none;" type="button" disabled="">

  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>

  Loading...

</a>

    </div>

  </div>

</div> 

<!-- MODAL AVANCE ACTIVIDADES FIN -->









               </div>

               <div class="col">

                  

                  <!-- <div class="row">

                    <div class="col-md-6">

                    <a type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalAvancemETA">

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">

  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"></path>

</svg> REGISTRAR META</a>

           

                    </div>

                    <div class="col-md">

                    <style>

                        .colorRefrescarDatos{

                            background-color: #CFE2FF;

                        }

                    </style>

                    <a type="button" id="refrescarAvanceMeta" class="btn btn-sm colorRefrescarDatos"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">

  <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"></path>

  <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"></path>

</svg> REFRESCAR</a>

           

                    </div>

                </div>-->







               <!-- <div id="loadListaMetas"></div>-->



                <style>

    .colorEncabezadoLista{

        background-color: #4F6FAE;

    }

    

</style>

<!-- Modal AVANCE META INICIO -->

<!--<div class="modal fade" id="exampleModalAvancemETA" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content ">

      <div class="modal-header colorEncabezadoLista">

        <h5 class="modal-title " id="exampleModalLabel" style="color: white; 

        font-weight: 500;">REGISTRANDO METAS DEL PROYECTO</h5>

        <a type="button" class="close" data-bs-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">×</span>

        </a>

      </div>

      <div class="modal-body">

        <center>

            <img src="assets/images/goal_1535019.png" width="10%">

        </center>

        <div class="row">-->

                <!--<input type="hidden" value="11" id="idRelacionProyecto" >-->

                <!--<div class="col">

                <div class="mb-3">

                        <label for="exampleFormControlTextarea1" class="form-label">Metas del proyecto *: </label>

                        <textarea rows="3" maxlength="200" type="text" class="form-control form-control-sm" id="metasProyecto" placeholder="escribir"></textarea>

                  

                    </div>

                    <div class="mb-3">

                        <label for="exampleFormControlTextarea1" class="form-label">Descripcion de Avance *: </label>

                        <textarea rows="3" maxlength="200" type="text" class="form-control form-control-sm" id="descripcionMetasproyecto2" placeholder="escribir"></textarea>

                  

                    </div>

                   

               </div>

              

           </div>



           

          

      </div>

      <div class="modal-footer">

        <a type="button" id="cerrarBtnAvanceMeta" class="btn  btn-sm btn-danger" data-bs-dismiss="modal">CANCELAR</a>

        <a type="button" id="btnRegistrarAvanceMeta" class="btn  btn-sm btn-primary">REGISTRAR META</a>

      </div>

      <a class="btn btn-success" id="botonCargandoAvanceMeta" style="display:none;" type="button" disabled="">

  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>

  Loading...

</a>

    </div>

  </div>

</div> -->

<!-- MODAL AVANCE META FIN -->



               </div>

           </div>









           











          

       </div>

    </div>









    <div class="codigo mt-3 hidden" id="codigo4">

        <!---->

        <h4><b class="estiloLetra">DOCUMENTACIÓN DE PROYECTOS 4/7</b></h4>

        <div class="container">

           

           <div class="row">

               <div class="col">

                   <div class="mb-3">

                   <label for="exampleFormControlInput1" class="form-label">ACTUALIZO LA CARPETA SHAREPOINT *</label>

                   <select class="form-control form-control-sm" id="idsharepoint">

                            <option selected>No</option>

                            <option>Si</option>

                        </select>

                   </div>

                   <a type="button" href='<?= $IDlINK?>' class="btn  mx-1  colorBoton colorBotonesCambio" target="_blank">

                    🗂️ INGRESAR A CARPETA

                </a>

               </div>

               <div class="col">

                   <div class="mb-3">

                   <label for="exampleFormControlInput1" class="form-label">ACTUALIZO BITRIX *</label>

                   <select class="form-control form-control-sm" id="idbitrix">

                        <option selected>No</option>

                        <option>Si</option>

                        </select>

                   </div>

               </div>

               

               

               

           </div>

           <div class="row">

                <div class="col">









                











<div id="loadListaActividades"></div>







<style>

    .colorEncabezadoLista{

        background-color: #4F6FAE;

    }

    

</style>

<!-- Modal AVANCE ACTIVIDADES INICIO -->



<!-- MODAL AVANCE ACTIVIDADES FIN -->









               </div>

               <div class="col-md-12">

                  

                   <div class="row">

                    <div class="col-md-12 ">

                        <style>

                            .colorFondoHistorial{

                                background-color: #556C7F;

                                color: white;

                                border-radius: 2px;

                            }

                        </style>

                      <p class="mt-2 text-center colorFondoHistorial">HISTORIAL DE ACTUALIZACIONES MENSUALES</p>  

           

                    </div>

                   

                </div>







                <div id="loadDocumentacionProyecto"></div>



                <style>

    .colorEncabezadoLista{

        background-color: #4F6FAE;

    }

    

</style>



               </div>

               <div class="col-md-1">



</div>

           </div>

          

       </div>

    </div>



    <div class="codigo mt-3 hidden" id="codigo5">

        <!---->

        <h4><b class="estiloLetra">PERSONAL 5/7</b></h4>

        <div class="container">

       





<div class="row">

                    <div class="col-md-6">

                    <a type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalPersonal">

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

<div class="modal fade" id="exampleModalPersonal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

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

                   <input type="text" class="form-control form-control-sm" id="cargoEmpleado" placeholder="escribir">

                     </div>

               </div>

           </div>

           <div class="row">

                <div class="col">

                   <div class="mb-3">

                   <label for="exampleFormControlInput1" class="form-label">Porcentaje de tiempo*</label>

                   <input type="text" class="form-control form-control-sm" oninput="validarPorcentaje(this,mensajeError6)" id="porcentajeTiempo" placeholder="escribir">

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





    <div class="codigo mt-3 hidden" id="codigo6">

<!--:::::::::::::::::::::::::    MODAL REGISTRO DEL PERSONAL DEL PROYECTO FIN  ::::::::::::::::::::::::::::::-->

        <h4><b class="estiloLetra">MODIFICACIONES 6/7</b></h4>

        <div class="container">

           

            <div class="row">

                <div class="col-md-6">

                    <a type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalModificaciones">

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">

                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"></path>

                        </svg> REGISTRAR 

                    </a>

                </div>

                <div class="col-md">

                    <style>

                        .colorRefrescarDatos{

                            background-color: #CFE2FF;

                        }

                    </style>

                    <a type="button" id="refrescarModificaciones" class="btn btn-sm colorRefrescarDatos"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">

                    <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"></path>

                    <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"></path>

                    </svg> REFRESCAR

                    </a>

           

                </div>

            </div>



<!--::::::::::::::::: ID TABLA PERSONAS :::::::::::::::::::::::::::::::::::::-->

       <div id="loadListaModificaciones"></div>





       <style>

    .colorTitulo{

        background-color: #418CFF;

        color: while;

    }

</style>

<!-- MODAL REGISTRO MODIFICACIONES INICIO -->

<div class="modal fade" id="exampleModalModificaciones" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header colorTitulo">

        <h5 class="modal-title " id="exampleModalLabel" style="color: white; 

        font-weight: 500;">REGISTRAR MODIFICACIONES</h5>

        <a type="button" class="close" data-bs-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">×</span>

        </a>

      </div>

      <div class="modal-body">

        <center>

            <img src="assets/images/settings_1712935.png" width="10%">

        </center>

            <div class="row">

                <div class="col">

                <div class="mb-3">

                   <label for="exampleFormControlInput1" class="form-label">Cambios relevantes para el proyecto*</label>

                   <textarea rows="3" maxlength="1200" type="text" class="form-control form-control-sm" id="cambiosRelevantes" placeholder="escribir"></textarea>

                   </div>

               </div>

               <div class="col">

                   <div class="mb-3">

                   <label for="exampleFormControlInput1" class="form-label">A nivel de personal  <br>                    *</label>

                   <textarea rows="3" maxlength="1200" type="text" class="form-control form-control-sm" id="nivelPersonal" placeholder="escribir"></textarea>

                   </div>

               </div>

           </div>

           <div class="row">

                <div class="col">

                   <div class="mb-3">

                   <label for="exampleFormControlInput1" class="form-label">A nivel financiero*</label>

                   <textarea rows="3" maxlength="1200" type="text" class="form-control form-control-sm" id="nivelFinanciero" placeholder="escribir"></textarea>

                   </div>

               </div>

               <div class="col">

                   <div class="mb-3">

                   <label for="exampleFormControlInput1" class="form-label">A nivel operativo*</label>

                   <textarea rows="3" maxlength="1200" type="text" class="form-control form-control-sm" id="nivelOperativo" placeholder="escribir"></textarea>

                   </div>

               </div>

           </div>

           <div class="row">

                

               <div class="col">

                   <div class="mb-3">

                   <label for="exampleFormControlInput1" class="form-label">Otros*</label>

                   <textarea rows="3" maxlength="1200" type="text" class="form-control form-control-sm" id="otrosModificaciones" placeholder="escribir"></textarea>

                   </div>

               </div>

           </div>

      </div>

      <div class="modal-footer">

        <a type="button" id="cerrarBtnModificaciones" class="btn  btn-sm btn-danger" data-bs-dismiss="modal">CANCELAR</a>

        <a type="button" id="btnRegistrarModificaciones" class="btn  btn-sm btn-primary">REGISTRAR </a>

      </div>

      <a class="btn btn-success" id="botonCargandoModificaciones" style="display:none;" type="button" disabled="">

  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>

  Loading...

</a>

    </div>

  </div>

</div> 

<!--MODAL REGISTRO MODIFICACIONES FIN -->

          <!-- <div class="row">

                <div class="col">

                   <div class="mb-3">

                   <label for="exampleFormControlInput1" class="form-label">Cambios relevantes para el proyecto*</label>

                   <textarea rows="3" maxlength="200" type="text" class="form-control form-control-sm" id="exampleFormControlInput1" placeholder="escribir"></textarea>

                   </div>

               </div>

               <div class="col">

                   <div class="mb-3">

                   <label for="exampleFormControlInput1" class="form-label">A nivel de personal*</label>

                   <textarea rows="3" maxlength="200" type="text" class="form-control form-control-sm" id="exampleFormControlInput1" placeholder="escribir"></textarea>

                   </div>

               </div>

               

           </div>

           <div class="row">

                <div class="col">

                   <div class="mb-3">

                   <label for="exampleFormControlInput1" class="form-label">A nivel financiero*</label>

                   <textarea rows="3" maxlength="200" type="text" class="form-control form-control-sm" id="exampleFormControlInput1" placeholder="escribir"></textarea>

                   </div>

               </div>

               <div class="col">

                   <div class="mb-3">

                   <label for="exampleFormControlInput1" class="form-label">A nivel operativo*</label>

                   <textarea rows="3" maxlength="200" type="text" class="form-control form-control-sm" id="exampleFormControlInput1" placeholder="escribir"></textarea>

                   </div>

               </div>

           </div>

           <div class="row">

                

               <div class="col">

                   <div class="mb-3">

                   <label for="exampleFormControlInput1" class="form-label">Otros*</label>

                   <textarea rows="3" maxlength="200" type="text" class="form-control form-control-sm" id="exampleFormControlInput1" placeholder="escribir"></textarea>

                   </div>

               </div>

           </div>-->

          

       </div>

    </div>



    <div class="codigo mt-3 hidden" id="codigo7">

        <!---->

        <h4><b class="estiloLetra">BUENAS PRACTICAS 7/7</b></h4>

        <div class="container">

           



        <div class="row">

                <div class="col-md-6">

                    <a type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalBuenasPracticas">

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">

                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"></path>

                        </svg> REGISTRAR 

                    </a>

                </div>

                <div class="col-md">

                    <style>

                        .colorRefrescarDatos{

                            background-color: #CFE2FF;

                        }

                    </style>

                    <a type="button" id="refrescarModificaciones" class="btn btn-sm colorRefrescarDatos"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">

                    <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"></path>

                    <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"></path>

                    </svg> REFRESCAR

                    </a>

           

                </div>

            </div>



<!--::::::::::::::::: ID TABLA PERSONAS :::::::::::::::::::::::::::::::::::::-->

       <div id="loadListaBuenasPracticas"></div>



       <style>

    .colorTitulo{

        background-color: #418CFF;

        color: while;

    }

    .tamañoModalBuenasPracticas{

        width: 600px;

    }

</style>

<!-- MODAL REGISTRO MODIFICACIONES INICIO -->

<div class="modal fade" id="exampleModalBuenasPracticas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content tamañoModalBuenasPracticas">

      <div class="modal-header colorTitulo">

        <h5 class="modal-title " id="exampleModalLabel" style="color: white; 

        font-weight: 500;">REGISTRAR BUENA PRACTICA</h5>

        <a type="button" class="close" data-bs-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">×</span>

        </a>

      </div>

      <div class="modal-body">

        <center>

            <img src="assets/images/benefit_9186660.png" width="10%">

        </center>

            <div class="row">

                <div class="col">

                <div class="mb-3">

                   <label for="exampleFormControlInput1" class="form-label">Logros que superan lo esperado*</label>

                   <textarea rows="3" maxlength="1200" type="text" class="form-control form-control-sm" id="logrosSuperados" placeholder="escribir"></textarea>

                   </div>

               </div>

               <div class="col">

                   <div class="mb-3">

                   <label for="exampleFormControlInput1" class="form-label">Buenas prácticas identificadas* </label>

                   <textarea rows="3" maxlength="1200" type="text" class="form-control form-control-sm" id="buenasPracticas" placeholder="escribir"></textarea>

                   </div>

               </div>

           </div>

           <div class="row">

                <div class="col">

                   <div class="mb-3">

                   <label for="exampleFormControlInput1" class="form-label">Problemas presentados, obstáculos en la implementación, riesgos previstos y soluciones propuestas *</label>

                   <textarea rows="3" maxlength="1200" type="text" class="form-control form-control-sm" id="obstaculos" placeholder="escribir"></textarea>

                   </div>

               </div>

               <div class="col">

                   <div class="mb-3">

                   <label for="exampleFormControlInput1" class="form-label">Otros comentarios. *</label>

                   <textarea rows="3" maxlength="1200" type="text" class="form-control form-control-sm" id="comentarios" placeholder="escribir"></textarea>

                   </div>

               </div>

           </div>

          

      </div>

      <div class="modal-footer">

        <a type="button" id="cerrarBtnBuenasPracticas" class="btn  btn-sm btn-danger" data-bs-dismiss="modal">CANCELAR</a>

        <a type="button" id="btnRegistrarBuenasPracticas" class="btn  btn-sm btn-primary">REGISTRAR </a>

      </div>

      <a class="btn btn-success" id="botonCargandoBuenasPracticas" style="display:none;" type="button" disabled="">

  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>

  Loading...

</a>

    </div>

  </div>

</div> 



           <!--<div class="row">

                <div class="col">

                   <div class="mb-3">

                   <label for="exampleFormControlInput1" class="form-label">Logros que superan lo esperado*</label>

                   <textarea rows="3" maxlength="200" type="text" class="form-control form-control-sm" id="exampleFormControlInput1" placeholder="escribir"></textarea>

                   </div>

               </div>

               <div class="col">

                   <div class="mb-3">

                   <label for="exampleFormControlInput1" class="form-label">Buenas prácticas identificadas*</label>

                   <textarea rows="3" maxlength="200" type="text" class="form-control form-control-sm" id="exampleFormControlInput1" placeholder="escribir"></textarea>

                   </div>

               </div>

               

           </div>

           <div class="row">

                <div class="col">

                   <div class="mb-3">

                   <label for="exampleFormControlInput1" class="form-label">Problemas presentados, obstáculos en la implementación, riesgos previstos y soluciones propuestas*</label>

                   <textarea rows="3" maxlength="200" type="text" class="form-control form-control-sm" id="exampleFormControlInput1" placeholder="escribir"></textarea>

                   </div>

               </div>

               <div class="col">

                   <div class="mb-3">

                   <label for="exampleFormControlInput1" class="form-label">Otros comentarios. *</label>

                   <textarea rows="3" maxlength="200" type="text" class="form-control form-control-sm" id="exampleFormControlInput1" placeholder="escribir"></textarea>

                   </div>

               </div>

           </div>-->

           

          

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





    



    <style>

        .colorBOtonEnviar{

    background-color: #7D942E;

    color: while;

}

    </style>



<a type="button" class="btn colorBOtonEnviar mx-5" id="registrar" style="display: none; color:white;">

    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16">

  <path d="M11 2H9v3h2z"/>

  <path d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z"/>

</svg> REGISTRAR</a>

    </div>



    <center>

    <div class="col-md-6">

    <a class="btn btn-success" id="botonCargando22" style="display:none;" type="button" disabled>

  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>

  REGISTRANDO EN BASE DE DATO...

</a>

    </div>

    </center>

</div>

</div>



<!--<button id="mostrarToastBtn">Mostrar Toast</button>-->



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>





<script>

//notaAvance 



$(document).ready(function() {



    var selectedValue = $('#notaAvance').val();

            console.log("valor del select",selectedValue);

           

            $.post("process/index.php", {

                process: "monitoreo_proyecto",

                action: "extrarMontoLista",

                

                

               

                selectedValue: selectedValue, 



            },

            function(response)

            {

                console.log("respuesta del server",response);

                $('#montoDisponible').val(response);

            });





            //SACANDO LA DESCRIPCION ::::::::::::::::::::::::

            //var selectedValue = $('#notaAvance').val();

            console.log("valor del select2",selectedValue);

           

            $.post("process/index.php", {

                process: "monitoreo_proyecto",

                action: "extraerDescripcion",

                selectedValue: selectedValue, 



            },

            function(response)

            {

                console.log("respuesta del server descripcion",response);

                $('#descripcionLista').text(response);

            });







            //previsto para el mes::::::::::::::::::::::::::

            var selectedValue = $(this).val();

            console.log("valor del select",selectedValue);

           

            $.post("process/index.php", {

                process: "monitoreo_proyecto",

                action: "previstoMes",

                

                

               

                selectedValue: selectedValue, 



            },

            function(response)

            {

                if(response==0)

                {

                    $('#previstoMes').val(response);

                }

                else

                {

                    $('#previstoMes').val(response);

                    //$('#previstoMes').prop('disabled', true);

                }

                //console.log("respuesta del server",response);

                

            });

});









$('#notaAvance').change(function() {

            // Obtiene el valor seleccionado

            var selectedValue = $(this).val();

            console.log("valor del select",selectedValue);

           

            $.post("process/index.php", {

                process: "monitoreo_proyecto",

                action: "extrarMontoLista",

                

                

               

                selectedValue: selectedValue, 



            },

            function(response)

            {

                console.log("respuesta del server",response);

                $('#montoDisponible').val(response);

            });





            //EXTRAYENDO DESCRIPCION :::::::::::

            console.log("valor del select2",selectedValue);

           $.post("process/index.php", {

               process: "monitoreo_proyecto",

               action: "extraerDescripcion",

               selectedValue: selectedValue, 



           },

           function(response)

           {

               console.log("respuesta del server descripcion",response);

               $('#descripcionLista').text(response);

           });



            //previsto para el mes::::::::::::::::::::::::::

            var selectedValue = $(this).val();

            console.log("valor del select",selectedValue);

           

            $.post("process/index.php", {

                process: "monitoreo_proyecto",

                action: "previstoMes",

                

                

               

                selectedValue: selectedValue, 



            },

            function(response)

            {

                if(response==0)

                {

                    $('#previstoMes').val(response);

                }

                else

                {

                    $('#previstoMes').val(response);

                  //  $('#previstoMes').prop('disabled', true);

                }

                //console.log("respuesta del server",response);

                

            });











});









$(document).ready(function() {

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









  });

  //METAS E INDICADORES ::::::::::::::::::::::::::::::

  $("#loadListaMetasIndicadores").load("view/Monitoreo/Monitoreo.tabla.meta.activiades.php",{ 

        idRelacion : $("#idRelacionProyecto").val() 

    });

    $("#refrescarActividades").click(function(){

        $("#loadListaMetasIndicadores").load("view/Monitoreo/Monitoreo.tabla.meta.activiades.php",{

            idRelacion : $("#idRelacionProyecto").val()

        });

    });

//LISTA DE BUENAS PRACTICAS :::::::::::::::::::::::::::::::::::::::::

$("#loadListaBuenasPracticas").load("view/Monitoreo/Monitoreo.tabla.buenaspracticas.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

    $("#refrescarModificaciones").click(function(){

        $("#loadListaBuenasPracticas").load("view/Monitoreo/Monitoreo.tabla.buenaspracticas.php",{

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

//LISTA DE MODIFICACIONES :::::::::::::::::::::::::::::::::::::::::

$("#loadListaModificaciones").load("view/Monitoreo/Monitoreo.tabla.modificaciones.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

    $("#refrescarModificaciones").click(function(){

        $("#loadListaModificaciones").load("view/Monitoreo/Monitoreo.tabla.modificaciones.php",{

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



//LISTA METAS :::::::::::::::::::::::::::::::

$("#loadListaMetas").load("view/Monitoreo/Monitoreo.tabla.metas.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

    $("#refrescarAvanceMeta").click(function(){

        $("#loadListaMetas").load("view/Monitoreo/Monitoreo.tabla.metas.php",{

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

//LISTA ACTIVIDADES :::::::::::::::::::::::::::::::

$("#loadListaActividades").load("view/Monitoreo/Monitoreo.tabla.actividades.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

    $("#refrescarActividades").click(function(){

        $("#loadListaActividades").load("view/Monitoreo/Monitoreo.tabla.actividades.php",{

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

//LISTA DE ACTUALIZACIONES DOCUMENTOS :::::::::::::::::::::::::::::::::::::

$("#loadDocumentacionProyecto").load("view/Monitoreo/Monitoreo.tabla.documentacionproyecto.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

 //LINE PRESUPUESTARIA ::::::::::::::::::::::::::::

 $("#loadListaOrganizacionVinculada").load("view/Monitoreo/Monitoreo.tabla.organizacionesvinculadas.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

    $("#refrescarVinculada").click(function(){

        $("#loadListaOrganizacionVinculada").load("view/Monitoreo/Monitoreo.tabla.organizacionesvinculadas.php",{

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

 //AVANCE FINANCIERO :::::::::::::::::::::::::::::::

 $("#loadListaAvanceFinanciero").load("view/Monitoreo/Monitoreo.tabla.avancefinanciero.php",{

        idRelacion : $("#idRelacionProyecto").val(),

        

    });

    $("#refrescarAvance").click(function(){

        $("#loadListaAvanceFinanciero").load("view/Monitoreo/Monitoreo.tabla.avancefinanciero.php",{

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

    //:::::::::::::: REGISTRANDO DETALLE FICHA DE PROYECTO   :::::::::::::::::::::::::::::::::::::::

$("#registrar").click(function() {

           document.getElementById("botonCargandoBuenasPracticas").style.display="";

            $.post("process/index.php", {

                process: "monitoreo_proyecto",

                action: "addFichaDetalle",

                

                

                fhInforme: $("#fhInforme").val(), 

                numeroInforme: $("#numeroInforme").val(), 

                responsablePrime: $("#responsablePrime").val(), 

                contactoPrimer: $("#contactoPrimer").val(), 

                indicador: $("#indicador").val(), 

                resultado: $("#resultado").val(), 

                objetivos: $("#objetivos").val(), 

                actividades: $("#actividades").val(), 

                idsharepoint: $("#idsharepoint").val(),

                idbitrix : $("#idbitrix").val(),

                idRelacion : $("#idRelacionProyecto").val(),



            },

            function(response){

                if(response)

                {

                    document.getElementById("botonCargando22").style.display="none";

                    document.getElementById("registrar").style.display="";

                $.toast({

                    heading: 'Finalizado',

                    text: 'Registro Mensual  Agregado ',

                    showHideTransition: 'slide',

                    icon: 'success',

                    hideAfter: 3000, 

                    position: 'bottom-center'

                });

                 // Esperar 6 segundos antes de redirigir

    setTimeout(function () {

        // Redirigir a la página deseada

        window.location.href = "http://sii.fusalmo.org/?view=monitoreo";

    }, 4000); // 6000 milisegundos = 6 segundos

                }

                else

                {

                    document.getElementById("botonCargando22").style.display="none";

                $.toast({

                    heading: 'ERRORRRRRRR',

                    text: 'Problemas al registrar la vinculacion  ',

                    showHideTransition: 'slide',

                    icon: 'error',

                    hideAfter: 5000, 

                    position: 'top-center'

                });

                

                }

                

            });

        });

//:::::::::::::: REGISTRANDO BUENAS PRACTICAS   :::::::::::::::::::::::::::::::::::::::

$("#btnRegistrarBuenasPracticas").click(function() {

           document.getElementById("botonCargandoBuenasPracticas").style.display="";

            $.post("process/index.php", {

                process: "monitoreo_proyecto",

                action: "addBuenasPracticas",

                

                

                logrosSuperados: $("#logrosSuperados").val(), 

                buenasPracticas: $("#buenasPracticas").val(), 

                obstaculos: $("#obstaculos").val(), 

                comentarios: $("#comentarios").val(), 

                idRelacion : $("#idRelacionProyecto").val(),



            },

            function(response){

                if(response)

                {

                    document.getElementById("botonCargandoBuenasPracticas").style.display="none";

                $.toast({

                    heading: 'Finalizado',

                    text: 'Buenas Practicas Agregada ',

                    showHideTransition: 'slide',

                    icon: 'success',

                    hideAfter: 5000, 

                    position: 'bottom-center'

                });

                document.getElementById("cerrarBtnBuenasPracticas").click();

                $("#loadListaBuenasPracticas").load("view/Monitoreo/Monitoreo.tabla.buenaspracticas.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

                }

                else

                {

                    document.getElementById("botonCargandoModificaciones").style.display="none";

                $.toast({

                    heading: 'ERRORRRRRRR',

                    text: 'Problemas al registrar la vinculacion  ',

                    showHideTransition: 'slide',

                    icon: 'error',

                    hideAfter: 5000, 

                    position: 'top-center'

                });

                

                }

                

            });

        });

//:::::::::::::: REGISTRANDO MODIFICACIONES  :::::::::::::::::::::::::::::::::::::::

$("#btnRegistrarModificaciones").click(function() {

           document.getElementById("botonCargandoModificaciones").style.display="";

            $.post("process/index.php", {

                process: "monitoreo_proyecto",

                action: "addModificacionProyecto",

                

                

                cambiosRelevantes: $("#cambiosRelevantes").val(), 

                nivelPersonal: $("#nivelPersonal").val(), 

                nivelFinanciero: $("#nivelFinanciero").val(), 

                nivelOperativo: $("#nivelOperativo").val(), 

                otrosModificaciones: $("#otrosModificaciones").val(), 

                idRelacion : $("#idRelacionProyecto").val(),



            },

            function(response){

                if(response)

                {

                    document.getElementById("botonCargandoModificaciones").style.display="none";

                $.toast({

                    heading: 'Finalizado',

                    text: 'Modificacion Agregada ',

                    showHideTransition: 'slide',

                    icon: 'success',

                    hideAfter: 5000, 

                    position: 'bottom-center'

                });

                document.getElementById("cerrarBtnModificaciones").click();

                $("#loadListaModificaciones").load("view/Monitoreo/Monitoreo.tabla.modificaciones.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

                }

                else

                {

                    document.getElementById("botonCargandoModificaciones").style.display="none";

                $.toast({

                    heading: 'ERRORRRRRRR',

                    text: 'Problemas al registrar la vinculacion ',

                    showHideTransition: 'slide',

                    icon: 'error',

                    hideAfter: 5000, 

                    position: 'top-center'

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

                    text: 'Personal del Proyecto Agregado ',

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

                    text: 'Problemas al registrar la vinculacion ',

                    showHideTransition: 'slide',

                    icon: 'error',

                    hideAfter: 5000, 

                    position: 'bottom-center'

                });

                

                }

                

            });

        });

//:::::::::::::: REGISTRANDO METAS DEL PROYECTO :::::::::::::::::::::::::::::::::::::::

$("#btnRegistrarAvanceMeta").click(function() {

           document.getElementById("botonCargandoAvanceMeta").style.display="";

            $.post("process/index.php", {

                process: "monitoreo_proyecto",

                action: "addAvanceMeta",

                

                

                actividadDelProyecto: $("#metasProyecto").val(), 

                descripcionActividad: $("#descripcionMetasproyecto2").val(), 

                idRelacion : $("#idRelacionProyecto").val(),



            },

            function(response){

                if(response)

                {

                    document.getElementById("botonCargandoAvanceMeta").style.display="none";

                $.toast({

                    heading: 'Finalizado',

                    text: 'Metas del Proyecto Agregada ',

                    showHideTransition: 'slide',

                    icon: 'success',

                    hideAfter: 5000, 

                    position: 'bottom-center'

                });

                document.getElementById("cerrarBtnAvanceMeta").click();

                $("#loadListaMetas").load("view/Monitoreo/Monitoreo.tabla.metas.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

                }

                else

                {

                    document.getElementById("botonCargando").style.display="none";

                $.toast({

                    heading: 'ERRORRRRRRR',

                    text: 'Problemas al registrar la vinculacion  ',

                    showHideTransition: 'slide',

                    icon: 'error',

                    hideAfter: 5000, 

                    position: 'bottom-center'

                });

                

                }

                

            });

        });

//:::::::::::::: REGISTRANDO ACTIVIDAD DEL PROYECTO :::::::::::::::::::::::::::::::::::::::

$("#btnRegistrarAvanceActividad").click(function() {

           document.getElementById("botonCargandoAvanceActividad").style.display="";

            $.post("process/index.php", {

                process: "monitoreo_proyecto",

                action: "actualizarMeta",

                

                

                metaTerminada: $("#metaTerminada").val(), 

                nombreActividad: $("#nombreActividad").val(), 

                idRelacion : $("#idRelacionProyecto").val(),



            },

            function(response){

                if(response)

                {

                    document.getElementById("botonCargandoAvanceActividad").style.display="none";

                $.toast({

                    heading: 'Finalizado',

                    text: 'Actividades del proyecto Agregada ',

                    showHideTransition: 'slide',

                    icon: 'success',

                    hideAfter: 5000, 

                    position: 'bottom-center'

                });

                document.getElementById("cerrarBtnAvanceActividad").click();

                $("#loadListaMetasIndicadores").load("view/Monitoreo/Monitoreo.tabla.meta.activiades.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

                }

                else

                {

                    document.getElementById("botonCargando").style.display="none";

                $.toast({

                    heading: 'ERRORRRRRRR',

                    text: 'Problemas al registrar la vinculacion  ',

                    showHideTransition: 'slide',

                    icon: 'error',

                    hideAfter: 5000, 

                    position: 'top-center'

                });

                

                }

                

            });

        });

//:::::::::::::: REGISTRANDO AVANCE FINANCIERO :::::::::::::::::::::::::::::::::::::::

$("#btnRegistrarAvanceFinanciero").click(function() {

    console.log( $("#notaAvance").val())

           document.getElementById("botonCargandoAvanceFinanciero33").style.display="";

            $.post("process/index.php", {

                process: "monitoreo_proyecto",

                action: "addAvanceFinanciero",





               

                notaAvance: $("#notaAvance :selected").text(),

                previstoMes: $("#previstoMes").val(), 

                logradoMes: $("#logradoMes").val(), 

                

                previstoProximomes: $("#previstoProximomes").val(),  

                idRelacion : $("#idRelacionProyecto").val(),

                idnotaAvance: $("#notaAvance").val(),

                idRelacionProyecto : $("#idRelacionProyecto").val()



            },

            function(response){

                if(response == 1)

                {

                    document.getElementById("botonCargandoAvanceFinanciero33").style.display="none";

                $.toast({

                    heading: 'Finalizado',

                    text: 'Avance Financiero Agregado ',

                    showHideTransition: 'slide',

                    icon: 'success',

                    hideAfter: 5000, 

                    position: 'bottom-center'

                });

                document.getElementById("cerrarBtnAvanceFinanciero33").click();

                $("#loadListaAvanceFinanciero").load("view/Monitoreo/Monitoreo.tabla.avancefinanciero.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

                }

                else if(response == 53)

                {

                    document.getElementById("botonCargandoAvanceFinanciero33").style.display="none";

                    $.toast({

                    

                    heading: ' Error ',

                    text: response,//'CANTIDAD SUPERA LA LÍNEA PRESUPUESTARIA ',

                    showHideTransition: 'slide',

                    icon: 'error',

                    hideAfter: 5000, 

                    position: 'top-center'

                    });

                }

                else

                {

                    document.getElementById("botonCargando").style.display="none";

                $.toast({

                    heading: 'ERRORRRRRRR',

                    text: 'Problemas al registrar el avance  ',

                    showHideTransition: 'slide',

                    icon: 'error',

                    hideAfter: 5000, 

                    position: 'top-center'

                });

                

                }

                

            });

        });

//:::::::::::::: REGISTRANDO VINCULACION INSTITUCIONAL :::::::::::::::::::::::::::::::::::::::

$("#btnRegistrarVinculacionInstitucional").click(function() {

           document.getElementById("botonCargandoVincula").style.display="";

            $.post("process/index.php", {

                process: "monitoreo_proyecto",

                action: "addVinculacionDetalle",



                nombreOrganizacion: $("#nombreOrganizacion").val(), 

                sectorOrganizacion: $("#sectorOrganizacion").val(), 

                tipoVinculacion: $("#tipoVinculacion").val(), 

                idRelacion : $("#idRelacionProyecto").val()



            },

            function(response){

                if(response)

                {

                    document.getElementById("botonCargandoVincula").style.display="none";

                $.toast({

                    heading: 'Finalizado',

                    text: 'Vinculacion Agregada ',

                    showHideTransition: 'slide',

                    icon: 'success',

                    hideAfter: 5000, 

                    position: 'bottom-center'

                });

                document.getElementById("cerrarBtnVinculacion").click();

                $("#loadListaOrganizacionVinculada").load("view/Monitoreo/Monitoreo.tabla.organizacionesvinculadas.php",{

        idRelacion : $("#idRelacionProyecto").val()

    });

                }

                else

                {

                    document.getElementById("botonCargando").style.display="none";

                $.toast({

                    heading: 'ERRORRRRRRR',

                    text: 'Problemas al registrar la vinculacion  ',

                    showHideTransition: 'slide',

                    icon: 'error',

                    hideAfter: 5000, 

                    position: 'top-center'

                });

                

                }

                

            });

        });

//::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::











    </script>