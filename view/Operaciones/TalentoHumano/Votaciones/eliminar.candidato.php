<?php include("../../../../config/net.php");
    $valorRecibido = $_REQUEST['idModal'];
   // echo $valorRecibido;
   $nombre_comunidad = "";

     
        //PARA TOMAR LOS DATOS DE LA SEDE DE SANTA ANA:::::::::::::
       /* $query = "
       SELECT * FROM `votaciones_comites`  where id = ?
        ";
        $data32 = $net_rrhh->prepare($query);
        $data32->execute([$valorRecibido]);
        // Suponiendo que $data es tu conjunto de resultados
        
       
        
        while ($data3 = $data32->fetch()) 
        {
            $nombre_comunidad      =   $data3[1];
        }*/

  ?>
    
    
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content w-100">
            <div class="modal-body d-flex mb-1 justify-content-center align-items-center ">
                <img src="view/Operaciones/GestionProyectos/FichaComunitaria/assets/Icons/delete.png" width="50px" height="50px">
                <section class="ms-3 w-100">
                    

                <?php 
        $query = "SELECT s1.id, s1.id_employee, CONVERT(s2.name1 USING utf8), CONVERT(s2.name2 USING utf8), CONVERT(s2.name3 USING utf8), CONVERT(s2.lastname1 USING utf8), CONVERT(s2.lastname2 USING utf8)  
        ,s4.position FROM votaciones_candidatos as s1 
        inner join employee as s2 on s2.id = s1.id_employee 
        inner join workarea_positions_assignment as s3 on s3.idemployee = s1.id_employee
        inner join workarea_positions as s4 on s4.id = s3.idposition where s3.enddate = '0000-00-00' 
        and s1.id = ?
        ";
        $data3 = $net_rrhh->prepare($query);
        $data3->execute([$valorRecibido]);
         while ($data = $data3->fetch()) 
         {
             //echo "<option value=".$data[0].">".$data[1]."</option>";
 
             
 
                 //Cargar datos del empleado
                     $iu = isset($_GET['iu']) ? $_GET['iu'] : $_SESSION['iu'];
                     //Cargar fotografía del empleado
                     $query = "SELECT picture FROM employee_picture WHERE idemployee = " . $data[1];
                     $picture = $net_rrhh->prepare($query);
                     $picture->execute();
 
                     if ($picture->rowCount() > 0) {
                         $dataI = $picture->fetch();
                         $img = $dataI[0];
                     } 
                     else
                     {
                         $img = "Don Bosco.png";
                     }
                 
                 
                     echo '
             
                     <div class="d-flex text-muted pt-3">
                         <img src="process/pictures/'.$img.'" class="colorFondo"style="width: 15%; border-radius: 5%; " data-toggle="popover" title="VOTACIONES PARA COMITÉS " />
                         <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                             <div class="d-flex justify-content-between">
                             <strong class="text-gray-dark">'.$data[2].' '.$data[3].' '.$data[4].' '.$data[5].'</strong>
                             
                            

                             </div>
                             <span class="d-block">'.$data[7].'</span>
                         </div>
                     </div>';
                 
                     
             
            
         }
    ?>




                    <p class="text-muted mb-0">¿Estas seguro de eliminar este candidato? </p>
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
 // alert($("#idObjetivoGeneralDelete").val());

// Deshabilitar la empresa
$.post("process/index.php", {
    process: "votacion",
    action: "deletecandidato",

idObjetivoGeneralDelete: $("#idObjetivoGeneralDelete").val()

},
    function(response){
       // console.log(response);
        if(response){
            $.toast({
                    heading: 'Finalizado',
                    text: "Candidato eliminado con éxito",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: 3000, 
                    position: 'bottom-center'
                });

               $('#btncerrareliminarcandidato').click();
               setTimeout(function() {
    location.reload(); // Refresca la página
}, 3000); 
              // $("#tablaMotorista").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.tabla.motoristas.php");
               //$("#tablaProceso").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.tabla.publica.php");

            }
    }
);
});
</script>

