<?php include("../config/net.php");

    $query = "SELECT * FROM `fus__dd_users` as u WHERE u.rol = 'participant' AND status = 0";
    $users = $net->prepare($query);
    $users->execute();
    $i=0;
?>

<p class="text-center fs-4 mt-5">Usuarios Activos</p>
<hr class="d-block mx-auto mb-5" style="border: 1px solid #1e49c3; width: 50%;" />

<table id="usersTable" class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Usuario</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Registro</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
            while ($data = $users->fetch()) {
                $i++;
                echo "
                    <tr>
                        <td>$i</td>
                        <td>$data[1]</td>
                        <td>$data[2]</td>
                        <td>$data[3]</td>
                        <td>$data[7]</td>
                        <td>
                            <button type='button' class='btn-siif btn-solid-2 px-3' onclick='loadAssignments($data[0])'>
                                <i class='bi bi-eye-fill'></i> Ver asignaciones
                            </button>
                        </td>
                    </tr>
                ";
            }
        ?>
    </tbody>
</table>

<script>
    $(document).ready(function(){
        $("#usersTable").DataTable();
    });

    function loadAssignments(idu) {
        $("#loadList").load("/view/Operaciones/AdministracionFinanciera/DebidaDiligencia/assignment/assignment.assignments.php",{
            idu: idu
        })
    }
</script>