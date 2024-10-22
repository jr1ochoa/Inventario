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

$idFormulario =  $_REQUEST['idFormulario'];
//echo $idFormulario;
?>
 <?php
                                        
                                        $query = "SELECT * FROM entornos_virtuales_formulario  where codigo_solicitud = ?"; 

                                        $data3 = $net_rrhh->prepare($query);

                                        $data3->execute([$idFormulario]);

                                    ?>
<br/>
<center>
<div class="justify-content-center">
<h3><b>
    
<?php 

while ($data = $data3->fetch()) {
echo $data[17];
}
?></b></h3>
<div style="height: 4px; width:80%; margin-top:-20px;background: linear-gradient(to right, #1A4262 33%, #668196 33%, #668196 66%, #CCD5DC 66%);"></div>
  
</div>
</center>


<div class="row justify-content-center">
    <div class="mt-3 mx-3 col-3 h-100">
    <button class="btn  btn-sm" style="background-color: #CBE8BA;" data-bs-toggle="modal" data-bs-target="#exampleModalActividades2">
        <i class="bi bi-gear">GESTIÓN DE SOLICITUD</i> 
    </button>  
    <div class="card mb-3">
       
    <div class="card-body  d-flex flex-column ">
   
<!--:::::::::::: CODIGO PARA MOSTRAR LOS ENCARGADOS DEL ARTE INICIO :::::::::::::-->
<div class="card "> 
  <div class="card-header text-center">
    DETALLE DE LA ENTREGA Y ENCARGADOS
  </div>
  <div class="card-body">

  <?php
    $query = "SELECT * FROM `entornos_virtuales_formulario` as s1 inner join employee as s2 on s1.id_encargado = s2.id 
                                        LEFT join employee as s3 on s1.id_encargado2 = s3.id    where s1.codigo_solicitud = ?";
                                        $data3 = $net_rrhh->prepare($query);
                                        $data3->execute([$idFormulario]);
                                        
                                        if ($data3->rowCount() > 0) {
                                            while ($data = $data3->fetch()) {
                                            /**** variables de consulta ****/
                                                $fh_entrega = $data[7];
                                                $carpeta_entrega = $data[12];
                                                $prioridad = $data[9];
                                                
                                            /*******************************/
                                        ?>
                         
                                        
                                                <p><b>Responsable : </b> <?php echo($data[22] . ' ' . $data[23] . ' ' . $data[24] . ' ' . $data[25] . ' ' . $data[26]) ; ?></p>
                                                <p><b>Responsable: </b><?php echo($data[46] . ' ' . $data[47] . ' ' . $data[48] . ' ' . $data[49] . ' ' . $data[50]) ; ?></p>
                                                <p class="p-0 mb-0">Prioridad: <?php echo isset($data[9]) ?  ($data[9]) : "" ?></p>
                                                <p class="p-0 mb-0">Carpeta de Entrega: <a href="<?php echo isset($data[12]) ?  ($data[12]) : "" ?>">Descargar Recursos Aquí</a></p>
                                                <p class="p-0 mb-0">Fecha de Entrega: <?php echo isset($data[7]) ?  ($data[7]) : "" ?></p>
                                                
                                        <?php
                                            }
                                        } else {
                                        ?>
                                    
                                    <p>Responsable: NO ASIGNADO</p>
                                    <p class="p-0 mb-0">Prioridad: NO ASIGNADO </p>
                                    <p class="p-0 mb-0">Carpeta de Entrega: <a href="">NO ASIGNADO</a></p>  
                                    <p class="p-0 mb-0">Fecha de Entrega: NO ASIGNADO</p>
                                    <?php 
                                    }
                                    ?>





