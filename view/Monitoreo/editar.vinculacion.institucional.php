<?php include("../../config/net.php");
    $valorRecibido = $_REQUEST['idModal'];
   // echo $valorRecibido;


     
        //PARA TOMAR LOS DATOS DE LA SEDE DE SANTA ANA:::::::::::::
        $query = "SELECT * FROM monitor_vinculacion_institucional where id = ?";
        $data = $net_rrhh->prepare($query);
        $data->execute([$valorRecibido]);
        // Suponiendo que $data es tu conjunto de resultados
        $nombre_comunidad = "";
        $nombre_comunidad2 = "";
        
        while ($data3 = $data->fetch()) 
        {
            $nombre_comunidad       =   $data3[2];
            $nombre_comunidad2      =   $data3[3];
        }

  ?>
    
    
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content w-100">
            <div class="modal-body d-flex mb-1 justify-content-center align-items-center ">
                <img src="view/Operaciones/GestionProyectos/FichaComunitaria/assets/Icons/edit.png" width="50px" height="50px">
                <section class="ms-3 w-100">
                    <h2>Vinculación Institucional:
                    
                   
                    
                    
                    </h2>
                    Descripcion de apoyo:
                    <textarea id="idTextoObjetivoGeneral" ><?php echo $nombre_comunidad; ?></textarea>
                    Descripcion de recursos :
                    <textarea id="idTextoObjetivoGeneral2" ><?php echo $nombre_comunidad2; ?></textarea>
                </section>
                <input type="hidden" value="<?php echo $valorRecibido; ?>" id="idObjetivoGeneralDelete" name="idObjetivoGeneralDelete"/>
            </div>
            <div class="modal-footer p-1 border-0 ">
               <butto id="editarVinculacionInstitucional" class="btn">Editar  </butto>
            </div>
        </div>
    </div>


<script>
   $('#editarVinculacionInstitucional').click(function(){ 
// alert("Hola Mundo");

// Deshabilitar la empresa
$.post("process/index.php", {
process: "monitoreo_proyecto", 
action: "editarVinculacionInstitucional",    
idTextoObjetivoGeneral : $("#idTextoObjetivoGeneral").val(),
idTextoObjetivoGeneral2 : $("#idTextoObjetivoGeneral2").val(),
idObjetivoGeneralDelete: $("#idObjetivoGeneralDelete").val()

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

               $('#btnCerrarMODALObjGeneral').click();
             //  $('#refrescarObjEspecifico').click();
               //$("#tablaPasajeros").load("view/Monitoreo/Monitoreo.tabla.obj.general.php");

            }
    }
);
});
</script>

