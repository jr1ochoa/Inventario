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
      <th scope="col">Hora de llegada</th>
      <th scope="col">Hora de retorno</th>
      <th scope="col">Estado</th>
      <th scope="col">Código Unico</th>
    </tr>
  </thead>
  <tbody id="tablaBody">

  <?php 

// 

 $query = "SELECT * FROM admin_finanzas_formulario  where  estado = 4 AND id_area_solicitante = ? order by id desc";

 $data3 = $net_rrhh->prepare($query);

 $data3->execute([$idAreaEmpleado]);

 while ($data = $data3->fetch()) {

     
     echo '

     <tr>
     <td>'.$data[3].' </td>
     <td>'.$data[7].' </td>
     <td>'.$data[8].' </td>
     <td style="font-size: 11px; background-color: #C0CBD4;"><span  > 
   <b>Completado</b> 
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
      <td style="font-size: 8px;">'.$data[19].' </td>
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