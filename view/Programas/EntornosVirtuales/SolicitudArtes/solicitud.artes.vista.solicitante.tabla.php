<?php 
include("../../../../config/net.php");

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
<table class="table table-hover">
  <thead>
    <tr>
     <!-- <th scope="col">#</th>-->
      <th scope="col">Tipo Arte</th>
      <th scope="col">Nombre del Arte</th>
      <th scope="col">Proceso</th>
      <th scope="col">Fecha de entrega</th>
      <th scope="col">Detalle</th> 
      <th scope="col">Acciones</th> 
    </tr>
  </thead>
  <tbody>
  <?php 

// 
 $query = "SELECT * FROM entornos_virtuales_formulario  where estado = 1 AND  porcentajeAvance < 100 and idArea_solicitante = ? order by id desc ";

 $data3 = $net_rrhh->prepare($query); 

 $data3->execute([$idAreaEmpleado]);
 
 while ($data = $data3->fetch()) {
  $width = number_format($data[16], 0);
  $date = new DateTime($data[7]);
$formattedDate = $date->format('d/m/Y');
     #<th scope="row">'.$data[0].'</th>
     echo '

     <tr>
      
    
     <td>'.$data[13]. ' </td>
     <th scope="row">'.$data[17].'</th> 
     <td>
     <span>'. $width.'%</span>
       <div class="progress">
      
           <div class="progress-bar" role="progressbar" style="width: '. $width.'%;" aria-valuenow="'. $width.'" aria-valuemin="0" aria-valuemax="100">'. $width.'%</div>
       </div>
     </td>
     <td>'.$formattedDate.'</td>
     <td>
     <form action="?view=formularioSolicitanteArtes" method="POST" style="margin-bottom:0px;">
       <input type="hidden" value='.$data[20].' name="idSolicitudArtes">
       <button type="submit" class="btn btn-sm " style="background-color: #1A4262; color:white;">Ver</button>
      </form>
     </td>
     <td>
       <div class="btn-group" role="group" aria-label="Basic outlined example">
          
          <button type="button" class="btn btn-sm" style="background-color: #1A4262; color:white;" 
                onclick="funcionEliminarSolicitud(\''.htmlspecialchars($data[20], ENT_QUOTES, 'UTF-8').'\', \''.htmlspecialchars($idAreaEmpleadoss, ENT_QUOTES, 'UTF-8').'\')" 
                data-bs-toggle="modal" data-bs-target="#exampleEliminarSolicitud">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                </svg>
            </button>
       </div>
     </td>
   </tr>
     

     ';

 }

 ?>



    <!--<tr>
      <th scope="row">1</th>
      <td>Flyer </td>
      <td>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: 55%;" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100">55%</div>
        </div>
      </td>
      <td>22/06/2024</td>
      <td>
      <form action="?view=formularioSolicitanteArtes" method="POST" style="margin-bottom:0px;">
        <input type="hidden" value="1" name="idProyecto">
        <button type="submit" class="btn " style="background-color: #77AEFE;">Ver</button>
       </form>
      </td>
      <td>
        <div class="btn-group" role="group" aria-label="Basic outlined example">
            <button type="button" class="btn " style="background-color: #77AEFE;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                </svg>
            </button>
            <button type="button" class="btn btn-outline-primary"></button>
            <button type="button" class="btn " style="background-color: #77AEFE;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                </svg>
            </button>
        </div>
      </td>
    </tr>-->
    
  </tbody>
</table>

<!-- MODAL ELIMINAR PASAJERO -->
<div class="modal fade" id="exampleEliminarSolicitud" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header colorEncabezadoLista">
        <h5 class="modal-title" id="exampleModalLabel" style="color:white;">ELIMINAR SOLICITUD DE ARTE </h5>
        <button type="button" id="btnCerrarEliminarSolicitud" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
     
      <div id="EliminarSolicitudArte"></div>
    
      
      <div class="modal-footer">
       
        <!--<button type="button"id="EliminarPasajerobtn2" class="btn btn-primary">Confirmar la Eliminación</button>-->
      </div>
      <a class="btn btn-success" id="botonCargando"  style="display:none;"type="button" disabled>
    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
    Loading...
    </a>
    </div>
  </div>
</div>

<script src="view/Programas/EntornosVirtuales/SolicitudArtes/eliminar.solicitud.js"></script>

