<?php 
include("../../../../config/net.php");
$idValor = $_POST['id_Solicitud'];


?>
<h4><b>DETALLE DE PRODUCTOS INDIVIDUALES Y SU PROGRESO </b> </h4>
<div style="height: 4px; width:100%; margin-top:-20px;background: linear-gradient(to right, #1A4262 33%, #668196 33%, #668196 66%, #CCD5DC 66%);"></div>
  
<input type="hidden" id="idFormularioCodigo" value="<?= $idValor;?>"/>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Producto</th>
      <th scope="col">Medida</th>
      <th scope="col">Información del Arte</th>
      <th scope="col">Img. Referencia</th>
      <th scope="col">Estado</th>
    </tr>
  </thead>
  <tbody>
    <?php 
if($idValor === "")
{

}
else
{
    $query = "SELECT s1.*, s2.nombre as 'producto', s3.medidas FROM `entornos_virtuales_detalle_solicitud` as s1 
    left join  entornos_virtuales_productos as s2 on s1.producto = s2.id 
    left join entornos_virtuales_medidas as s3 on s1.medidas = s3.id 
    where s1.codigo_solicitud = ?";
    $data3 = $net_rrhh->prepare($query);
    $data3->execute([$idValor]);
    if($data3->rowCount()>0)
    {
        while ($data = $data3->fetch()) {
            if($data[6]==1)
            {
                $valrEstado="No iniciado";
            }
            else if($data[6]==2)
            {
                $valrEstado="En Proceso";
            }
            else if($data[6]==3)
            {
                $valrEstado="Terminado";
            }
            if($data[2]=="N/A/S")
            {
                $medidasTomadas = $data[5];
            }
            else
            {
                $medidasTomadas = $data[9];
            }
        echo "
        
        <tr>
        <td>".$data[8]."</td>
          <th scope='row'>".$medidasTomadas."</th>
          
          <td>".$data[4]."</td>
          <td>
          <a href=".$data[7]."><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-folder2-open' viewBox='0 0 16 16'>
  <path d='M1 3.5A1.5 1.5 0 0 1 2.5 2h2.764c.958 0 1.76.56 2.311 1.184C7.985 3.648 8.48 4 9 4h4.5A1.5 1.5 0 0 1 15 5.5v.64c.57.265.94.876.856 1.546l-.64 5.124A2.5 2.5 0 0 1 12.733 15H3.266a2.5 2.5 0 0 1-2.481-2.19l-.64-5.124A1.5 1.5 0 0 1 1 6.14zM2 6h12v-.5a.5.5 0 0 0-.5-.5H9c-.964 0-1.71-.629-2.174-1.154C6.374 3.334 5.82 3 5.264 3H2.5a.5.5 0 0 0-.5.5zm-.367 1a.5.5 0 0 0-.496.562l.64 5.124A1.5 1.5 0 0 0 3.266 14h9.468a1.5 1.5 0 0 0 1.489-1.314l.64-5.124A.5.5 0 0 0 14.367 7z'/>
</svg> ABRIR CARPETA</a>
</td>
<td>".$valrEstado."</td>
        </tr>
        
        ";
        }
    }
}

    ?>
    
  </tbody>
</table>


<!--::::::::::::::::::: MODAL  ELIMINAR  :::::::::::::::::::::::::-->
<div class="modal fade" id="exampleModalEliminarProducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      ¿Está seguro de que desea eliminar este producto?..
      <input type="hidden" id="inputIdProducto" />
      </div>
      <div class="modal-footer">
        <button type="button" id="btnCancelarEliminacion" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button id="btnDeleteProducto" type="button" class="btn btn-primary">Sí, confirmar</button>
      </div>
    </div>
  </div>
</div>

<!--:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->
<script>
let funcionEliminarActividad=(valor)=>
{
    $("#inputIdProducto").val(valor);
    
    //alert(valor);
} 

</script>