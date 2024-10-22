<?php 
 include("../../../../config/net.php");


 //Cargar datos del empleado
$iu = isset($_GET['iu']) ? $_GET['iu'] : $_SESSION['iu'];
?>

<?php
    $nombre_Comite = "";
    $query = "SELECT * FROM `votaciones_comites` where id = ?";
    $data3 = $net_rrhh->prepare($query);
    $data3->execute([$_POST['idComite']]);
    while ($data = $data3->fetch()) 
    {
        $nombre_Comite = $data[1];
        //echo ' <option value="'.$data[0].'">'.$data[1].'</option>';
    }
    if ($data3->rowCount() > 0) {



?>
<h5 class="display-4"><?php echo strtoupper($nombre_Comite); ?></h5>
 <?php 
 
 //echo $_POST['idComite'];
 
 
 ?>
 </div>
 <div class="btn-group-vertical">
 <?php 
 
 
     $query = "SELECT 
       *
        FROM users WHERE id = ?";
        $data3 = $net_rrhh->prepare($query);
        $data3->execute([$iu]);
         while ($data = $data3->fetch()) 
         {
             $tipo = $data[2];
         }
         if($tipo == "Administrador" || $tipo == "RRHH")
         {
 ?>
 <form method="POST" action="?view=votacionesEstadisticas">
    <input type="hidden" name="idModal" id="idModal" value="<?php echo isset($_POST['idComite']) ? $_POST['idComite'] : ''; ?>"/>
    <button id="votacionesEstadisticas" type="submit" class="btn btn-primary mt-2 btn-sm text-left">ESTADISTICAS</button>
</form>

 <?PHP
         }
 
 if($tipo == "Administrador")
 {
 ?>
 
     
    <!--AQUI EL BOTON DE LAS ESTADISTICAS-->
 
 
 <?php 
 }
 ?>
 </div>
 <div class="container">
    
 <div class="my-3 p-3 bg-body rounded shadow-sm">
     <h6 class="border-bottom pb-2 mb-0">Candidatos</h6>
     
     <?php 
    
     ?>
     <div class="row">
         <div class="col-md">
         <?php 
        $query = "SELECT DISTINCT  s1.id, s1.id_employee, CONVERT(s2.name1 USING utf8), CONVERT(s2.name2 USING utf8), CONVERT(s2.name3 USING utf8), CONVERT(s2.lastname1 USING utf8), CONVERT(s2.lastname2 USING utf8)  
        ,s4.position FROM votaciones_candidatos as s1 
        inner join employee as s2 on s2.id = s1.id_employee 
        inner join workarea_positions_assignment as s3 on s3.idemployee = s1.id_employee
        inner join workarea_positions as s4 on s4.id = s3.idposition where s3.enddate = '0000-00-00' 
        and s1.id_comite = ?
        
        order by id";
        $data3 = $net_rrhh->prepare($query);
        $data3->execute([$_POST['idComite']]);
         while ($data = $data3->fetch()) 
         {
             //echo "<option value=".$data[0].">".$data[1]."</option>";
 
             if($data[0]%2==0)
             {
 
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
                             
                             <button  onclick="valorFuncionCndidato('.$data[0].')" data-bs-toggle="modal" data-bs-target="#MODALeLIMINARcANDIDATO" type="button" class="btn btn-light">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>        
                                </svg>
                             </button>
                             
                            

                             </div>
                             <span class="d-block">'.$data[7].'</span>
                         </div>
                     </div>';
                 
                     
             }
            
         }
    ?>
         
         </div>
 
 
 
 
 
 
     <div class="col-md">
         <?php 
        $query = "SELECT DISTINCT  s1.id, s1.id_employee, CONVERT(s2.name1 USING utf8), CONVERT(s2.name2 USING utf8), CONVERT(s2.name3 USING utf8), CONVERT(s2.lastname1 USING utf8), CONVERT(s2.lastname2 USING utf8)  
        ,s4.position FROM votaciones_candidatos as s1 
        inner join employee as s2 on s2.id = s1.id_employee 
        inner join workarea_positions_assignment as s3 on s3.idemployee = s1.id_employee
        inner join workarea_positions as s4 on s4.id = s3.idposition where s3.enddate = '0000-00-00'
         and s1.id_comite = ?
        order by id";
        $data3 = $net_rrhh->prepare($query);
        $data3->execute([$_POST['idComite']]);
         while ($data = $data3->fetch()) 
         {
             //echo "<option value=".$data[0].">".$data[1]."</option>";
 
             if($data[0]%2!=0)
             {
 
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
                             
                              <button  onclick="valorFuncionCndidato('.$data[0].')" data-bs-toggle="modal" data-bs-target="#MODALeLIMINARcANDIDATO" type="button" class="btn btn-light">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>        
                                </svg>
                             </button>
                             
                           
                             </div>
                             <span class="d-block">'.$data[7].'</span>
                         </div>
                     </div>';
                 
                     
             }
             
         }
    ?>
         
         </div>
 
        
     </div>
     
    
 
 
 
     
 
 
 
 
    
 
 
     <small class="d-block text-end mt-3">
       <a href="#">Todos los Candidatos</a>
     </small>
   </div>
 </div>
 
<?php

    }
    else{
?>


<div class="col-md  " id="registroTransporte">
    <center>
    <p class="tamañoTexto mt-1"><b>SELECCIONAR UN ELEMENTO PARA LEER</b> </p>
    <img src="/assets/images/web_13011615.png" class="colorFondo"style="width: 15%; "/>   
      
    </center>
               
                </div>


<?php 

    }
