<?php include("../../config/net.php"); 

$idb = $_REQUEST["idb"];

$query = "SELECT * FROM spaces WHERE id = $idb";
$space = $net_rrhh->prepare($query);
$space->execute();
$data = $space->fetch();
?>

<style>
    .formatodeTexto{
        font-weight: 400;
    }
    .formatoTituloTexto{
        font-weight: 600;
    }
    .colorFichaProyecto{
        background-color: #F2F2F2;
        color: while;
        margin-right: 534px;
        border-radius: 8px;
    }
</style>
<style>
    .colorFondo{
        background-color: #CFE2FF;
        color: #FFFFFF;
    }
    .colorTitulo{
        background-color: #F2F2F2;
        border-radius: 10px;
        color: #FFFFFF;
        font-size: 15px;
        margin-left: 20px;
    }
    .colorNuevoProyecto{
        background-color: #FFFFFF;
        color: black;
    }
    .colorNuevaFicha{
        background-color: #FFFFFF;
        color: black;
    }
    .colorFondo{
        background-color: #3E9AA5;
    }
    .fondoImagen {
    margin: 0;
    padding: 0;
    background-image: url('assets/images/2204_i005_n09_1384647623_time_schedule_planner_agenda_calendar_time_management_concept_work_schedule_planner_tasks_planning_calendar_vector_background_illustration_time_management_concept.jpg'); /* Reemplaza 'ruta_de_tu_imagen.jpg' con la ruta de tu imagen de fondo */
    background-size: cover;
    background-position: center 25%;
    height: 40vh;
    display: flex;
    align-items: center;
    justify-content: center;
    
}
.colorTextoFondo{
    color: while;
    font-weight: 700;
}
.fondoColor{
    background-color: #CFE2FF;
    color: white;
    opacity: 0.7; /* Ajusta la opacidad según tus preferencias */
   
}

</style> 
<div class="container my-5">
    <div class="row">

    <div class="fondoImagen">
        <div class="col-md-8">
            <h1 style="background-color: #908484ba; color: white;"><b style="color: white;"><?=$data[1]?></b></h1>
        </div>
        <div class="col-md-4">
            <button id="btnAddSpace" type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#spacesCoordinationModal">Agregar Espacio</button>
        </div>
    </div>
    </div>
    <hr/>

    <div id="loadCoordinationTable"></div>
</div>

<!-- Modal -->
<div class="modal fade" id="spacesCoordinationModal" tabindex="-1" aria-labelledby="spacesCoordinationModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="spacesCoordinationModalLabel">Espacios</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div id="loadCoordinationForm" class="modal-body">
      </div>
      <div class="modal-footer">
        <button id="btnCloseCoordination" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $("#loadCoordinationTable").load("/view/spaces/spaces.coordination.table.php",{
            idb: "<?=$idb?>"
        });

        $("#btnAddSpace").click(function(){
            $("#loadCoordinationForm").load("/view/spaces/spaces.coordination.form.php",{
                idb: "<?=$idb?>"
            });
        });
    });
</script>