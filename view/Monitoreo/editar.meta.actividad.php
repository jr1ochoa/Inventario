<?php include("../../config/net.php");
    $valorRecibido = $_REQUEST['idModal'];
   // echo $valorRecibido;


     
        //PARA TOMAR LOS DATOS DE LA SEDE DE SANTA ANA:::::::::::::
        $query = "SELECT * FROM monitor_metas_actividades where id = ?";
        $data = $net_rrhh->prepare($query);
        $data->execute([$valorRecibido]);
        // Suponiendo que $data es tu conjunto de resultados
        $nombre_comunidad = "";
       
        
        while ($data3 = $data->fetch()) 
        {
            $nombre_comunidad      =   $data3[1];
        }

  ?>
    
    
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content w-100">
            <div class="modal-body d-flex mb-1 justify-content-center align-items-center ">
                <img src="view/Operaciones/GestionProyectos/FichaComunitaria/assets/Icons/edit.png" width="50px" height="50px">
                <div class="row">
                    <div class="col-md-12">
                        <section class="ms-3 w-100">
                        <h2>META O ACTIVIDAD SELECCIONADO:  
                        </h2>
                        <textarea id="valorObjetivoGeneralEditar" ><?php echo $nombre_comunidad; ?></textarea>
                        </section>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Fecha de Finalización :</label>
                        <input type="date" class="form-control" id="fhFinalizacion" placeholder="name@example.com">
                        </div>
                    </div>
                </div>
                

                

                <input type="hidden" value="<?php echo $valorRecibido; ?>" id="idObjetivoGeneralDelete" name="idObjetivoGeneralDelete"/>
            </div>
            <div class="modal-footer p-1 border-0 ">
               <button id="eliminarPasajerosIndividual" class="btn">Editar  </button>
            </div>
        </div>
    </div>


<script>
   $('#eliminarPasajerosIndividual').click(function(){ 
// alert("Hola Mundo");

// Deshabilitar la empresa
$.post("process/index.php", {
process: "monitoreo_proyecto", 
action: "editarMetaActividad", 

idTextoObjetivoGeneral : $("#valorObjetivoGeneralEditar").val(),
idObjetivoGeneralDelete: $("#idObjetivoGeneralDelete").val(),
fhFinalizacion :  $("#fhFinalizacion").val()

},
    function(response){
        if(response){
            $.toast({
                    heading: 'Finalizado',
                    text: "Edición terminada",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: 3000, 
                    position: 'bottom-center'
                });

               $('#BTNcERRARiNDICADORES').click();
               //$('#refrescarMeta').click();
               //$("#tablaPasajeros").load("view/Monitoreo/Monitoreo.tabla.obj.general.php");

            }
    }
);
});
</script>

