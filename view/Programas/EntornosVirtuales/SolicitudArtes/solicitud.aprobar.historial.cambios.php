<?php include("../../../../config/net.php");
    $valorRecibido = $_REQUEST['idModal'];
   // echo $valorRecibido;


     
        //PARA TOMAR LOS DATOS DE LA SEDE DE SANTA ANA:::::::::::::
        $query = "SELECT * FROM entornos_virtuales_historial_cambios where id = ?";
        $data = $net_rrhh->prepare($query);
        $data->execute([$valorRecibido]);
        // Suponiendo que $data es tu conjunto de resultados
        $nombre_comunidad = "";
       
        
        while ($data3 = $data->fetch()) 
        {
            $nombre_comunidad      =   $data3[2];
        }

  ?>
    
    
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content w-100">
            <div class="modal-body   ">
                <img src="view/Operaciones/GestionProyectos/FichaComunitaria/assets/Icons/edit.png" width="50px" height="50px">
                    APROBAR CAMBIOS DEL SOLICITANTE 
                    <hr/>
                    Descripción del Cambio :
                    <textarea id="valorObjetivoGeneralEditar" rows="3"><?php echo $nombre_comunidad; ?></textarea>
                    Motivos de Cambio:
                    <textarea id="valorObjetivoGeneralEditar"  rows="3"><?php echo $nombre_comunidad; ?></textarea>
                <input type="hidden" value="<?php echo $valorRecibido; ?>" id="idObjetivoGeneralDelete" name="idObjetivoGeneralDelete"/>
                <input type="hidden" value="<?php echo $idSolicitudFormulario; ?>" id="idSolicitudFormulario"/>
            </div>
            <div class="modal-footer p-1 border-0 ">
               <butto id="eliminarPasajerosIndividual" class="btn">APROBAR CAMBIO  </butto>
            </div>
        </div>
    </div>


<script>
   $('#eliminarPasajerosIndividual').click(function(){ 
// alert("Hola Mundo");

// Deshabilitar la empresa
$.post("process/index.php", {
process: "entornos_virtuales", 
action: "editarCambiosenlaSolicitud",    
//idTextoObjetivoGeneral : $("#valorObjetivoGeneralEditar").val(),
idObjetivoGeneralDelete: $("#idObjetivoGeneralDelete").val()

},
    function(response){
        if(response){
            $.toast({
                    heading: 'Finalizado',
                    text: "Edición terminada",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: 2000, 
                    position: 'bottom-center'
                });

              $('#btnEditarCAMBIOSAprobadosCerrar').click();
              //$("#tablaCambiosSolicitudes").load("view/Programas/EntornosVirtuales/SolicitudArtes/solicitud.artes.tabla.cambios.admin.php" ,{ id_Solicitud: $("#idSolicitudFormulario").val() });
              setTimeout(function() {
    location.reload();
}, 2000);
               //$("#tablaPasajeros").load("view/Monitoreo/Monitoreo.tabla.obj.general.php");

            }
    }
);
});
</script>

