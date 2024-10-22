<?php include("../../../../config/net.php");
    $valorRecibido = $_REQUEST['idModal'];
   // echo $valorRecibido;


     
        //PARA TOMAR LOS DATOS DE LA SEDE DE SANTA ANA:::::::::::::
        $query = "
        Select * from admin_finanzas_informacion_vehiculo where id = ?
        ";
        $data = $net_rrhh->prepare($query);
        $data->execute([$valorRecibido]);
        // Suponiendo que $data es tu conjunto de resultados
        $nombre_comunidad = "";
       $placa = "";
        
        while ($data3 = $data->fetch()) 
        {
            $nombre_comunidad      =   $data3[1].' '.$data3[2].' '.$data3[3].' '.$data3[4];
            $placa = $data3[12];
        }

  ?>
    
    
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content w-100">
            <div class="modal-body d-flex mb-1 justify-content-center align-items-center ">
                <img src="view/Operaciones/GestionProyectos/FichaComunitaria/assets/Icons/delete.png" width="50px" height="50px">
                <section class="ms-3 w-100">
                    <h2>Vehiculo :  <?php echo $nombre_comunidad; ?></h2><br/>
                    <h2>Placa: <?php echo $placa; ?></h2>
                    <p class="text-muted mb-0">¿Estas seguro de eliminar esta información? Esta acción no se puede deshacer</p>
                </section>
                <input type="hidden" value="<?php echo $valorRecibido; ?>" id="idObjetivoGeneralDelete" name="idObjetivoGeneralDelete"/>
            </div>
            <div class="modal-footer p-1 border-0 ">
               <button id="eliminarMotoristaRegistrar" class="btn">Eliminar </button>
            </div>
        </div>
    </div>


   <!-- <script src="view/Operaciones/AdministracionFinanciera/SolicitudTransporte/eliminar.solicitud.js"></script>-->
<script>
   $('#eliminarMotoristaRegistrar').click(function(){ 
// alert("Hola Mundo");

// Deshabilitar la empresa
$.post("process/index.php", {
    process: "administracion_finanza",
    action: "DeleteVehiculoTabla",

idObjetivoGeneralDelete: $("#idObjetivoGeneralDelete").val()

},
    function(response){
        if(response){
            $.toast({
                    heading: 'Finalizado',
                    text: "Pasajero eliminado con éxito",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: 3000, 
                    position: 'bottom-center'
                });
 
               $('#btnCerrrarModalVehiculos222').click();
               $("#tablaVehiculo").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.tabla.vehiculo.php");
               //$("#tablaProceso").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.tabla.publica.php");

            }
    }
);
});
</script>

