<?php 
include("../../../../config/net.php");
?>
<table class="table table-hover" style="background-color: #FFFFFF; border-radius:8px;">
  <thead>
    <tr>
      <th scope="col">Empleado</th>
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