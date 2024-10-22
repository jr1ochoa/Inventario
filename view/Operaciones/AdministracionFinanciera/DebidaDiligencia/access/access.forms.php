<?php include("../../../../../config/net.php"); 

    include("../config/net.php"); 

    $statusQuery = ($_REQUEST["status"] != "") ? "WHERE a.status = ". $_REQUEST["status"] : "";
?> 

<h2 class="text-center text-uppercase mt-5">Personal con acceso a formularios</h2>
<hr class="d-block mx-auto mt-1" style="border: 1px solid #1a4262; width: 40%;"/>

<table id="formsTable" class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre del Empleado</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php

            $query = "SELECT * FROM `fus__dd_siif_access` as a $statusQuery";
            $siifAccess = $net->prepare($query);
            $siifAccess->execute();
            $i=0;
            $rol = "";

            while ($data = $siifAccess->fetch()) {
                $i++;
                $rol = ($data[3] == 0) ? "Activo" : "Inactivo";
                $btnText = ($data[3] == 0) ? "<i class='bi bi-person-dash-fill'></i> Deshabilitar" : '<i class="bi bi-person-check-fill"></i> Habilitar';

                $query = "SELECT * FROM `employee` WHERE id = $data[1]";
                $employee = $net_rrhh->prepare($query);
                $employee->execute();
                $dataE = $employee->fetch();

                echo "
                        <tr>
                            <td>$i</td>
                            <td>$dataE[1] $dataE[2] $dataE[4] $dataE[5]</td>
                            <td>$rol</td>
                            <td>
                                <button type='button' class='btn-siif btn-solid px-3' data-bs-toggle='modal' data-bs-target='#accessModal' onclick='loadAccessUserForms($data[0], \"changeStatus-forms\")'>
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
        $("#formsTable").DataTable();

    });

    function loadAccessUserForms(id, action) {
        $("#loadAccessForm").load("/view/Operaciones/AdministracionFinanciera/DebidaDiligencia/access/access.form.php",{
            id: id,
            action: action
        })
    }
</script>