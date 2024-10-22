<?php include("../../../../config/net.php");
    $valorRecibido = $_REQUEST['idModal'];
    $idFormulario = $_REQUEST['idFormulario'];
   // echo $valorRecibido;


     
        //PARA TOMAR LOS DATOS DE LA SEDE DE SANTA ANA:::::::::::::
        $query = "SELECT * FROM entornos_virtuales_formulario where codigo_solicitud = ?";
        $data = $net_rrhh->prepare($query);
        $data->execute([$valorRecibido]);
        // Suponiendo que $data es tu conjunto de resultados
        $nombre_comunidad = "";
       
        
        while ($data3 = $data->fetch()) 
        {
            $nombre_comunidad      =   $data3[17];
        }

  ?>
    
    
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content w-100">
            <div class="modal-body d-flex mb-1 justify-content-center align-items-center ">
                <img src="view/Operaciones/GestionProyectos/FichaComunitaria/assets/Icons/delete.png" width="50px" height="50px">
                <section class="ms-3 w-100">
                    <h2>Actividad :  <?php echo $nombre_comunidad; ?></h2>
                    <p class="text-muted mb-0">¿Estas seguro de eliminar esta Información? Esta acción no se puede deshacer</p>
                </section>
                <input type="hidden" value="<?php echo $valorRecibido; ?>" id="idObjetivoGeneralDelete" name="idObjetivoGeneralDelete"/>
                <input type="hidden" value="<?php echo $idFormulario; ?>" id="iDFormulario" name="iDFormulario"/>
                
            
            
            </div>
            <div class="modal-footer p-1 border-0 ">
               <butto id="eliminarSolicitudArte" class="btn">Eliminar </butto>
            </div>
        </div>
    </div>

    <!-- Después, incluye el CSS y JS de jQuery Toast Plugin -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>




<script>
   $('#eliminarSolicitudArte').click(function(){ 
// alert("Hola Mundo");

// Deshabilitar la empresa
$.post("process/index.php", {
process: "entornos_virtuales", 
action: "deletesolicitudarte",     

idObjetivoGeneralDelete: $("#idObjetivoGeneralDelete").val(),
iDFormulario: $("#iDFormulario").val()

},
    function(response){
       
        if(response==1){
            $.toast({
                    heading: 'Finalizado',
                    text: "Solicitud eliminada con éxito",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: 3000, 
                    position: 'bottom-center'
                });

               $('#btnCerrarEliminarSolicitud').click();
               //$("#tablaCambiosSolicitudes").load("view/Programas/EntornosVirtuales/SolicitudArtes/solicitud.artes.tabla.cambios.admin.php" ,{ id_Solicitud: $("#iDFormulario").val() });
              // $("#idTablaActividades").load("view/Programas/EntornosVirtuales/SolicitudArtes/solicitud.artes.tabla.actividades.php" ,{ idIdFormulario: $("#iDFormulario").val() });
              $("#tablasTablaVista").load("view/Programas/EntornosVirtuales/SolicitudArtes/solicitud.artes.vista.solicitante.tabla.php");  
               //$("#tablaPasajeros").load("view/Monitoreo/Monitoreo.tabla.obj.general.php");

            }
            else{
                $('#btnCerrarEliminarSolicitud').click();
                $.toast({
                    heading: 'ERROR DE OPERACIÓN',
                    text: "!! ERROR !!, No se puede eliminar una solicitud aceptada por ENTORNOS VIRTUALES",
                    showHideTransition: 'slide',
                    icon: 'error',
                    hideAfter: 4000, 
                    position: 'top-center'
                });
            }
    }
);
});
</script>

