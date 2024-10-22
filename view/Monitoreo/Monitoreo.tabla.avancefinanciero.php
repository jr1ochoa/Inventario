<?php include("../../config/net.php");
$idProyecto = $_REQUEST['idRelacion'];?>

<style>
    .colorFondo{
        background-color: #FEF2D4;
    }
</style>
<div class="table-responsive">
<table class="table-sm table table table-bordered colorFondo mt-2">
    <thead>
        <th>Linea Presupuestaria</th>
        <th>Descripción</th>
        <th>Monto Total </th>
        <th>Porcentaje de avance </th>
        <th>Monto Restante </th>
        <th>Ver Detalle </th>
       
    </thead>
    <tbody>
    <?php 
  //  include("../../config/net.php");
    $query = "SELECT s1.*, s2.nombre, s2.monto, s2.descripcion FROM monitor_avance_financiero as s1 inner join  monitor_lista_presupuestaria as s2 on s1.idListaPresupuestaria = s2.id where s1.id_generalidad_proyecto  = ?";
    $data3 = $net_rrhh->prepare($query);
    $data3->execute([$idProyecto]);
    while ($data = $data3->fetch()) {
        echo "
        <script>
        console.log('Valor JSON:', ".json_encode($data[10]).");
    </script>
        <tr>     
            <td>".$data[1]."</td>   
            <td>".$data[13]."</td>   
            <td> $ ".convertirMiles($data[12])."</td> 
            <td><div class='progress'>
            <div class='progress-bar progress-bar-striped progress-bar-animated bg-success' role='progressbar' style='width: ".$data[4]."%' aria-valuenow='25' aria-valuemin='0' aria-valuemax='100'></div>
          </div>".$data[4]." %</td>   
          <td> $".convertirMiles($data[2])."</td>
            <td> 
            <a onclick='valorFuncion(".$data[10].")' class='btn btn-sm btn-success abrirModal' data-bs-toggle='modal' data-bs-target='#exampleModalFinancieroMOdal'>
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eyeglasses' viewBox='0 0 16 16'>
                    <path d='M4 6a2 2 0 1 1 0 4 2 2 0 0 1 0-4m2.625.547a3 3 0 0 0-5.584.953H.5a.5.5 0 0 0 0 1h.541A3 3 0 0 0 7 8a1 1 0 0 1 2 0 3 3 0 0 0 5.959.5h.541a.5.5 0 0 0 0-1h-.541a3 3 0 0 0-5.584-.953A1.993 1.993 0 0 0 8 6c-.532 0-1.016.208-1.375.547'></path>
                </svg>
            </a>
            </td>
           
            
         </tr>
                
        
        ";
    }
    ?>
  
    </tbody>
</table>
</div>

<?php 

function convertirMiles($numeroRecibido)
{
    $numero = $numeroRecibido;

    // Formatea el número con separador de miles y dos decimales
    $numeroFormateado = number_format($numero, 2, '.', ',');
    
    return $numeroFormateado;
}
?>


<style>
    .colorEncabezadoLista{
        background-color: #4F6FAE;
    }
   
    .tamañoModal{
        width: 600px;
        margin-right: auto;
    }
</style>
</style>
<!-- Modal AVANCE FINANCIERO INICIO -->
<div class="modal fade" id="exampleModalFinancieroMOdal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content tamañoModal">
      <div class="modal-header colorEncabezadoLista">
        <h5 class="modal-title " id="exampleModalLabel" style="color: white; 
        font-weight: 500;">HISTORIAL DE  AVANCE FINANCIERO</h5>
        <a type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </a>
      </div>
      <div class="modal-body " id="loadModalFinanciero">
        
          
      </div>
      <div class="modal-footer">
        <a type="button" id="cerrarBtnAvanceFinanciero"class="btn  btn-sm btn-danger" data-bs-dismiss="modal">CERRAR</a>
      </div>
      <a class="btn btn-success" id="botonCargandoAvanceFinanciero"  style="display:none;"type="button" disabled>
  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
  Loading...
</a>
    </div>
  </div>
</div> 
<!-- MODAL AVANCE FINANCIERO FIN -->

<script>
    function  valorFuncion (valor)
    {
    //LINE PRESUPUESTARIA ::::::::::::::::::::::::::::
    $("#loadModalFinanciero").load("view/Monitoreo/Monitoreo.modal.avancefinanciero.php",{
        idLIsta : valor
        });
    }
   
</script>

