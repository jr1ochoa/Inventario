<?php 

include("../../config/net.php");

$idProyecto = $_REQUEST['idRelacion'];?>

<style>

    .colorFondo{

        background-color: #FEF2D4;

    }

</style>

<div class="table-responsive">

<table class="table table table table-bordered mt-2 table-hover" style="background-color: #FFFFFF; border-radius:8px;">

                <thead>

                    <tr>

                    <th scope="col">AREA</th>

                    <th scope="col">DESCRIPCIÓN DEL APOYO</th>

                    <th scope="col">RECURSOS PROPORCIONADOS POR EL PROYECTO</th>

                    

                    </tr>

                </thead>

                <tbody>

                <?php 

    //include("../../config/net.php");

    $query = "SELECT * FROM monitor_vinculacion_institucional where id_generalidad_proyecto = ?";

    $data3 = $net_rrhh->prepare($query);

    $data3->execute([$idProyecto]);

    while ($data = $data3->fetch()) {

        echo '

        <tr>

                   

                    <td>"'.$data[1].'"</td>

                    <td>"'.$data[2].'"</td>

                    <td>"'.$data[3].'"</td>

                     <td> <button id="'.$data[0].'" class="btn btn-sm mt-0  pt-0" style="background-color: #1A4262; color:white;"  onclick="funcioneEditarVinculoInstitucional('.$data[0].')" data-bs-toggle="modal" data-bs-target="#EditarVinculacionInstitucional22">
           


            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
      </svg>
        </button></td> 

            <td> <button id="'.$data[0].'" class="btn btn-sm mt-0  pt-0" style="background-color: #1A4262; color:white;"  onclick="funcioneLIMINARVinculacionInstitucional('.$data[0].')" data-bs-toggle="modal" data-bs-target="#exampleEliminarVinculacionInsti">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
            </svg>
        </button></td> 
                    </tr>

                

        

        ';

    }

?>

                    

                    

                </tbody>

            </table>

</div>


<!--::::::::: EDITAR VINCULACION INSTITUCIONAL :::::::::::: -->
<div class="modal fade" id="EditarVinculacionInstitucional22" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header colorEncabezadoLista">
        <h5 class="modal-title" id="exampleModalLabel" style="color:white;">ELIMINAR VINCULACIÓN INSTITUCIONAL</h5>
        <button type="button" id="btnCerrarMODALObjGeneral" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       
      <div id="EditarVinculacionInstitucional3"></div>
    
      
      </div>
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

<!-- MODAL ELIMINAR VINCULACION INSTITUCIONAL -->
<div class="modal fade" id="exampleEliminarVinculacionInsti" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header colorEncabezadoLista">
        <h5 class="modal-title" id="exampleModalLabel" style="color:white;">ELIMINAR OBJETIVO GENERAL</h5>
        <button type="button" id="btnCerrarMODALObjGeneral" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       
      <div id="EliminarVinculacionInstitucional2"></div>
    
      
      </div>
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




<script src="view/Monitoreo/editar.vinculacion.institucional.js"></script>
<script src="view/Monitoreo/eliminar.vinculacion.institucional.js"></script>
