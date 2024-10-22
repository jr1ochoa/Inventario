<?php include("../../../../config/net.php");
   $valorRecibido = $_REQUEST['idModal'];
   $idFormulario = $_REQUEST['idFormulario'];
   // echo $valorRecibido;


     
        //PARA TOMAR LOS DATOS DE LA SEDE DE SANTA ANA:::::::::::::
        $query = "SELECT * FROM entornos_virtuales_historial_cambios as s1 inner join entornos_virtuales_detalle_solicitud as s2 on s1.id_producto = s2.id inner join entornos_virtuales_productos as s3 on s3.id = s2.producto where s1.id = ?";
        $data = $net_rrhh->prepare($query);
        $data->execute([$valorRecibido]);
        // Suponiendo que $data es tu conjunto de resultados
        $nombre_comunidad = "";
       
        
        while ($data3 = $data->fetch()) 
        {
            $nombre_comunidad      =   $data3[2];
            $nombre_comunidad2      =   $data3[6];
            $nombre_producto      =   $data3[16];
        }

  ?>
    
    
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content w-100">
            <div class="modal-body d-flex mb-1 justify-content-center align-items-center ">
                <img src="view/Operaciones/GestionProyectos/FichaComunitaria/assets/Icons/delete.png" width="50px" height="50px">
                <section class="ms-3 w-100">
                <h2>Producto : <b><?php echo $nombre_producto; ?></b> </h2>
                    <h2>Descripcion del Cambio : <b><?php echo $nombre_comunidad; ?></b> </h2>
                    <h2>Motivo del Cambio : <b><?php echo $nombre_comunidad2; ?></b> </h2>
                    <p class="text-muted mb-0">¿Estas seguro de eliminar esta Información? Esta acción no se puede deshacer</p>
                </section>
                <input type="hidden" value="<?php echo $valorRecibido; ?>" id="idObjetivoGeneralDelete" name="idObjetivoGeneralDelete"/>
                <input type="hidden" value="<?php echo $idFormulario; ?>" id="iDFormulario" name="iDFormulario"/>
                
            
            
            </div>
            <div class="modal-footer p-1 border-0 ">
               <butto id="eliminarMoficacionCreada" class="btn">Eliminar </butto>
            </div>
        </div>
    </div>

    <!-- Después, incluye el CSS y JS de jQuery Toast Plugin -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>




<script>
   $('#eliminarMoficacionCreada').click(function(){ 
// alert("Hola Mundo");

// Deshabilitar la empresa
$.post("process/index.php", {
process: "entornos_virtuales", 
action: "deletemodificacioncreada",    

idObjetivoGeneralDelete: $("#idObjetivoGeneralDelete").val(),
iDFormulario: $("#iDFormulario").val()

},
    function(response){
        if(response ==1 ){
            $.toast({
                    heading: 'Finalizado',
                    text: "Modificación eliminada con éxito",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: 3000, 
                    position: 'bottom-center'
                });

               $('#btnCerrarEliminarSolicitudModificaciones').click();
               //$("#tablaCambiosSolicitudes").load("view/Programas/EntornosVirtuales/SolicitudArtes/solicitud.artes.tabla.cambios.admin.php" ,{ id_Solicitud: $("#iDFormulario").val() });
              // $("#idTablaActividades").load("view/Programas/EntornosVirtuales/SolicitudArtes/solicitud.artes.tabla.actividades.php" ,{ idIdFormulario: $("#iDFormulario").val() });
              $("#tablaCambiosSolicitudes").load("view/Programas/EntornosVirtuales/SolicitudArtes/solicitud.artes.tabla.cambios.php" ,{ id_Solicitud: "<?php echo  $idFormulario; ?>" });

               //$("#tablaPasajeros").load("view/Monitoreo/Monitoreo.tabla.obj.general.php");

            }
            else
            {
                $.toast({
                    heading: 'Error',
                    text: "No se puede eliminar Modificaciones aprobadas por Entornos Virtuales",
                    showHideTransition: 'slide',
                    icon: 'error',
                    hideAfter: 3000, 
                    position: 'bottom-center'
                });
            }
    }
);
});
</script>

