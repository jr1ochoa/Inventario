<?php include("../../../../config/net.php");
    $valorRecibido = $_REQUEST['idModal'];
   // echo $idFormulario;


     
        //PARA TOMAR LOS DATOS DE LA SEDE DE SANTA ANA:::::::::::::
        $query = "SELECT * FROM entornos_virtuales_lista_actividades where id = ?";
        $data = $net_rrhh->prepare($query);
        $data->execute([$valorRecibido]);
        // Suponiendo que $data es tu conjunto de resultados
        $nombre_comunidad = "";
       
        
        while ($data3 = $data->fetch()) 
        {
            $nombre_comunidad      =   $data3[2];
            $estadoActividad = $data3[3];
        }

  ?>
    
    
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content w-100">
            <div class="modal-body   ">
                <img src="view/Operaciones/GestionProyectos/FichaComunitaria/assets/Icons/edit.png" width="50px" height="50px">
                 
                <?php
                echo ($estadoActividad == 1)? ' ¿Desea marcar esta actividad como terminada? ' : ' ¿Desea marcar esta actividad como no terminada? '; 
                ?>
               
                    <hr/>
                    Descripción de la Actividad :
                    <textarea id="valorObjetivoGeneralEditar" rows="3"><?php echo $nombre_comunidad; ?></textarea>
                    
                <input type="hidden" value="<?php echo $valorRecibido; ?>" id="idActividadTerminada" name="idActividadTerminada"/>
                <input type="hidden" value="<?php echo $_REQUEST['idFormulario']; ?>" id="idIdFormulario" name="idIdFormulario"/>
            </div>
            <div class="modal-footer p-1 border-0 ">
            <?php
                 if($estadoActividad == 1){
            ?>
               
            <button id="editarActividad" class="btn">Si, Actividad Terminada  </button>
            <?php 
            }else { ?>
                <button id="editarActividadEnProceso" class="btn">Si, Actividad En Proceso  </button>
            <?php
            }
            ?>
            </div>
        </div>
    </div>


<script>
   $('#editarActividad').click(function(){ 
// alert("Hola Mundo");

// Deshabilitar la empresa
$.post("process/index.php", {
process: "entornos_virtuales", 
action: "editarActividadComoterminada",    
idIdFormulario : $("#idIdFormulario").val(),
idActividadTerminada: $("#idActividadTerminada").val()

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

              $('#btnEditarCAMBIOSAprobadosCerrar').click();
              $("#idTablaActividades").load("view/Programas/EntornosVirtuales/SolicitudArtes/solicitud.artes.tabla.actividades.php" ,{ idIdFormulario: $("#idIdFormulario").val() });

               //$("#tablaPasajeros").load("view/Monitoreo/Monitoreo.tabla.obj.general.php");

            }
    }
);
});

//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
//ACTIVIDAD VUELTA A PROCESO ::::::::::::::::::::::::::::::::::
$('#editarActividadEnProceso').click(function(){ 
// alert("Hola Mundo");

// Deshabilitar la empresa
$.post("process/index.php", {
process: "entornos_virtuales", 
action: "editarActividadComopROCESO",    
idIdFormulario : $("#idIdFormulario").val(),
idActividadTerminada: $("#idActividadTerminada").val()

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

              $('#btnEditarCAMBIOSAprobadosCerrar').click();
              $("#idTablaActividades").load("view/Programas/EntornosVirtuales/SolicitudArtes/solicitud.artes.tabla.actividades.php" ,{ idIdFormulario: $("#idIdFormulario").val() });

               //$("#tablaPasajeros").load("view/Monitoreo/Monitoreo.tabla.obj.general.php");

            }
    }
);
});
</script>

