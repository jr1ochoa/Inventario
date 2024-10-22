<?php 
include("../../../../config/net.php");
?>

<?php        
   $id_FORMULARIO = $_REQUEST['id_Solicitud'];                            
    $query = "SELECT * FROM entornos_virtuales_historial_cambios as s1 
    left join entornos_virtuales_detalle_solicitud as s2 on s1.id_producto = s2.id 
    left join entornos_virtuales_productos as s3 on s2.producto = s3.id
    left join entornos_virtuales_medidas as s4 on s2.medidas = s4.id
      where s1.id_formulario = ? order by s1.id desc";
    $data3 = $net_rrhh->prepare($query);
    $data3->execute([$id_FORMULARIO]);
    if ($data3->rowCount() > 0) {
        echo '<center><button type="button" class="btn btn-light">
        Nuevo Cambios Realizados <span class="badge bg-danger">'.$data3->rowCount().'</span>
      </button></center>';

        while ($data = $data3->fetch()) {
            if($data[11]=='N/A/S')
            {
                $medidasBd = $data[14];
            }
            else{
                $medidasBd = $data[21];
            }
?>

<div class="col-12">
    <div class="card">
        <div class="card-body ">
            <div style="background-color: #D9E6EB; border-radius:5px;">
                <p class="p-0 mb-0">Fecha de Modificación: <?php echo $data[7] ?></p>
            </div>
            <hr/>
            <p class="card-text p-0 mb-0 "><b>Producto Afectado:</b> <?php echo $data[18].'-'.$medidasBd ?>.</p>
            <p class="card-text p-0 mb-0 "><b>Descripción del Cambio:</b> <?php echo $data[2] ?>.</p>
            <p class="card-text p-0 mb-0 "><b>Motivos de Cambio:</b> <?php echo $data[6] ?></p>

            <div class="card-footer text-muted">
                <div class="row">
                    <div class="col-md">
                        <p class="card-text p-0 mb-0 "><b>Estado:</b>
                        <?php
                        if($data[3] == 1)
                        {
                            echo "<span style='background-color:#FEF2D4;'>En espera de aprobación</span>";
                        }
                        else
                        {
                            echo "<span style='background-color:#C0E5B9; border-radius: 5px;'>Aprobado</span>";
                        }
                        ?></p>
                    </div>
                    <div class="col-md"> 
                        <button class="btn btn-sm" style="background-color: #1A4262;color:#EFEFEF; font-size:11px;" onclick="funcionEditarHistorialCambios(
                    '<?php echo htmlspecialchars($data[0], ENT_QUOTES, 'UTF-8'); ?>', 
                    '<?php echo htmlspecialchars($id_FORMULARIO, ENT_QUOTES, 'UTF-8'); ?>'
                )"  data-bs-toggle="modal" data-bs-target="#exampleEditarEstadoCambio">APROBAR</button>
                    </div>
                </div>
               
               
            </div>

            
        </div>
    </div>
</div>
<?php 
    }  
}
else
{
    echo '<center><button type="button" class="btn btn-light">
  Nuevo Cambios Realizados <span class="badge bg-danger">0</span>
</button></center>';
}
?>

<!-- MODAL ELIMINAR PASAJERO -->
<div class="modal fade" id="exampleEditarEstadoCambio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header colorEncabezadoLista">
        <h5 class="modal-title" id="exampleModalLabel" style="color:white;">APROBAR CAMBIO </h5>
        <button type="button" id="btnEditarCAMBIOSAprobadosCerrar" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
     
      <div id="EditarAprobarCambios"></div>
    
      
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
 
<!-- Después, incluye el CSS y JS de jQuery Toast Plugin -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>

<script src="view/Programas/EntornosVirtuales/SolicitudArtes/aprobarcambios.js"></script>