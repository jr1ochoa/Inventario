<?php include("../../../../../config/net.php"); 

    $statusQuery = ($_REQUEST["status"] != "") ? "AND a.status = ". $_REQUEST["status"] : "";
?> 

<h2 class="text-center text-uppercase mt-5">Personal con acceso al módulo</h2>
<hr class="d-block mx-auto mt-1" style="border: 1px solid #1a4262; width: 40%;"/>

<button id="btnAddAccessModule" type="button" class="btn-siif btn-solid-2 d-block mx-auto px-5 mt-4" data-bs-toggle="modal" data-bs-target="#accessModal">
    Agregar
</button>

<table id="moduleTable" class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Cargo</th>
            <th>Rol</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php

            $query = "SELECT a.id, CONCAT(e.name1, ' ', e.lastname1) as 'employee', p.position, a.rol, a.status, a.dtc FROM `debida_diligencia_access` as a 
                        INNER JOIN workarea_positions as p ON p.id = a.idPosition
                        INNER JOIN workarea_positions_assignment as wpa ON wpa.idposition = p.id
                        INNER JOIN employee as e ON e.id = wpa.idemployee
                        WHERE wpa.enddate = '0000-00-00' $statusQuery";
            $employee = $net_rrhh->prepare($query);
            $employee->execute();
            $i=0;
            $rol = "";

            while ($data = $employee->fetch()) {
                $i++;
                $rol = ($data[4] == 0) ? "Activo" : "Inactivo";
                $btnText = ($data[4] == 0) ? "<i class='bi bi-person-dash-fill'></i> Deshabilitar" : '<i class="bi bi-person-check-fill"></i> Habilitar';
                echo "
                        <tr>
                            <td>$i</td>
                            <td>$data[1]</td>
                            <td>$data[2]</td>
                            <td>$data[3]</td>
                            <td>$rol</td>
                            <td>
                                <button type='button' class='btn-siif btn-solid px-3' data-bs-toggle='modal' data-bs-target='#accessModal' onclick='loadAccessForm($data[0], \"changeStatus-module\")'>
                                    $btnText
                                </button>
                            </td>
                        </tr>
                    ";
            }
        ?>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $("#moduleTable").DataTable();

        $("#btnAddAccessModule").click(function() {
            loadAccessForm("0", "add-module");
        });
    });

    function loadAccessForm(id, action) {
        $("#loadAccessForm").load("/view/Operaciones/AdministracionFinanciera/DebidaDiligencia/access/access.form.php",{
            id: id,
            action: action
        })
    }
</script>