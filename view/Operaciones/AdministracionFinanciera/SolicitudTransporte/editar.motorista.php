<?php include("../../../../config/net.php");
    $valorRecibido = $_REQUEST['idModal'];
       //echo $valorRecibido;
  
        //PARA TOMAR LOS DATOS DE LA SEDE DE SANTA ANA:::::::::::::
        $query = "SELECT s1.*, s2.name1,s2.name2, s2.name3, s2.lastname1,s2.lastname2 FROM `admin_finanzas_lista_motorista` as s1 inner join employee as s2 on s1.id_empleado = s2.id where s1.id = ?";
        $data = $net_rrhh->prepare($query);
        $data->execute([$valorRecibido]);
        // Suponiendo que $data es tu conjunto de resultados
        $nombre_comunidad = "";
        $nota = "";
        
        while ($data3 = $data->fetch()) 
        {
            $nombre_comunidad      =   $data3[10].' '.$data3[11].' '.$data3[12].' '.$data3[13];
            $nota = $data3[8];
        }

  ?>
    
    
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content w-100">
            <div class="modal-body d-flex mb-1 justify-content-center align-items-center ">
                <img src="view/Operaciones/GestionProyectos/FichaComunitaria/assets/Icons/edit.png" width="50px" height="50px">
                <section class="ms-3 w-100">
                    <h2>RESULTADO  SELECCIONADO:   </h2>

                    <textarea disabled style="background-color: #F0F0F0;" id="valorObjetivoGeneralEditar"  rows="1"><?php echo $nombre_comunidad; ?></textarea>
                    
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Editar Observacion</label>
                        <textarea type="text" class="form-control" id="observacionMotorista" placeholder="escribir..." rows="2"><?php echo $nota; ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Estado del motorista</label>
                        <select id="idEstadoMotorista" class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option value="2">INCAPACIDAD</option>
                            <option value="1">ACTIVO</option>
                        </select>
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
    process: "administracion_finanza",
    action: "editarMotorista23",  
 
    observacionMotorista    : $("#observacionMotorista").val(),
    idEstadoMotorista       : $("#idEstadoMotorista").val(),
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

               $('#btnCerrarModalEditarMotorista').click();
               $("#tablaMotorista").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.tabla.motoristas.php");

               //$('#refrescarResultados').click();
               //$("#tablaPasajeros").load("view/Monitoreo/Monitoreo.tabla.obj.general.php");
            }
    }
);
});
</script>

