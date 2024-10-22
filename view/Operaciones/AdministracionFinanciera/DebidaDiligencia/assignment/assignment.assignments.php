<?php include("../config/net.php");

    $query = "SELECT * FROM `fus__dd_users` as u WHERE u.id = ". $_REQUEST["idu"];
    $user = $net->prepare($query);
    $user->execute();
    $dataU = $user->fetch();

?>

<div class="text-center">
    <div class="btn-group" role="group" aria-label="Basic example">
        <button id="btnLoadUsers" type="button" class="btn-siif btn-solid-2 d-block mx-auto">
            <i class="bi bi-people-fill"></i> Ver usuarios
        </button>
        <button id="btnAssignment" type="button" class="btn-siif btn-solid-2 d-block mx-auto" data-bs-toggle="modal" data-bs-target="#assignmentModal">
            <i class="bi bi-plus-circle"></i> Asignar formulario
        </button>
    </div>
</div>

<p class="text-center text-uppercase fs-4 mt-5">Asignaciones de <?=$dataU[1]?></p>
<hr class="d-block mx-auto mb-3" style="border: 1px solid #1e49c3; width: 50%;" />


<table id="assignmentsTable" class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Usuario</th>
            <th>Formulario Asignado</th>
            <th>Registro</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $query = "SELECT a.id, u.user, a.form_type, a.dtc FROM fus__dd_assignation_form as a 
                        INNER JOIN fus__dd_users as u ON a.idUser = u.id
                        WHERE a.idUser = ". $_REQUEST["idu"];
            $assignments = $net->prepare($query);
            $assignments->execute();

            while ($data = $assignments->fetch()) {
                $i++;
                echo "
                    <tr>
                        <td>$i</td>
                        <td>$data[1]</td>
                        <td>";
                        switch ($data[2]) {
                            case 'supplier': echo "Proveedor"; break;   
                            case 'customer natural': echo "Cliente Natural"; break;   
                            case 'customer legal': echo "Cliente Jurídico"; break;   
                            case 'founders': echo "Miembros Fundadores"; break;   
                            case 'consultant': echo "Consultor"; break;   
                            case 'employee': echo "Empleado"; break;   
                            case 'boardDirectors': echo "Junta Directiva"; break;   
                        }
                echo "
                        </td>
                        <td>$data[3]</td>
                        <td>
                            <button type='button' class='btn-siif btn-solid px-3' data-bs-toggle='modal' data-bs-target='#assignmentModal' onclick='loadAssignmentForm($data[0], \"delete\")'>
                                <i class='bi bi-trash3-fill'></i> Eliminar
                            </button>
                        </td>
                    </tr>
                ";
            }
        ?>
    </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="assignmentModal" tabindex="-1" aria-labelledby="assignmentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="assignmentModalLabel">Asignación</h1>
            </div>
            <div id="loadAssignmentForm" class="modal-body">
            </div>
            <div class="modal-footer">
                <button id="btnCloseAssignment" type="button" class="btn-siif btn-solid-2" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $("#assignmentsTable").DataTable();

        $("#btnLoadUsers").click(function(){
            $("#loadList").load("/view/Operaciones/AdministracionFinanciera/DebidaDiligencia/assignment/assignment.users.php")
        });
        $("#btnAssignment").click(function(){
            loadAssignmentForm("0", "add");
        });
    });
    
    function loadAssignmentForm(id, action) {
        $("#loadAssignmentForm").load("/view/Operaciones/AdministracionFinanciera/DebidaDiligencia/assignment/assignment.form.php",{
            id: id,
            action: action,
            idu: "<?=$_REQUEST["idu"]?>"
        })
    }
</script>