<hr/>
<h4><b>INFORMACIÓN GENERAL DEL ARTE</b></h4>
<div style="height: 4px; width:100%; margin-top:-20px;background: linear-gradient(to right, #1A4262 33%, #668196 33%, #668196 66%, #CCD5DC 66%);"></div>
  
                                    <?php
                                        
                                        $query = "SELECT * FROM entornos_virtuales_formulario  where codigo_solicitud = ?";

                                        $data3 = $net_rrhh->prepare($query);

                                        $data3->execute([$idFormulario]);

                                        while ($data = $data3->fetch()) {

                                    ?>
                                    <p class="card-text p-0 mb-0 "><b><li>Porcentaje de Avance:</li></b>
                                    
                                    <span><?php 
                                    $width = number_format($data[16], 0); // Limita a 2 decimales
                                    $date = new DateTime($data[6]);
$formattedDate = $date->format('d/m/Y');
                                    echo $width; ?>%</span>
       <div class="progress">
      
       <div class="progress-bar" role="progressbar" style="width: <?php echo $width; ?>%;" aria-valuenow="<?php echo $width; ?>" aria-valuemin="0" aria-valuemax="100">
    <?php echo $width; ?>%
</div>
 </div>
                                    
                                   
                                     <p class="card-text p-0 mb-0 "><b><li>Nombre del Arte:</li></b> <?php echo $data[17]; ?></p>
                                   <p class="card-text p-0 mb-0 "><b><li>Fechas Requeridas:</li></b> <?php echo $formattedDate; ?></p>
                                    <p class="card-text p-0 mb-0 "><b><li>Notas adicional:</li></b> <?php echo $data[14]; ?>.</p>
                                            
                                    <?php 

                                        }
                                    ?>



  </div>
                                
  <div class="card-footer text-muted">
    
  </div>

</div>
<!--:::::::::::: FIN DEL CODIGO ENCARGADOS DEL ARTE :::::::::::::::::::::::::::::-->


        
        </div>
                            </div>
</div>


                        <div class="col-1 d-flex justify-content-center">
                            <hr class="vr align-self-center h-75">
                        </div>
<!--::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->
                        <div class="col-6  mt-3">
                            <div class="card">
                            <div class="card-body  d-flex flex-column ">
                      

    <div class="form-group">
           
 <!--   <button class="btn  btn-sm" style="background-color: #CBE8BA;" data-bs-toggle="modal" data-bs-target="#exampleModalActividades">
                                        <i class="bi bi-gear"></i> Agregar Actividad
</button>
<button class="btn  btn-sm" style="background-color: #1A4262; color:white;" id="refrescarActividad">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2z"/>
  <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466"/>
</svg>
</button>
                <div id="idTablaActividades"></div>

                                -->

                <div class="container">
<div id="btnDetalleFormulario"></div>


</div>
<div id="tablaCambiosSolicitudes"></div> 
  <script>
     $("#tablaCambiosSolicitudes").load("view/Programas/EntornosVirtuales/SolicitudArtes/solicitud.artes.tabla.cambios.admin.php" ,{ id_Solicitud: "<?php echo $idFormulario; ?>" });
  </script> 

            </div>






  

            
                                </div>
                            </div>
                        </div>
</div>
<!--::::::::::MODAL ACTIVIDADES ::::::::::::::::::::::::::::::-->
<!-- Modal -->
<div class="modal fade" id="exampleModalActividades" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar Actividades</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      <input id="idIdFormulario"  class="form-control form-control-sm" type="hidden"  value="<?php echo $idFormulario; ?>">
  
    <div class="form-group ">
        <label for="exampleFormControlTextarea1">Descripción: </label>
        <textarea class="form-control" id="descripcionActividad" rows="3"></textarea>
    </div>

    <div class="form-group ">
        <label for="exampleFormControlTextarea1">Fecha Inicio: </label>
        <input id="fechaInicioid"  class="form-control form-control-sm" type="date" name="times" value="">
    </div>

    <div class="form-group ">
        <label for="exampleFormControlTextarea1">Fecha Finalización: </label>
        <input id="fechaFinalizacionid"  class="form-control form-control-sm" type="date" name="times" value="">
    </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="btnCerrarModlasda" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" id="idbtnEnviarSolicitud" class="btn btn-primary">Registrar Actividad</button>
      </div>
    </div>
  </div>
</div>

<script>
     $(document).ready(function(){
        document.getElementById("idPrioridad").value = "<?php echo $prioridad; ?>";
     });
                                           
