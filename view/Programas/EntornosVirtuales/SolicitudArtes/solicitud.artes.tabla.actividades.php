<?php 
include("../../../../config/net.php");
?>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Actividad</th>
      <th scope="col">Inicio</th>
      <th scope="col">Fin</th>
      <th scope="col">Estado</th>
      <th scope="col">Acción</th>
    </tr>
  </thead>
  <tbody>

<?php 
$iDFormulario = $_REQUEST['idIdFormulario'];
//echo $iDFormulario;
 $query = "SELECT * FROM entornos_virtuales_lista_actividades  where id_formulario = ? order by id desc";

 $data3 = $net_rrhh->prepare($query);

 $data3->execute([$iDFormulario]);

 while ($data = $data3->fetch()) {

     
     echo '
     <tr>
     <td>'.$data[2].'</td>
     <td>'.$data[4].'</td>
     <td>'.$data[5].'</td>
     <td style="font-size:10px;">'.($data[3]==1 ? "📌 NO REALIZADO " : "✅ FINALIZADO ").'</td>
     <td>
     <button class="btn btn-sm" style="background-color: #1A4262; color:white;" onclick="funcionEditarActividades34('.$data[0].', '.$iDFormulario.')" data-bs-toggle="modal" data-bs-target="#exampleEditarEstadoActividades">
     <i class="bi bi-gear"></i> Gestionar
   </button>
 
  
     </td>
     <td>
     <button class="btn btn-sm" style="background-color: #1A4262; color:white;" onclick="funcionEliminarActividad('.$data[0].', '.$iDFormulario.')" data-bs-toggle="modal" data-bs-target="#exampleEliminarEstadoActividades"> 
     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
     <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
     <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
   </svg>
   </button>
     </td>
   </tr>
   
     ';

 }

 ?>   
  </tbody>
</table> 


<!-- MODAL ELIMINAR PASAJERO -->
<div class="modal fade" id="exampleEditarEstadoActividades" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header colorEncabezadoLista">
        <h5 class="modal-title" id="exampleModalLabel" style="color:white;">APROBAR CAMBIO </h5>
        <button type="button" id="btnEditarCAMBIOSAprobadosCerrar" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
     
      <div id="editarActividadesGestion22"></div>
    
      
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


<!-- MODAL ELIMINAR PASAJERO -->
<div class="modal fade" id="exampleEliminarEstadoActividades" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header colorEncabezadoLista">
        <h5 class="modal-title" id="exampleModalLabel" style="color:white;">APROBAR CAMBIO </h5>
        <button type="button" id="btnCerrarEliminarActividad" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
     
      <div id="EliminarActividadesGestion24"></div>
    
      
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
 
 

<script src="view/Programas/EntornosVirtuales/SolicitudArtes/gestion.actividad.js"></script>


<script src="view/Programas/EntornosVirtuales/SolicitudArtes/eliminar.actividad.js"></script>









