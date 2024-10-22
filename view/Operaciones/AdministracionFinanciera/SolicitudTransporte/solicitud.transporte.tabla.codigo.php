<?php 
include("../../../../config/net.php");
?>
<table class="table table-hover" style="background-color: #FFFFFF; border-radius:8px;">
  <thead>
    <tr>
      <th scope="col">Empleado</th>
      <th scope="col">Acción</th>
    </tr>
  </thead>
  <tbody id="tablaBody">

  <?php 

// 

 $query = "SELECT * FROM admin_finanzas_lista_pasajeros  where codigo_formulario = ?";

 $data3 = $net_rrhh->prepare($query);

 $data3->execute([$_REQUEST['idProyecto']]);

 while ($data = $data3->fetch()) {

     
     echo '

     <tr>
     <td>'.$data[6].' </td>
     <td> 
       <button id="'.$data[0].'" class="btn mt-0  pt-0" style="background-color: #577897; color:white;"  onclick="funcioneLIMINARDATO2('.$data[0].')" data-bs-toggle="modal" data-bs-target="#exampleEliminarPajsaero">
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
<div class="modal fade" id="exampleEliminarPajsaero" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header colorEncabezadoLista">
        <h5 class="modal-title" id="exampleModalLabel" style="color:white;">ELIMINAR COMUNIDAD</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       
      <div id="EliminarEncabezado22"></div>
    
      
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


<script src="view/Operaciones/AdministracionFinanciera/SolicitudTransporte/eliminar.pasajeros.js"></script>
<script>
   $(document).ready(function() {
    countRowsAndDisplay();
});
</script>