</script>
<!--::::: MODAL GESTION SOLICITUD ::::::::::::::-->
<div class="modal fade" id="exampleModalActividades2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-body">
        
     
<h3><b>MODIFICAR INFORMACIÓN DE ENTREGA Y RESPONSABLES</b></h3>
<div style="height: 4px; width:100%; margin-top:-20px;background: linear-gradient(to right, #1A4262 33%, #668196 33%, #668196 66%, #CCD5DC 66%);"></div>
<?php
    // Obtener la fecha actual en formato YYYY-MM-DD
    $fechaActual = date('Y-m-d');
?>
<div class="form-group mt-5">
    <label for="exampleFormControlTextarea1">Fecha estimada de Entrega: <span style="color: red;">(*)</span><?php echo $fh_entrega; ?></label>
    <input id="fhEntrega" min="<?php echo $fechaActual; ?>"  class="form-control form-control-sm" type="date" name="times" value="<?php echo $fh_entrega; ?>">
  </div>

  <div class="form-group mt-2">
    <label for="exampleFormControlTextarea1">Personal Encargado  #1  : <span style="color: red;">(*)</span> </label>
    <select class="js-example-basic-single form-control form-control-sm " id="personaEncargada1" style="width: 100%;"  data-show-subtext="true" data-live-search="true">

<option value="0">N/A</option>

<?php 

include("../../config/net.php");

$query = "SELECT * FROM workarea as s1 inner join workarea_positions as s2 on s2.idarea = s1.id
inner join workarea_positions_assignment as s3 on s3.idposition = s2.id 
inner join employee as s4 on s4.id = s3.idemployee

where s1.id = 55 and enddate = '0000-00-00'";

$data3 = $net_rrhh->prepare($query);

$data3->execute();



if($data3->rowCount()>0)

{

    while ($data = $data3->fetch()) {

        echo "<option value=".$data[10].">".$data[17]." ".$data[18]." ".$data[19]." ".$data[20]." ".$data[21]."</option>"; 
    }

}

?>

</select>
  </div>


  <div class="form-group ">
    <label for="exampleFormControlTextarea1">Personal Encargado #2 : <span style="color: red;">(*)</span> </label>
    <select class="js-example-basic-single form-control form-control-sm " id="personaEncargada2" style="width: 100%;"  data-show-subtext="true" data-live-search="true">

        <option value="0">N/A</option>

        <?php 

        include("../../config/net.php");

        $query = "SELECT * FROM workarea as s1 inner join workarea_positions as s2 on s2.idarea = s1.id
        inner join workarea_positions_assignment as s3 on s3.idposition = s2.id 
        inner join employee as s4 on s4.id = s3.idemployee
        
        where s1.id = 55 and enddate = '0000-00-00'";

        $data3 = $net_rrhh->prepare($query);

        $data3->execute();



        if($data3->rowCount()>0)

        {

            while ($data = $data3->fetch()) {

                echo "<option value=".$data[10].">".$data[17]." ".$data[18]." ".$data[19]." ".$data[20]." ".$data[21]."</option>";

            }

        }

        ?>

    </select>
  </div>


  <div class="form-group ">
    <label for="exampleFormControlTextarea1">Prioridad: <span style="color: red;">(*)</span></label>
    <select class="form-control" id="idPrioridad">
            <option selected value="Baja">Baja</option>
            <option value="Media">Media</option>
            <option value="Alta">Alta</option>
            <option value="Inmediata">Inmediata</option>
    </select>
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Carpeta de Entrega:  <span style="color: red;">(*)</span></label>
    <textarea  class="form-control" id="carpetaEntrega" rows="3" placeholder="Escribir..."><?php echo $carpeta_entrega; ?></textarea>
  </div>






      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="btnCerrarModlasda22" data-bs-dismiss="modal">Close</button>
        <button class="btn " id="btnRegistrarGestion" style="background-color: #CBE8BA;">Registrar</button>
      </div>
    </div>
  </div>
</div>




<!--:::::::::::::::::::::::::::::::::::::::::::::-->


<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>



<!-- Después, incluye el CSS y JS de jQuery Toast Plugin -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>




 
<script>
$("#btnDetalleFormulario").load("view/Programas/EntornosVirtuales/SolicitudArtes/solicitud.artes.tabla.detalle.aprobacion.php",{ id_Solicitud: $("#idIdFormulario").val() });
   
