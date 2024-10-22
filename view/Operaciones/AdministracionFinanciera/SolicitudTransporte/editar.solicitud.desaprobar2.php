<?php include("../../../../config/net.php");
?>

<?php 
    $valorRecibido = $_REQUEST['idModal'];
       //echo $valorRecibido;
  
        //PARA TOMAR LOS DATOS DE LA SEDE DE SANTA ANA:::::::::::::
        $query = 
        "
        
        SELECT s1.*, s2.area, s3.name1,s3.name2,s3.lastname1,s3.lastname2 FROM admin_finanzas_formulario as s1 inner join workarea as s2 on s1.id_area_solicitante = s2.id
 inner join employee as s3 on s1.id_empleado = s3.id where s1.id = ? 
        
        ";
        $data = $net_rrhh->prepare($query);
        $data->execute([$valorRecibido]);
        // Suponiendo que $data es tu conjunto de resultados
        $nombre_comunidad = "";
        $nota = "";
        
        while ($data3 = $data->fetch()) 
        {
            $nombre_comunidad      =   $data3[31].' '.$data3[32].' '.$data3[33].' '.$data3[34].' '.$data3[35];
            $nota = $data3[3];
        }

  ?>
    
    
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content w-100">
            <div class="modal-body d-flex mb-1 justify-content-center align-items-center ">
                <img src="view/Operaciones/GestionProyectos/FichaComunitaria/assets/Icons/edit.png" width="50px" height="50px">
                <section class="ms-3 w-100">
                    <h2>RESULTADO  SELECCIONADO:   </h2>
                    <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Solicitante : </label>
                    <textarea disabled style="background-color: #F0F0F0;" id="valorObjetivoGeneralEditar"  rows="1"><?php echo $nombre_comunidad; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Dirección</label>
                        <textarea type="text" class="form-control" id="observacionMotorista" placeholder="escribir..." rows="2"><?php echo $nota; ?></textarea>
                    </div>

                    
                   </section>
                <input type="hidden" value="<?php echo $valorRecibido; ?>" id="idObjetivoGeneralDelete" name="idObjetivoGeneralDelete"/>
            </div>
            <div class="modal-footer p-1 border-0 ">
               <button id="editarMOtoristas222" class="btn">DESAPROBAR SOLICITUD  </button>
            </div>
        </div>
    </div>
    <input style="display: none;" id="timeStart3" class="form-control form-control-sm mb-3" type="date" name="times" value="<?php echo date('Y-m-d'); ?>">

<script>
$('#editarMOtoristas222').click(function(){ 
//alert("Hola Mundo");
//alert($("#idObjetivoGeneralDelete").val());
$.post("process/index.php", {
    process: "administracion_finanza",
    action: "desaprobarSolicitud",  
 
   
    idObjetivoGeneralDelete : $("#idObjetivoGeneralDelete").val()

},
    function(response){
       //alert(response);
        if(response){
            $.toast({
                    heading: 'Finalizado',
                    text: "Operación realizada con Exito",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: 3000, 
                    position: 'bottom-center'
                });

               $('#btnCerrarModuloEditarDesaprobado').click();
               setTimeout(function() {
    location.href = '?view=vistaAdmnTransporte';
}, 4000);
               //$("#tablaSolicitudadmin").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.admin.tabla.solicitudes.php", { fechaActual: document.getElementById("timeStart3").val() }); 
              // $("#tablaMotorista").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.tabla.motoristas.php");

               //$('#refrescarResultados').click();
               //$("#tablaPasajeros").load("view/Monitoreo/Monitoreo.tabla.obj.general.php");
            }
    }
);
});
</script>