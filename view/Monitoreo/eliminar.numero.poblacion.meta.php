<?php include("../../config/net.php");
    $valorRecibido = $_REQUEST['idModal'];
   // echo $valorRecibido;


     
        //PARA TOMAR LOS DATOS DE LA SEDE DE SANTA ANA:::::::::::::
        $query = "SELECT * FROM monitor_numero_poblacionmeta where id = ?";
        $data = $net_rrhh->prepare($query);
        $data->execute([$valorRecibido]);
        // Suponiendo que $data es tu conjunto de resultados
        $nombre_comunidad = "";
       
        
        while ($data3 = $data->fetch()) 
        {
            $nombre_comunidad      =   $data3[2];
            $numero_poblacion      =   $data3[3];
        }

  ?>
    
    
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content w-100">
            <div class="modal-body d-flex mb-1 justify-content-center align-items-center ">
                <img src="view/Operaciones/GestionProyectos/FichaComunitaria/assets/Icons/delete.png" width="50px" height="50px">
                <section class="ms-3 w-100">
                    <h2>POBLACIÓN META SELECCIONADA : </h2>
                    Nombre Comunidad: 
                    <input type="text" style="background-color: #E8E8E8;" disabled value="<?php echo $nombre_comunidad; ?>" id="nombre_comunidadid" name="nombre_comunidadid"/>
                    Número Población
                    <input type="text" value="<?php echo $numero_poblacion; ?>" id="numero_poblacionid" name="numero_poblacionid"/>
                    
                </section>
                <input type="hidden" value="<?php echo $valorRecibido; ?>" id="idObjetivoGeneralDelete" name="idObjetivoGeneralDelete"/>
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
process: "monitoreo_proyecto", 
action: "deletenumeropoblacionmetas",    

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

               $('#btnCerrarMODALObjEspecifico').click();
              // $('#refrescarObjEspecifico').click();
               //$("#tablaPasajeros").load("view/Monitoreo/Monitoreo.tabla.obj.general.php");

            }
    }
);
});
</script>

