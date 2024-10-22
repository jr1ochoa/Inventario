<?php 
include("../../../../config/net.php");
?>
<?php 

$idEmpleado =  $_SESSION['iu'];
//echo $idEmpleado."<br>";
$idAreaEmpleado;
$query = "SELECT s1.*, s2.idarea FROM workarea_positions_assignment as s1  inner join workarea_positions as s2   WHERE  s2.id = s1.idposition and s1.idemployee = $idEmpleado";
    $spaces = $net_rrhh->prepare($query);
    $spaces->execute();
    while ($data = $spaces->fetch()) 
    {
        //echo $data[8];
        $idAreaEmpleado = $data[8];
    }

?>
<table class="table table-sm table-hover">
<thead >
    <tr>
      <th scope="col">Direccion</th>
      <th scope="col">Día de Salida</th>
      <th scope="col">Hora de llegada</th>
      <th scope="col">Hora de retorno</th>
      <th scope="col">Estado</th>
      <th scope="col">Acciones</th>
      <th scope="col"></th>
      <th scope="col">Código Unico</th>
    </tr>
  </thead>
  <tbody id="tablaBody">

  <?php 

// 

 $query = "SELECT * FROM admin_finanzas_formulario  where (estado = 1 or estado = 3) AND id_area_solicitante = ? ORDER BY id desc";

 $data3 = $net_rrhh->prepare($query);

 $data3->execute([$idAreaEmpleado]);

 while ($data = $data3->fetch()) {

    $fechaData10 = new DateTime($data[24]);
    $fechaFormateada10 = $fechaData10->format('d/m/Y');
    if($data[14] == 1)
    {
        echo '
        <tr>
        <td>'.$data[3].' </td>
        <td>'.$fechaFormateada10.'</td>
        <td>'.$data[7].' </td>
        <td>'.$data[8].' </td>
        <td style="font-size: 11px; background-color: #FEAD00;"><span  > 
      <b>En espera de aprobación</b> 
      </span></td>
         <td>
         <div class="btn-group " role="group" aria-label="Basic example">
  <form action="?view=SolicitanteVerFormulariotRANSPORTE" class="mx-1" method="POST" style="margin-bottom:0px;">
           <input type="hidden" value="'.$data[19].'" name="idProyecto">
           <button type="submit" class="btn btn-sm mt-0  pt-0" style="background-color: #1A4262;color:white;">
           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-check-fill" viewBox="0 0 16 16">
           <path d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5"/>
           <path d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585q.084.236.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5q.001-.264.085-.5m6.769 6.854-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708.708"/>
         </svg>
           </button>
          </form>

  <form action="?view=SolicitanteEditarFormulariotRANSPORTE" class="mx-1" method="POST" style="margin-bottom:0px;">
           <input type="hidden" value="'.$data[19].'" name="idProyecto">
           <button type="submit" class="btn btn-sm mt-0  pt-0" style="background-color: #1A4262;color:white;">
               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
               <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
               <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
               </svg>
           </button>
          </form>

  <div class="btn-group mx-1 mt-0 pt-0 mb-0 pb-0 m-0" role="group" aria-label="Basic outlined example">
         <button id="'.$data[0].'" class="btn btn-sm mt-0  pt-0" style="background-color: #1A4262; color:white;"  onclick="funcionEliminarSolicitudTransporte('.$data[0].')" data-bs-toggle="modal" data-bs-target="#eLiminarSolicitudModal">
                   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                   <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                   <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                   </svg>
               </button>
           </div>
</div>
         

         
         
         
         </td>
         <td style="font-size: 8px;">'.$data[19].' </td>
      </tr>
                
   
        
   
        ';
    }
    else
    {
        $fechaData10 = new DateTime($data[24]);
    $fechaFormateada10 = $fechaData10->format('d/m/Y');
        echo '

        <tr>
        <td>'.$data[3].' </td>
        <td>'.$fechaFormateada10.' </td>
        <td>'.$data[7].' </td>
        <td>'.$data[8].' </td>
        <td style="font-size: 11px; background-color: #CBE8BA;"><span  > 
      <b>RECIBIDA Y APROBADA</b> 
      </span></td> 
         <td>
         <form action="?view=SolicitanteVerFormulariotRANSPORTE" method="POST" style="margin-bottom:0px;">
           <input type="hidden" value="'.$data[19].'" name="idProyecto">
           <button type="submit" class="btn btn-sm mt-0  pt-0" style="background-color: #1A4262;color:white;">
           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-check-fill" viewBox="0 0 16 16">
           <path d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5"/>
           <path d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585q.084.236.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5q.001-.264.085-.5m6.769 6.854-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708.708"/>
         </svg>
           </button>
          </form>
         </td>
         <td></td>
         <td style="font-size: 8px;">'.$data[19].' </td>
      </tr>
                
   
        
   
        ';
    }


   

 }

 ?>

    
  </tbody>
</table>


<!-- MODAL ELIMINAR SOLICITUD ::::::::::::::::::::::: -->
<div class="modal fade" id="eLiminarSolicitudModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header colorEncabezadoLista">
        <h5 class="modal-title" id="exampleModalLabel" style="color:white;">ELIMINAR COMUNIDAD</h5>
        <button type="button" id="btnCerrarModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       
      <div id="eLIMINARsOLICITUDpUBLICA"></div>
    
      
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

<script src="view/Operaciones/AdministracionFinanciera/SolicitudTransporte/eliminar.solicitud.js"></script>

<script src="view/Operaciones/AdministracionFinanciera/SolicitudTransporte/eliminar.pasajeros.js"></script>
<script>
   $(document).ready(function() {
    countRowsAndDisplay();
});
</script>