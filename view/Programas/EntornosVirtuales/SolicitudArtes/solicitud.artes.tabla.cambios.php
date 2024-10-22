<?php 
include("../../../../config/net.php");
?>
<h4><b>HISTORIAL DE CAMBIOS Y SUS ESTADOS </b> </h4>
<div style="height: 4px; width:100%; margin-top:-20px;background: linear-gradient(to right, #1A4262 33%, #668196 33%, #668196 66%, #CCD5DC 66%);"></div>
  
<?php        
    $id_FORMULARIO = $_REQUEST['id_Solicitud'];      
    //echo $id_FORMULARIO.'==========';                      
    $query = "SELECT * FROM entornos_virtuales_historial_cambios  where id_formulario = ? order by id desc";
    $data3 = $net_rrhh->prepare($query);
    $data3->execute([$id_FORMULARIO]);
    if ($data3->rowCount() > 0) {
        while ($data = $data3->fetch()) {
            $varModificacion = $data[0];
?>
<div class="col-12">
    <div class="card">
        <div class="card-body ">
            <div style="background-color: #D9E6EB; border-radius:5px;">
            <div class="row">
                <div class="col-8">
                <p class="p-0 mb-0">Fecha de Modificación: <?php echo $data[7] ?></p> 
                </div>
                <div class="col-4">
                <button class="btn btn-sm " title="Eliminar Modificación" onclick="funcionEliminarModificacionesSolicitante('<?php echo htmlspecialchars($data[0], ENT_QUOTES, 'UTF-8') ?>', '<?php echo htmlspecialchars($id_FORMULARIO, ENT_QUOTES, 'UTF-8') ?>')" data-bs-toggle="modal" data-bs-target="#exampleEliminarModificacionesCreadas">
                    
                
                
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
</svg></button>
                </div>
            </div>
             
            </div>
            <hr/>
            <p class="card-text p-0 mb-0 "><b>Descripción del Cambio:</b> <?php echo $data[2] ?>.</p>
            <p class="card-text p-0 mb-0 "><b>Motivos de Cambio:</b> <?php echo $data[6] ?></p>

            <div class="card-footer text-muted">
                <p class="card-text p-0 mb-0 "><b>Estado:</b>
                <?php
                if($data[3] == 1)
                {
                    echo "<span style='background-color:#FEF2D4;'>En espera de aprobación</span>";
                }
                else
                {
                    echo "<span style='background-color:#C0E5B9; border-radius: 5px;'>Aprobado</span>";
                }
                ?></p>
            </div>

            
        </div>
    </div>
</div>
<?php 
    }  
}
?>

<!-- MODAL ELIMINAR PASAJERO -->
<div class="modal fade" id="exampleEliminarModificacionesCreadas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header colorEncabezadoLista">
        <h5 class="modal-title" id="exampleModalLabel" style="color:white;">ELIMINAR SOLICITUD DE ARTE </h5>
        <button type="button" id="btnCerrarEliminarSolicitudModificaciones" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
     
      <div id="EliminarModificacionesSolicitantes"></div>
    
      
      <div class="modal-footer">
       
        <!--<button type="button"id="EliminarPasajerobtn2" class="btn btn-primary">Confirmar la Eliminación</button>-->
      </div>
      <a class="btn btn-success" id="botonCargando"  style="display:none;"type="button" disabled>
    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
    Loading...
    </a>
    </div>
  </div>
</div>

<!--<script src="view/Programas/EntornosVirtuales/SolicitudArtes/eliminar.modificaciones.solicitante.js"></script>-->


<script>
   // let funcionEliminarModificacionesSolicitante= (valor,valor2) => {
    //    data-bs-target='#exampleModal2'
    /*
    */
    let funcionEliminarModificacionesSolicitante= (valor,valor2) => {

        $("#EliminarModificacionesSolicitantes").load("view/Programas/EntornosVirtuales/SolicitudArtes/eliminar.modificaciones.solicitantes.php",{
   idModal: valor,  // Escapar caracteres especiales
        idFormulario: valor2
    }); 
    }
  //// alert(valor);
   
//}
</script>