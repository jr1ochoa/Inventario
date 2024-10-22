<?php include("../../../../config/net.php");
    $valorRecibido = $_REQUEST['idModal'];
    echo $valorRecibido;
   $nombre_comunidad = "";

     
        //PARA TOMAR LOS DATOS DE LA SEDE DE SANTA ANA:::::::::::::
        $query = "
       SELECT * FROM `votaciones_comites`  where id = ?
        ";
        $data32 = $net_rrhh->prepare($query);
        $data32->execute([$valorRecibido]);
        // Suponiendo que $data es tu conjunto de resultados
        
       
        
        while ($data3 = $data32->fetch()) 
        {
            $nombre_comunidad      =   $data3[1];
        }

  ?>
    
    
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content w-100">
            <div class="modal-body d-flex mb-1 justify-content-center align-items-center ">
                <img src="view/Operaciones/GestionProyectos/FichaComunitaria/assets/Icons/delete.png" width="50px" height="50px">
                <section class="ms-3 w-100">
                    <h2>Comité :  <?php echo $nombre_comunidad; ?></h2>
                    <p class="text-muted mb-0">¿Estas seguro de Deshabilitar este comité? </p>
                </section>
                <input type="hidden" value="<?php echo $valorRecibido; ?>" id="idObjetivoGeneralDelete" name="idObjetivoGeneralDelete"/>
            </div>
            <div class="modal-footer p-1 border-0 ">
               <button id="eliminarMotoristaRegistrar" class="btn">Eliminar </button>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
 
 <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
 
 <!-- Después, incluye el CSS y JS de jQuery Toast Plugin -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
 

   <!-- <script src="view/Operaciones/AdministracionFinanciera/SolicitudTransporte/eliminar.solicitud.js"></script>-->
<script>
   $('#eliminarMotoristaRegistrar').click(function(){ 
 // alert($("#idObjetivoGeneralDelete").val());

// Deshabilitar la empresa
$.post("process/index.php", {
    process: "votacion",
    action: "deletecomite",

idObjetivoGeneralDelete: $("#idObjetivoGeneralDelete").val()

},
    function(response){
        //console.log(response);
        if(response){
            $.toast({
                    heading: 'Finalizado',
                    text: "Comité deshabilitado con éxito",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: 3000, 
                    position: 'bottom-center'
                });

                $('#btnCerrrarModalCerrarComite').click();
                setTimeout(function() {
    location.reload(); // Refresca la página
}, 4000); 
              // $("#tablaMotorista").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.tabla.motoristas.php");
               //$("#tablaProceso").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.tabla.publica.php");

            }
    }
);
});
</script>

