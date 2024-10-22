<?php include("../../config/net.php"); 

    $ids = $_REQUEST["ids"];
   // echo "Id == $ids";
    $query = "SELECT * FROM spaces WHERE id = $ids";
    $space = $net_rrhh->prepare($query);
    $space->execute(); 
    $data = $space->fetch();

?>

<div class="container my-5">
   
    <h1 class="text-center mb-5"><?=$data[1]?></h1>

    <form action="/process/index.php" method="post">

    <input type="hidden" name="process" value="spaces">
    <input type="hidden" name="action" value="updateSpace">
    <input type="hidden" name="ids" value="<?=$ids?>">

    <p class="fs-5 mb-2 text-uppercase">INFORMACIÓN GENERAL INTERNA</p>
    <div class="card mb-5">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="txtName" class="form-label">Nombre del espacio:</label>
                    <input type="text" class="form-control" id="txtName" name="txtName" value="<?=$data[1]?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="txtRepresentative" class="form-label">Dirección que representa el espacio:</label>
                    <select class="form-select" id="txtRepresentative" name="txtRepresentative" aria-label="Default select example">
                        <option value="">Seleccione</option>
                        <?php
                            $array = array("Operaciones", "Programas", "Proyectos", "Innovación y aprendizaje");

                            foreach ($array as $value) {
                                $selected = ($data[2] == $value) ? "selected" : "";
                                echo "<option value='$value' $selected>$value</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-9 mb-3">
            <p class="fs-5 text-uppercase">Responsable/s del espacio de coordinación</p>
        </div>
        <div class="col-md-3 mb-3">
            <button type="button" id="btnAddResponsible" class="btn btn-success float-end mt-3" data-bs-toggle="modal" data-bs-target="#employeesModal">Agregar Coordinador</button>
        </div>
        <div id="loadTableResponsibles" class="col-12 mb-3"></div>
    </div>

    <div class="row">
        <div class="col-md-9 mb-3">
            <p class="fs-5 text-uppercase">Asistente/s por parte de FUSALMO</p>
        </div>
        <div class="col-md-3 mb-3">
            <button type="button" id="btnAddParticipant" class="btn btn-success float-end mt-3" data-bs-toggle="modal" data-bs-target="#employeesModal">Agregar Asistentes</button>
        </div>
        <div id="loadTableParticipants" class="col-12 mb-3"></div>
    </div>

    <p class="fs-5 mb-2 mt-5 text-uppercase">DETALLES</p>
    <div class="card mb-5">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="txtDate" class="form-label">Fecha:</label>
                    <input type="date" class="form-control" id="txtDate" name="txtDate" value="<?=$data[3]?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="txtPlace" class="form-label">Lugar:</label>
                    <input type="text" class="form-control" id="txtPlace" name="txtPlace" value="<?=$data[4]?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="txtTimeFrom" class="form-label">Desde:</label>
                    <input type="time" class="form-control" id="txtTimeFrom" name="txtTimeFrom" value="<?=$data[5]?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="txtTimeTo" class="form-label">Hasta:</label>
                    <input type="time" class="form-control" id="txtTimeTo" name="txtTimeTo" value="<?=$data[6]?>">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="txtGuests" class="form-label">Nombre de los participantes o instituciones que asisten:</label>
                    <textarea class="form-control" id="txtGuests" name="txtGuests" rows="3"><?=$data[7]?></textarea>
                </div>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-success d-block mx-auto px-5 mt-3" id="btnSave">Guardar</button>
    </form>
</div>


<!-- Modal -->
<div class="modal fade" id="employeesModal" tabindex="-1" aria-labelledby="employeesModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="employeesModalLabel">Asignar Empleado</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="loadEmployees">
      </div>
      <div class="modal-footer">
        <button id="btnCloseEmployee" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
    $(document).ready(function(){
        $("#btnAddResponsible").click(function(){
            $("#loadEmployees").load("/view/spaces/spaces.employee.php",{
                type: "responsible",
                ids: "<?=$ids?>",
            });
        });
        $("#btnAddParticipant").click(function(){
            $("#loadEmployees").load("/view/spaces/spaces.employee.php",{
                type: "participant",
                ids: "<?=$ids?>",
            });
        });

        $("#loadTableResponsibles").load("/view/spaces/spaces.responsibles.table.php",{
            ids: "<?=$ids?>",
        });
        $("#loadTableParticipants").load("/view/spaces/spaces.participants.table.php",{
            ids: "<?=$ids?>",
        });
    });
</script>