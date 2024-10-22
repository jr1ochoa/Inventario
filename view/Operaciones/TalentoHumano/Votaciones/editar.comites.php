<?php include("../../../../config/net.php");
    $valorRecibido = $_REQUEST['idModal'];
       //echo $valorRecibido;
  
        //PARA TOMAR LOS DATOS DE LA SEDE DE SANTA ANA:::::::::::::
        $query = "SELECT * FROM `votaciones_comites` where id =?";
        $data = $net_rrhh->prepare($query);
        $data->execute([$valorRecibido]);
        // Suponiendo que $data es tu conjunto de resultados
        $nombre_comunidad = "";
        $nota = "";
        
        while ($data3 = $data->fetch()) 
        {
            $nombre_comunidad      =   $data3[1];
            $nota = $data3[6];
        }

  ?>
    
    
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content w-100">
            <div class="modal-body d-flex mb-1 justify-content-center align-items-center ">
                <img src="view/Operaciones/GestionProyectos/FichaComunitaria/assets/Icons/edit.png" width="50px" height="50px">
                <section class="ms-3 w-100">
                    <h2>RESULTADO  SELECCIONADO:   </h2>

                  
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Editar Nombre</label>
                        <textarea type="text" class="form-control" maxlength="255" id="editarNombre" placeholder="escribir..." rows="2"><?php echo $nombre_comunidad; ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Editar Descripción</label>
                        <textarea type="text" class="form-control" maxlength="250" id="editarDescripcion" placeholder="escribir..." rows="2"><?php echo $nota; ?></textarea>
                    </div>

                   
                    
                   </section>
                <input type="hidden" value="<?php echo $valorRecibido; ?>" id="idObjetivoGeneralDelete" name="idObjetivoGeneralDelete"/>
            </div>
            <div class="modal-footer p-1 border-0 ">
               <button id="editarMOtoristas222" class="btn">Editar  </button>
            </div>
        </div>
    </div>


<script>
$('#editarMOtoristas222').click(function(){ 
//alert("Hola Mundo");
//alert($("#idEstadoMotorista").val());
$.post("process/index.php", {
    process: "votacion",
    action: "editarComite",  
 
    editarNombre    : $("#editarNombre").val(),
    editarDescripcion       : $("#editarDescripcion").val(),
    idObjetivoGeneralDelete : $("#idObjetivoGeneralDelete").val()

},
    function(response){
       //alert(response);
        if(response){
            $.toast({
                    heading: 'Finalizado',
                    text: "Edición terminada",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: 3000, 
                    position: 'bottom-center'
                });

               $('#btnCerrrarModalEditarComite').click();
              // $("#tablaMotorista").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.tabla.motoristas.php");
              setTimeout(function() {
    location.reload(); // Refresca la página
}, 4000);
               //$('#refrescarResultados').click();
               //$("#tablaPasajeros").load("view/Monitoreo/Monitoreo.tabla.obj.general.php");
            }
    }
);
});
</script>

