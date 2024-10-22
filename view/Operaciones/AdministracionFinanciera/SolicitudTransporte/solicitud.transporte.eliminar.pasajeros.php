<?php include("../../../../config/net.php");
    $valorRecibido = $_REQUEST['idModal'];
   // echo $valorRecibido;


     
        //PARA TOMAR LOS DATOS DE LA SEDE DE SANTA ANA:::::::::::::
        $query = "SELECT * FROM admin_finanzas_lista_pasajeros where id = ?";
        $data = $net_rrhh->prepare($query);
        $data->execute([$valorRecibido]);
        // Suponiendo que $data es tu conjunto de resultados
        $nombre_comunidad = "";
       
        
        while ($data3 = $data->fetch()) 
        {
            $nombre_comunidad      =   $data3[6];
        }

  ?>
    
    
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content w-100">
            <div class="modal-body d-flex mb-1 justify-content-center align-items-center ">
                <img src="view/Operaciones/GestionProyectos/FichaComunitaria/assets/Icons/delete.png" width="50px" height="50px">
                <section class="ms-3 w-100">
                    <h2>Pasajero :  <?php echo $nombre_comunidad; ?></h2>
                    <p class="text-muted mb-0">¿Estas seguro de eliminar este Pasajero? Esta acción no se puede deshacer</p>
                </section>
                <input type="hidden" value="<?php echo $valorRecibido; ?>" id="idEncabezadoDelete" name="idEncabezadoDelete"/>
            </div>
            <div class="modal-footer p-1 border-0 ">
               <butto id="eliminarPasajerosIndividual" class="btn">Eliminar </butto>
            </div>
        </div>
    </div>


<script>
   $('#eliminarPasajerosIndividual').click(function(){ 
// alert("Hola Mundo");

// Deshabilitar la empresa
$.post("process/index.php", {
process: "administracion_finanza", 
action: "deletePasajero",    

idEncabezadoDelete: $("#idEncabezadoDelete").val()

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

                $('#btnCerrarModalPsajero').click();//refrescarPasajero
                $('#refrescarPasajero').click();
               //$("#tablaPasajeros").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.tabla.pasajeros.php");

            }
    }
);
});
</script>

