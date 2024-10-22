<?php 
$id_Solicitud = $_REQUEST['idSolicitudArtes'];
//echo $id_Solicitud;
?>
<input type="hidden" id="idCodigoRecibido" value="<?=$id_Solicitud;?>"/>
<center class="mt-3"><h2><b>Detalle de la Solicitd de Arte</b></h2>
<div style="height: 4px; width:80%; margin-top:-20px;background: linear-gradient(to right, #1A4262 33%, #668196 33%, #668196 66%, #CCD5DC 66%);"></div>
  

</center>
 
<div class="select-cards-cont my-5 mx-5  ">
                    <div class="row justify-content-center">
                        <div class="col-5 h-100">
                        <h4><b>INFORMACIÓN GENERAL DE LA SOLICITUD </b> </h4>
<div style="height: 4px; width:100%; margin-top:-20px;background: linear-gradient(to right, #1A4262 33%, #668196 33%, #668196 66%, #CCD5DC 66%);"></div>
  
                            <div class="card">
                                <div class="card-body ">
                                <div class="card ">
  <div class="card-header">
    Información del desarrollo
  </div>

                                    <div style="background-color: #D3E4EB; border-radius:5px;">
                                    <?php
                                        
                                        $query = "SELECT * FROM `entornos_virtuales_formulario` as s1 inner join employee as s2 on s1.id_encargado = s2.id 
                                        LEFT join employee as s3 on s1.id_encargado2 = s3.id    where s1.codigo_solicitud = ?";
                                        $data3 = $net_rrhh->prepare($query);
                                        $data3->execute([$id_Solicitud]);
                                        if ($data3->rowCount() > 0) {
                                            while ($data = $data3->fetch()) {
                                                $date2 = new DateTime($data[7]);
                                                $formattedDate2 = $date2->format('d/m/Y');
                                        ?>
                                                <p><b>-Responsable: 👤</b><?php echo($data[22] . ' ' . $data[23] . ' ' . $data[24] . ' ' . $data[25] . ' ' . $data[26]) ; ?></p>
                                                <p><b>-Responsable: 👤</b><?php echo($data[46] . ' ' . $data[47] . ' ' . $data[48] . ' ' . $data[49] . ' ' . $data[50]) ; ?></p>
                                                <p class="p-0 mb-0"><b>-Prioridad: </b><?php echo isset($data[9]) ?  ($data[9]) : "" ?></p>
                                                <p class="p-0 mb-0"><b>-Carpeta de Entrega: </b><a href="<?php echo isset($data[12]) ?  ($data[12]) : "" ?>">Descargar Recursos Aquí</a></p>
                                                <p class="p-0 mt-1 mb-0"><b>-Fecha de Entrega: 🗓️ </b> <?php echo isset($formattedDate2) ?  ($formattedDate2) : "" ?></p>
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
                                    </div>
                                </div>
                                    <div class="card-footer text-muted">
    
  </div>

                                    <hr/>
                                    <?php
                                        
                                        $query = "SELECT * FROM entornos_virtuales_formulario  where codigo_solicitud = ?";

                                        $data3 = $net_rrhh->prepare($query);

                                        $data3->execute([$id_Solicitud]);

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
                            </div>
                        </div>

                        <div class="col-1 d-flex justify-content-center">
                            <hr class="vr align-self-center h-75">
                        </div>


<!--::: Modal para agregar Modificaciones ::::::-->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">AGREGAR MODIFICACIÓN A LA SOLICITUD</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
      
        
        <input type="hidden" value="<?php echo $id_Solicitud ?>" id="idSolicitudFormulario"/>

            <div class="mb-3">
                <label for="formFile" class="form-label">Seleccione Producto:  </label>
                <select class="form-select form-select-sm" id="selectProducto" aria-label=".form-select-sm example">
                    <option selected>Seleccione</option>

                    <?php
$query = "SELECT * FROM entornos_virtuales_detalle_solicitud as s1 
          LEFT JOIN entornos_virtuales_productos as s2 ON s1.producto = s2.id 
          LEFT JOIN entornos_virtuales_medidas as s3 ON s3.id = s1.medidas 
          WHERE s1.codigo_solicitud = ?";
$data3 = $net_rrhh->prepare($query);
$data3->execute([$id_Solicitud]);

while ($data = $data3->fetch()) {
    if ($data[2] == "N/A/S") {
        $medidaBD = $data[5];
    } else {
        $medidaBD = $data[12];
    }

    // Utiliza comillas simples dentro de las comillas dobles y escapa las comillas
    echo "<option value='" . htmlspecialchars($data[0], ENT_QUOTES, 'UTF-8') . "'>" 
         . htmlspecialchars($data[9], ENT_QUOTES, 'UTF-8') . " - : " 
         . htmlspecialchars($medidaBD, ENT_QUOTES, 'UTF-8') . "</option>";
}
?>

                </select> 
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label">Descripción del Cambio:  </label>
                <textarea class="form-control" id="descripcionCambioId" rows="2"></textarea> 
            </div>
        

            <div class="mb-3">
                <label for="formFile" class="form-label">Indicaciones de Arte:  </label>
                <textarea class="form-control" id="motivosCambiosId" rows="3"></textarea> 
            </div>

            
        


      <div class="modal-footer">

      <a type="button" id="btnReturn2"  class="btn btn-sm btn-seconday" style="background-color: #FD9683;" data-bs-dismiss="modal">Cancelar</a>

        <a type="button" id="btnSaveInscription2" class="btn  btn-sm" style="background-color: #CBE8BA;"  >Registrar Cambio</a>

      </div>

      <a class="btn btn-success" id="botonCargando2"  style="display:none;"type="button" disabled>

  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>

  Loading...

</a>




      </div>
    </div>
  </div>
</div>

<!--::::::::::::::::::::::::::::::::::::::::::::-->
                        <div class="col-md-5 h-100">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-sm btn-outline-success">Agregar Modificaciones</button>
                            <div class="row">



                        <div id="tablaCambiosSolicitudes"></div>




                               

                               



                               

                            </div>


                            
                        </div>


                        



                    </div>
                </div>


<!--::::::::::::::: LISTA DE PRODUCTOS Y PORCENTAJE DE AVANCE ::::::::::::::::::::::::::-->
<div class="container">
<div id="tablaDetalleFormularios"></div>
</div>

<!--::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->

    <!-- Después, incluye el CSS y JS de jQuery Toast Plugin -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>

<script> 
    $("#tablaDetalleFormularios").load("view/Programas/EntornosVirtuales/SolicitudArtes/solicitud.artes.tabla.productos.detalles.ver.php",{ id_Solicitud: $("#idCodigoRecibido").val() });
  
    $("#tablaCambiosSolicitudes").load("view/Programas/EntornosVirtuales/SolicitudArtes/solicitud.artes.tabla.cambios.php" ,{ id_Solicitud: $("#idCodigoRecibido").val() }); 

    //
  $("#btnSaveInscription2").click(function(){
    $.post("process/index.php",{
        
        process: "entornos_virtuales",
        action :"addModificacionSolicitud",

        descripcionCambioId: $("#descripcionCambioId").val(),
        motivosCambiosId: $("#motivosCambiosId").val(),
        idSolicitudFormulario: $("#idSolicitudFormulario").val(),
        selectProducto : $("#selectProducto").val()
    },
    function(response){
        if(response == 1)
        {
            document.getElementById("btnReturn2").click();
           $.toast({
            heading: 'Finalizado',
            text: 'Modificación Agregada Correctamente',
            showHideTransition: 'slide',
            icon: 'success',
            hideAfter: 2000, 
            position: 'top-center'
            });
            
            $("#tablaCambiosSolicitudes").load("view/Programas/EntornosVirtuales/SolicitudArtes/solicitud.artes.tabla.cambios.php" ,{ id_Solicitud: $("#idSolicitudFormulario").val() });

        }
        else
        {
            $.toast({
            heading: 'ERROR',
            text: '!! Error !!, No se puede crear Modificaciones a un Proyecto Terminado',
            showHideTransition: 'slide',
            icon: 'error',
            hideAfter: 4000, 
            position: 'top-center'
            });
        }
            
    })
})
</script>