$("#refrescarActividad").click(function(){
    $("#idTablaActividades").load("view/Programas/EntornosVirtuales/SolicitudArtes/solicitud.artes.tabla.actividades.php" ,{ idIdFormulario: $("#idIdFormulario").val() });

})

$("#btnRegistrarGestion").click(function(){


var banderaValidacion = 0;

if($("#personaEncargada1").val()=="")
{
    banderaValidacion =1;
}
else if($("#personaEncargada2").val() == "")
{
    banderaValidacion=1;
}
else if($("#carpetaEntrega").val() == "")
{
    banderaValidacion=1;
}

if(banderaValidacion == 1)
{
    $.toast({
            heading: 'Advertencia',
            text:'!!Llenar los campos requeridos!!',
            showHideTransition: 'slide',
            icon: 'warning',
            hideAfter: 2000, 
            position: 'top-center',
            afterHidden: function () {
       
    }
            });
}
else
{
    $.post("process/index.php",{
        process: "entornos_virtuales",
        action :"actualizarGestion",

        fhEntrega: $("#fhEntrega").val(),
        
        personaEncargada1: $("#personaEncargada1").val(), 
        personaEncargada2: $("#personaEncargada2").val(),
        idPrioridad: $("#idPrioridad").val(),
        carpetaEntrega: $("#carpetaEntrega").val(),
        idIdFormulario: $("#idIdFormulario").val()
    },
    function(response){
        $("#btnCerrarModlasda22").click();
            //document.getElementById("botonCargando").style.display="none";
           $.toast({
            heading: 'Finalizado',
            text:'Registros Guardados',
            showHideTransition: 'slide',
            icon: 'success',
            hideAfter: 2000, 
            position: 'top-center',
            afterHidden: function () {
        // Esta función se ejecutará después de que se haya ocultado el mensaje de toast
        setTimeout(function () {
            location.reload(); // Recargar la página después de 2 segundos
        }, 2000); // 2000 milisegundos = 2 segundos
    }
            });
        $("#btnCerrarModlasda22").click();
        //location.reload();
})
}

  
})

 $("#idbtnEnviarSolicitud").click(function(){
//alert($("#fechaInicioid").val())
    if($("#fechaInicioid").val() == "" || $("#fechaFinalizacionid").val() == "")
    {
        $.toast({
        heading: 'ERROR',
        text: 'Debe registrar la fecha de inicio y finalización',
        showHideTransition: 'slide',
        icon: 'error',
        hideAfter: 2000, 
        position: 'top-center'
        });
    }
    else
    {
        $.post("process/index.php",{
    
    process: "entornos_virtuales",
    action: "addActividades",

    idIdFormulario: $("#idIdFormulario").val(), 
    descripcionActividad: $("#descripcionActividad").val(), 
    fechaInicioid: $("#fechaInicioid").val(), 
    fechaFinalizacionid: $("#fechaFinalizacionid").val(), 
},
function(response){
    if(response)
    {
        //document.getElementById("botonCargando").style.display="none";
       $.toast({
        heading: 'Finalizado',
        text: response,//'Proyecto Creado Correctamente',
        showHideTransition: 'slide',
        icon: 'success',
        hideAfter: 2000, 
        position: 'top-center'
        });
        
$("#idTablaActividades").load("view/Programas/EntornosVirtuales/SolicitudArtes/solicitud.artes.tabla.actividades.php" ,{ idIdFormulario: $("#idIdFormulario").val() });
$("#idTablaActividades").load("view/Programas/EntornosVirtuales/SolicitudArtes/solicitud.artes.tabla.actividades.php" ,{ idIdFormulario: $("#idIdFormulario").val() });

        document.getElementById("btnCerrarModlasda").click();
    setTimeout(function() {
      //  window.location.href = '?view=vistaAmdminSolicitudArtes'; 
            //$("#IdProyecto").load("view/Monitoreo/get_options.php");
    }, 3000); 
    }
}
)
    }
    
})

$("#idTablaActividades").load("view/Programas/EntornosVirtuales/SolicitudArtes/solicitud.artes.tabla.actividades.php" ,{ idIdFormulario: $("#idIdFormulario").val() });


</script>