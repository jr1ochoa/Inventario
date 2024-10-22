<?php 
 include("../../../../config/net.php");


 //Cargar datos del empleado
$iu = isset($_GET['iu']) ? $_GET['iu'] : $_SESSION['iu'];
?>
<!-- Incluye jQuery primero -->


<br/>
<div class="position-relative overflow-hidden p-3 p-md-3 m-md-3 text-center bg-light">
<button id="btnRegresarSolicitud" type="button" class="btn btn btn-light btn-sm position-absolute" style="left: 0; color:blue; border-bottom: 2px solid #000;">Regresar</button>
    <div class="col-md-12 p-lg-2 mx-auto my-2">
      <h1 class="display-4 fw-normal">Gestionar Comites</h1>
      <!--<p class="lead fw-normal">V 1.0.0 </p>-->
    </div>
  </div>
<div class="container">

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">NOMBRE COMITÉ</th>
      <th scope="col">DESCRIPCIÓN</th>
      <th scope="col">ESTADO</th>
      <th scope="col">ACCIONES</th>
    </tr>
  </thead>
  <tbody>

  <?php

$query = "SELECT * FROM `votaciones_comites`  ";
 $data3 = $net_rrhh->prepare($query);
 $data3->execute();
 $sumador = 1;
  while ($data = $data3->fetch()) 
  {
    echo '
     <tr>
      <th scope="row">'.$sumador++.'</th>
      <td>'.$data[1].'</td>
      <td>'.$data[6].'</td>';
      if($data[4] == 1)
      {
        echo '
        <td style = "background-color: #D9EDBC"></td>
        ';
      }
      else
      {
        echo '
        <td style = "background-color: #E5999A"></td>
        ';
      }
     echo ' 
      <td>
      
      <button type="submit" class="btn btn-sm mt-0  pt-0" style="background-color: #1A4262;color:white;"  onclick="funcioneEditarMotoristaFusalmo('.$data[0].')" data-bs-toggle="modal" data-bs-target="#exampleeDITARcOMITE">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                  </svg>
              </button>

              <div class="btn-group mx-1 mt-0 pt-0 mb-0 pb-0 m-0" role="group" aria-label="Basic outlined example">
            <button id="'.$data[0].'" class="btn btn-sm mt-0  pt-0" style="background-color: #1A4262; color:white;"  onclick="valorFuncion('.$data[0].')" data-bs-toggle="modal" data-bs-target="#exampleEliminarMonitoreoComites"> 
                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-toggles" viewBox="0 0 16 16">
  <path d="M4.5 9a3.5 3.5 0 1 0 0 7h7a3.5 3.5 0 1 0 0-7zm7 6a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5m-7-14a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5m2.45 0A3.5 3.5 0 0 1 8 3.5 3.5 3.5 0 0 1 6.95 6h4.55a2.5 2.5 0 0 0 0-5zM4.5 0h7a3.5 3.5 0 1 1 0 7h-7a3.5 3.5 0 1 1 0-7"/>
</svg>
                  </button>
              </div>
   </div>  
      </td>
    </tr>
    
    ';
    // echo ' <option value="'.$data[0].'">'.$data[1].'</option>';
  }
    ?>


   
   
  </tbody>
</table>
</div>

<!-- MODAL ELIMINAR MOTORISTA -->
<div class="modal fade" id="exampleEliminarMonitoreoComites" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header colorEncabezadoLista">
        <h5 class="modal-title" id="exampleModalLabel" style="color:white;">ELIMINAR MOTORISTA</h5>
        <button type="button" id="btnCerrrarModalCerrarComite" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       


      <!--::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->
<div id="eliminarComiteDtbn">

</div>

      <!--:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->

      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="btnCerrarModalPsajero"data-bs-dismiss="modal">Close</button>
        <!--<button type="button"id="EliminarPasajerobtn2" class="btn btn-primary">Confirmar la Eliminación</button>-->
      </div>
      <a class="btn btn-success" id="botonCargando"  style="display:none;"type="button" disabled>
    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
    Loading...
    </a>
    </div>
  </div>
</div>

 <!--::::::::::::::::: EDITAR COMITE ::::::::::::::::::::::::::::::::-->
 <div class="modal fade" id="exampleeDITARcOMITE" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header colorEncabezadoLista">
        <h5 class="modal-title" id="exampleModalLabel" style="color:white;">EDITAR COMITES</h5>
        <button type="button" id="btnCerrrarModalEditarComite" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       


      <!--::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->
<div id="editarComiteDtbn">

</div>

      <!--:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->

      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="btnCerrarModalPsajero"data-bs-dismiss="modal">Close</button>
        <!--<button type="button"id="EliminarPasajerobtn2" class="btn btn-primary">Confirmar la Eliminación</button>-->
      </div>
      <a class="btn btn-success" id="botonCargando"  style="display:none;"type="button" disabled>
    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
    Loading...
    </a>
    </div>
  </div>
</div>
 <!--:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->


<!-- Incluye jQuery primero -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
 
 <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
 
 <!-- Después, incluye el CSS y JS de jQuery Toast Plugin -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
 



<script>

$("#btnRegresarSolicitud").click(function(){
    window.location.href='?view=votacionesAdmin';  
})

function  valorFuncion (valor)
{
    $("#eliminarComiteDtbn").load("view/Operaciones/TalentoHumano/Votaciones/eliminar.comite.php",{
        idModal: valor
    });
}
function funcioneEditarMotoristaFusalmo (valor)
{
    $("#editarComiteDtbn").load("view/Operaciones/TalentoHumano/Votaciones/editar.comites.php",{
        idModal: valor
    });
}






   $('#eliminarMotoristaRegistrar').click(function(){ 
// alert("Hola Mundo");

// Deshabilitar la empresa
$.post("process/index.php", {
    process: "administracion_finanza",
    action: "DeleteMotoristaTabla",

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

               $('#btnCerrrarModal').click();
               $("#tablaMotorista").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.tabla.motoristas.php");
               //$("#tablaProceso").load("view/Operaciones/AdministracionFinanciera/SolicitudTransporte/solicitud.transporte.tabla.publica.php");

            }
    }
);
});
</script>


    
   