?>
 

 <!--:::::::::  MODAL DE VOTACIONES ::::::::::::::::-->
 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel"></h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body">
         
       
       <div id="EditarEncabezado"></div>
 
 
       </div>
       <div class="modal-footer">
         <button type="button"  id="btnCancelarEleccion" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar Seleccion</button>
         <button type="button" id="guardarVoto" class="btn btn-primary">Si, Confirmar</button>
       </div>
     </div>
   </div>
 </div>

<!--:::::::::::::::::: MODAL ELIMINAR CANDIDATO :::::::::::::::::::::::::-->
<div class="modal fade" id="MODALeLIMINARcANDIDATO" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel"></h5>
         <button type="button" id="btncerrareliminarcandidato" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body">
         
       
       <div id="btncandidatoEliminar"></div>
 
 
       </div>
       <div class="modal-footer">
         <button type="button"  id="btnCancelarEleccion" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar Seleccion</button>
         </div>
     </div>
   </div>
 </div>
<!--:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->
 
 
 
 <!-- Incluye jQuery primero -->
 <!--<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
 
 <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
 
 <!-- Después, incluye el CSS y JS de jQuery Toast Plugin 
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
 

-->

 <script>
 
 function  valorFuncionCndidato (valor)
{
    $("#btncandidatoEliminar").load("view/Operaciones/TalentoHumano/Votaciones/eliminar.candidato.php",{
        idModal: valor
    });
}


 $(document).ready(function(){
     
     $('.js-example-basic-single').select2({
         dropdownParent:$('#exampleModal3')
     })
 })
 function valorFuncionEstadistica(valor) {
    alert(valor);
    // Carga el contenido de la página en un contenedor con id="contenedorEstadisticas"
    $("#votacionesEstadisticas").load("view/votaciones/votaciones.estadisticas.php", {
        idModal: valor
    });
}




 /*$("#votacionesEstadisticas").click(function(){
     window.location.href='?view=votacionesEstadisticas'; 
 })*/
 //:::::::::::::::::::::::::: FUNCION GUARDAR VOTO :::::::::::::::::::::::::::::::::::::::::::::::
 $("#guardarVoto").click(function() {
            //document.getElementById("botonCargando").style.display="";
             $.post("process/index.php", {
                 process: "votacion",
                 action: "savevoto",
 
 
                 valorVoto: $("#valorVoto").val(), 
                // idComite: $("#idComite").val(),
             },
             function(response){
                 if(response)
                 {
                     //document.getElementById("cancelarComite").click();
                     //document.getElementById("botonCargando").style.display="none";
                     $.toast({
                         heading: 'Finalizado',
                         text: 'Voto Guardado Correctamente',
                         showHideTransition: 'slide',
                         icon: 'success',
                         hideAfter: 2000, 
                         position: 'top-center'
                     });
                     //$("#IdProyecto").load("view/Monitoreo/get_options.php");
                    // Configurar un temporizador para redireccionar después de 5000 milisegundos (5 segundos)
 
                     document.getElementById("btnCancelarEleccion").click();
                     setTimeout(function() {
     window.location.href = '?view=main';
 }, 3000);
                 }
                 else
                 {
                     //document.getElementById("botonCargando").style.display="none";
                     $.toast({
                         heading: 'ERROR',
                         text: 'El voto no se guardo',
                         showHideTransition: 'slide',
                         icon: 'error',
                         hideAfter: 5000, 
                         position: 'top-center'
                     });
                   //  document.getElementById("btnCerrarCandidato").click();
                 }
                 
             });
             
         });
 
 
 //:::::::::::: ENVIAR EL ID AL MODAL Y MOSTRAR LOS DATOS EN EL MODAL :::::::::::::::::::::::::::
 function funcionEnviarDatos2(valor){
             //    data-bs-target='#exampleModal2'
             /*
             */
            
            //alert("buenas tardes");
             $("#EditarEncabezado").load("/view/votaciones/votaciones.formuario.php",
             {
                 idModal: valor
             });
     }
 
 </script>