<?php include("../../config/net.php"); 

    $ids = $_REQUEST["ids"];
?>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Cargo</th>
            <?php if (!isset($_REQUEST["view"])) { ?>
            <th>Acciones</th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
        <?php
            $query = "SELECT e.id, e.name1, e.name2, e.lastname1, e.lastname2, wp.position, sp.id FROM `spaces_participants` as sp
                        INNER JOIN employee as e ON e.id = sp.idEmployee
                        INNER JOIN workarea_positions_assignment as wpa ON wpa.idemployee = e.id
                        INNER JOIN workarea_positions as wp ON wp.id = wpa.idposition
                        WHERE wpa.enddate = '0000-00-00' AND sp.idSpace = $ids;";
            $employees = $net_rrhh->prepare($query);
            $employees->execute();

            while ($data = $employees->fetch()) {
                echo "<tr>
                        <td>$data[0]</td>
                        <td>$data[1] $data[2] $data[3] $data[4]</td>
                        <td>$data[5]</td>";
                        if (!isset($_REQUEST["view"])) {
                            echo "<td style='width: 15%;'>
                                    <button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#employeesModal' onclick='deleteparticipant($data[6])'>
                                        Eliminar
                                    </button>
                                </td>";
                        }
                echo "</tr>";
            }
        ?>
    </tbody>
</table>

<script>
    function deleteparticipant(id) {
        $("#loadEmployees").load("/view/spaces/spaces.employee.php",{
            action: "delete",
            type: "participant",
            id: id,
        });
    }
</script>